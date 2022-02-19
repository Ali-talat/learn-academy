@extends('admin.layout')


@section('content')
    <div class="container m-5 p-5">
        <div class=" m-2">

            <a class="btn btn-primary " href="{{route('admin.course.create')}} ">add new</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">img</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $id = 1 ;
                @endphp
            @foreach ($courses as $course)
                    
              <tr>
                <th scope="row">{{$id++}}</th>
                <td>{{$course->name}}</td>
                <td>{{$course->price}}</td>
                
                <td>
                  <img style="width:50px" class="rounded-circle" src="{{asset('uplode/course/'.$course->img)}}" alt="">
                </td>
                
                <td>
                    <a class="btn btn-primary" href={{route('admin.course.edit' ,$course->id)}}>edit</a>
                    <a class="btn btn-danger" href="{{route('admin.course.delete' ,$course->id)}}">delete</a>
                </td>
              </tr>
            @endforeach

             
            </tbody>
          </table>
          {!!$courses->links()!!}
    </div>
@endsection