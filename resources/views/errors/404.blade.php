@extends('errors.layout')

@section('title', '404')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="page-error">
        <div class="page-inner">
            <div class="row w-100">
                <div class="col position-absolute" style="z-index: 100; right: 1%; top:1rem">
                    <h2>Coming Soon</h2>
                </div>
                <div class="col position-relative mr-1" style="z-index: 99">
                    <img src="{{ asset('img/Coming Soon.png') }}" alt="" class="w-50">
                </div>
            </div>
            <div class="page-description">
                The page you were looking for still in progress.
            </div>
            <div class="page-search">
                <form>
                    <div class="form-group floating-addon floating-addon-not-append">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <input type="text"
                                class="form-control"
                                placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-lg">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-3">
                    <a href="/dashboard">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
