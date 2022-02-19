@extends('admin.layout')


@section('content')
    
    <div class="container m-5 p-5">
        
        <div class="d-flex justify-content-between">
            <h5>studend / show courses for <strong>{{$student_id->name}}</strong>

            <a class="btn btn-info mb-3" href="{{route('admin.student.addCourse',$student_id->id)}}">add to course</a>

            <a class="btn btn-primary mb-3" href="{{route('admin.all.student')}}">back</a>
        </div>


        <table class="table mt-3">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">status</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($courses as $c)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td >{{$c->name}}</td>
                <td >{{$c->pivot->status}}</td>
                <td>
                    @if ($c->pivot->status !== 'approve')
                        
                    <a class="btn btn-primary" href="{{route('admin.student.approve',[ $student_id,$c->id ])}}">approve</a>
                    @endif
                    @if ($c->pivot->status !== 'reject')
                        
                    <a class="btn btn-danger" href="{{route('admin.student.reject',[ $student_id,$c->id ])}}">reject</a>
                    @endif
                </td>
              </tr>
            @endforeach
            
            </tbody>
          </table>
        
    </div>
@endsection