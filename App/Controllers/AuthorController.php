<?php
namespace App\Controllers;

use App\Model\Author;

class AuthorController{

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
    
}
?>