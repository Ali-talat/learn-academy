@extends('admin.layout')

@section('content')

    <div class="container  m-5">
        <div>
            <h6 class="mb-5">categorys /add course for / {{$student->name}}</h6>
            <a class="btn btn-primary mb-3" href="{{route('admin.all.student')}}">back</a>

        </div>
        <form method="POST" action="{{route('admin.student.storeCourse',$student->id)}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb3">
              <input type="hidden" name="id" value="{{$student->id}}">
            <select name="course_id" class="form-select" aria-label="Default select example">
              
            @foreach ($courses as $c)
              <option value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
            </select>
          </div>
          
          @include('admin.inc.errors')
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection