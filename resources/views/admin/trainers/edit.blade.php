@extends('admin.layout')

@section('content')

    <div class="container  m-5">
        <div>
            <h6 class="mb-5">categorys /edit / {{$trainer->name}}</h6>
            <a class="btn btn-primary mb-3" href="{{route('admin.all.trainer')}}">back</a>

        </div>
        <form method="POST" action="{{route('admin.trainer.update',$trainer->id)}}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"> name</label>
            <input type="text" value="{{$trainer->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail" class="form-label"> phone</label>
            <input type="text" value="{{$trainer->phone}}" name="phone" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmai" class="form-label"> Specialtie</label>
            <input type="text"value="{{$trainer->spec}}" name="spec" class="form-control" id="exampleInputEmai" aria-describedby="emailHelp">
          </div>
          <div>
            <img src="{{asset('uplode/trainer/'.$trainer->img)}}" style="height: 100px" alt="">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"> img</label>
            <input type="file" name="img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          @include('admin.inc.errors')
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection