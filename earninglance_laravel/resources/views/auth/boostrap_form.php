<form action="{{ route('register') }}" enctype="multipart/form-data" method="post" id="contact" novalidate>
    @csrf
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="name" class="form-control" id="validationCustom01" required autocomplete="off" placeholder="Name" value="{{ old('name') }}">
            <div class="invalid-feedback">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <input type="text" name="username" autocomplete="off" class="form-control" id="validationCustom02" required placeholder="Username" value="{{ old('username') }}">
            <div class="invalid-feedback">
                @error('username')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <input type="email" name="email" placeholder="Email" class="form-control" id="validationCustom03" required value="{{ old('email') }}">
            <div class="invalid-feedback">
                @error('email')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <input type="number" name="phone" placeholder="Phone Number" class="form-control" id="validationCustom03" required value="{{ old('phone') }}">
            <div class="invalid-feedback">
                @error('phone')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <input type="text" name="referral" @isset($username) value="{{ $username }}" @endisset placeholder="referral" autocomplete="off" class="form-control" id="validationCustom03" required value="{{ old('referral') }}">
            <div class="invalid-feedback">
                @error('referral')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <input type="password" name="password" placeholder="Password" class="form-control" id="validationCustom03" required>
            <div class="invalid-feedback">
                @error('password')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control" id="validationCustom03" required>
            <div class="invalid-feedback">
                @error('cpassword')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-lg-12 text-end">
            <fieldset>
                <button type="submit" name="register" id="form-submit" class="main-button btn btn-primary ">Register</button>
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