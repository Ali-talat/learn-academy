@extends('admin.layout')


@section('content')
    <div class="container m-5 p-5">
        <div class=" m-2">

            <a class="btn btn-primary " href="{{route('admin.cats.create')}} ">add new</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $id = 1 ;
                @endphp
            @foreach ($cats as $cat)
                    
              <tr>
                <th scope="row">{{$id++}}</th>
                <td>{{$cat->name}}</td>
                <td>Otto</td>
                <td>
                    <a class="btn btn-primary" href={{route('admin.cats.edit' ,$cat->id)}}>edit</a>
                    <a class="btn btn-danger" href="{{route('admin.cats.delete' ,$cat->id)}}">delete</a>
                </td>
              </tr>
            @endforeach

             
            </tbody>
          </table>
    </div>
@endsection