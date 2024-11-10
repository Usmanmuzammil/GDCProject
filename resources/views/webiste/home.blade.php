@extends('layout.Webistelayout')
@section('title','Home')
@section('content')
<style>
    /* Center the pagination buttons nicely */
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-link {
        background-color: #f8f9fa;
        border-color: #ddd;
        padding: 8px 15px;
        font-size: 16px;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .pagination .page-link:hover {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    /* Active page button */
    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    /* Disable state for previous and next buttons */
    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #f8f9fa;
        border-color: #ddd;
    }

    /* Custom icon styles for previous and next buttons */
    .pagination .page-item .page-link i {
        font-size: 18px;
    }

    /* Add a little space around the pagination container */
    .d-flex.justify-content-center.mt-4 {
        margin-top: 20px;
    }
</style>

 <!-- Carousel Start -->
 <div class="container-fluid p-0 pb-5 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <!-- Dynamically generate carousel indicators -->
            @foreach ($banner as $index => $bannerItem)
                <li data-target="#header-carousel" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            <!-- Dynamically generate carousel items -->
            @foreach ($banner as $index => $bannerItem)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="min-height: 300px;">
                    <img class="position-relative w-100" src="{{ $bannerItem->image }}" style="height: 500px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h1 class="text-white text-uppercase mb-md-3">{{ $bannerItem->tagline }}</h1>
                            <h6 class="display-4 text-white ">{{ $bannerItem->description }}</h6>
                            <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Carousel End -->


<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ $about->image }}" alt="">
            </div>
            <div class="col-lg-7">
                <div class="text-left mb-4">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">About Us</h5>
                    <h1>{{$about->title}}</h1>
                </div>
                <p>{!! $about->description !!}</p>
                {{-- <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a> --}}
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Category Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Subjects</h5>
            <h1>Explore Top Subjects</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/cat-1.jpg') }}" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Web Design</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/cat-2.jpg') }}" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Development</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/cat-3.jpg') }}" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Game Design</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/cat-4.jpg') }}" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Apps Design</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/cat-6.jpg') }}" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Marketing</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/cat-6.jpg') }}" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Research</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/cat-7.jpg') }}" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Content Writing</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/cat-7.jpg') }}" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">SEO</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category Start -->

    <!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Our Popular Courses</h5>
                <h1>Download Now To Learn</h1>
            </div>
            <div class="row">
                @foreach ($courses as $course)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="rounded overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ $course->pdf_image }}" alt="" style="height: 330px;width:100%">
                        <div class="bg-secondary p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>{{$course->download_count}} Students</small>
                                <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>{{ $course->created_at->format('F j, Y') }}</small>
                            </div>
                            <h5 class="h5">{{$course->course_title}}</h5>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                     <!-- Button to download PDF -->
                        <a href="{{ $course->pdf_path }}" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2" download="{{ $course->course_title }}.pdf">
                            Download Now
                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              
        
            </div>
        </div>
    </div>
    <!-- Courses End -->



<!-- Registration Start -->
<div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Need Any Courses</h5>
                    <h1 class="text-white">30% Off For New Students</h1>
                </div>
                <p class="text-white">Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos,
                    ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                    dolor</p>
                <ul class="list-inline text-white m-0">
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Labore eos amet dolor amet diam</li>
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Etsea et sit dolor amet ipsum</li>
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Diam dolor diam elitripsum vero.</li>
                </ul>
            </div>
            <div class="col-lg-5">
                <div class="card border-0">
                    <div class="card-header bg-light text-center p-4">
                        <h1 class="m-0">Sign Up Now</h1>
                    </div>
                    <div class="card-body rounded-bottom bg-primary p-5">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Your name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 p-4" placeholder="Your email" required="required" />
                            </div>
                            <div class="form-group">
                                <select class="custom-select border-0 px-4" style="height: 47px;">
                                    <option selected>Select a course</option>
                                    <option value="1">Course 1</option>
                                    <option value="2">Course 1</option>
                                    <option value="3">Course 1</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-dark btn-block border-0 py-3" type="submit">Sign Up Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Registration End -->
<!-- teacher Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <!-- Main Heading -->
            <h1 class="font-weight-bold text-primary mb-4">Meet Our Best & Experienced Teachers</h1>
            <p class="lead text-muted">Our team of expert educators is dedicated to your success. Discover the mentors who will guide you every step of the way!</p>
        </div>
        <div class="row">
            @foreach ($teachers as $teacherItem)
            <div class="col-md-6 col-lg-3 text-center team mb-4">
                <div class="team-item rounded overflow-hidden mb-2">
                    <div class="team-img position-relative">
                        <img class="img-fluid" src="{{ $teacherItem->image }}" alt="{{ $teacherItem->name }}" style="width: 300px; height: 250px;">
                        <div class="team-social">
                            <a class="btn btn-outline-light btn-square mx-1" href="{{$teacherItem->twitter_link}}" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="btn btn-outline-light btn-square mx-1" href="{{$teacherItem->facebook_link}}" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="btn btn-outline-light btn-square mx-1" href="{{$teacherItem->youtube_link}}" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    <div class="bg-secondary p-4">
                        <h5>{{ $teacherItem->name }}</h5>
                        <p class="m-0">{{ $teacherItem->desgination }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            <!-- Custom Styled Pagination with Bootstrap 4 -->
            {!! $teachers->links('pagination::bootstrap-4') !!}
        </div>
        
    </div>
</div>
<!-- teacher Start -->

<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Our Blog</h5>
            <h1>Latest From Our Blog</h1>
        </div>
        <div class="row pb-3">
            <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/blog-3.jpg') }}" alt="">
                    <a class="blog-overlay text-decoration-none" href="">
                        <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                        <p class="text-primary m-0">Jan 01, 2050</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/blog-3.jpg') }}" alt="">
                    <a class="blog-overlay text-decoration-none" href="">
                        <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                        <p class="text-primary m-0">Jan 01, 2050</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/blog-3.jpg') }}" alt="">
                    <a class="blog-overlay text-decoration-none" href="">
                        <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                        <p class="text-primary m-0">Jan 01, 2050</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection
