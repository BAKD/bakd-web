<?php

namespace BAKD\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BountyClaimStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;
/**
     * The bounty claim model instance.
     *
     * @var BountyClaim
     */
    public $claim;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\BAKD\BountyClaim $claim)
    {
        $this->claim = $claim;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('BOUNTY_HELP_EMAIL', 'no-reply@bakd.io'))
            ->view('mail.bounties.bounty-claim-status-updated');
    }
}
