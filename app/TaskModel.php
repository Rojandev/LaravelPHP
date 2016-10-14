<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    //
    protected $table = 'task'; // DATABASE TABLE

    public function showTask() // QUERY TO SHOW ALL TASK
    {
    	$sql = TaskModel::all();
    	return $sql;
    }

    public function createTask($args) // QUERY TO ADD TASK
    {
    	$task = new TaskModel;
    	$task->task_title = $args['title'];
    	$task->description = $args['description'];
    	$task->save();
    	return 'Task Added Successfuly!';
    }

    public function deleteTask($id) //  QUERY TO DELETE TASK
    {
    	$task_del = TaskModel::find($id);
    	$task_del->delete();
    	return 'Task Deleted Successfuly';
    }

    public function editTask($id){ // QUERY TO SELECT A SINGLE TASK
    	$sql = TaskModel::find($id);
    	return $sql;
    }

    public function updateTask($args) // QUERY TO UPDATE TASK
    {
    	$task_update = TaskModel::find($args['id']);
    	$task_update->task_title = $args['title'];
    	$task_update->description = $args['description'];
    	$task_update->save();
    	return 'Task Updated Successfuly';
    }
}
