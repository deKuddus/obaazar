<?php

if(!isset( $_SESSION)) session_start();


class Message{

    public static function showMessage($message=NULL)
    {
        if (is_null($message)) {
            $_message = self::getMessage();
            return $_message;
        } else {
            self::setMessage($message);
        }
    }

    public static function setMessage($message){
        $_SESSION['message']=$message;

    }


    public static function getMessage(){

        if(isset($_SESSION['message'])) $_message= $_SESSION['message'];
        else $_message='';

        $_SESSION['message']="";

        return $_message;

    }

    public static function dd($data)
    {
        echo "<pre>";
        print_r($data);
        die;
    }


}