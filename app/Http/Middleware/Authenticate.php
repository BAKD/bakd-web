<?php

namespace BAKD\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        // TODO: Setup helpers with default error/success/warning/info flash message setups
        // until we have the real-time js notifications going.
        $request->session()->flash('status', [
            'type' => 'error',
            'icon' => '<i class="alert-icon fa fa-times-circle"></i>',
            'class' => 'alert-danger',
            'message' => 'Unable to view page without logging in!',
        ]);
        return route('login');
    }
}
