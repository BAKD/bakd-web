@extends('layouts.frontend')

@section('content')
<section class="main-content">

<div class="container">
    <div class="forum-questions-sec">
        <div class="row">
            <div class="col-lg-12">
                <?php $project = new stdClass; $project->funding = new stdClass; $project->funding->goal = new stdClass; $campaign = new stdClass; ?>
                @include('components/featured-project', [
                    $campaign->progress = '25%',
                    $project->name = 'Bitcoin: A Peer-to-Peer Electronic Cash System',
                    $project->description = 'Bitcoin is a decentralized digital currency that enables instant payments to anyone, anywhere in the world. Bitcoin uses peer-to-peer technology to operate with no central authority: transaction management and money issuance are carried out collectively by the network.',
                    $project->funding->reached = '$12,240,481',
                    $project->funding->goal->high = '$15,000,000',
                    $project->funding->goal->low = '$1,500,000',
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('components/random-bounty')
            </div>
        </div>
        <div class="row">
                <div class="col-lg-8" style="padding-right: 20px;">
                    <div class="realtime-feed-wrapper">
                        <?php for($i = 0; $i< 5; $i++) : ?>
                        @include('components/post-card')
                        <?php endfor; ?>
                    </div>
                    <div class="text-center">
                        @include('partials/pagination/buttons')
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('components/new-members')
                    @include('components/advert', ['height' => '370', 'width' => '275'])
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
