<?php

/**
 * @Author Evin Weissenberg
 */
Class Api_auth {

    function __construct() {

        if ($_GET['profile'] == 'true') {

            header('Content-Type: text/html; charset=utf-8');
            $this->output->enable_profiler(TRUE);

        } else {
            header('Content-Type: application/json');
        }

        if (isset($_REQUEST['key']) and $_REQUEST['key'] == 893473) {
        } else {
            print_r(json_encode(array('code' => 401)));
            exit();
        }
    }
}