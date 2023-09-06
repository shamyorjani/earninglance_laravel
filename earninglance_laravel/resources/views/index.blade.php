<!DOCTYPE html>
<html lang="en">

<head>
    <title>Earninglance - Home</title>
</head>

<body>
    @include('includes.header')

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <h6>Welcome to Space Dynamic</h6>
                                <h2>We Make <span>Digital Ideas</span> &amp; <span>SEO</span> Marketing</h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{url('assets/images/banner-right-image.png')}}" alt="team meeting">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="plans" class="our-portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h2>Our <span>Plans</span> &amp; What We <span>Provide</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($plans as $plan)
                <div class="col-lg-4 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" style="background: linear-gradient(105deg, #fb730d 0%, #ff461e 100%);">
                        <div class="row text-center text-white">
                            <div class="col-lg-12" style="height:45vh;">
                                <h5>{{$plan->name}}</h5>
                                <p class="text-white">Level {{$plan->level}}</p>
                                <h1>{{number_format($plan->charges ,2)}}</h1>
                                <br>
                                <h4>Comissions</h4>
                                <p class="text-white">Direct: {{number_format($plan->direct ,2)}}</p>
                                <p class="text-white">Indirect: {{number_format($plan->indirect ,2)}}</p>
                                <p class="text-white">Team Bonus: {{number_format($plan->bonus ,2)}}</p>
                                <br>
                                <pre class="text-white">{{$plan->features}}</pre>
                                <br>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button id="form-submit" class="main-button" style="background-color: white;"><a
                                            style="color:#fb730d;" href="register.php">Select this Plan</a></button>
                                </fieldset>
                            </div>
                        </div>
                        <div class="contact-dec">
                            <img src="{{url('assets/images/contact-decoration.png')}}" alt="">
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <br><br><br>

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <img src="{{url('assets/images/about-left-image.png')}}" alt="person graphic">
                    </div>
                </div>
                <div class="col-lg-8 align-self-center">
                    <div class="services">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="icon">
                                        <img src="{{url('assets/images/service-icon-01.png')}}" alt="reporting">
                                    </div>
                                    <div class="right-text">
                                        <h4>Data Analysis</h4>
                                        <p>Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                                    <div class="icon">
                                        <img src="{{url('assets/images/service-icon-02.png')}}" alt="">
                                    </div>
                                    <div class="right-text">
                                        <h4>Data Reporting</h4>
                                        <p>Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                                    <div class="icon">
                                        <img src="{{url('assets/images/service-icon-03.png')}}" alt="">
                                    </div>
                                    <div class="right-text">
                                        <h4>Web Analytics</h4>
                                        <p>Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                                    <div class="icon">
                                        <img src="{{url('assets/images/service-icon-04.png')}}" alt="">
                                    </div>
                                    <div class="right-text">
                                        <h4>SEO Suggestions</h4>
                                        <p>Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="our-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="left-image">
                        <img src="{{url('assets/images/services-left-image.png')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="section-heading">
                        <h2>Grow your website with our <em>SEO</em> service &amp; <span>Project</span> Ideas</h2>
                        <p>Space Dynamic HTML5 template is free to use for your website projects. However, you are not
                            permitted to redistribute the template ZIP file on any CSS template collection websites.
                            Please contact us for more information. Thank you for your kind cooperation.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Website Analysis</h4>
                                <span>84%</span>
                                <div class="filled-bar"></div>
                                <div class="full-bar"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="second-bar progress-skill-bar">
                                <h4>SEO Reports</h4>
                                <span>88%</span>
                                <div class="filled-bar"></div>
                                <div class="full-bar"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="third-bar progress-skill-bar">
                                <h4>Page Optimizations</h4>
                                <span>94%</span>
                                <div class="filled-bar"></div>
                                <div class="full-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contactus" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s"
                    data-wow-delay="0.25s">
                    <div class="section-heading">
                        <h2>Feel Free To Send Us a Message About Your Website Needs</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doer ket eismod tempor
                            incididunt ut labore et dolores</p>
                        <div class="phone-info">
                            <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a
                                        href="#">010-020-0340</a></span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="{{url('/contact')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="name" name="firstname" id="name" placeholder="Name"
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="surname" name="lastname" id="surname" placeholder="Surname"
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Your Email" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="msg" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" name="contact" id="form-submit" class="main-button ">Send
                                        Message</button>
                                </fieldset>
                            </div>
                        </div>
                        <div class="contact-dec">
                            <img src="{{url('assets/images/contact-decoration.png')}}" alt="">ok
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')

</body>

</html>
