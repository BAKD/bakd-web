@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="widget widget-user">
            <h3 class="title-wd"><i class="fa fa-red fa-times-circle"></i>
                Unauthorized | 401
            </h3>
            <table class="unselectable bounty-announcements-table table-responsive table centered-td">
                <tbody>
                    <tr>
                        <td class="text-center" style="padding: 20px;">
                            <i class="fa fa-red fa-2x fa-exclamation-triangle"></i>
                            <div>
                                <strong>Unauthorized</strong>
                                <div style="font-style: italic; padding: 10px;">(OYou don't belong here mister!)</div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
