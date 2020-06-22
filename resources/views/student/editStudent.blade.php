@extends('layouts.app')

@section('content')
<div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Student</h3>
                        <img class="mx-auto d-block" src="{{asset('img/'.$student->picture)}}" class="img-fluid rounded-circle">
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('students.update', $student->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('FirstName') }}</label>

                                <div class="col-md-6">
                                    <input id="firstName" value="{{$student->firstName}}" type="text" class="form-control" placeholder="Firstname" name="firstName" required autocomplete="firstName">

                              
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('LastName') }}</label>

                                <div class="col-md-6">
                                    <input id="lastName" value="{{$student->lastName}}" type="text" class="form-control" placeholder="Lastname" name="lastName" required autocomplete="lastName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="class">
                                        <option selected disabled>Select...</option>
                                        <option <?php if($student->class=="2021A"){?>selected="selected"<?php } ?> value="2021A">2021A</option>
                                        <option <?php if($student->class=="2021B"){?>selected="selected"<?php } ?> value="2021B">2021B</option>
                                        <option <?php if($student->class=="2021C"){?>selected="selected"<?php } ?> value="2021C">2021C</option>
                                        <option <?php if($student->class=="SNA2020"){?>selected="selected"<?php } ?> value="SNA2020">SNA2020</option>
                                        <option <?php if($student->class=="WEB2020"){?>selected="selected"<?php } ?> value="WEB2020">WEB2020</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>

                                <div class="col-md-6">
                                    <input id="picture" type="file" class="form-control" name="image" autocomplete="picture">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Tutor') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="tutor">
                                        <option selected disabled>Tutor</option>
                                       @foreach($users as $user)
                                            @if($user->role== 0)
                                                <option  <?php if($student->user_id == $user->id){?>selected="selected"<?php } ?>  value="{{$user->id}}">{{$user->firstName." ".$user->lastName}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                   <textarea class="form-control" placeholder="Description" name="description">{{$student->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary"> {{ __('Edit') }} </button>
                                </div>
                                <button type="close" class="btn btn-secondary" >Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection