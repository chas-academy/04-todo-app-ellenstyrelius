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

        $title = $body['title'];

        $completed = isset($body['status']) ? 1 : 0;

        $result = TodoItem::updateTodo($todoId, $title, $completed);

        if ($result) {
            $this->redirect('/');
        }
    }

    public function delete($urlParams)
    {
        $result = TodoItem::deleteTodo($urlParams ['id']);    

        if ($result) {
          $this->redirect('/');
        }
    }

    public function toggle()
    {
        $todos = TodoItem::findAll();

        $todosLeft = count(array_filter(
            $todos, function($todo) {
                return $todo['completed'] === 'false';
            }
        ));

        $result = TodoItem::toggleTodos($todosLeft);

        if ($result) {
          $this->redirect('/');
        }   
    }

    public function clear()
    {
        $result = TodoItem::clearCompletedTodos();

        if ($result) {
          $this->redirect('/');
        }
    }

}
