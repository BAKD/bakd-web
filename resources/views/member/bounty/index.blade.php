@extends('layouts.member')

@section('content')
<div class="container">
    <div class="widget widget-user">
        <h3 class="title-wd"><i class="fa fa-trophy"></i>
            Bounty Dashboard
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
                        Claimed On
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
                @forelse ($bounties as $bounty)
                    <tr class="clickable" onClick="javascript: window.location='{{ route('member.bounty.show', $bounty->id) }}'">
                        <td>
                            <img src="{{ $bounty->getImage() }}" />
                        </td>
                        <td>
                            <span title="{{ strip_tags($bounty->name) }}">
                                {{ str_limit(strip_tags($bounty->name), 50, '...') }}
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="bakd-coins" title="{{ number_format($bounty->reward) }} BAKD Coins">{{ number_format($bounty->reward) }}</span>
                        </td>
                        <td class="text-center">
                            {!! $bounty->getDisplayRewardType() !!}
                        </td>
                        <td class="text-center">
                            {!! $bounty->getDisplayEndDate() !!}
                        </td>
                        <td class="text-center">
                        @if ($bounty->wasClaimed())
                            <span class="badge badge-success">CLAIMED</span>
                        @else
                            <span class="badge badge-danger">UNCLAIMED</span>
                        @endif
                        </td>
                        <td class="text-center">
                            <ul class="action-links-list">
                                <li>
                                    <a class="action-link" href="{{ route('member.bounty.show', $bounty->id) }}">
                                        <i class="la la-eye"></i> View
                                    </a>
                                </li>
                                <li>
                                    <a class="action-link" href="{{ route('member.bounty.claim', $bounty->id) }}">
                                        <i class="la la-plus"></i> Claim
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <tr>
                            <td colspan="7" valign="center" class="text-center" style="padding: 20px;">
                                <i class="fa fa-red fa-2x fa-exclamation-triangle"></i>
                                <div class="message">
                                    {{ __('You haven\'t claimed any bounties yet!') }}
                                </div>
                            </td>
                        </tr>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- REWARD TYPES --}}
    @include('member.bounty._reward-types')
    {{-- BOUNTY CLAIM INSTRUCTIONS -- TODO: MAKE DYNAMICALLY EDITABLE VIA ADMIN PANEL --}}
    @include('member.bounty._claim-instructions')
</div>
@endsection
