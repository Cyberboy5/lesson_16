<?php
namespace App\Model;

USE App\Model\Model;
USE PDO;
USE PDOException;

class Author extends Model{
    public static $table_name = 'author';

    public static function getAuthorBooks($id) : array 
    {
        $con = self::connect(); 
        try {
            $query = "SELECT COUNT(*) AS total_books
            FROM book
            LEFT JOIN author ON book.author_id = author.id
            WHERE author.id = '{$id}' 
            GROUP BY author_id;
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