<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Document
 */
class Query extends CI_Model{
	
	private $_hashtag;
	private $_mail;
	private $_numberOfTweets;
	
	function __construct(){
		parent::__construct(); 
    }
	
	function initialise($h, $m, $n) {
		$this->_hashtag = $h;
		$this->_mail = $m;
		$this->_numberOfTweets = $n;				
	}
	
	public function save(){	
		$isOk = true;
		try
		{
			$connection = new Mongo('mongodb://php:php2013@ds057528.mongolab.com:57528/twitoop');
			$database   = $connection->selectDB('twitoop');
			$collection = $database->selectCollection('queue');
					
			//On insère les données dans la BDD
			$insert = array();
			$insert['email'] = $this->_mail;
			$insert['hashtag'] = $this->_hashtag;
			$insert['number'] = $this->_numberOfTweets;
					
			$collection->insert($insert);
					
		}
		catch(MongoConnectionException $e)
		{
			die("Failed to connect to database ".$e->getMessage());
			$isOk = false;
		}
		catch(MongoException $e) 
		{
			$die('Failed to insert data '.$e->getMessage());
			$isOk = false;
		}
		return $isOk;
	}
	
	public function setHashtag($h){
		$this->_hashtag = $h;
	}
	
	public function getHashtag(){
		return $this->_hashtag;
	}
	
	public function setMail($m){
		$this->_mail = $m;
	}

	public function getMail(){
		return $this->_;
	}

	public function setNumberOfTweets($n){
		$this->_numberOfTweets = $n;
	}

	public function getNumberOfTweets(){
		return $this->_numberOfTweets;
	}
	
	public function getURL(){
		return $this->_url;
	}	
	
	public function getMeetingId(){
		return $this->_meeting_id;
	}
}



?>