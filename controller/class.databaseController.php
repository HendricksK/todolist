<?php

class databaseController {
	
	protected $databaseController;

	function __construct() {
		$this->databaseController = new mysqli('localhost', 'root', 'root');
	}

	/**
	 * [queryDatabase queries database, pass SQL]
	 * @param  [type] $sql [string]
	 * @return [type]      [data, or error]
	 */
	public function queryDatabase($sql) {
		try {
			$data = $this->databaseController->query($sql);
			return $data;	
		} catch (Exception $e) {
			return $e;
		}
		
	}	

	/**
	 * [closeConnection closes the database connector]
	 * @return [type] [none void function]
	 */
	public function closeConnection() {
		$this->databaseController->close();
	}

}