<?php

use Todo\Controller;
use Todo\Database;
use Todo\TodoItem;

class TodoController extends Controller {
    
    public function get()
    {
        $todos = TodoItem::findAll();
        return $this->view('index', ['todos' => $todos]);
    }

    public function add()
    {
        $body = filter_body();
        $result = TodoItem::createTodo($body['title']);

        if ($result) {
          $this->redirect('/');
        }
    }

    public function update($urlParams)
    {
        $body = filter_body();

        $todoId = $urlParams['id'];

        $completed = isset($body['status']) ? 1 : 0;

        $result = TodoItem::updateTodo($todoId, $completed);

        if ($result) {
            $this->redirect('/');
        } else {
          throw new \Exception("Sry, something went wrong with the updating:(");
        }
    }

    public function delete($urlParams)
    {
        $result = TodoItem::deleteTodo($urlParams ['id']);

        if ($result) {
          $this->redirect('/');
        }
    }

    /** 
     * OPTIONAL Bonus round!
     * 
     * The two methods below are optional, feel free to try and complete them
     * if you're aiming for a higher grade.
     */
    public function toggle()
    {
      // (OPTIONAL) TODO: This action should toggle all todos to completed, or not completed.
    }

    public function clear()
    {
      // (OPTIONAL) TODO: This action should remove all completed todos from the table.
    }

}
