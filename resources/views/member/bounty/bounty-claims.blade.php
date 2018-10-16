<div class="row">

    <div class="widget widget-user">
        <h3 class="title-wd"><i class="fa fa-trophy"></i>
            My Claims
        </h3>
        <table class="unselectable bounty-announcements-table table-responsive table table-hover centered-td">
            <thead class="bold-header">
                <tr>
                    <th class="text-center" style="width: 70px;">
                        Bounty
                    </th>
                    <th class="text-left" style="min-width: 150px; max-width: 200px;">
                    </th>
                    <th class="text-center">
                        Reward
                    </th>
                    <th class="text-center">
                        Reward Type
                    </th>
                    <th class="text-center">
                        Claimed
                    </th>
                    <th class="text-center">
                        Claim Status
                </th>
                <th class="text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($myClaims as $claim)
            <tr>
                <td>
                    <img src="{{ $claim->bounty->getImage() }}" />
                </td>
                <td>
                    <span title="{{ strip_tags($claim->bounty->name) }}">
                        {{ str_limit(strip_tags($claim->bounty->name), 50, '...') }}
                    </span>
                </td>
                <td class="text-center">
                    @if ($claim->isApproved())
                    @if ($claim->bounty->isStakeRewardBounty())
                    <span class="bakd-coins" title="{{ number_format($claim->stakes_received) }} Stakes">{{ number_format($claim->stakes_received) }}</span>
                    @else
                    <span class="bakd-coins" title="{{ number_format($claim->bounty->reward) }} BAKD Coins">{{ number_format($claim->bounty->reward) }}</span>
                    @endif
                    @else
                    &dash;
                    @endif
                </td>
                <td class="text-center">
                    {!! $claim->bounty->getDisplayRewardType() !!}
                </td>
                <td class="text-center">
                    {{ $claim->created_at->diffForHumans() }}
                </td>
                <td class="text-center">
                    @if ($claim->isApproved())
                    <span class="badge badge-success">APPROVED</span>
                    @elseif ($claim->isRejected())
                    <span class="badge badge-danger">REJECTED</span>
                    @else
                    <span class="badge badge-warning">PENDING</span>
                    @endif
                </td>
                <td class="text-center">
                    <ul class="action-links-list">
                        <li>
                            <a class="action-link" href="{{ route('member.bounty.show', $claim->bounty->id) }}">
                                <i class="la la-eye"></i> View Bounty
                            </a>
                        </li>
                        @if (!$claim->bounty->isOver() && !$claim->isApproved())
                        <li>
                            <a class="action-link" href="{{ route('member.bounty.claim.edit', $claim->id) }}">
                                <i class="la la-pencil"></i> Edit Claim
                            </a>
                        </li>
                        <li>
                            <a class="action-link" href="#" data-toggle="modal" data-target="#deleteModal"
                            data-resource-title="Bounty Claim"
                                        data-resource-delete-link="{{ route('member.bounty.claim.cancel', $claim->id) }}">
                                        <i class="la la-trash"></i> Delete Claim
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <tr>
                            <td colspan="7" valign="center" class="text-center" style="padding: 20px;">
                                <i class="fa fa-red fa-2x fa-exclamation-triangle"></i>
                                <div class="message">
                                    {{ __('You haven\'t submitted any claims for this bounty yet!') }}
                            </div>
                        </td>
                    </tr>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
