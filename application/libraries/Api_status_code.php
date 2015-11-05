<?php
/**
 * @Author Evin Weissenberg
 */
Class Api_status_code {

    function unauthorized(){
        return 401;
    }

    function bad_request(){
        return 400;
    }

    function forbidden(){
        return 403;
    }

    function service_unavailable(){
        return 503;
    }

    function ok(){
       return 200;
    }

    function created(){
        return 201;
    }

    function not_found(){
        return 302;
    }

    function request_timeout(){
        return 408;
    }

    function accepted(){
        return 202;
    }
}