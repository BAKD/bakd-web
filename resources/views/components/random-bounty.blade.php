<div class="widget widget-user">
    <h3 class="title-wd"><i class="fa fa-star"></i>
        Random Bounty
    </h3>
        {{--  <li>{{ var_dump($bounty) }}</li>  --}}

        <table class="unselectable bounty-announcements-table table-responsive table table-hover centered-td">
            <thead class="bold-header">
                <tr>
                    <th class="text-center" style="width: 70px;">
                        {{--  Logo  --}}
                        Bounty
                    </th>
                    <th class="text-left" style="min-width: 150px; max-width: 200px;">
                    </th>
                    {{--  <th class="text-left">
                        Description
                    </th>  --}}
                    <th class="text-center">
                        Reward
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
                    <tr class="clickable-row">
                        <td>
                            @if (!is_null($random_bounty->image))
                                <img src="{{ asset('/storage/' . $random_bounty->image) }}" />
                            @else
                                <img src="{{ asset(FrontendHelper::bountyImagePlaceholder()) }}" />
                            @endif
                        </td>
                        <td>
                            <span title="{{ strip_tags($random_bounty->name) }}">
                                {{ str_limit(strip_tags($random_bounty->name), 50, '...') }}
                            </span>
                        </td>
                        {{--  <td>
                            <span title="{{ strip_tags($random_bounty->description) }}">
                                {{ str_limit(strip_tags($random_bounty->description), 90, '...') }}
                            </span>
                        </td>  --}}
                        <td class="text-center">
                            <span class="bakd-coins" title="{{ number_format($random_bounty->reward) }} BAKD Coins">{{ number_format($random_bounty->reward) }}</span>
                        </td>
                        <td class="text-center">
                            <span class="random_bounty-date" title="{{ $random_bounty->end_date->format('m/d/Y g:i A') }}">
                                {{ $random_bounty->end_date->diffForHumans() }}
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
                                        <i class="la la-plus"></i> Claim
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
