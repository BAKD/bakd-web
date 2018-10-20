@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="widget widget-user">
            <h3 class="title-wd"><i class="fa fa-red fa-times-circle"></i>
                Server Error | 500
            </h3>
            <table class="unselectable bounty-announcements-table table-responsive table centered-td">
                <tbody>
                    <tr>
                        <td class="text-center" style="padding: 20px;">
                            <i class="fa fa-red fa-2x fa-exclamation-triangle"></i>
                            <div>
                                <strong>Unexpected Error Encountered</strong>
                                <div style="font-style: italic; padding: 10px;">(Our developers have already been notified... this is an alpha afterall!)</div>
                            
                                @if (app()->bound('sentry') && !empty(Sentry::getLastEventID()))
                                    <br /><br />
                                    <div class="subtitle">Error ID: {{ Sentry::getLastEventID() }}</div>

                                    <!-- Sentry JS SDK 2.1.+ required -->
                                    <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

                                    <script>
                                        Raven.showReportDialog({
                                            eventId: '{{ Sentry::getLastEventID() }}',
                                            dsn: "{{ env('SENTRY_LARAVEL_DSN') }}",
                                        });
                                    </script>
                                @endif
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
