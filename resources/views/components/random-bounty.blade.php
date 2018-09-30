<div class="widget widget-user">
    <h3 class="title-wd"><i class="fa fa-trophy"></i>
        Random Bounty
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
                    Ends
                </th>
                @if (!Auth::guest())
                <th class="text-center">
                    Status
                </th>
                @endif
                <th class="text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if (isset($randomBounty))
                <tr onClick="javascript: window.location='{{ route('member.bounty.show', $randomBounty->id) }}'" class="clickable-row">
                    <td>
                        <img src="{{ $randomBounty->getImage() }}" />
                    </td>
                    <td>
                        <span title="{{ strip_tags($randomBounty->name) }}">
                            {{ str_limit(strip_tags($randomBounty->name), 50, '...') }}
                        </span>
                    </td>
                    <td class="text-center">
                        {{--  <span class="bakd-coins" title="{{ number_format($randomBounty->reward) }} BAKD {!! $randomBounty->getDisplayRewardType(false) !!}">{{ number_format($randomBounty->reward) }} {!! $randomBounty->getDisplayRewardType(false) !!}</span>  --}}
                        <span class="bakd-coins" title="BAKD Coins">
                            {!! $randomBounty->getDisplayRewardAmount(true) !!}
                        </span>
                    </td>
                    <td class="text-center">
                        {!! $randomBounty->getDisplayRewardType() !!}
                    </td>
                    <td class="text-center">
                        <span class="randomBounty-date">
                            {!! $randomBounty->getDisplayEndDate() !!}
                        </span>
                    </td>
                    @if (!Auth::guest())
                        <td class="text-center">
                            @if ($randomBounty->wasClaimed())
                                <span class="badge badge-success">CLAIMED</span>
                            @else
                                <span class="badge badge-danger">UNCLAIMED</span>
                            @endif
                        </td>
                    @endif
                    <td class="text-center">
                        <ul class="action-links-list">
                            <li>
                                <a class="action-link" href="{{ route('member.bounty.show', $randomBounty->id) }}">
                                    <i class="la la-eye"></i> View
                                </a>
                            </li>
                            @if (!Auth::guest() && $randomBounty->isClaimable())
                                <li>
                                    <a class="action-link" href="{{ route('member.bounty.claim', $randomBounty->id) }}">
                                        <i class="la la-plus-circle"></i> Claim
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </td>
                </tr>
            @else
                <tr>
                    <td colspan="7" valign="center" class="text-center">
                        <i class="fa fa-exclamation-triangle fa-red"></i>
                        <span class="message">
                            {{ __('No upcoming bounties found!') }}
                        </span>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
