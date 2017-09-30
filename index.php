<!DOCTYPE html>
<html>
<head>
	<title>To do list</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.css">
</head>
<body>
	<div class="wrapper">
		<div class="row small-12 medium-8 large-6 columns align-center">
			<div class="todo">
				<h5 class="todo-question">
				   	To do list:
				</h5>
				<div class="todo-options" id="to-do-list">
				</div>
			</div>
			<input type="text" name="new-todo-item" id="new-todo-item" placeholder="Add new to do item">
			<div class="todo-submit">
			    <input type="submit" class="button" value="New to do" id="add-new-item">
			    <input type="submit" class="button success" value="Mark all items completed" id="complete-all-items">
			</div>
			<div class="todo completed">
				<h5 class="todo-question">
				    Completed items:
				</h5>
				<div class="todo-options" id="to-do-list-completed">
				  	NO ITEMS FOUND
				</div>
			</div>
		</div>
	</div>
</body>
<footer>
	<script type="text/javascript" src="./assets/js/todo.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.js"></script>
</footer>
</html>