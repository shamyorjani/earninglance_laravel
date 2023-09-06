{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Earninglance</title>
</head>
<body>
  @include('./includes.header')
            <div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 
            
            <div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">
            
            <div class="be_logo" style="float: left;"></div>
            
            <div style="clear: both;"></div> 
            
            <div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">
            
            <h1 style="text-transform: capitalize;" >Password Recovery!</h1>
            
            </div> </div> 
            
            <div class="be_body" style="padding: 20px;"> <p style="line-height: 25px;">
            Your link for password recovery is <a href="{{url('/recover')}}" >Here</a> <br>
            Click on the up link of or coppy this url in new tab
            </p> <div style="margin-top: 25px;">
        </div> 
    </div> 
</div>
  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Login</h2>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="{{ route('password.email') }}" method="post">
            @csrf
            <h6 style='color: green;' >green color</h6>
            <div class="row">
              <div class="col-lg-12">
                <br>
                <fieldset>
                  <input type="text" name="email" id="name" placeholder="Enetr Registered Email" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" name="forgot" id="form-submit" class="main-button ">Send Email</button>
                </fieldset>
              </div>
              <div class="col-lg-12" >
                <a href="login.php" >Login</a>
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