<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Earninglance</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    @include('includes.header');

    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <div class="section-heading">
                        <h2>Register</h2>
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">

                    <form id="contact" action="{{ route('register') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="text" name="name" id="name" placeholder="Name"
                                        autocomplete="off" required value="{{ old('name') }}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="text" name="username" id="surname" placeholder="Username"
                                        autocomplete="off" required value="{{ old('username') }}">
                                    <span class="text-danger">
                                        @error('username')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="email" name="email" id="email" placeholder="Email"
                                        autocomplete="off" required value="{{ old('email') }}">
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="number" name="phone" id="phone" placeholder="Phone Number"
                                        autocomplete="off" required value="{{ old('phone') }}">
                                    <span class="text-danger">
                                        @error('phone')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    {{-- <fieldset>
                                        <label for="account_type">Account Type</label>
                                        <select name="account_type" id="account_type" required>
                                            <option value="">Select Account Type</option>
                                            <option value="personal">Personal</option>
                                            <option value="business">Business</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('account_type')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </fieldset> --}}
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    {{-- <input type="text" name="refrals" readonly value="Referal" placeholder="Refral" autocomplete="off"> --}}
                                    <input type="text" name="referral"
                                        @isset($username) value="{{ $username }}" @endisset
                                        placeholder="referral" autocomplete="off" disabled>
                                    <span class="text-danger">
                                        @error('referral')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                    <?php
                                    ?>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="password" name="password" placeholder="Password" autocomplete="off"
                                        required>
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="password" name="cpassword" placeholder="Confirm Password"
                                        autocomplete="off" required>
                                    <span class="text-danger">
                                        @error('cpassword')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </fieldset>
                            </div>
                            <div class="col-lg-12 text-end">
                                <fieldset>
                                    <button type="submit" name="register" id="form-submit"
                                        class="main-button ">Register</button>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <p>Allready have an Account? <a href="{{ url('login') }}">Login</a></p>
                            </div>
                        </div>
                        <div class="contact-dec">
                            <img src="{{ url('assets/images/contact-decoration.png') }}" alt="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    @include('includes.footer')
</body>

</html>
