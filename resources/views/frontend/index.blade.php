@extends('layouts.frontend')

@section('content')
<section class="main-content">
<div class="container">
    <div class="featured-campaign-wrapper">
        {{--  @include('components/featured-campaign')  --}}
    </div>
    <div class="forum-questions-sec">
        <div class="row">
                <div class="col-lg-8">
                    <div class="realtime-feed-wrapper">
                        <?php for($i = 0; $i< 2; $i++) : ?>
                            @include('components/post')
                        <?php endfor; ?>
                    </div>
                    @include('partials/pagination/buttons')
                </div>
                <div class="col-lg-4">
                    @include('components/top-influencers')
                    @include('components/advert', ['height' => '370', 'width' => '275'])
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
