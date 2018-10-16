<div class="row bounty-cards-wrapper">
    <div class="col-lg-3 col-xs-12 bounty-card">
        <div class="widget widget-about">
                <h1>{{ number_format($bounty->totalUserStakes(\Auth::user()->id)) }}</h1>
                <div class="sign_link">
                <h3>
                    <i class="fa fa-user"></i> MY STAKES <i class="fa fa-question-circle fa-red" data-toggle="tooltip" title="The amount of stakes you have been awarded for this bounty only. You may claim stake bounties multiple times."></i>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12 bounty-card">
        <div class="widget widget-about">
            <h1>{{ number_format($bounty->totalStakesDistributed()) }}</h1>
            <div class="sign_link">
                <h3>
                    <i class="fa fa-users"></i> DISTRIBUTED STAKES <i class="fa fa-question-circle fa-red" data-toggle="tooltip" title="Total amount of stakes distributed to all members who participated in this bounty."></i>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12 bounty-card">
        <div class="widget widget-about">
            <h1>
                {{ number_format($bounty->pendingStakeReward(\Auth::user()->id)) }}
            </h1>
            <div class="sign_link">
                <h3>
                    <i class="fa fa-btc"></i> PENDING REWARD <i class="fa fa-question-circle fa-red" data-toggle="tooltip" title="Rewards for Stake Bounty's are not awarded until the bounty itself is over. This value may go up and down depending on the number of stakes you accumulate, as well as the number of overall stakes distributed."></i>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12 bounty-card">
        <div class="widget widget-about">
            <h1>
                {{ number_format($bounty->pendingStakeRewardPercentage(\Auth::user()->id)) }}%
            </h1>
            <div class="sign_link">
                <h3>
                    <i class="fa fa-pie-chart"></i> PRIZE POOL SHARE <i class="fa fa-question-circle fa-red" data-toggle="tooltip" title="The percentage of the total prize pool that you are currently entitled to if the bounty were to end right now."></i>
                </h3>
            </div>
        </div>
    </div>
</div>
