@extends('layouts.app')
@section('title', $title)
@push('style')
    <style>
        .info {
            background-color: aqua;
        }
    </style>
@endpush
@section('body')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">@yield('title')</h4>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-wrap gap-2 float-end">
                                <a href="{{ url()->previous() }}" class="btn btn-light waves-effect"><i
                                        class="fas-light fas fa-angle-double-left"></i> Back</a>
                                {{--  @can('urls.createUrl')  --}}
                                    <a href="{{ route('shortenUrls.createUrl') }}"
                                        class="btn btn-primary waves-effect waves-light">Create
                                        New</a>
                                {{--  @endcan  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped nowrap w-100">
                        <thead>
                            <tr class="table-hd-bg">
                                <th>#</th>
                                <th>Title</th>
                                <th>User</th>
                                <th>Original url</th>
                                <th>Shorten url</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody id="urlData">
                            @foreach ($urls as $url)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $url['title'] }}</td>
                                    <td>{{ isset($url->user) ? $url->user->name : $url['user_id'] }}</td>
                                    <td>{{ $url['original_url'] }}</td>
                                    <td>{{ $url['shortener_url'] }}</td>
                                    <td>
                                        {{--  @can('urls.editUrl')  --}}
                                            <a href="{{ route('shortenUrls.editUrl', $url['id']) }}"
                                                class="btn btn-primary waves-effect waves-light"><i class="fas fa-edit"></i></a>
                                            <button data-url-id="{{ $url['id'] }}"
                                                class="urlDeleteButton btn btn-danger waves-effect waves-light"><i class="fas fa-trash"></i></button>
                                        {{--  @endcan  --}}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <!-- Pagination -->
                        <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="1000ms">
                            {{$urls->links('pagination::bootstrap-4')}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
<script>
$("#urlData").on("click", "button.urlDeleteButton", function () {
    element = $(this);
    url_id = element.data('url-id');

    bootbox.confirm({
        title: "Remove url?",
        message: `Are you sure you want to remove url <strong>${url_id}</strong>? This action cannot be reversed.`,
        buttons: {
            cancel: {
                label: 'No',
                className: 'btn-sm btn-primary',
            },
            confirm: {
                label: 'Yes',
                className: 'btn-sm btn-danger',
            }
        },
        callback: function (confirmed) {
            console.log('This was logged in the callback: ' + confirmed);
            if (confirmed) {
                let form_data = new FormData();

                form_data.append("csrfmiddlewaretoken", '{{ csrf_field() }}');
                form_data.append("url_id", url_id);

                axios.post("{{ route('shortenUrls.deleteUrl') }}", form_data, {})
                    .then(function (response) {
                        if (response.data.length <= 0) {
                            console.log("empty");
                            return false;
                        }
                        data = response.data
                        message = data.message

                        location.reload();
                    })
                    .catch(function (error) {
                        return false;
                    });
            }
        }
    });
});
</script>
@endpush
