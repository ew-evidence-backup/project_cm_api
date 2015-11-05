<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function create (){

        $this->load->Model('User_model');
        $this->User_model->create();
    }

    function get(){
        $this->load->Model('User_model');
        $this->User_model->get();

    }

    function add_video(){
        $this->load->Model('User_model');
        $this->User_model->add_video();

    }
}