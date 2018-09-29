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
                    <th class="text-center">
                        Status
                    </th>
                    <th class="text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($random_bounty)
                    <tr onClick="javascript: window.location='{{ route('member.bounty.show', $random_bounty->id) }}'" class="clickable-row">
                        <td>
                            <img src="{{ $random_bounty->getImage() }}" />
                        </td>
                        <td>
                            <span title="{{ strip_tags($random_bounty->name) }}">
                                {{ str_limit(strip_tags($random_bounty->name), 50, '...') }}
                            </span>
                        </td>
                        <td class="text-center">
                            {{--  <span class="bakd-coins" title="{{ number_format($random_bounty->reward) }} BAKD {!! $random_bounty->getDisplayRewardType(false) !!}">{{ number_format($random_bounty->reward) }} {!! $random_bounty->getDisplayRewardType(false) !!}</span>  --}}
                            <span class="bakd-coins" title="BAKD Coins">
                                {!! $random_bounty->getDisplayRewardAmount(true) !!}
                            </span>
                        </td>
                        <td class="text-center">
                            {!! $random_bounty->getDisplayRewardType() !!}
                        </td>
                        <td class="text-center">
                            <span class="random_bounty-date">
                                {!! $random_bounty->getDisplayEndDate() !!}
                            </span>
                        </td>
                        <td class="text-center">
                        @if ($random_bounty->wasClaimed())
                            <span class="badge badge-success">CLAIMED</span>
                        @else
                            <span class="badge badge-danger">UNCLAIMED</span>
                        @endif
                        </td>
                        <td class="text-center">
                            <ul class="action-links-list">
                                <li>
                                    <a class="action-link" href="{{ route('member.bounty.show', $random_bounty->id) }}">
                                        <i class="la la-eye"></i> View
                                    </a>
                                </li>
                                <li>
                                    <a class="action-link" href="{{ route('member.bounty.claim', $random_bounty->id) }}">
                                        <i class="la la-plus-circle"></i> Claim
                                    </a>
                                </li>
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
