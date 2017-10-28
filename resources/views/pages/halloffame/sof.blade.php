@extends('layouts.master')

@section('title')
    Staff of Fellowship
@endsection

<style>
    .desc{
        font-size: 22px;
    }
    .title{
        padding:5px;
        font-size: 23px;
    }
</style>

@section('content')
    @include('layouts.header', array('headerTitle' => 'Staff of Fellowship'))

    <div align="center">
        <div class = "title">
            <p><strong>What is the Staff of Fellowship?</strong></p>
        </div>
        <div class="desc">
            <p>Started by alumni, Mike Mullen, the Staff of Fellowship recognizes a dues-paid member twice a month for
                their hard work and dedication towards the fellowship tenent. Like the Member Spotlight, members are
                nominated by board or general members, then voted on by the board. The member who receives this
                recognition is honored with an actual staff where they can sharpie their name alongside others who were
                also recognized. </p>
        </div>
    </div>


    <div class="wrapper">
        <div class="title-wrapper">
            @include('layouts.header', array('headerTitle' => 'October'))
        </div>
        <div class="mobile-text">
        <div class ="contact-row">
            <div>
                <img src="{{ asset('images/mr/sof/Kenneth.jpg') }}" />
                <p><strong>Kenneth Truong</strong></p>
                <p>3rd Year</p>
                <p>Cognitive Science</p>
            </div>
            <div>
                <img src="{{ asset('images/mr/sof/Justin_D.jpg') }}" />
                <p><strong>Justin Duong</strong></p>
                <p>1st Year</p>
                <p>Oceanic and Atomospheric Sciences</p>
            </div>
        </div>
    </div>
</div>

    @endsection


