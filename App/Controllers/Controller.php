<?php

namespace App\Controllers;

use App\Model\Author;
use App\Model\Genre;
use App\Model\Book;

class Controller{

    public function __construct()
    {
        if(!check()){
            header("Location: /login");
        }        
    }
    public function author() {
        $authors = Author::getAll();
        return view('author/author','Author Page',$authors);
    }
    
    public function genre(){
        $genres = Genre::getAll();       
        return view('genre/genre','Genre Page',$genres);
    }

    public function book(){
        $books = Book::get_books();
        return view('book/book','Book Page',$books);
    }

}

?>