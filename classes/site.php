<?php

    class Site{

        public static function updateUsuarioOnline(){
            
            if(isset($_SESSION['online'])){
                $token = $_SESSION['online'];
                $horaAtual = date('Y-m-d H:i:s');
                $check = mySql::conectar()->prepare("SELECT id FROM `tb_admin_online`  WHERE  token = ?");
                $check->execute(array($token));
                
                if($check->rowCount() >= 1){
                    $sql = MySql::conectar()->prepare("UPDATE `tb_admin_online` SET ultima_acao = ? WHERE  token = ?");
                    $sql->execute(array($horaAtual,$token));
                }else{
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $token = $_SESSION['online'];
                    $horaAtual = date('Y-m-d H:i:s');
                    $sql = MySql::conectar()->prepare("INSERT INTO tb_admin_online VALUES (NULL,?,?,? )");
                    $sql->execute(array($ip,$horaAtual,$token)); 
                }

            }else{
                $_SESSION['online'] = uniqid();
                $ip = $_SERVER['REMOTE_ADDR'];
                $token = $_SESSION['online'];
                $horaAtual = date('Y-m-d H:i:s');
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin_online` VALUES (NULL,?,?,?)");
                $sql->execute(array($ip,$horaAtual,$token)); 
            }
        }

        public static function contador(){
         
            if(!isset($_COOKIE['visita'])){
                setcookie('visita','true',time() + (60*60*24*1));
                $sql = MySql::conectar()->prepare("INSERT INTO `tb-admin_visitas` VALUES(NULL,?,?)");
                $sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d'))) ;
            }
        }
    }

?>  