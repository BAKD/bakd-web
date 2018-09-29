<div class="alert alert-info alert-dismissable" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="alert-message">
        <i class="alert-icon fa fa-info-circle"></i> Please pardon our appearance! It is now day <span class="alert-link">{{ FrontendHelper::getTimeSince('alpha', 'days') }}</span> of development, and day <span class="alert-link">{{ FrontendHelper::getTimeSince('announcement', 'days') }}</span> since our project was announced. <a href="#" class="alert-link" data-toggle="modal" data-target="#development-modal">Read More</a>
    </div>
</div>


<div class="modal fade" id="development-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <div class="modal-title"><i class="fa fa-exclamation-circle fa-red"></i> <span style="font-weight: 700;">BAKD</span> | Live Alpha Development</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <p>
                We are trying to do something different with <strong>BAKD</strong>. Instead of putting up a snazzy <em>"Under Construction"</em> page, and launching an ICO with absolutely nothing, we're doing the exact opposite.
            </p>
            <br />
            <p>
                We're building the product from start to finish live, and we're doing it (so far at least) by paying for every bit of it with out own blood, sweat, tears, and fiat.
            </p>
            <br />
            <p>
                We've decided to try something new, and offer our supporters the ability to watch the project come together <em>AS</em> we build it. Because of this, there is a high potential that you will run into issues from time to time. We are working dilligently to get <strong>BAKD</strong> where it needs to be. Until then, we appreciate your continued support, and hope you'll continue to follow along as we progress!
            </p>
            <br />
            <p class="text-center">
                <strong>Learn More</strong>
                <br />
                <a data-toggle="tooltip" href="https://bakd.io" title="Visit Our Information Portal" style="padding: 0 5px;">BAKD.io</a> | 
                <a data-toggle="tooltip" href="https://bitcointalk.org/index.php?topic=4952711" title="BAKD Announcement Thread" target="_blank" style="padding: 0 5px;">BitcoinTalk.org</a> |
                <a data-toggle="tooltip" href="https://discord.gg/rADpPXp" title="Chat live with the BAKD Team" target="_blank" style="padding: 0 5px;">Discord Chat</a> |
                <a data-toggle="tooltip" href="https://twitter.com/BAKDme" title="Follow BAKD on Twitter" target="_blank" style="padding: 0 5px;">Twitter</a>
            </ul>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onClick="javascript: window.location='https://google.com'">Not Interested</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Love It</button>
            </div>
    </div>
    </div>
</div>
