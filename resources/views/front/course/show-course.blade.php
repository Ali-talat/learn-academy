@extends('front.layout')

@section('content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Course Details</h2>
                            <p>Home<span>/</span>Courses<span>/</span>{{$course->cats->name}}<span>/</span>{{$course->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid w-100 " style="height: 300px"  src="{{asset('uplode/course/'.$course->img)}}" alt="">
                    </div>
                    <div class="content_wrapper py-5" >
                        <h4 class="title_top">Objectives</h4>
                        
                        {!!$course->desc!!}
                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>trainer,s name</p>
                                    <span class="color">{{$course->trainers->name}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Course Fee </p>
                                    <span>${{$course->price}}</span>
                                </a>
                            </li>
                           
                            

                        </ul>
                        
                    </div>
                        <div class="col-12 my-5">
                            @include('front.inc.errors')
                            <div class="res "></div>
                            <form class="myform">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" name="name" placeholder="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <input type="email" name="email" placeholder="email" class="form-control"  >
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="spec" placeholder="Specialtie" class="form-control" >
                                </div>
                                <input type="hidden" name="course_id" value="{{$course->id}}">

                                <button type="submit" class="btn btn-primary">enroll</button>
                            </form>
                        </div>

                    
                </div>
                
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

    
@endsection
@section('scripts')
<script>
    $('.myform').click( function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        
            $.ajax({
                method: 'post',
                url : "{{route('front.message.enroll')}}",
                data : new FormData(this),
                success : function(res){
                    if(res.status == true){
                        $('.res').html(res.msg);
                    }
                },
                processData :false,
                contentType :false,
                // cache : false
            })  
        }) 
    // $('#ajax-submit').click(function(e){
    //     e.preventDefault();
    //     console.log('ll')
    // })
</script>
@endsection