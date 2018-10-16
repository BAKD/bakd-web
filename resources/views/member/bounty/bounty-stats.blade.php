<div class="row bounty-cards-wrapper">
    <div class="col-lg-4 col-xs-12 bounty-card">
        <div class="widget widget-about">
                <h1>{{ auth()->user()->totalCoinsEarned() }}</h1>
                <div class="sign_link">
                <h3>
                    <i class="fa fa-btc"></i> BAKD COINS EARNED
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xs-12 bounty-card">
        <div class="widget widget-about">
            <h1>{{ auth()->user()->totalStakesEarned() }}</h1>
            <div class="sign_link">
                <h3>
                    <i class="fa fa-users"></i> STAKES COLLECTED
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xs-12 bounty-card">
        <div class="widget widget-about">
            <h1>{{ auth()->user()->totalClaimsApproved() }}</h1>
            <div class="sign_link">
                <h3>
                    <i class="fa fa-thumbs-up"></i> APPROVED CLAIMS
                </h3>
            </div>
        </div>
    </div>
</div>

