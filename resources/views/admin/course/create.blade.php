@extends('admin.layout')

@section('content')

    <div class="container  m-5">
        <div>
            <h6 class="mb-5">categorys /add new</h6>
            <a class="btn btn-primary mb-3" href="{{route('admin.all.course')}}">back</a>

        </div>
        <form method="POST" action="{{route('admin.course.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"> name</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail" class="form-label"> price</label>
              <input type="text" name="price" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
            </div>
            <!-- Example single danger button -->
            
            <div class="form-group mb-3">
              <select name="cat_id" class="form-select" aria-label="Default select example">
                
              @foreach ($cats as $cat)
                <option  value="{{$cat->id}}">{{$cat->name}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group mb3">
              <select name="trainer_id" class="form-select" aria-label="Default select example">
                
              @foreach ($trainer as $t)
                <option value="{{$t->id}}">{{$t->name}}</option>
              @endforeach
              </select>
            </div>
            
            <div class="mb-3" >
              <label for="exampleInputEmai" class="form-label"> small description</label>
              <input type="text" name="small_desc" class="form-control" id="exampleInputEmai" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmai" class="form-label"> description</label>
              <textarea type="text" name="desc" class="form-control" id="exampleInputEmai" aria-describedby="emailHelp"></textarea>
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