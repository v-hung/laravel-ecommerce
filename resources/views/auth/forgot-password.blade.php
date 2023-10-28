{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
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
            <p>Already a member?</p>
            <a href="/login" class="axil-btn btn-bg-secondary sign-up-btn">Sign In</a>
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
            <h3 class="title">Forgot your password?</h3>
            <p class="b2 mb--55">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
            <form class="singin-form" method="POST" action="{{ route('password.email') }}">
              @csrf
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" :value="old('email')" required autofocus>
                @if ($errors->get('email'))
                  <ul>
                    @foreach ($errors->get('email') as $message)
                      <li>{{ $message }}</li>
                    @endforeach
                  </ul>
                @endif
              </div>

              <div class="form-group d-flex align-items-center justify-content-between">
                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Continue</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection