@extends('Layouts.userLayout')
@section('content')
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
