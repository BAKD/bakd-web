@extends('layouts.frontend')

@section('content')
<section class="main-content">

<div class="container">
    <div class="forum-questions-sec">
        <div class="row">
            <div class="col-lg-12">
                @include('components/random-bounty')
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php $project = new stdClass; $project->funding = new stdClass; $project->funding->goal = new stdClass; $campaign = new stdClass; ?>
                @include('components/featured-project', [
                    $campaign->progress = '25%',
                    $project->name = 'FEATURED TEST PROJECT',
                    $project->description = 'Test project is a blockchain-based peer-to-peer (P2P) lending marketplace. The platform allows for instant and direct lending between supply-side lenders and demand-side borrowers from all over the world in a trusted manner using the advantages of smart contracts and blockchain technology. We offer a unique architecture to analyze and structure a credit risk-adjusted rate with the utilization of Artificial Intelligence (AI) and Machine Learning (ML) technologies. We aim to revolutionize the peer-to-peer lending market and serve as the leading infrastructure for credit providers and credit seekers.',
                    $project->funding->reached = '$24,481.33',
                    $project->funding->goal->high = '$2,500,000',
                    $project->funding->goal->low = '$500,000',
                ])
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
                    @include('components/top-influencers')
                    @include('components/advert', ['height' => '370', 'width' => '275'])
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
