@extends('admin.layout')

@section('content')

    <div class="container  m-5">
        <div>
            <h6 class="mb-5">categorys /add new</h6>
            <a class="btn btn-primary mb-3" href="{{route('admin.all.cats')}}">back</a>

        </div>
        <form method="POST" action="{{route('admin.cats.store')}}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"> name</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            @include('admin.inc.errors')
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection