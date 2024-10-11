<?php
namespace App\Controllers;

use App\Model\Book;

class BookController{

    public function create_book_page(){
        return view('book/create_book','Book-Creation');
    }

    public static function create_book() {
        // var_dump(!empty($_POST['book_author_id']));
        // dd($_FILES);
        if (isset($_POST['submit']) && !empty($_POST['book_title']) && !empty($_POST['book_desc']) && !empty($_POST['book_genre_id']) && !empty($_POST['book_author_id']) && !empty($_FILES['book_image'])) {
            // echo 'hello';
            $title = htmlspecialchars(strip_tags($_POST['book_title']));
            $desc = htmlspecialchars(strip_tags($_POST['book_desc']));
            $genre_id = intval($_POST['book_genre_id']);
            $text = htmlspecialchars(strip_tags($_POST['book_text']));
            $author_id = intval($_POST['book_author_id']);
    
            $image = $_FILES['book_image'];
            $image_path ='uploads/' . basename($image['name']);
            if (move_uploaded_file($image['tmp_name'], $image_path)) {
                if (Book::createBook($title, $desc, $genre_id, $text, $image_path, $author_id)) {
                    header("Location: /book");
                    exit();
                } else {
                    echo "Error: Could not create the book.";
                }
            } else {
                echo "Error: Failed to upload the image.";
            }
        } else {
            echo "Error: All fields are required.";
        }
    }
    
    public function delete_book(){
        if(isset($_POST['id'])){
        
            $id = $_POST['id'];
            if (Book::delete($id)) {
                header("Location: /book");
                exit(); 
            }
        }
    }

    public function edit_book_page(){
        return view('book/edit_book','Book-Edit');
    }

    public static function edit_book() {
        if (isset($_POST['submit']) && !empty($_POST['book_title']) && !empty($_POST['book_desc']) && !empty($_POST['book_genre_id']) && !empty($_POST['book_text']) && !empty($_POST['book_id'])) {
            $id = intval($_POST['book_id']);
            $title = htmlspecialchars(strip_tags($_POST['book_title']));
            $desc = htmlspecialchars(strip_tags($_POST['book_desc']));
            $genre_id = intval($_POST['book_genre_id']);
            $text = htmlspecialchars(strip_tags($_POST['book_text']));
            $author_id = intval($_POST['book_author_id']);
    
            if (!empty($_FILES['book_image']['name'])) {
                $image = $_FILES['book_image'];
                $image_path ='uploads/' . basename($image['name']);

                if (move_uploaded_file($image['tmp_name'], $image_path)) {
                    if (Book::update($id, $title, $desc, $genre_id, $text, $author_id, $image_path)) {
                        header("Location: /book");
                        exit();
                    } else {
                        echo "Error: Could not update the book.";
                    }
                } else {
                    echo "Error: Failed to upload the new image.";
                }
            } else {
                if (Book::update($id, $title, $desc, $genre_id, $text, null, $author_id)) {
                    header("Location: /book");
                    exit();
                } else {
                    echo "Error: Could not update the book.";
                }
            }
        } else {
            echo "Error: All fields are required.";
        }
    }
}
?>