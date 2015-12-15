<?php

class connect {

	private $con;

	public $query_store;

	public $data;

	public function connect_it($db, $host = "localhost", $user = "root", $pass = ""){

		$this->con = mysql_connect($host, $user, $pass);

		if ($this->con){

			mysql_select_db($db);

			return true;

		} else {

			return false;

		}

	}

	public function close_connection(){

		return mysql_close($this->con);

	}

	public function setdata($sql){

		mysql_query($sql);

	}

	public function getdata($sql){

		$this->query_store = mysql_query($sql);

		//return $this->query_store;

	}

	public function showdata(){

		$run_query = mysql_fetch_array($this->query_store);

		$this->data = $run_query;

		return $run_query;

	}

	public function delete($sql){

		mysql_query($sql);

	}

}

?>