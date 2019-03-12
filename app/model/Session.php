<?php


class Session
{
    public  static  function sessioninit(){
      session_start();

    }
    public  static function set($key,$value){

        $_SESSION[$key] = $value;
    }
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        else{
            return false;
        }
    }
    public static function checkSession(){
        self::sessioninit();
        if(self::get("login") == false){
           self::sessionDestroy();
        }
    }

    public static function checkLogin(){
        self::sessioninit();
        if(self::get("login") == true){
            header("Location:index.php");
        }
    }

    public static function checkCustomerSession(){
        self::sessioninit();
        if(self::get("customerlogin") == false){
            self::sessionDestroy();
        }
    }




    public static function checkLoginforCustomer(){
        self::sessioninit();
        if(self::get("customerlogin") == true){
            echo "<script>window.location = 'index.php';</script>";
        }
    }

    public static function checkCustomerSessionLog(){
        self::sessioninit();
        if(self::get("customerlogin") == false){
            echo "<script>window.location = 'signin.php';</script>";
        }
    }



    public static function checkAdminSession(){
        self::sessioninit();
        if(self::get("adminlogin") == false){
            self::sessionDestroy();
        }
    }




    public static function checkLoginforAdmin(){
        self::sessioninit();
        if(self::get("adminlogin") == true){
            header("Location:index.php");
        }
    }


    public static function sessionDestroy(){

        session_destroy();
        echo "<script>window.location = 'index.php';</script>>";
    }
}