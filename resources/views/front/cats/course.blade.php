@extends('front.layout')

@section('content')

<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Our Courses</h2>
                        <p>Home<span>/</span>Courses<span>/</span>{{$cats->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

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
    <div style="padding-top: 30px" class="text-center w-100 mb-5"  >
        {!!$courses->render()!!}

    </div>
</div>


    </div>
</section>
<!--::blog_part end::-->

@stop