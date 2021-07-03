<?php

/**
 * Created by: Magia_php
 * Author: Robinson Coello s.
 * Web: http://coello.be
 * E-mail: robincoello@hotmail.com
 * Date: 2020-04-22
 */

/**
 * success
 * info
 * warning
 * danger
 * 
 * https://getbootstrap.com/docs/3.3/components/#alerts
 * 
 */
function message($type, $text) {

    switch ($type) {
        case "success":
            $m = '<div class="alert alert-success" role="alert">' . _tr($text) . '</div>';
            break;

        case "info":
            $m = '<div class="alert alert-info" role="alert">' . _tr($text) . '</div>';
            break;

        case "warning":
            $m = '<div class="alert alert-warning" role="alert">' . _tr($text) . '</div>';
            break;

        case "danger":
            $m = '<div class="alert alert-danger" role="alert">' . _tr($text) . '</div>';
            break;

        default:
        case "info":
            $m = '<div class="alert alert-danger" role="alert">' . _tr($text) . '</div>';
            break;
    }

    echo $m;
}
