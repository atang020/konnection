@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')

	<div id="profile" class="wrapper">

        <h2 for="name">{{$user}}</h2>

        @if (count($errors) > 0)
            <div class="flash-alert">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::has('message'))
            <div class="flash-success">
                {{ Session::get('message') }}
            </div>
        @endif


        <ul>
            <li class="avatar large">

                <div class="avatar-wrapper">
                    <img src="{{ $avatarPath }}">
                </div>
            </li>
       </ul>

       <label>{{$userBio}}</label>
       <label>{{$userCollege}}</label>


    </div>
@endsection
