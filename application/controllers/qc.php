<?php

class QC extends CI_Controller
{
	public function __construct(){
        parent::__construct();
		$this->load->model('query');
    }

    public function create(){
    	$this->load->view('create');
    }

    public function add(){
    	$hashtag = $this->input->post('hashtag');
    	$mail = $this->input->post('email');
    	$numberOfTweets = $this->input->post('number');

    	$this->query->initialise($hashtag, $mail, $numberOfTweets);

    	$data = array();
    	$data["isOK"] = $this->query->save();

    	$this->load->view('success', $data);
    }
	
}

?>