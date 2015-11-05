<?php
/**
 * @Author Evin Weissenberg
 */

Class header{

    public $header;

    function __construct($code){

        $this->header =  header("HTTP/1.1 ".$code." Not Found");
    }
}