(function() {

	getAllToDoItems();
	getAllCompletedItems();
	document.getElementById('add-new-item').addEventListener('click', addNewToDoItem);
	document.getElementById('complete-all-items').addEventListener('click', markAllItemsComplete);

})();

function getBaseUrl() {
	return 'http://192.168.33.10/todolist/public/';
}

function getAllToDoItems() {
	var xhr = new XMLHttpRequest();
	var id = 1;
	xhr.open('GET', getBaseUrl() + 'get-all-todo/' + id);
	xhr.onload = function() {
	    if (xhr.status === 200) {
	        // alert('User\'s name is ' + xhr.responseText);
	        var toDoList = JSON.parse(xhr.responseText);
	        var toDoListDom = '';

			for(var x = 0; x < toDoList.length; x++) {
				toDoListDom = toDoListDom + 
				'<div><input id="checkbox_"'+ toDoList[x]['id'] +' data-id="' + toDoList[x]['id'] + '" type="checkbox" onclick="markSingleItemAsComplete(this)"><label for="checkbox_' + toDoList[x]['id'] + '">'
				+ toDoList[x]['description'] + ' - ' + toDoList[x]['insert_date'] + '</label></div>';
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
	xhr.open('POST', getBaseUrl() + 'new-to-do-item');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xhr.onreadystatechange = function() {
    if(xhr.status != 200) {
        	alert('An error has occured, please try again');
    	}
    	reloadToDoList();
	} 

	xhr.send(postParams);
	
	document.getElementById('new-todo-item').value = '';
}

function reloadToDoList() {
	var xhr = new XMLHttpRequest();
	var id = 1;
	xhr.open('GET', getBaseUrl() + 'get-all-todo/' + id);
	xhr.onload = function() {
	    if (xhr.status === 200) {
	        // alert('User\'s name is ' + xhr.responseText);
	        var toDoList = JSON.parse(xhr.responseText);
	        var toDoListDom = '';

			for(var x = 0; x < toDoList.length; x++) {
				toDoListDom = toDoListDom + 
				'<div><input id="checkbox_"'+ toDoList[x]['id'] +' data-id="' + toDoList[x]['id'] + '" type="checkbox" onclick="markSingleItemAsComplete(this)"><label for="checkbox_' + toDoList[x]['id'] + '">'
				+ toDoList[x]['description'] + ' - ' + toDoList[x]['insert_date'] + '</label></div>';
			}
			document.getElementById('to-do-list').innerHTML = toDoListDom;		       
	    }
	    else {
	        alert('Request failed.  Returned status of ' + xhr.status);
	    }
	};
	xhr.send();
}

function reloadCompletedList() {
	// to-do-list-completed
	var xhr = new XMLHttpRequest();
	var id = 1;
	xhr.open('GET', getBaseUrl() + 'get-completed-todo/' + id);
	xhr.onload = function() {
	    if (xhr.status === 200) {
	        // alert('User\'s name is ' + xhr.responseText);
	        var toDoList = JSON.parse(xhr.responseText);
	        var toDoListDom = '';

			for(var x = 0; x < toDoList.length; x++) {
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

function getAllCompletedItems() {
	// to-do-list-completed
	var xhr = new XMLHttpRequest();
	var id = 1;
	xhr.open('GET', getBaseUrl() + 'get-completed-todo/' + id);
	xhr.onload = function() {
	    if (xhr.status === 200) {
	        // alert('User\'s name is ' + xhr.responseText);
	        var toDoList = JSON.parse(xhr.responseText);
	        var toDoListDom = '';

			for(var x = 0; x < toDoList.length; x++) {
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

function markAllItemsComplete() {
	var id = 1;
	var postParams = 'id=' +  id;

    xhr = new XMLHttpRequest();
	xhr.open('PUT', getBaseUrl() + 'mark-all-items-complete');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xhr.onreadystatechange = function() {
    if(xhr.status != 200) {
        	alert('An error has occured, please try again');
    	}
    	reloadToDoList();
    	reloadCompletedList();
	} 

	xhr.send(postParams);
}

function markSingleItemAsComplete(element) {
	
	if(element.getAttribute('data-id') != null) {
		var postParams = 'id=' +  element.getAttribute('data-id');

	    xhr = new XMLHttpRequest();
		xhr.open('PUT', getBaseUrl() + 'mark-single-items-complete');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhr.onreadystatechange = function() {
	    if(xhr.status != 200) {
	        	alert('An error has occured, please try again');
	    	}

	    	reloadToDoList();
	    	reloadCompletedList();
		} 

		xhr.send(postParams);
	}
	
}
