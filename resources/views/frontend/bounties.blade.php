@extends('layouts.frontend')

@section('content')
<section class="main-content">

        <div class="container">

            <div class="widget widget-user">
                <h3 class="title-wd"><i class="fa fa-star"></i>
                    All Bounties
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
                                    {!! e($bounty->bountyRewardType()->first()['name'])  ?: '&mdash;' !!}
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
                                <td colspan="7" valign="center" class="text-center">
                                    <i class="fa fa-exclamation-triangle fa-red"></i>
                                    <span class="message">
                                        {{ __('No upcoming bounties found!') }}
                                    </span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
