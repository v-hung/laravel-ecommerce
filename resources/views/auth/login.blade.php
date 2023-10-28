{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.auth')

@section('content')
  <div class="axil-signin-area">

    <!-- Start Header -->
    <div class="signin-header">
      <div class="row align-items-center">
        <div class="col-sm-4">
          <a href="/" class="site-logo"><img src="assets/images/logo/logo.png" alt="logo"></a>
        </div>
        <div class="col-sm-8">
          <div class="singin-header-btn">
            <p>Not a member?</p>
            <a href="/register" class="axil-btn btn-bg-secondary sign-up-btn">Sign Up Now</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End Header -->

    <div class="row">
      <div class="col-xl-4 col-lg-6">
        <div class="axil-signin-banner bg_image bg_image--9">
          <h3 class="title">We Offer the Best Products</h3>
        </div>
      </div>
      <div class="col-lg-6 offset-xl-2">
        <div class="axil-signin-form-wrap">
          <div class="axil-signin-form">
            <h3 class="title">Sign in to eTrade.</h3>
            <p class="b2 mb--55">Enter your detail below</p>
            <form class="singin-form" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" :value="old('email')" required autofocus autocomplete="username">
                @if ($errors->get('email'))
                  <ul>
                    @foreach ($errors->get('email') as $message)
                      <li>{{ $message }}</li>
                    @endforeach
                  </ul>
                @endif
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required autocomplete="current-password">
              </div>
              <div class="form-group d-flex align-items-center justify-content-between">
                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign In</button>
                <a href="/forgot-password" class="forgot-btn">Forget password?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
