@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                           <div class="form-group row">
  	                       <div class="col-md-4">
  		                   <img width="150" height="200" src="{{ asset('img/bg-avatar.png') }}" alt=""></a>
  	                       </div>
  	                       <div class="col-md-6 ">
    	                   <input id="Upload photo" name="Upload photo" class="input-file" type="file">
                           </div>
                           </div>
                           <div class="form-group row">
  		                    <label class="col-md-4 control-label" for="dob">Date of birth</label>
                         	<div class="col-md-6">        
       	                	<input id="dob" name="dob" type="text" placeholder="dd/mm/yyyy" class="form-control input-md">
      	                   </div>
  	                       </div>

                           <div class="form-group row">
  		                    <label class="col-md-4 control-label" for="phone">Phone</label>
       	                    <div class="col-md-6">        
       		                <input id="phone" name="phone" type="text" placeholder="04xx xxx xxx" class="form-control input-md">
      	                    </div>
  	                        </div>
							   <div class="form-group row">
  		                       <label class="col-md-4 control-label" for="address">Address</label>
       	                       <div class="col-md-6">        
       		                   <input id="address" name="address" type="text" placeholder="1b street..." class="form-control input-md">
      	                        </div>
  	                            </div>

							
                        <div class="form-group row mb-0">
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
