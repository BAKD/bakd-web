<?php

namespace BAKD\Helpers;

use \Carbon\Carbon;

class Helper
{
    /**
     * Show flash message to frontend
     *
     * Helper for the success/error/info/warning flash messages served via php. Defaults to a success message if
     * using just a message when calling this function. Needless to say, it will be relatively useless once we get
     * the js frontend going... But, better to have a fallback in place.
     *
     * @param  string  message  represents the message displayed in the alert.
     * @param  string  type     represents the alert type -- error | success | info | warning -- and so on...
     * @param  string  icon     represents html icon for alert, if needed.
     * @param  string  class    represents the class for the alert, needed to style the alert.
     * @return mixed
     */
    public static function flashMessage($message, $type = 'success', $icon = '<i class="fa fa-check"></i>', $class = 'alert-success')
    {
        return session()->flash('status', [
            'type' => $type,
            'icon' => $icon,
            'class' => $class,
            'message' => $message,
        ]);
    }

    /**
     * Success flash message helper
     *
     * @param  string  message  represents the message displayed in the success alert.
     * @return mixed
     */
    public static function success($message, $type = 'success', $icon = '<i class="fa fa-check-circle"></i>', $class = 'alert-success')
    {
        return self::flashMessage($message, $type, $icon, $class);
    }

    /**
     * Error flash message helper
     *
     * @param  string  message  represents the message displayed in the error alert.
     * @return mixed
     */
    public static function error($message, $type = 'error', $icon = '<i class="fa fa-times-circle"></i>', $class = 'alert-danger')
    {
        return self::flashMessage($message, $type, $icon, $class);
    }

    /**
     * Info flash message helper
     *
     * @param  string  message  represents the message displayed in the info alert.
     * @return mixed
     */
    public static function info($message, $type = 'info', $icon = '<i class="fa fa-info-circle"></i>', $class = 'alert-info')
    {
        return self::flashMessage($message, $type, $icon, $class);
    }
}
