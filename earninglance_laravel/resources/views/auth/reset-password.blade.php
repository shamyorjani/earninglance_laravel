<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Earninglance</title>
</head>

<body>
    @include('./includes.header')
    <div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;"
        class="be_container">

        <div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr">
            <div class="be_header">

                <div class="be_logo" style="float: left;"></div>

                <div style="clear: both;"></div>

                <div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

                    <h1 style="text-transform: capitalize;">Password Recovery!</h1>

                </div>
            </div>

            <div class="be_body" style="padding: 20px;">
                <p style="line-height: 25px;">
                    Your Earninglance password has been Changed Successfully!
                </p>
                <div style="margin-top: 25px;">
                </div>
            </div>
        </div>
        <div id="contact" class="contact-us section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s"
                        data-wow-delay="0.25s">
                        <div class="section-heading">
                            <h2>Recover Password</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                        <form id="contact" action="{{ route('password.store') }}" method="post">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <br>
                                    <div>
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email"
                                            name="email" :value="old('email', $request->email)" required autofocus
                                            autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input id="password" class="block mt-1 w-full" type="password"
                                            name="password" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password" name="password_confirmation" required
                                            autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" name="recover" id="form-submit"
                                                class="main-button ">Recover</button>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="login.php">Login</a>
                                    </div>
                                </div>
                                <div class="contact-dec">
                                    <img src="assets/images/contact-decoration.png" alt="">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('./includes.footer')
</body>

</html>
