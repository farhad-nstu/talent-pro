@extends('layouts.admin.app')
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
                                @can('urls.createUrl')
                                    <a href="{{ route('urls.createUrl') }}"
                                        class="btn btn-primary waves-effect waves-light">Create
                                        New</a>
                                @endcan
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
                    <table class="table table-bordered table-striped  nowrap w-100">
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
                        <tbody>
                            @foreach ($urls as $url)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $url->title }}</td>
                                    <td>{{ $url->user->name }}</td>
                                    <td>{{ $url->original_url }}</td>
                                    <td>{{ $url->shorten_url }}</td>
                                    <td>
                                        @can('urls.editUrl')
                                            <a href="{{ route('urls.editUrl', $url->id) }}"
                                                class="btn btn-primary waves-effect waves-light"><i class="fas fa-edit"></i></a>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        {{--  <div class="col-md-12 text-center">
                        </div>  --}}
                        <!-- Pagination -->
                <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="1000ms">
                    {{$urls->links('pagination::bootstrap-5')}}
                </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
