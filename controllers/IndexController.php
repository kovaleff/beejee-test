<?php

namespace Controllers;

class IndexController extends BaseController {

    function home(){
        $page = input()->get('page', 1);
        $page = $page->value ?? 1;
        $total = $this->db->count('tasks');
        $offset = ($page -1) * $this->perPage;
        $tasks = $this->db->select("tasks", '*',[
            'LIMIT' => [$offset, $this->perPage],
        ]);
        die($this->twig->render('index.twig', [
            'total' => $total,
            'page' => $page,
            'pages' => ceil($total/$this->perPage),
            'perPage' => $this->perPage,
            'tasks' => $tasks
        ]));
    }
    function add(){
        $data = input()->all();
        $pdo = $this->db->insert("tasks",[$data] );
        redirect('/');
    }
}