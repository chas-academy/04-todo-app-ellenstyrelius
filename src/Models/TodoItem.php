<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {
        try {
            $query = "INSERT INTO todos (title, created, completed) 
                VALUES (:title, now(), 'false')";
            $statement = self::$db->query($query);
            self::$db->bind(':title', $title);
            $result = self::$db->execute();

            if (!empty($result)) {
                return $result;
            } else {
                throw new \Exception("Sry, something went wrong :(");
            }

        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    // // public static function updateTodo($todoId, $title, $completed = null)
    // // {
    // //     // TODO: Implement me!
    // //     // Update a specific todo
    // // }

    public static function deleteTodo($todoId)
    {
        try {
            $query = "DELETE FROM todos WHERE id = :id";
            $statement = self::$db->query($query);
            self::$db->bind(':id', $todoId);
            $result = self::$db->execute();

            if (!empty($result)) {
                return $result;
            } else {
                throw new \Exception("Sry, something went wrong :(");
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
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
