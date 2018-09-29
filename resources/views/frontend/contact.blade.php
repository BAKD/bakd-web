@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="widget widget-user">
            <h3 class="title-wd"><i class="fa fa-envelope-o"></i>
                Contact Us
            </h3>
            <table class="unselectable bounty-announcements-table table-responsive table centered-td">
                <tbody>
                    <tr>
                        <td class="text-center" style="padding: 20px;">
                            <i class="fa fa-red fa-2x fa-exclamation-triangle"></i>
                            <div>
                                Currently In Development
                            </div>
                            <div class="emails" style="padding: 30px;">
                                <a data-toggle="tooltip" title="Mail Our Support Team" href="mailto: support@bakd.io" style="padding: 10px;">support@bakd.io</a> | 
                                <a data-toggle="tooltip" title="Join Our Development Team" href="mailto: developers@bakd.io" style="padding: 10px;">developers@bakd.io</a> | 
                                <a data-toggle="tooltip" title="Invest in BAKD" href="mailto: investors@bakd.io" style="padding: 10px;">investors@bakd.io</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
