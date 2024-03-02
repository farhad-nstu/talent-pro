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
                <div class="card-body">
                    <form method="POST" action="{{ route('shortenUrls.storeUrl') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        @include('layouts.components.input', [
                                            'wrap' => 'col-md-6',
                                            'label' => 'Title',
                                            'type' => 'text',
                                            'field' => 'title',
                                            'id' => 'title',
                                            'placeholder' => 'Url title',
                                        ])
                                        @include('layouts.components.input', [
                                            'wrap' => 'col-md-6',
                                            'label' => 'Original url',
                                            'type' => 'text',
                                            'field' => 'original_url',
                                            'id' => 'original_url',
                                            'placeholder' => 'Original url',
                                        ])
                                    </div>
                                    <div class="mb-0 mb-md-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
