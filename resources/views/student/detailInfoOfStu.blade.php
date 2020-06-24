@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Student Information Detail</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3"><img src="{{asset('img/'.$student->picture)}}"><br></div>

                        <div class="col-9">
                            <h4>{{$student->firstName." ".$student->lastName}} study in class {{$student->class}}</span></h4>
                            <h5>Description of this student:</h5>
                            <p>{{$student->description}}</p>
                            @if($student->user_id != "")
                            <p>Tutor is : {{$student->user['firstName']." ".$student->user['lastName']}}</p>
                            @else
                            <p>Tutor is: No tutor</p>
                            @endif
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <!-- comment -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <form action="{{route('addCommentToStu', $student->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="comment">{{ __('Comment') }}</label>
                            <textarea class="form-control" placeholder="Type Your Comment" name="comment" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Sent Comment</button>



                    </form>


                </div>
                <div class="card-body">
                    @foreach($comments as $comment)
                    <h5>Who comment is: {{$comment->user['firstName']}}</h5>
                    <p>{{$comment->comment}}</p>
                    <div class="row">
                        &nbsp; &nbsp; &nbsp; <a href="{{route('comments.edit', $comment->id)}}">Edit</a>&nbsp; &nbsp;

                        <!-- by -->
                        <!-- <a href="{{route('comments.edit',$comment->id)}}"><button type="submit">Edit</button></a>
                        <form action="{{route('destroy',$comment->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit">delete</button> -->
                            <!-- by -->


                            <a href="{{route('destroy', $comment->id)}}" onclick="if (!confirm('Are you sure?')) { return false }">Delete</a>
                            <hr>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
</div>
@endsection