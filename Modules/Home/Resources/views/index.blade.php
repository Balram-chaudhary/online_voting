<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Online Voting </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset('/public/frontend/themes/img/favicon.png')}}" rel="icon">
  <link href="{{asset('/public/frontend/themes/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('/public/frontend/themes/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('/public/frontend/themes/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('/public/frontend/themes/lib/animate/animate.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('/public/frontend/themes/css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="{{route('voter.login')}}">Voter Login</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <h1>Welcome to ovoting.triporbitz.com</h1>
      <h2>Vote your favourite nominee online </h2>
      <a href="{{route('voter.login')}}" class="btn-get-started">Vote</a>
    </div>
  </section><!-- #hero -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">About Us</h2>
            <p>
             ovoting.triporbitz.com is a website developed by bachelor of computer engineering students of Eastern College Of Engineering.It is a 7th semester project batch of 2015.It was developed in 2019. Today, it represents only a dummy project but we want it to be a online voting system of NEA.We commit and discuss it about our professors and NEA members to make it a real system.We do hardwork to make it real in future.
            </p>
          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div>
        </div>

      </div>
    </section><!-- #about -->
    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Call To Action</h3>
            <p class="cta-text">Contact us freely if you have any suggetion or ideas to make it a real system.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#contact">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->

    
    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Team</h3>
          <p class="section-description">Our team members of ovoting.triporbitz.com.</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{asset('/public/frontend/themes/img/team1.jpg')}}" alt=""></div>
              <h4>Bishal Kumar Agrahari</h4>
              <span>Chief Executive Officer</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{asset('/public/frontend/themes/img/team2.jpg')}}" alt="}"></div>
              <h4>Md. Aarif Ansari</h4>
              <span>Product Manager</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{asset('/public/frontend/themes/img/team3.jpg')}}" alt=""></div>
              <h4>Monika Thakur</h4>
              <span>CTO</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{asset('/public/frontend/themes/img/team4.jpg')}}" alt=""></div>
              <h4>Kshitiz Gautam</h4>
              <span>Analyst</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
          
           <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{asset('/public/frontend/themes/img/team5.jpg')}}" alt=""></div>
              <h4>Ashish Chaudhary</h4>
              <span>Analyst</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
          
          
          
        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Contact</h3>
          <p class="section-description"></p>
        </div>
      </div>
     <div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3571.3745860748895!2d87.28513741435575!3d26.47588148513367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef7411e4cb163f%3A0x9d1f33efca8d7d77!2sEastern+Engineering+College+Computer+Block!5e0!3m2!1sen!2snp!4v1561026614750!5m2!1sen!2snp" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe></div>

      <div class="container wow fadeInUp">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                <p><br>Eastern College of Engineering (P) Ltd.
                       Radhakrishna Marga, Bhupalgram 
                   Tinpaini Chowk, Biratnagar-02, 
                    Morang, Nepal </p>
              </div>

              <div>
                <i class="fa fa-envelope"></i>
                <p>nfo@eascoll.edu.np</p>
              </div>

              <div>
                <i class="fa fa-phone"></i>
                <p>021-526925/ 462135</p>
              </div>
            </div>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-5 col-md-8">
               @if(Session::get('success_msg'))
          <div class="alert alert-success">
           
            {{ Session::get('success_msg') }}
         </div>
          @endif
          @if(Session::get('error_msg'))
          <div class="alert alert-success">
          {{ Session::get('error_msg') }}
          </div>
          @endif
              <form action="{{route('home.contactus')}}" method="POST">
                   <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation">{{$errors->first('name')}}</div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation">{{$errors->first('email')}}</div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="phone" id=phone placeholder="Your Phone" data-rule="phone" data-msg="Please enter your Phone number" />
                  <div class="validation">{{$errors->first('phone')}}</div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation">{{$errors->first('subject')}}</div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation">{{$errors->first('message')}}</div>
                </div>
                <div class="text-center"><button type="submit" name="submit&send" class="btn btn-success" value="submit&send">Submit</button></div>
              </form>
            </div>
          </div>

        </div>

      
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>7th sem students of estern college of engineering batch 2015</strong>. All Rights Reserved
      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{asset('/public/frontend/themes/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/public/frontend/themes/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('/public/frontend/themees/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/public/frontend/themes/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('/public/frontend/themes/lib/wow/wow.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

  <script src="{{asset('/public/frontend/themes/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('/public/frontend/themes/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('/public/frontend/themes/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('/public/frontend/themes/lib/superfish/superfish.min.js')}}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{asset('/public/frontend/themes/contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('/public/frontend/themes/js/main.js')}}"></script>

</body>
</html>
