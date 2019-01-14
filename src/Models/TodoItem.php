<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos';

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
                throw new \Exception("Sry, something went wrong with the adding new todo :(");
            }

        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    public static function updateTodo($todoId, $title, $completed)
    {
        try {
            $query = "UPDATE todos 
            SET completed = :completed, title = :title
            WHERE id = :id";

            $statement = self::$db->query($query);
            self::$db->bind(':id', $todoId);
            self::$db->bind(':title', $title);

            if ($completed === 1) {
                self::$db->bind(':completed', 'true');
            } elseif ($completed === 0) {
                self::$db->bind(':completed', 'false');
            }
           
            $result = self::$db->execute();

            if (!empty($result)) {
                return $result;
            } else {
                throw new \Exception("Sry, something went wrong when trying to update :(");
            }

        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

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
                throw new \Exception("Sry, something went wrong with the deleting :(");
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

    public static function clearCompletedTodos($completed)
    {
        try {
            $query = "DELETE FROM todos WHERE completed = 'true'";

            $statement = self::$db->query($query);
            // self::$db->bind(':id', $todoId);

            $result = self::$db->execute();

            if (!empty($result)) {
                return $result;
            } else {
                throw new \Exception("Sry, something went wrong with the deleting :(");
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

}
