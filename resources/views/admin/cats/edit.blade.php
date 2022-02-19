@extends('admin.layout')

@section('content')

    <div class="container  m-5">
        <div>
            <h6 class="mb-5">categorys /edit / {{$cat->name}}</h6>
            <a class="btn btn-primary mb-3" href="{{route('admin.all.cats')}}">back</a>

        </div>
        <form method="POST" action="{{route('admin.cats.update',$cat->id) }}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"> name</label>
              <input type="text" value="{{$cat->name }}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            @include('admin.inc.errors')
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection