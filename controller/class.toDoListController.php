<?php 

include DIRNAME(__FILE__) . '/class.databaseController.php';

class toDoListController {
	
	protected $databaseController;

	function __construct() {
		$this->databaseController = new databaseController();
	}
	/**
	 * [addNewItem adds single item to database]
	 * @param [type] $item [the new item on the todolist]
	 */
	public function addNewItem($item) {

	}

	/**
	 * [getAllItems gets all of the to do items for a specific user]
	 * @param  [type] $userid [the user id]
	 * @return [type]         [description]
	 */
	public function getAllItems($userid) {
		$toDoItems = array();
		$sql = 'select * from Personal_Organization.toDo_List where user_id =' . $userid . ' AND deleted = 0'; 
		$data = $this->databaseController->retrieveData($sql);

		if(!empty($data)) {
			foreach($data as $item) {
				array_push($toDoItems, $item);
			}

			return json_encode($toDoItems);	
		}

		return false;
		
	}	

	public function getItemByID($id) {

	}

	public function removeAllItems() {

	}

	public function removeItemByID() {
		
	}
}