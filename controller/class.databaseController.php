<?php

class databaseController {
	
	protected $databaseController;

	function __construct() {
		$this->databaseController = new mysqli('localhost', 'root', 'root');
	}

	public function retrieveData($sql) {
		try {
			$data = $this->databaseController->query($sql);
			$this->closeConnection();
			return $data;	
		} catch (Exception $e) {
			return $e;
		}
		
	}

	public function insertData($sql) {
		$response = $this->databaseController->query($sql);
		$this->closeConnection();
		return $response;
	}

	public function setData($sql) {
		$response = $this->databaseController->query($sql);
		$this->closeConnection();
		return $response;
	}

	public function deleteData($sql) {
		$response = $this->databaseController->query($sql);
		$this->closeConnection();
		return $response;
	}	

	public function closeConnection() {
		$this->databaseController->close();
	}

}