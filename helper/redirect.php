<?php
function redirect($path){
    $path=ROOT.$path;
    header("location:$path");
}
function mustlogin(){ //login hone k bd 
    if(!Session::get('logindtl')){
        redirect('users');
        exit;
    }
}
?>