<?php defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model{

    function __construct(){
        $this->load->library('Api_auth');
    }

    function create(){

        $email= $this->input->get('email',TRUE);
        $password= $this->input->get('password',TRUE);
        $first_name= $this->input->get('first_name',TRUE);
        $last_name= $this->input->get('last_name',TRUE);
        $phone= $this->input->get('phone',TRUE);
        $address1= $this->input->get('address1',TRUE);
        $address2= $this->input->get('address2',TRUE);
        $city= $this->input->get('city',TRUE);
        $state= $this->input->get('state',TRUE);
        $country= $this->input->get('country',TRUE);
        $zip= $this->input->get('zip',TRUE);
        $avatar= $this->input->get('avatar',TRUE);
        $date_created= $this->input->get('date_created',TRUE);

        $data = array(
            'Email' => $email,
            'Password' => $password,
            'FirstName' => $first_name,
            'LastName' => $last_name,
            'Phone' => $phone,
            'Address1' => $address1,
            'Address2' => $address2,
            'City' => $city,
            'State' => $state,
            'Country' => $country,
            'Zip' => $zip,
            'Avatar' => '',
            'DateCreated' => time()
        );

        $this->db->insert('users', $data);

        $this->load->library('Api_status_code');
        print_r(json_encode(array('code'=>$this->api_status_code->ok(),'user_id'=>$this->db->insert_id())));
    }

    function get(){
        error_reporting(-1);
        ini_set('display_errors', 1);

        if(!isset($_REQUEST['id'])){
            print_r(json_encode(array('code'=>$this->api_status_code->bad_request())));
            exit();
        }

        $id= $this->input->get('id',TRUE);

        if ($query = $this->db->query('SELECT * FROM users LEFT JOIN (user_challenges, user_impact, fundraisers) ON (user_challenges.UserID=users.UserID AND user_impact.UserID=users.UserID AND
        fundraisers.UserID=users.UserID) WHERE users.UserID='.$id)){

            if ($query->num_rows() > 0) {
                $row = $query->row();
            }

            $this->load->library('Api_status_code');
            print_r(json_encode(array('code'=>$this->api_status_code->ok(),'user'=>$row)));
            exit();
        }
        else {
            print_r(json_encode(array('code'=>$this->api_status_code->bad_request())));
            exit();
        }
    }

    function add_video(){


    }
}