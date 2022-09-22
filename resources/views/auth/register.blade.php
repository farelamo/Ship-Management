@extends('layouts.auth')

@section('title', 'Register')

@push('style')
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="card card-primary">

        <div class="card-body">
            <form method="POST" action="/register">
                @csrf

                <div class="row">
                    <div class="form-group col-6">
                        <label for="fname">First Name</label>
                        <input id="fname" type="text" class="form-control" name="fname" value="{{old('fname')}}" autofocus>
                        @error('fname') <span class="error" style="color: red; font-weight: bold">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="lname">Last Name</label>
                        <input id="lname" type="text" class="form-control" name="lname" value="{{old('lname')}}">
                        @error('lname') <span class="error" style="color: red; font-weight: bold">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{old('email')}}">
                    <div class="invalid-feedback"></div>
                    @error('email') <span class="error" style="color: red; font-weight: bold">{{ $message }}</span> @enderror
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" value="{{old('password')}}">
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                        @error('password') <span class="error" style="color: red; font-weight: bold">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="password2" class="d-block">Password Confirmation</label>
                        <input id="password2" type="password" class="form-control" name="password-confirm">
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                        <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
@endpush
