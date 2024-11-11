<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('webisteassets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('webisteassets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    @if ($message = Session::get('success'))
    <div id="successMessage"
        class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 p-3 rounded-3 shadow-lg"
        style="z-index: 9999; margin-top: 25px; max-width:100%; animation: slideIn 0.5s ease;">
        <div class="d-flex align-items-center">
            <i class="ri-check-double-line label-icon fs-3 me-2"></i>
            <strong>{{ $message }}</strong>
        </div>
    </div>
@endif

<!-- Add CSS for animation -->
<style>
    @keyframes slideIn {
        0% { transform: translateY(-100%); }
        100% { transform: translateY(0); }
    }
</style>

<!-- Add JavaScript for auto-dismiss after 10 seconds -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            // Set a timer to automatically hide the success message after 10 seconds
            setTimeout(function () {
                const alert = new bootstrap.Alert(successMessage);
                alert.close(); // Close the alert programmatically
            }, 10000); // 10 seconds (10000 milliseconds)
        }
    });
</script>


    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center py-4 px-xl-5">
            <div class="col-lg-3">
                <a href="" class="text-decoration-none">
                    <div style="display: flex; align-items: center;">
                        <img src="{{ asset('webisteassets/img/GDC-Logo.png') }}" alt="" width="100px;">&nbsp;
                        <h4 class="ml-2">
                            <?php
                            $setting = App\Models\Setting::where('key', 'name')->get()->first();
                            if ($setting) {
                                echo $setting->value;
                            } else {
                                echo 'Brand name not found';
                            }
                            ?>
                        </h4>
                    </div>

                </a>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Address</h6>
                        <small>
                            <?php
                            $setting = App\Models\Setting::where('key', 'address')->get()->first();
                            if ($setting) {
                                echo $setting->value;
                            } else {
                                echo 'Brand name not found';
                            }
                            ?>
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Email Us</h6>
                        <small>
                            <?php
                            $setting = App\Models\Setting::where('key', 'email')->get()->first();
                            if ($setting) {
                                echo $setting->value;
                            } else {
                                echo 'Brand name not found';
                            }
                            ?>
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-phone text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Call Us</h6>
                        <small>
                            <?php
                            $setting = App\Models\Setting::where('key', 'cell_number')->get()->first();
                            if ($setting) {
                                echo $setting->value;
                            } else {
                                echo 'Brand name not found';
                            }
                            ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="d-flex align-items-center justify-content-between bg-secondary w-100 text-decoration-none" data-toggle="collapse" href="#navbar-vertical" style="height: 67px; padding: 0 30px;">
                    <h5 class="text-primary m-0"><i class="fa fa-book-open mr-2"></i>Subjects</h5>
                    <i class="fa fa-angle-down text-primary"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 9;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Web Design <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">HTML</a>
                                <a href="" class="dropdown-item">CSS</a>
                                <a href="" class="dropdown-item">jQuery</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Apps Design</a>
                        <a href="" class="nav-item nav-link">Marketing</a>
                        <a href="" class="nav-item nav-link">Research</a>
                        <a href="" class="nav-item nav-link">SEO</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="/courses" class="text-decoration-none d-block d-lg-none">
                        {{-- <h1 class="m-0"><span class="text-primary">E</span>COURSES</h1> --}}
                        <img src="{{ asset('webisteassets/img/GDC-Logo.png') }}" alt="">
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav py-0">
                            <a href="/" class="nav-item nav-link active">Home</a>
                            <a href="about" class="nav-item nav-link">About</a>
                            <a href="courses" class="nav-item nav-link">Courses</a>
                            <a href="teachers" class="nav-item nav-link">Teachers</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Blog</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="blog" class="dropdown-item">Blog List</a>
                                    {{-- <a href="single" class="dropdown-item">Blog Detail</a> --}}
                                </div>
                            </div>
                            <a href="contact" class="nav-item nav-link">Contact</a>
                        </div>
                        <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="">Join Now</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


   @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>
                          <?php
                            $setting = App\Models\Setting::where('key', 'address')->get()->first();
                            if ($setting) {
                                echo $setting->value;
                            } else {
                                echo 'Brand name not found';
                            }
                            ?>
                            </p>
                        <p><i class="fa fa-phone-alt mr-2"></i>
                            <?php
                            $setting = App\Models\Setting::where('key', 'cell_number')->get()->first();
                            if ($setting) {
                                echo $setting->value;
                            } else {
                                echo 'Brand name not found';
                            }
                            ?>
                        </p>
                        <p><i class="fa fa-envelope mr-2"></i>
                            <?php
                            $setting = App\Models\Setting::where('key', 'email')->get()->first();
                            if ($setting) {
                                echo $setting->value;
                            } else {
                                echo 'Brand name not found';
                            }
                            ?>
                        </p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Our Courses</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Web Design</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Apps Design</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Marketing</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Research</a>
                            <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>SEO</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 mb-5">
                <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Newsletter</h5>
                <p>Exciting news from   <?php
                    $setting = App\Models\Setting::where('key', 'name')->get()->first();
                    if ($setting) {
                        echo $setting->value;
                    } else {
                        echo 'Brand name not found';
                    }
                    ?>! Join us for the upcoming Annual Fest, featuring fun activities, workshops, and performances ! Don’t miss out!</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Connect Us!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; <a href="#">  <?php
                    $setting = App\Models\Setting::where('key', 'name')->get()->first();
                    if ($setting) {
                        echo $setting->value;
                    } else {
                        echo 'Brand name not found';
                    }
                    ?></a>. All Rights Reserved. Designed & Developed by <a href="https://www.linkedin.com/in/usman-muzammil/" target="_blank">Usman Muzammil</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                {{-- <div class="d-flex justify-content-start mt-4"> --}}
                    <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-square mr-2" href="https://www.linkedin.com/in/usman-muzammil/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-square" href="#"><i class="fab fa-instagram"></i></a>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('webisteassets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('webisteassets/lib/easing/easing.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('webisteassets/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('webisteassets/mail/jqBootstrapValidation.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('webisteassets/mail/jqBootstrapValidation.min.js') }}"></script>
</body>

</html>