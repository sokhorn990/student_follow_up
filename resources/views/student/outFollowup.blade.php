@extends('layouts.app')

@section('content')
<div class="container mt-3">
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
                    @if($student->activeFollowup == 0)
                        
                    <tr>
                        <td><img class="mx-auto d-block" src="{{asset('img/'.$student->picture)}}" class="img-fluid rounded-circle"></td>
                        <td>{{$student->firstName}}</td>
                        <td>{{$student->lastName}}</td>
                        <td>{{$student->class}}</td>
                        <td class=" text-center">
                            <!-- <a href="{{route('backToFollowup', $student->id)}}"><i class='fas fa-user-minus text-danger'></i></i></a> -->
                        </td>
                        @endif
                        
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>
@endsection