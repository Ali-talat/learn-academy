@extends('admin.layout')


@section('content')
    <div class="container m-5 p-5">
        <div class=" m-2">

            <a class="btn btn-primary " href="{{route('admin.trainer.create')}} ">add new</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">phone</th>
                <th scope="col">specialty</th>
                <th scope="col">img</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $id = 1 ;
                @endphp
            @foreach ($trainers as $trainer)
                    
              <tr>
                <th scope="row">{{$id++}}</th>
                <td>{{$trainer->name}}</td>
                <td>{{$trainer->phone}}</td>
                <td>{{$trainer->spec}}</td>
                <td>
                  <img style="width:50px" class="rounded-circle" src="{{asset('uplode/trainer/'.$trainer->img)}}" alt="">
                </td>
                
                <td>
                    <a class="btn btn-primary" href={{route('admin.trainer.edit' ,$trainer->id)}}>edit</a>
                    <a class="btn btn-danger" href="{{route('admin.trainer.delete' ,$trainer->id)}}">delete</a>
                </td>
              </tr>
            @endforeach

             
            </tbody>
          </table>
    </div>
@endsection