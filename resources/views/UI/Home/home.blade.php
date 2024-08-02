@extends('Layouts.userLayout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-2">
                @foreach ($ads as $ad)
                    @if ($ad->advertisement_type == 'Home Left Side')
                        <div class="shine-effect adverrisment-img-size">
                            <img src="{{ $ad->img }}" alt="Advertisement Image">
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-8 main-content-home">
                @include('UI.BreakingNews.breakingNews')
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="shine-effect">
                            <img src="https://templates.envytheme.com/sinmun/default/assets/img/2-ads.png"
                                alt="Advertisement Image">
                        </div>
                    </div>
                    <div class="col-md-9">
                        @include('UI.LeatestNews.leatestNews')
                    </div>
                </div>
                @include('UI.Recent News.recentNews')
            </div>
            <div class="col-md-2 p-2">
                @foreach ($ads as $ad)
                    @if ($ad->advertisement_type == 'Home Right Side')
                        <div class="shine-effect adverrisment-img-size">
                            <img src="{{ $ad->img }}" alt="Advertisement Image">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
@endsection
