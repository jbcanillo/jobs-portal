@extends('layout/general_container')
@section('content')
              <button class="navbar-toggler hidden-lg-up float-lg-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
                  <i class="tf-ion-android-menu"></i>
              </button>
              <div class="collapse navbar-toggleable-md pull-right" id="navbarResponsive">
                <ul class="nav navbar-nav menu float-lg-right" id="top-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">HOME</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#about">ABOUT US</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#service">HIRING PROCESS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#training">SCREENING & TRAINING</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#reviews">REVIEWS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#contact">CONTACT US</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">LOGIN</a>
                  </li>
                </ul>
              </div>
            </nav>
        </div>
        

	    <section class="hero-area bg-1">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-7">
	                    <div class="block">
                            <h1 class="wow fadeInDown" data-wow-delay="0.3s" data-wow-duration=".2s" >Neway <br> Manpower Services Inc.</h1>
	                        <p class="counter wow fadeInDown" data-wow-delay="0.5s" data-wow-duration=".5s" style="color:black">
                                <b>A portal that opens possibilities of improving life of job seeker while  ensuring quality of services to its clients.</b></p>
	                        <div class="wow fadeInDown" data-wow-delay="0.7s" data-wow-duration=".7s">
	                        	<a class="btn btn-home" href="{{ url('/sign_up') }}" role="button">Sign-Up Now!</a>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-5 wow zoomIn vid_intro" id="vid_intro" name="vid_intro">
	                    <div class="block" class="wow fadeInDown">
                            
	                       <div class="counter text-center">
	                            <ul id="countdown_dashboard">
                                   <iframe width="410" height="315"
                                        src="https://www.youtube.com/embed/2YBtspm8j8M?autoplay=1">
                                    </iframe>
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	            </div><!-- .row close -->
	        </div><!-- .container close -->
	    </section><!-- header close -->



        <!-- 
        About start
        ==================== -->
        <section  class="section about bg-gray" id="about">
            <div class="container">
                <div class="row">
                    <div class="heading wow fadeInUp">
                        <h2>About Us</h2>
                        <p>We are here to help.</p>
                     </div> 
                    <div class="col-md-7 col-sm-12 wow fadeInLeft">
                        
                        <div class="content">
                        	<div class="sub-heading">
                        		<h3>"To eleviate peoples life by giving a new opportunity to work."</h3>
                        	</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla-mco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in</p>          
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="about-slider">
                            <img src="{{ asset('template/landing_page/images/about/1.jpg') }}" alt="">
                            <img src="{{ asset('template/landing_page/images/about/2.png') }}" alt="">
                            <img src="{{ asset('template/landing_page/images/about/3.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #about close -->
        <!-- 
        About start
        ==================== -->

        <!-- 
        Service start
        ==================== -->
        <section id="service" class="service section">
            <div class="container">
                <div class="row">
                    <div class="heading wow fadeInUp">
                        <h2>Hiring Process: 5 Easy Steps</h2>
                        <p>Ease of application for all job seekers.</p>
                    </div>
                    <div class="col-sm-6 col-md-4 wow fadeInLeft">
                        <div class="block">
                            <i class="tf-document3" style="font-size:150px"></i>   
                            <h3>Step 1</h3>
                            <p>Sign-Up!</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 wow fadeInLeft">
                        <div class="block">
                            <i class="tf-magnifying-glass" style="font-size:150px"></i>   
                            <h3>Step 2</h3>
                            <p>Get evaluated on-site or online.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 wow fadeInLeft">
                        <div class="block">
                            <i class="tf-tools" style="font-size:150px"></i>   
                            <h3>Step 3</h3>
                            <p>Attend trainings.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 wow fadeInLeft">
                        <div class="block pull-center">
                            <i class="tf-ion-ios-people-outline" style="font-size:150px"></i>   
                            <h3>Step 4</h3>
                            <p>Get endorse.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 wow fadeInLeft">
                        <div class="block pull-center">
                            <i class="tf-flag2" style="font-size:150px"></i>   
                            <h3>Step 5</h3>
                            <p>Be Hired!</p>
                        </div>
                    </div>
                    
                </div>
            </div><!-- .container close -->
        </section><!-- #service close -->

         <!-- 
        Training start
        ==================== -->
        <section id="training" class="training section">
            <div class="container">
                    <div class="row">
                        <div class="heading wow fadeInUp">
                            <h2>Screening & Training</h2>
                            <p>Standard Verification Process</p>
                        </div>
                        <div class="col-sm-12 col-md-4 wow fadeInRight">
                            <div class="block">
                                 <center><img src="{{ asset('template/landing_page/images/screening/screening.png') }}" alt=""><h3>Medical & Psychological Screening</h3></center>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 wow fadeInRight">
                            <div class="block">
                                <center><img src="{{ asset('template/landing_page/images/screening/documentation.png') }}" alt=""><h3>Genuine Documentation</h3></center>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 wow fadeInRight">
                            <div class="block">
                                <center><img src="{{ asset('template/landing_page/images/screening/training.png') }}" alt=""><h3>Experience & Education</h3></center>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 wow fadeInRight">
                            <div class="block">
                                <center><img src="{{ asset('template/landing_page/images/screening/background_check.png') }}" alt=""><h3>Background Check</h3></center>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 wow fadeInRight">
                            <div class="block">
                                <center><img src="{{ asset('template/landing_page/images/screening/qualified.png') }}" alt=""><h3>Training</h3></center>
                            </div>
                        </div>
                    </div>
            </div>
        </section><!-- #training close -->

         <!-- 
        Reviews start
        ==================== -->
        <section id="reviews" class="reviews section">
                
             <div class="container">
                <div class="row">
                    
                    <div class="about-slider">
                            <div class="message">
                                <center><h3>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla-mco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in"</h3></center>
                            </div>
                            <div class="message">
                                 <center><h3>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla-mco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor inLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla-mco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in"</h3></center>
                            </div>
                            <div class="message">
                                <center><h3>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla-mco"</h3></center>
                            </div>
                    </div>
                </div>
             </div>
        </section><!-- #reviews close -->

         <!-- 
        Contact start
        ==================== -->
        <section class="call-to-action section" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow text-center">
                        <div class="block">
                                <h1>Contact Us</h1>
                                <ul class="contact-short-info" >                                       
                                    <p>For inquiries, you may email us below or contact us with these numbers:</p>
                                    <li>
                                        <i class="tf-ion-android-phone-portrait"></i>
                                        <span>Phone: +63-02-000-000</span>
                                    </li>
                                    <li>
                                        <i class="tf-ion-android-globe"></i>
                                        <span>Fax: +63-02-000-000</span>
                                    </li>
                                    <li>
                                        <i class="tf-ion-android-mail"></i>
                                        <span>Email: inquiry@newaymanpower.com</span>
                                    </li>
     
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #contact close -->

        <!-- 
        Send us a message start
        ==================== -->
        <section id="contact2" class="section contact2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="block">
                            <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3 wow fadeInUp" data-wow-delay="0.3s">
                                    @if (\Session::has('success'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                            <strong>{{ \Session::get('success') }}</strong>
                                        </div><br />
                                    @endif 
                                    <center><h3>Send us a message!</h3></center>   
                                    <div class="form-group">
                                        <form action="{{ url('send_message') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="input-field">
                                                <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                                            </div>
                                            <div class="input-field">
                                                <input type="email" class="form-control" placeholder="Your Email Address" name="email" required>
                                            </div>
                                            <div class="input-field">
                                                <textarea class="form-control" placeholder="Your Message" rows="3" name="message" required></textarea>
                                            </div>
                                            <button class="btn btn-send" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    
                   
                   
                    <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="block">
                                <div class="heading wow fadeInUp">
                                    <br><hr><br>
                                    <p>You can also personally visit us at our office located at:</p>
                                    <ul class="contact-short-info">
                                        <li>
                                            <i class="tf-ion-ios-home"></i>
                                            <span>Oakridge, A.S. Fortuna St., Mandaue City, Cebu - Philippines</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="map"></div>
                    </div>
                    
                    <script>
                        // Initialize and add the map
                        function initMap() {
                            // The location of Oakridge
                            var oak = {lat: 10.3414641, lng: 123.9189253};
                            // The map, centered at Oakridge
                            var map = new google.maps.Map(
                                document.getElementById('map'), {zoom: 20, center: oak});
                            // The marker, positioned at Oakridge
                            var marker = new google.maps.Marker({position: oak, map: map});
                        }
                    </script>
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX4dtzKicSMIbpkWCKYnCCKjpiqkEV5LM&callback=initMap">
                    </script>
                </div>
            </div>
        </section>
@endsection

