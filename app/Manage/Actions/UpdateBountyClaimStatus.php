<?php

namespace BAKD\Manage\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use BAKD\Manage\BountyClaim;

class UpdateBountyClaimStatus extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        // Always returns a collection of models
        foreach ($models as $claim) {
            try {
                $claim->updateStatus($fields, \Auth::user()->id);
            } catch (\Exception $e) {
                if (app()->environment('local')) {
                    return Action::danger($e->getMessage());
                } else {
                    return Action::danger('Unable to update Bounty Claim.');
                }
            }

            try {
                // TODO: Setup queue'd emails
                Mail::to($claim->user->email)->send(new \BAKD\Mail\BountyClaimStatusUpdated($claim));
            } catch (\Exception $e) {
                if (app()->environment('local')) {
                    return Action::danger($e->getMessage());
                } else {
                    return Action::danger('Unable to notify user about their updated Bounty Claim status.');
                }
            }
        }

        return Action::message('Bounty Claim(s) successfully updated!');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Select::make('Status', 'confirmed')->options([
                0 => 'Pending',
                1 => 'Approved',
                2 => 'Rejected'
            ])->displayUsingLabels()->rules('required'),
            Textarea::make('Reason', 'reason')->rules('max:2000'),
            // TODO: Make me dynamic depending on bounty type
            Number::make('Stakes Awarded', 'stakes_received'),
        ];
    }
}
