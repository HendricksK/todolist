<?php

class databaseController {
	
	protected $databaseController;

	function __construct() {
		$this->databaseController = new mysqli('localhost', 'root', 'root');
	}

	public function queryDatabase($sql) {
		try {
			$data = $this->databaseController->query($sql);
			$this->closeConnection();
			return $data;	
		} catch (Exception $e) {
			return $e;
		}
		
	}	

	public function closeConnection() {
		$this->databaseController->close();
	}

}