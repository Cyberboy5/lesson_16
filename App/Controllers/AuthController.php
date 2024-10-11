<?php
namespace App\Controllers;

use App\Helpers\Auth;
use App\Model\Model;

class AuthController{


    public function login_page(){
        return view('auth/login','Login Page');
    }
    
    public function login(){
        //    dd($_POST);
        $data = [
        'email'=> $_POST['email'],
        'password' => $_POST['password']
            ];

        $users = Auth::get_user($data);
        // dd($users);
        if($users){
            header("Location: /");
        }else{
            $_SESSION['messege'] = 'Error while Logging User In ';
            header("Location: /login");
        }
    }

    public function register_page(){
        return view('auth/register','Register Page');
    }

    public function register(){
        // dd($_POST);
        $data = [
            'name' => $_POST['name'],
            'email'=> $_POST['email'],
            'password' => $_POST['password'],
        ];
        // dd($data);
        if(Model::register_user($data)){
            $_SESSION['auth'] = Model::get_user($data)[0];
            header("Location: /");
        }else{
            $_SESSION['messege'] = 'Error while Registering User';
            header("Location: /login");
        }
    }

    public function logout(){

        Auth::logout();
        header("Location: /login");
        }

}



?>