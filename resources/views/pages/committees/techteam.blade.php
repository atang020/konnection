@extends('layouts.master')

@section('title')
    Tech Team
@endsection

@section('content')

    <div id="background" class="bigbanner"
         style="background-image: url('/images/committees/techteam/ttcover.jpg');background-repeat: no-repeat;">
        <div id="title" class="bigbannertext">
            Tech Team 2017-2018
        </div>
    </div>

    <div class="message-box">
        <div class="title-wrapper">
            <p></p>
            <p></p>
            <h1 class="title">What is Tech Team?</h1>
        </div>
        <p>Tech Team is responsible for updating and improving UCSD Circle K's website by implementing new features and
            exploring new ways to enhance the efficiency and utility of the site. Tech team works to build teamwork
            skills and industry experience by working in a small web development team, developing your technical skills
            and giving you a valuable project to display on your resume and portfolio.
        </p>
    </div>

    <div class="title-wrapper">
        <h1 class="title">Committee Members</h1>
    </div>

    <!--To be implemented by the next tech chair
    <center>
        <div class="btn-group">
            <button onclick="change1718()">2017-2018</button>
            <button onclick="change1617()">2018-2018</button>
        </div>
        <center>
        -->


            <div id="rows">
                <div id="row1" class="contact-row">
                    <div>
                        <img id="image1" src="{{ asset('images/Committees/techteam/weijin.jpg') }}" />
                        <p id="name1"><strong>Weijin Xu</strong></p>
                        <p id="title1">Tech Team Committee Head</p>
                    </div>
                    <div>
                        <img id="image2" src="{{ asset('images/Committees/techteam/Carl.jpg') }}" />
                        <p id="name2"><strong>Carl Dungca</strong></p>
                        <p id="title2">Developer</p>
                    </div>
                    <div>
                        <img id="image3" src="{{ asset('images/Committees/techteam/Ryan.jpg') }}" />
                        <p id="name3"><strong>Ryan Lemon</strong></p>
                        <p id="title3">Developer</p>
                    </div>
                </div>

                <div id="row2" class="contact-row">
                    <div>
                        <img id="image4" src="{{ asset('images/Committees/techteam/Samarth.jpg') }}" />
                        <p id="name4"><strong>Samarth Aggarwal</strong></p>
                        <p id="title4">Developer</p>
                    </div>
                    <div>
                        <img id="image5" src="{{ asset('images/Committees/techteam/Stefanie.jpg') }}" />
                        <p id="name5"><strong>Stefanie Tonnu</strong></p>
                        <p id="title5">Developer</p>
                    </div>
                    <div>
                        <img id="image6" src="{{ asset('images/Committees/techteam/Jay.jpg') }}" />
                        <p id="name6"><strong>Jay Wang</strong></p>
                        <p id="title6">Developer</p>
                    </div>
                </div>
                <div id="row3" class="contact-row">
                    <div>
                        <img id="image7" src="{{ asset('images/Committees/techteam/Jane.jpg') }}" />
                        <p id="name7"><strong>Jane Wu</strong></p>
                        <p id="title7">Developer</p>
                    </div>
                </div>
            </div>

            <!-- IN DEVELOPMENT (Mini Gallery)
            <div class="message-box">
            <div class="title-wrapper">
                <h1 class="title">Gallery</h1>
            </div>
                <div class="gallery">
                    <a target="_blank" href="images/committee.png">
                        <img src="images/committee.png" alt="Placeholder">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
                <div class="gallery">
                    <a target="_blank" href="images/committee.png">
                        <img src="images/committee.png" alt="Placeholder">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
                <div class="gallery">
                    <a target="_blank" href="images/committee.png">
                        <img src="images/committee.png" alt="Placeholder">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            -->

@endsection
