@extends('layouts.frontend')

@section('content')
<section class="main-content about-us-page">

        <div class="container">

            <div class="widget widget-user">
                <h3 class="title-wd"><i class="fa fa-users"></i>
                    About Us
                </h3>
                <table class="unselectable table-responsive table centered-td">
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
                                            <strong>BAKD</strong> is a platorm for entrepreneurs and projects of any size to network, raise funds, find teammembers and learn, all in one place while they build out their next great idea.
                                        </p>
                                        <p>
                                            <strong>BAKD</strong> gives startups not only the capital they need to succeed but oe instll the confdence and give them the tools they need to succeed. All of this oill be possible by using the BAKD Coin to invest in campaigns and receive project disbursements.
                                        </p>
                                        <p>
                                            <strong>BAKD</strong> is also a place ohere investors can feel safe investng in cryptocurrency startups.
                                            They oill no longer have to oonder ohere their money is going if projects are really meetng
                                            their deadlines and milestones. If project milestones are not met and the project becomes
                                            abandoned all remaining investor funds are returned. Invest oith confdence.
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
