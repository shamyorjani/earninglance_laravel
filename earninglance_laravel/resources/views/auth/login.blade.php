{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


//real one

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Earninglance</title>
</head>

<body>
    @include('includes.header');

    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <div class="section-heading">
                        <h2>Login</h2>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="col-lg-12">
                            <br>
                            <fieldset>
                                {{-- <input type="text" name="username" id="name" placeholder="username" autocomplete="on" required> --}}
                                <x-text-input placeholder="Email" id="email" class="block mt-1 w-full"
                                    type="email" name="email" :value="old('email')" required autofocus
                                    autocomplete="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />


                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            {{-- <fieldset> --}}
                            {{-- <input type="password" name="password" id="surname" placeholder="Password" autocomplete="on" required> --}}



                            {{-- <x-input-label for="password" :value="__('Password')" /> --}}

                            <x-text-input placeholder="Password" id="password" class="block mt-1 w-full"
                                type="password" name="password" required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />



                            {{-- </fieldset> --}}
                        </div>

                        {{-- <div class="col-lg-12">
                                    <label for="remember_me" class="items-center">
                                        <input id="" type="checkbox" name="remember_me">
                                        <span>{{ __('Remember me') }}</span>
                                    </label>

                                </div> --}}
                        <div class="col-lg-12">
                            <div class="form-check d-flex flex-direction-coulmn align-items-center p-0 mb-3">
                                <input class="form-check-input m-0 p-0" style="width:10%;" type="checkbox"
                                    id="gridCheck" name="remember" value="1">
                                <label class="form-check-label mx-2" for="gridCheck">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            {{-- <fieldset> --}}
                            <button type="submit" name="login" id="form-submit"
                                class="main-button ">{{ __('Log in') }}</button>
                            {{-- </fieldset> --}}
                        </div>
                        <div class="col-lg-12">
                            <p>Don't Have and Account?
                                <a href="{{ url('/register') }}">Register</a>
                                @if (Route::has('password.request'))
                                    <a class="pull-right" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                                {{-- {{-- <a class="pull-right" href="{{url('/forgot-password')}}" >Forgot Password</a></p> --}}
                        </div>
                        <div class="contact-dec">
                            <img src="{{ url('assets/images/contact-decoration.png') }}" alt="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
</body>

</html>
