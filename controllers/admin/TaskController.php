<?php

namespace Controllers\admin;

use Controllers\BaseController;

class TaskController extends BaseController
{
    function list(){
        $tasks = $this->db->select("tasks", '*');
        die($this->twig->render('admin/index.twig', [
            'tasks' => $tasks
        ]));
    }
    function edit($id){
        $task = $this->db->select("tasks", '*', ["id" => $id])[0];

        die($this->twig->render('admin/edit.twig', [
            'task' => $task
        ]));
    }
    function save($id){
       $task = input('task', null, 'post');
       $isDone = input('is_done', null, 'post');
       $this->db->update("tasks", ['task' => $task, 'edited' => true, 'is_done' => $isDone == 'on'], ["id" => $id]);
       response()->redirect('/admin/task');
    }
}