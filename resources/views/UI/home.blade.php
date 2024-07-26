@extends('Layouts.userLayout')
@section('content')
    <style>
        .shine-effect {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .shine-effect img {
            width: 100%;
            display: block;
        }

        .shine-effect:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100px;
            width: 70px;
            height: 100%;
            background: linear-gradient(to right,
                    rgba(255, 255, 255, 0.13) 0%,
                    rgba(255, 255, 255, 0.13) 77%,
                    rgba(255, 255, 255, 0.5) 92%,
                    rgba(255, 255, 255, 0.0) 100%);
            transform: skewX(-30deg);
            animation-name: slide;
            animation-duration: 7s;
            animation-timing-function: ease-in-out;
            animation-delay: .3s;
            animation-iteration-count: infinite;
            animation-direction: alternate;
        }

        @keyframes slide {
            0% {
                left: -100px;
                top: 0;
            }

            50% {
                left: 120px;
                top: 0;
            }

            100% {
                left: 290px;
                top: 0;
            }
        }
    </style>
    <div class="container">
        @include('UI.BreakingNews.breakingNews')
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="shine-effect">
                    <img src="https://templates.envytheme.com/sinmun/default/assets/img/2-ads.png" alt="Advertisement Image">
                </div>
            </div>
            <div class="col-md-9">
                @include('UI.LeatestNews.leatestNews')
            </div>
        </div>
        @include('UI.Recent News.recentNews')
    </div>
@endsection
