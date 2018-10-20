@extends('layouts.frontend')

@section('content')
<section class="main-content about-us-page">

        <div class="container">

            <div class="widget widget-user">
                <h3 class="title-wd"><i class="fa fa-users"></i>
                    About Us
                </h3>
                <table class="table-responsive table centered-td">
                    <tbody>
                        <tr>
                            <td class="text-left" style="padding: 20px;">

                                <div class="row about-wrapper">
                                    <div class="col-lg-4 col-xs-12 text-center branding-wrapper">
                                        <img src="{{ asset(config('bakd.logo.icon')) }}" alt="{{ config('bakd.logo.alt') }}" title="{{ config('bakd.logo.alt') }}" class="about-branding" />
                                        <p class="about-tagline">
                                            "Building your dream project just got a little bit easier, better yet -- investing in crypto just got a little bit safer"
                                        </p>
                                    </div>
                                    <div class="col-lg-8 col-xs-12 about-details">
                                        <h1>Crypto Crowdfunding & Professional Networking Platform</h1>
                                        <p>
                                            <strong>BAKD</strong> is a platform for entrepreneurs and projects of any size to network, raise funds, find team members, as well as learn -- all in one place while they build out their next great idea.
                                        </p>
                                        <p>
                                            <strong>BAKD</strong> not only gives startups the capital they need to succeed, but we instill a sense of confidence among our members, all while providing them the tools they'll need to succeed. All of this is made possible by way of the <strong>BAKD</strong> Cryptocurrency Protocol. <strong>BAKD</strong> Coins are used to both invest in campaigns, as well as to pay campaign disbursements to project/campaign owners.                                        </p>
                                        <p>
                                            <strong>BAKD</strong> is a place where investors can feel safe investng in cryptocurrency startups. No longer will we have to wonder where our hard-earned money is going, or if a project is really meetng it's deadlines and milestones. With <strong>BAKD</strong>, if project milestones are not met, and/or the project becomes abandoned, all remaining investor funds are returned to the original investor. Invest with <strong>confidence</strong>.
                                        </p>
                                        <div class="text-center about-links">
                                            <strong>BAKD</strong> Information Portal - <a href="https://BAKD.io" alt="BAKD.io" title="BAKD.io">BAKD.io</a>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
