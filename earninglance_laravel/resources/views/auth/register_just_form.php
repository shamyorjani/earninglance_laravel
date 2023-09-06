<form id="contact" action="{{ route('register') }}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <fieldset>
                <input type="text" name="name" id="name" placeholder="Name" autocomplete="off" required>
                <span class="text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                </span>
            </fieldset>
        </div>
        <div class="col-lg-6">
            <fieldset>
                <input type="text" name="username" id="surname" placeholder="Username" autocomplete="off" required>
                <span class="text-danger">
                    @error('username')
                    {{ $message }}
                    @enderror
                </span>
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" required>
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
                <input type="number" name="phone" id="phone" placeholder="Phone Number" autocomplete="off" required>
                <span class="text-danger">
                    @error('phone')
                    {{ $message }}
                    @enderror
                </span>

            </fieldset>
        </div>
        <div class="col-lg-6">
            <fieldset>
                {{-- <input type="text" name="refrals" readonly value="Referal" placeholder="Refral" autocomplete="off"> --}}
                <input type="text" name="referral" @isset($username) value="{{ $username }}" @endisset placeholder="referral" autocomplete="off">
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
                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                <span class="text-danger">
                    @error('password')
                    {{ $message }}
                    @enderror
                </span>

            </fieldset>
        </div>
        <div class="col-lg-6">
            <fieldset>
                <input type="password" name="cpassword" placeholder="Confirm Password" autocomplete="off" required>
                <span class="text-danger">
                    @error('cpassword')
                    {{ $message }}
                    @enderror
                </span>

            </fieldset>
        </div>
        <div class="col-lg-12 text-end">
            <fieldset>
                <button type="submit" name="register" id="form-submit" class="main-button ">Register</button>
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