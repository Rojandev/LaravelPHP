app.controller('taskController', function($scope, $http, API_URL) {
    //retrieve employees listing from API
    $scope.showData = function() {
    		$http.get(API_URL + "task").success(function(response) {
                $scope.tasks = response;
            });
	}
    //Show popup
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Task";
                $scope.task = "";
                break;
            case 'edit':
            	//Retrieve single task
                $scope.form_title = "Task Detail";
                $scope.id = id;
                $http.get(API_URL + 'task/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.task = response;
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    //Save and Update Task
    $scope.save = function(modalstate,  id){
    	var url = API_URL + "task";
    	
    	if(modalstate == 'edit'){
    		url += '/' + id;
    	}

    	 console.log(url+"----"+ modalstate);

    	$http({
    		method: 'POST',
    		url: url,
    		data: $.param($scope.task),
    		headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    	}).success(function(response){
			console.log(response);
			if(modalstate != 'edit'){
    			$scope.task = "";
    		}
			$scope.showData();
    	}).error(function(response){
    		console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
    	});
    }


    $scope.confirmDelete = function(id){
    	var isConfirmDelete = confirm('Are you sure you want to delete this record?');

    	if(isConfirmDelete){
    		$http({
    			method: 'DELETE',
    			url: API_URL + 'task/' + id,
    		}). success(function(response){
    			$scope.showData();
    		}).error(function(response){
    				console.log(response);
    				alert('Unable to delete');
    		});
    	}else{
    		return false;
    	}
    }

});