@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center g-0">
        <div class="col-lg-5 col-md-5 col-12">
            <div class="box box-body">
                <div class="content-top-agile pb-0 pt-20">
                    <h2 class="text-primary">Get started with Us</h2>
                    <p class="mb-0">Register as a Student</p>
                </div>
                <div class="p-40">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" name="role" value="student">
                <div class="form-group">
                            <div class="input-group mb-15">
                                <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                <input type="text" class="form-control ps-15 bg-transparent @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"placeholder="Full Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            </div>
                        </div>

                    <div class="form-group">
                            <div class="input-group mb-15">
                                <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                <input type="email" class="form-control ps-15 bg-transparent @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
                                @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            </div>
                        </div>



                <div class="form-group">
                            <div class="input-group mb-15">
                                <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                <input type="password" class="form-control ps-15 bg-transparent @error('password') is-invalid @enderror" name="password" required  placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>


                <div class="form-group">
                            <div class="input-group mb-15">
                                <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                <input type="password" class="form-control ps-15 bg-transparent" placeholder="Retype Password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                 <div class="row">
                            <div class="col-12">

                            </div>
                            <!-- /.col -->
                            <div class="col-12 text-center">
                              <button type="submit" class="btn btn-info w-p100 mt-15">Register</button>
                            </div>
                            <!-- /.col -->
                          </div>
            </form>
            <div class="text-center">
                        <p class="mt-15 mb-0">Already have an account?<a href="{{route('login')}}" class="text-danger ms-5"> Log In</a></p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
