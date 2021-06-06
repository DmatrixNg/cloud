@extends('layouts.app')

@section('content')
<!---page Title --->
	
	<section class="py-50">
		<div class="container">
			<div class="row justify-content-center g-0">
				<div class="col-lg-5 col-md-5 col-12">
					<div class="box box-body">
						<div class="content-top-agile pb-0 pt-20">
							<h2 class="text-primary">Let's Get Started</h2>
							<p class="mb-0 lowercase">SIGN IN TO CLOUD BASED LECTURE RESOURCE (MATERIAL) DISTRIBUTION SYSTEM</p>
						</div>
						<div class="p-40">
                         <form method="POST" action="{{ route('login') }}">
                             @csrf
                              <div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
										<input id="email" type="email" name="email" class="form-control ps-15 bg-transparent @error('email') is-invalid @enderror" required autocomplete="email" autofocus placeholder="Email">
                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
									</div>
								</div>

                                 <div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
										<input type="password" name="password" class="form-control ps-15 bg-transparent @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Password">
									@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
								</div>

                                 <div class="row">
									<div class="col-6">
									  <div class="checkbox ms-5">
										<input type="checkbox" id="basic_checkbox_1" name="remember" {{ old('remember') ? 'checked' : '' }}>
										<label for="basic_checkbox_1" class="form-label">Remember Me</label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-6">
									 {{-- <div class="fog-pwd text-end">
										<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
									  </div> --}}
									</div>
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-info w-p100 mt-15">SIGN IN</button>
									</div>
									<!-- /.col -->
								  </div>





                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}

                            </form>
                            <div class="text-center">
								<p class="mt-15 mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-warning ms-5">Register</a></p>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</section>
@endsection

