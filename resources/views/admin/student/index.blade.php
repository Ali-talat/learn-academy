@extends('admin.layout')


@section('content')
    <div class="container m-5 p-5">
        <div class=" m-2">

            <a class="btn btn-primary " href="{{route('admin.student.create')}} ">add new</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">specialty</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $id = 1 ;
                @endphp
            @foreach ($students as $student)
                    
              <tr>
                <th scope="row">{{$id++}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->spec}}</td>

                <td>
                    <a class="btn btn-primary" href={{route('admin.student.edit' ,$student->id)}}>edit</a>
                    <a class="btn btn-danger" href="{{route('admin.student.delete' ,$student->id)}}">delete</a>
                    <a class="btn btn-danger" href="{{route('admin.student.show' ,[$student->id])}}">show</a>
                </td>
              </tr>
            @endforeach

             
            </tbody>
          </table>
          {!!$students->links()!!}
    </div>
@endsection