<?php

namespace App\Controllers;

use App\Model\Author;
use App\Model\Genre;
use App\Model\Book;

class Controller{

    public function author() {
        $authors = Author::getAll();
        return view('author/author','Author Page',$authors);
    }
    
    public function genre(){
        $genres = Genre::getAll();       
        return view('genre/genre','Genre Page',$genres);
    }

    public function book(){
        $books = Book::getAll();
        return view('book/book','Book Page',$books);
    }

    // Author
    public function create_author_page(){
        return view('author/create_author','Author-Creation');
    }
    
    public static function create_author(){
        if(isset($_POST['submit']) && !empty($_POST['author_name'])){
            $name = htmlspecialchars(strip_tags($_POST['author_name']));

            if(Author::create($name)){
                header("Location: /");
                exit();
            }
        }
    }

    public function delete_author(){
        if(isset($_POST['id'])){
        
            $id = $_POST['id'];
            if (Author::delete($id)) {
                header("Location: /");
                exit(); 
            }
        }
    }

    public function edit_author_page(){
        return view('author/edit_author','Author-Edit');
    }

    public static function edit_author(){
        // dd($_POST);  
        if(isset($_POST['submit']) && !empty($_POST['author_new_name']) && !empty($_POST['id'])){
            $name = htmlspecialchars(strip_tags($_POST['author_new_name']));
            $id = intval($_POST['id']); 
    
            if(Author::edit($name,$id)){
                header("Location: /");
                exit();
            }else{
                echo 'Error updating the author.';
            }
        }else{
            echo 'Invalid input or missing data.';
        }
    }


    // Genre
    public function create_genre_page(){
        return view('genre/create_genre','Genre-Creation');
    }

    public static function create_genre(){
        if(isset($_POST['submit']) && !empty($_POST['genre_name'])){
            $name = htmlspecialchars(strip_tags($_POST['genre_name']));

            if(Genre::create($name)){
                header("Location: /genre");
                exit();
            }
        }
    }

    public function delete_genre(){
        if(isset($_POST['id'])){
        
            $id = $_POST['id'];
            if (Genre::delete($id)) {
                header("Location: /genre");
                exit(); 
            }
        }
    }

    public function edit_genre_page(){
        return view('genre/edit_genre','Genre-Edit');
    }

    public static function edit_genre(){
        // dd($_POST);  
        if(isset($_POST['submit']) && !empty($_POST['genre_new_name']) && !empty($_POST['id'])){
            $name = htmlspecialchars(strip_tags($_POST['genre_new_name']));
            $id = intval($_POST['id']); 
    
            if(Genre::edit($name,$id)){
                header("Location: /genre");
                exit();
            }else{
                echo 'Error updating the author.';
            }
        }else{
            echo 'Invalid input or missing data.';
        }
    }


    // Book
    public function create_book_page(){
        return view('book/create_book','Book-Creation');
    }

    public static function create_book() {
        // var_dump(!empty($_POST['book_author_id']));
        // dd($_FILES);
        if (isset($_POST['submit']) && !empty($_POST['book_title']) && !empty($_POST['book_desc']) && !empty($_POST['book_genre_id']) && !empty($_POST['book_author_id']) && !empty($_FILES['book_image'])) {
            // echo 'hello';
            // Sanitize inputs
            $title = htmlspecialchars(strip_tags($_POST['book_title']));
            $desc = htmlspecialchars(strip_tags($_POST['book_desc']));
            $genre_id = intval($_POST['book_genre_id']);
            $text = htmlspecialchars(strip_tags($_POST['book_text']));
            $author_id = intval($_POST['book_author_id']);
    
            // Handle image upload
            $image = $_FILES['book_image'];
            $image_path ='uploads/' . basename($image['name']);
            if (move_uploaded_file($image['tmp_name'], $image_path)) {
                // Create the book in the database
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
            // Sanitize inputs
            $id = intval($_POST['book_id']);
            $title = htmlspecialchars(strip_tags($_POST['book_title']));
            $desc = htmlspecialchars(strip_tags($_POST['book_desc']));
            $genre_id = intval($_POST['book_genre_id']);
            $text = htmlspecialchars(strip_tags($_POST['book_text']));
            $author_id = intval($_POST['book_author_id']);
    
            // Check if a new image was uploaded
            if (!empty($_FILES['book_image']['name'])) {
                $image = $_FILES['book_image'];
                $image_path ='uploads/' . basename($image['name']);

                if (move_uploaded_file($image['tmp_name'], $image_path)) {
                    // Update the book with the new image
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
                // Update the book without changing the image
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
    



















    // public function editProductPage(){
    //     return view('editProduct','edit-product');
    // }

    // public function editProduct(){            
    //         $id = $_POST['id'];
            
    //         dd($_POST);
    //         // $product = Product::findById($id);  
        
    //         // if (!$product) {
    //         //     echo "Product not found.";
    //         //     exit();
    //         // }
    //         if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['category_id'])) {
                
    //             $name = htmlspecialchars(strip_tags($_POST['name']));
    //             $price = htmlspecialchars(strip_tags($_POST['price']));
    //             $category_id = htmlspecialchars(strip_tags($_POST['category_id']));
                
    //             if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    //                 $imageDir = 'uploads'; 
                    
    //                 $imagePath = Product::uploadImage($_FILES['image'], $imageDir);
    //                 if (!$imagePath) {
    //                     echo "Image upload failed.";
    //                     exit();
    //                 }
    //             }
    //             // dd($imagePath);
    //             //  else {
    //                 // $imagePath = $product['image'];
    //             // }
        
    //             $data = [
    //                 'name' => $name,
    //                 'price' => $price,
    //                 'category_id' => $category_id,
    //                 'image' => $imagePath
    //             ];
    //             dd($id);
    //             if (Product::edit($id, $data)) {
    //                 header("Location: /product");
    //                 exit();
    //             } else {
    //                 echo "Product update failed.";
    //             }
    //         } else {
    //             echo "Please fill in all required fields.";
    //         }
    //     }
     

   
    //     public function createCategory(){
    //     return view('createCategory','CategoryCreation');
    // }

    // public function deleteProduct(){
    
    //     if(isset($_POST['id'])){
        
    //         $id = $_POST['id'];
    //         if (Product::delete($id)) {
    //             header("Location: /");
    //             exit(); 
    //         } 
    //     }
    // }
}

?>