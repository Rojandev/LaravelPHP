@extends('layouts.index')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Show Task</h1>
				<div ng-controller="taskController" ng-init="showData()">
					<button id="btn-add" class="btn btn-primary" ng-click="toggle('add', 0)">Add New Task</button>
					
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="task in tasks">
								<td>@{{ task.id }}</td>
								<td>@{{ task.task_title }}</td>
								<td>@{{ task.description }}</td>
								 <td>
									<button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', task.id)">Edit</button>
									<button class="btn btn-default btn-xs btn-detail" ng-click="confirmDelete(task.id)">Delete</button>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
						    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						           <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
						            <div ng-bind-html="msg"></div>
						        </div>
						        <div class="modal-body">

						             <form name="frmTask" class="form-horizontal" novalidate="">
										<div class="form-group error">
											<label for="taskTitle" class="col-sm-3 control-label">Task Title</label>
											<div class="col-sm-9">
												<input type="text" class="form-control has-error" id="taskTitle" name="taskTitle" placeholder="Title"
												ng-model="task.task_title" ng-required="true">
												<span class="help-inline" ng-show="frmTask.taskTitle.$invalid && frmTask.taskTitle.$touched">Title field is required</span>
											</div>
										</div>

										<div class="form-group">
											<label for="taskDescription" class="col-sm-3 control-label">Description</label>
											<div class="col-sm-9">
												<textarea class="form-control" id="taskDescription" name="taskDescription" placeholder="Description"
												ng-model="task.description" ng-required="true"></textarea>
											</div>
										</div>

						             </form>
						        </div>
						        <div class="modal-footer">
						            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)">Save changes</button>
						        </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

@endsection