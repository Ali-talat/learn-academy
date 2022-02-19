@extends('front.layout')

@section('content')
    
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>{{json_decode($banner->content)->titel}}</h5>
                            <h1>{{json_decode($banner->content)->subtitel}}</h1>
                            <p>{{json_decode($banner->content)->desc}}</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part end-->

    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-3 align-self-center">
                    <div class="single_feature_text ">
                        <h2>{{json_decode($feature->content)->titel}}</h2>
                        <p>{{json_decode($feature->content)->desc}} </p>
                        <a href="#" class="btn_1">Read More</a>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-layers"></i></span>
                            <h4>{{json_decode($feature->content)->titel2}}</h4>
                            <p>{{json_decode($feature->content)->desc2}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-new-window"></i></span>
                            <h4>{{json_decode($feature->content)->titel3}}</h4>
                            <p>{{json_decode($feature->content)->desc3}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part single_feature_part_2">
                            <span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
                            <h4>{{json_decode($feature->content)->titel4}}</h4>
                            <p>{{json_decode($feature->content)->desc4}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

   

    <!-- member_counter counter start -->
    <section class="member_counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">{{$trainers_count}}</span>
                        <h4>All trainers</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">{{$courses_count}}</span>
                        <h4> All cources</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">{{$students_count}}</span>
                        <h4>all student</h4>
                    </div>
                
            </div>
        </div>
    </section>
    <!-- member_counter counter end -->

    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>popular courses</p>
                        <h2>Special Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($courses as $item)
                    
                
                    <div class="col-sm-6 col-lg-4">
                        <div class="single_special_cource">
                            <img src="{{asset('uplode/cource/'.$item->img)}}"  class="special_img" alt="">
                            <div class="special_cource_text">
                                <a href="{{route('cats.page',$item->cats->id)}}" class="btn_4">{{$item->cats->name}}</a>
                                <h4>${{$item->price}}</h4>
                                <a href="{{route('course.page' ,[$item->cats->id,$item->id])}}"><h3>{{$item->name}}</h3></a>
                                <p>{{$item->small_desc}}</p>
                                <div class="author_info">
                                    <div class="author_img">
                                        <img src="{{asset('uplode/trainer/'.$item->trainers->img)}}" width="50" alt="">
                                        <div class="author_info_text">
                                            <p>Conduct by:</p>
                                            <h5>{{$item->trainers->name}}</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
                
                
            </div>
        </div>
    </section>
    <!--::blog_part end::-->
    <br>
    <br>

   

    <!--::review_part start::-->
    <section class="testimonial_part">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>testimonials</p>
                        <h2>Happy Students</h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="textimonial_iner owl-carousel">
                    @foreach ($tests as $item)
                        <div class="testimonial_slider">
                                <div class="row">
                                    <div class="col-lg-6 col-xl-4 col-sm-8 align-self-center">
                                        <div class="testimonial_slider_text">
                                            <p>{{$item->desc}}</p>
                                            <h4>{{$item->name}}</h4>
                                            <h5> {{$item->spec}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-2 col-sm-4">
                                        <div class="testimonial_slider_img">
                                            <img src="{{asset('uplode/test/'.$item->img)}}" alt="#">
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                        </div>
                    @endforeach
                    
                        
                    </div>
                </div>

            </div>
        </div>
    </section>
    <br>
    <br>
    <!--::blog_part end::-->

   
@endsection

    