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
			<input type="search" name="search" placeholder="Search.." class="animated-search-form">
				<!-- Checkboxes -->
				<div class="polls">
				  <h5 class="polls-question">
				    <span class="polls-question-label">Q:</span>
				    Choose Javascript frameworks that you use?
				  </h5>
				  <div class="polls-options" id="to-do-list">
				  	NO ITEMS FOUND
				  </div>
				  <div class="polls-submit">
				    <input type="submit" class="button" value="Submit Vote">
				  </div>
				</div>
		</div>
	</div>
</body>
<footer>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.js"></script>
</footer>
</html>

<script type="text/javascript">
	(function() {
		var xhr = new XMLHttpRequest();
		xhr.open('GET','http://192.168.33.10/todolist/public/get-all-todo/1');
		xhr.onload = function() {
		    if (xhr.status === 200) {
		        // alert('User\'s name is ' + xhr.responseText);
		        var toDoList = JSON.parse(xhr.responseText);
		        var toDoListDom = '';

				for(var x = 0; x < toDoList.length; x++) {
					console.log(toDoList[x]);
					toDoListDom = toDoListDom + '<div><input id="checkbox1" type="checkbox"><label for="checkbox1">' + toDoList[x]['description'] + '</label></div>';
				}
				document.getElementById('to-do-list').innerHTML = toDoListDom;		       
		    }
		    else {
		        alert('Request failed.  Returned status of ' + xhr.status);
		    }
		};
		xhr.send();
	})();

</script>

<!-- <div>
				      <input id="checkbox1" type="checkbox">
				      <label for="checkbox1">Angular.js</label>
				    </div>
				    <div>
				      <input id="checkbox2" type="checkbox">
				      <label for="checkbox2">React.js</label>
				    </div>
				    <div>
				      <input id="checkbox3" type="checkbox">
				      <label for="checkbox3">Vue.js</label>
				    </div>
				    <div>
				      <input id="checkbox4" type="checkbox">
				      <label for="checkbox4">Knockout.js</label>
				    </div> -->