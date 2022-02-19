@extends('admin.layout')

@section('content')

    <div class="container  m-5">
        <div>
            <h6 class="mb-5">categorys /add new</h6>
            <a class="btn btn-primary mb-3" href="{{route('admin.all.trainer')}}">back</a>

        </div>
        <form method="POST" action="{{route('admin.trainer.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"> name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail" class="form-label"> phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmai" class="form-label"> Specialtie</label>
            <input type="text" name="spec" class="form-control" id="exampleInputEmai" aria-describedby="emailHelp">
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