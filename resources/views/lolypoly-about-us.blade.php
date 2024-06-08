@extends('lolypoly.app')

@section('content')
    <div class="mb-5">
        <div class="container py-5">
            <h1 class="text-center mb-5"><b>Our Story</b></h1>
            <h5 class="text-left mb-5">{{ (new \App\Helpers\GeneralFunction())->generalParameterValue('our_story_text') }}
            </h5>
        </div>
        <div class="section mb-5">
            <img src="{{ asset('images/slider/bg/about-us.png') }}" alt="" class="img-fluid">
        </div>
        <div class="container pb-5">
            <div class="py-5 mb-5">
                <h5>{{ (new \App\Helpers\GeneralFunction())->generalParameterValue('about_us_text') }}</h5>
            </div>
            <div class="row">
                <div class="col">
                    <img src="{{ asset('images/about/about-us-1.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col">
                    <img src="{{ asset('images/about/about-us-2.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection
