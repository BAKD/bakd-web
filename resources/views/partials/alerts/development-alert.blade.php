<div class="alert alert-info alert-dismissable" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="alert-message">
        <i class="alert-icon fa fa-info-circle"></i> Please pardon our appearance! It is now day <span class="alert-link">{{ FrontendHelper::getTimeSince('alpha', 'days') }}</span> of development, and day <span class="alert-link">{{ FrontendHelper::getTimeSince('announcement', 'days') }}</span> since our project was announced. Thank you for your support!
    </div>
</div>
