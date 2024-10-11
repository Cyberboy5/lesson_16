<?php
namespace App\Model;

USE App\Model\Model;
USE PDO;
USE PDOException;

class Book extends Model{
    public static $table_name = 'book';

    public static function get_books(){
        
        try {
            $con = self::connect(); 

            $query = "SELECT 
                        book.id,
                        title,
                        description,
                        text,
                        author.name AS author_name,
                        genre.name AS genre_name,
                        image 
                    FROM 
                        book
                    LEFT JOIN 
                        author ON book.author_id = author.id 
                    LEFT JOIN 
                        genre ON book.genre_id = genre.id 
                    GROUP BY 
                        book.id";
                        
            $stmt = $con->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
                
                
                }

    
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
        $db = self::connect(); 
        
        $query = "INSERT INTO book (title, description, genre_id, text, image, author_id) 
                  VALUES (:title, :description, :genre_id, :text, :image, :author_id)";
        
        $stmt = $db->prepare($query);
    
        
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':genre_id', $genre_id, PDO::PARAM_INT);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image_path, PDO::PARAM_STR);
        $stmt->bindParam(':author_id', $author_id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
    

    public static function update($id, $title, $description, $genre_id, $text, $author_id,$image_path = null) {
        $db = self::connect();
    
        if ($image_path) {
            $query = "UPDATE book SET title = :title, description = :description, genre_id = :genre_id, text = :text, image = :image, author_id = :author_id WHERE id = :id";
        } else {
            $query = "UPDATE book SET title = :title, description = :description, genre_id = :genre_id, text = :text, author_id = :author_id WHERE id = :id";
        }
    
        $stmt = $db->prepare($query);
    
    
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':genre_id', $genre_id, PDO::PARAM_INT);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        $stmt->bindParam(':author_id', $author_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    
        if ($image_path) {
            $stmt->bindParam(':image', $image_path, PDO::PARAM_STR);
        }
    
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
    
    
    
}

?>