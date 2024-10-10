<?php
namespace App\Model;

USE App\Model\Model;
USE PDO;

class Book extends Model{
    public static $table_name = 'book';

    
    public static function uploadImage($file, $uploadDir) {
        // dd($file,$uploadDir);
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = mime_content_type($file['tmp_name']);
        
        if (!in_array($fileType, $allowedTypes)) {
            return null; 
        }

        $fileName = uniqid() . "_" . basename($file['name']);
        $uploadPath = $uploadDir . '/' . $fileName;

        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            return $uploadPath;
        } else {
            return null; 
        }
    }

    public static function createBook($title, $description, $genre_id, $text, $image_path, $author_id) {
        // Establish the database connection
        $db = self::connect(); 
        
        // Prepare the SQL query with named placeholders
        $query = "INSERT INTO book (title, description, genre_id, text, image, author_id) 
                  VALUES (:title, :description, :genre_id, :text, :image, :author_id)";
        
        // Prepare the statement
        $stmt = $db->prepare($query);
    
        // Check if preparation failed

        
        // Bind the parameters using an associative array
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':genre_id', $genre_id, PDO::PARAM_INT);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image_path, PDO::PARAM_STR);
        $stmt->bindParam(':author_id', $author_id, PDO::PARAM_INT);
        
        // Execute the query
        if ($stmt->execute()) {
            return true; // Query succeeded
        } else {
            return false; // Query failed
        }
    }
    

    public static function update($id, $title, $description, $genre_id, $text, $author_id,$image_path = null) {
        $db = self::connect();
    
        // Prepare the SQL query with named placeholders
        if ($image_path) {
            $query = "UPDATE book SET title = :title, description = :description, genre_id = :genre_id, text = :text, image = :image, author_id = :author_id WHERE id = :id";
        } else {
            $query = "UPDATE book SET title = :title, description = :description, genre_id = :genre_id, text = :text, author_id = :author_id WHERE id = :id";
        }
    
        // Prepare the statement
        $stmt = $db->prepare($query);
    
    
        // Bind the parameters using an associative array
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':genre_id', $genre_id, PDO::PARAM_INT);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        $stmt->bindParam(':author_id', $author_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Always bind the ID
    
        // If there's an image, bind that as well
        if ($image_path) {
            $stmt->bindParam(':image', $image_path, PDO::PARAM_STR);
        }
    
        // Execute the query
        if ($stmt->execute()) {
            return true; // Query succeeded
        } else {
            return false; // Query failed
        }
    }
    
    
    
}

?>