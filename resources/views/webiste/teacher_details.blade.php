@extends('layout.Webistelayout')
@section('title','Faculty')
@section('content')
 <!-- Header Start -->
 <div class="container-fluid page-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Faculty Details</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Faculty Details</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->



<!-- user Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ $teacher->image }}" alt="">
            </div>
            <div class="col-lg-7">
                <div class="text-left mb-4">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Faculty Details</h5>
                    <h1>{{$teacher->name}}</h1>
                    <p>{{$teacher->desgination}}</p>
                    <p>{{$teacher->email}}</p>
                </div>
                <p>{!! $teacher->description !!}</p>
                {{-- <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a> --}}
            </div>
        </div>
    </div>
</div>
<!-- user End -->


@endsection
