@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action=" {{ route('register') }} ">
                            @csrf

                            <div class="row mb-3">
                                <label for="employee_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Employee ID') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="employee_id"
                                        value="{{ old('employee_id') }}" required autocomplete="employee_id" autofocus>

                                    @error('employee_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="fullname"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>

                                <div class="col-md-6">
                                    <input id="fullname" type="text"
                                        class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                        value="{{ old('fullname') }}" required autocomplete="fullname" autofocus>

                                    @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="usertype"
                                    class="col-md-4 col-form-label text-md-end">{{ __('User Type') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="user_type">
                                        <option>Default Select</option>
                                        <option value="1" {{ old('user_type') == 1 ? 'selected' : '' }}>Administrator
                                        </option>
                                        <option value="2" {{ old('user_type') == 2 ? 'selected' : '' }}>Fund Manager
                                        </option>
                                        <option value="3" {{ old('user_type') == 3 ? 'selected' : '' }}>Transaction
                                            Recorder</option>
                                    </select>

                                    @error('usertype')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="status"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select name="status" class="form-control">
                                        <option value="1" selected>Active</option>
                                    </select>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm_password" type="password" class="form-control"
                                        name="confirm_password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
