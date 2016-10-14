@extends('layouts.index')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Add Task</h1>
				{{ isset($msg) ? $msg : '' }}
				<a href="{{ URL::to('/show_task') }}" class="btn btn-default">Show Task</a>
				@if(isset($task_detail->id))

					{!! Form::open(['method'=>'PUT','action'=> ['TaskController@update',$task_detail->id]]) !!}

				@else

					{!! Form::open(['method'=>'POST','action'=> ['TaskController@store']]) !!}

				@endif
				
					<div class="form-group">
						{!! Form::label('taskTitle', 'Task') !!}
						{!! Form::text('taskTitle',isset($task_detail->task_title) ? $task_detail->task_title : '',['class'=> 'form-control','placeholder'=>'Title']); !!}
					</div>
					<div class="form-group">
						{!! Form::label('taskDescription', 'Description') !!}
						{!! Form::textarea('taskDescription', isset($task_detail->description) ? $task_detail->description : '',['class'=> 'form-control','placeholder'=>'Task Description']); !!}
					</div>

				@if(isset($task_detail->id))
					
					{!! Form::submit('Update Task',['class'=>'btn btn-default']) !!}

				@else

					{!! Form::submit('Add Task',['class'=>'btn btn-default']) !!}

				@endif
					
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection