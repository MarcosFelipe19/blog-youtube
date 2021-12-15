<?php 

include('../config.php');

if(Painel::logado() == false){
    include('entrar.php');
}else{
    include('main.php');
}

?>