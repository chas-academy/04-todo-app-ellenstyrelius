<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {
        $query = "INSERT INTO todos (title, created, completed) 
                VALUES (:title, :created, :completed)";
        $statement = static::$db->query($query);
        // $foo = static::$db->bind();
        $result = static::$db->result();



        // TODO: Implement me!
        // Create a new todo
    }

    // // public static function updateTodo($todoId, $title, $completed = null)
    // // {
    // //     // TODO: Implement me!
    // //     // Update a specific todo
    // // }

    public static function deleteTodo($todoId)
    {
        // $query = "DELETE FROM todos WHERE id = :id";
        // $statement = static::$db->query($query);
        // static::$db->execute();


        try {
            $query = "DELETE FROM todos WHERE id = :id";
            $statement = self::$db->query($query);
            self::$db->bind(':id', $todoId);
            self::$db->execute();

            $result = static::findAll();
            return $result;

            // if (!empty($result)) {
            //     return $result;
            // } else {
            //     throw new \Exception("Error occured when trying to delete todo item.");
            // }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
        // TODO: Implement me!
        // Delete a specific todo
    }
    
    // (Optional bonus methods below)
    // public static function toggleTodos($completed)
    // {
    //     // TODO: Implement me!
    //     // This is to toggle all todos either as completed or not completed
    // }

    // public static function clearCompletedTodos()
    // {
    //     // TODO: Implement me!
    //     // This is to delete all the completed todos from the database
    // }

}
