(function() {
	
	getAllToDoItems();
	getAllCompletedItems();
	document.getElementById('add-new-item').addEventListener('click', addNewToDoItem);

})();

function getAllToDoItems() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET','http://192.168.33.10/todolist/public/get-all-todo/1');
	xhr.onload = function() {
	    if (xhr.status === 200) {
	        // alert('User\'s name is ' + xhr.responseText);
	        var toDoList = JSON.parse(xhr.responseText);
	        var toDoListDom = '';

			for(var x = 0; x < toDoList.length; x++) {
				console.log(toDoList[x]);
				toDoListDom = toDoListDom + '<div><input id="checkbox1" type="checkbox"><label for="checkbox1">' + toDoList[x]['description'] + ' - ' + toDoList[x]['insert_date'] + '</label></div>';
			}
			document.getElementById('to-do-list').innerHTML = toDoListDom;		       
	    }
	    else {
	        alert('Request failed.  Returned status of ' + xhr.status);
	    }
	};
	xhr.send();
}

function addNewToDoItem() {
	var description = document.getElementById('new-todo-item').value;
	var id = 1;
	var postParams = 'id=' +  id + '&description=' + description;

    xhr = new XMLHttpRequest();
	xhr.open('POST', 'http://192.168.33.10/todolist/public/new-to-do-item');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xhr.onreadystatechange = function() {
    if(xhr.status != 200) {
        	alert('An error has occured, please try again');
    	}
	}
	xhr.send(postParams);

	reloadToDoList();
	document.getElementById('new-todo-item').value = '';
}

function reloadToDoList() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET','http://192.168.33.10/todolist/public/get-all-todo/1');
	xhr.onload = function() {
	    if (xhr.status === 200) {
	        // alert('User\'s name is ' + xhr.responseText);
	        var toDoList = JSON.parse(xhr.responseText);
	        var toDoListDom = '';

			for(var x = 0; x < toDoList.length; x++) {
				console.log(toDoList[x]);
				toDoListDom = toDoListDom + '<div><input id="checkbox1" type="checkbox"><label for="checkbox1">' + toDoList[x]['description'] + ' - ' + toDoList[x]['insert_date'] + '</label></div>';
			}
			document.getElementById('to-do-list').innerHTML = toDoListDom;		       
	    }
	    else {
	        alert('Request failed.  Returned status of ' + xhr.status);
	    }
	};
	xhr.send();
}

function getAllCompletedItems() {
	// to-do-list-completed
	var xhr = new XMLHttpRequest();
	xhr.open('GET','http://192.168.33.10/todolist/public/get-completed-todo/1');
	xhr.onload = function() {
	    if (xhr.status === 200) {
	        // alert('User\'s name is ' + xhr.responseText);
	        var toDoList = JSON.parse(xhr.responseText);
	        var toDoListDom = '';

			for(var x = 0; x < toDoList.length; x++) {
				console.log(toDoList[x]);
				toDoListDom = toDoListDom + '<div><label>' + toDoList[x]['description'] + '</label></div>';
			}
			document.getElementById('to-do-list-completed').innerHTML = toDoListDom;		       
	    }
	    else {
	        alert('Request failed.  Returned status of ' + xhr.status);
	    }
	};
	xhr.send();
}

