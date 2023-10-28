{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
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
            <h3 class="title">Confirm password?</h3>
            <p class="b2 mb--55">This is a secure area of the application. Please confirm your password before continuing.</p>
            <form class="singin-form" method="POST" action="{{ route('password.confirm') }}">
              @csrf
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required autofocus autocomplete="current-password">
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