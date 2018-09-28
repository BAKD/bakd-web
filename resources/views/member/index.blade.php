@extends('layouts.member')

@section('content')
<section class="main-content">

        <div class="container">

            <div class="widget widget-user">
                <h3 class="title-wd"><i class="fa fa-star"></i>
                    Member Dashboard
                </h3>
                <table class="unselectable bounty-announcements-table table-responsive table table-hover centered-td">
                    <thead class="bold-header">
                        <tr>
                            <th class="text-center" style="width: 70px;">
                                Actions
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

                        <tr>
                            <td colspan="7">
                                <i class="fa fa-red fa-exclamation-triangle"></i> No recent announcements.
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
