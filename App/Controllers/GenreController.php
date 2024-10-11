<?php

namespace App\Controllers;

use App\Model\Genre;

class GenreController{

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
}
?>