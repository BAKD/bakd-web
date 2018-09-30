<div class="text-left alert alert-warning alert-dismissable" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="alert-message">
        <i class="alert-icon fa fa-info-circle"></i>
        <span>
            @if ($bounty->isOver())
                Bounty has already ended!
            @elseif ($bounty->isPaused())
                Bounty is currently paused!
            @elseif (!$bounty->isStarted())
                Bounty has not started yet!
            @endif
        </span>
    </div>
</div>
