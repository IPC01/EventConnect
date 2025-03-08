@extends('layouts.base')

@section('Content')

<div id="wrapper">

    <!-- Sidebar -->
    <!-- Include Navigation -->
    @include('components.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Include Navigation -->
          @include('components.nav')


            <!-- Begin Page Content -->
<div class="container-fluid" style="max-width: 1000px">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            
                
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="POST" action="{{ route('user.register') }}">
                            @csrf
                            <!-- First Name and Last Name -->
                                <div class="form-group">
                                    <label for="name" class="form-label">{{ __('First Name') }}</label>
                                    <input id="first_name" class="form-control form-control-user" type="text" name="name" value="{{ old('first_name') }}" required autofocus placeholder="First Name" />
                                    @error('first_name')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                           

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" class="form-control form-control-user" type="email" name="email" value="{{ old('email') }}" required placeholder="Email Address" />
                                @error('email')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password and Repeat Password -->
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" class="form-control form-control-user" type="password" name="password" required placeholder="Password" />
                                    @error('password')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="password_confirmation" class="form-label">{{ __('Repeat Password') }}</label>
                                    <input id="password_confirmation" class="form-control form-control-user" type="password" name="password_confirmation" required placeholder="Repeat Password" />
                                    @error('password_confirmation')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Role Selection (Combobox) -->
                            <div class="form-group">
                                <label for="role_id" class="form-label">{{ __('Role') }}</label>
                                <select id="role_id" class="form-control form-control-user" name="role_id" required>
                                    <option value="" disabled selected>Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Register Account') }}
                            </button>

                            <hr>

                            <!-- Social Media Registration -->
                            {{-- <a href="#" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="#" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> --}}
                        </form>

                        <hr>

                    
                    </div>
              
          
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Include Footer -->
@include('components.footer')


@endsection

