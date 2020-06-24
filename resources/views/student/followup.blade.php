@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <a href="{{route('students.create')}}" class="btn btn-primary ">Add Student</a>
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <table class="table table-hover">
                <tr>
                    <th>Picture</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Classs</th>
                    <th>Action</th>
                </tr>
                @foreach($students as $student)
                    @if($student->activeFollowup == 1)
                        
                    <tr>
                        <td><img width="304" height="236" class="mx-auto d-block" src="{{asset('img/'.$student->picture)}}"></td>
                        <td>{{$student->firstName}}</td>
                        <td>{{$student->lastName}}</td>
                        <td>{{$student->class}}</td>
                        <td>
                           
                            <a href="{{route('students.edit', $student->id)}}"><i class='fas fa-user-edit'></i></a>|&nbsp;
                            <a href="{{route('students.show', $student->id)}}"><i style='font-size:15px' class='far fa-envelope text-dark'></i></a>
                        </td>
                        @endif
                        
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>
@endsection