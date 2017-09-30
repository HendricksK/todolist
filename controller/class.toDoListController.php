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
	public function addNewItem($id,$item) {
		// insert into  Personal_Organization.toDo_List(`description`,`user_id`) VALUE ('completete pricecheck test',1);
		$sql = "insert into Personal_Organization.toDo_List(`description`,`user_id`) values ('" . $item . "'," . $id .")";
		$response = $this->databaseController->queryDatabase($sql);
		
		if($response === true) {
			$this->databaseController->closeConnection();
			return 1;
		}

		$this->databaseController->closeConnection();
		return 0;
	}

	/**
	 * [getAllItems gets all of the to do items for a specific user]
	 * @param  [int] $userid [the user id]
	 * @return [json]         [description]
	 */
	public function getAllItems($id) {
		$toDoItems = array();
		$sql = "select * from Personal_Organization.toDo_List where user_id =" . $id . " AND deleted = 0"; 
		$data = $this->databaseController->queryDatabase($sql);

		if(!empty($data)) {
			foreach($data as $item) {
				array_push($toDoItems, $item);
			}
			$this->databaseController->closeConnection();
			return json_encode($toDoItems);	
		}

		$this->databaseController->closeConnection();
		return false;
		
	}

	/**
	 * [getAllCompletedItems gets all of the to do items for a specific user]
	 * @param  [int] $userid [the user id]
	 * @return [json]         [description]
	 */
	public function getAllCompletedItems($id) {
		$toDoItems = array();
		$sql = "select * from Personal_Organization.toDo_List where user_id =" . $id . " AND deleted = 1 order by id DESC"; 
		$data = $this->databaseController->queryDatabase($sql);

		if(!empty($data)) {
			foreach($data as $item) {
				array_push($toDoItems, $item);
			}

			$this->databaseController->closeConnection();
			return json_encode($toDoItems);	
		}

		$this->databaseController->closeConnection();
		return false;
		
	}	

	/**
	 * [getItemByID return item based on id]
	 * @param  [int] $id [item id]
	 * @return [json]     [returns dataset]
	 */
	public function getItemByID($id) {
		$toDoItems = array();
		$sql = "select * from Personal_Organization.toDo_List where id =" . $id . " AND deleted = 0"; 
		$data = $this->databaseController->queryDatabase($sql);

		if(!empty($data)) {
			foreach($data as $item) {
				array_push($toDoItems, $item);
			}

			$this->databaseController->closeConnection();
			return json_encode($toDoItems);	
		}

		$this->databaseController->closeConnection();
		return false;
	}

	/**
	 * [markAllItemsCompleted marks all items as completed, soft delete]
	 * @param  [int] $id [user id]
	 * @return [json]     [returns success or failure]
	 */
	public function markAllItemsCompleted($id) {
		$sql = "update Personal_Organization.toDo_List set deleted=1 where user_id =" . $id; 
		$data = $this->databaseController->queryDatabase($sql);
		$this->databaseController->closeConnection();
		return $data;
	}

	/**
	 * [markItemAsComplete checks a single item as deleted/completed]
	 * @param  [type] $id [id of the item]
	 * @return [type]     [json]
	 */
	public function markItemAsComplete($id) {
		$sql = "update Personal_Organization.toDo_List set deleted=1 where id =" . $id; 
		$data = $this->databaseController->queryDatabase($sql);
		$this->databaseController->closeConnection();
		return $data;
	}

	/**
	 * [markItemAsComplete will update a specified]
	 * @param  [type] $id [id of the item]
	 * @return [type]     [json]
	 */
	public function updateToDoList($id, $item) {
		$sql = "update Personal_Organization.toDo_List set description=" . $item  . " where id =" . $id; 
		$data = $this->databaseController->queryDatabase($sql);
		$this->databaseController->closeConnection();
		return $data;
	}

	/**
	 * [addNewItem adds comment to the database for a todlolist item]
	 * @param [type] $id [todo list item id]
	 * @param [type] $item [the new comment] 
	 */
	public function addNewCommentToItem($id,$item) {
		// insert into  Personal_Organization.toDo_List(`description`,`user_id`) VALUE ('completete pricecheck test',1);
		$sql = "insert into Personal_Organization.toDo_Comments(`to_do_id`,`comment_data`,`modified`) values ('" . $id . "'," . $item .",NOW())";
		$response = $this->databaseController->queryDatabase($sql);
		$this->databaseController->closeConnection();
		if($response === true) {
			return 1;
		}

		return 0;
	}

}