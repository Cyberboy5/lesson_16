<?php
namespace App\Model;

USE App\Model\Model;
use PDO;
USE PDOException;

class Genre extends Model{
    public static $table_name = 'genre';

    public static function getBookGenres($id) : array 
    {
        $con = self::connect(); 
        try {
            $query = "SELECT COUNT(*) AS total_books
            FROM book
            LEFT JOIN genre ON book.author_id = genre.id
            WHERE genre.id = '{$id}' 
            GROUP BY genre_id;
            ";

            $stmt = $con->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>