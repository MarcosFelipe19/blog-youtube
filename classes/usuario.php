<?php 
    class Usuario{
        public static function atualizarUsuario($nome,$senha,$imagem){
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin_users` SET nome = ?, senha = ?, img = ? WHERE nome = ?");
            if($sql->execute(array($nome,$senha,$imagem,$_SESSION['nome']))){
                return true;
            }else{
                return false;
            }
        }

        public static function userExists($email){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_users` WHERE email = ?");
            $sql->execute(array($email));
            if($sql->rowCount() == 1){
                return true;
            }else {
                return false;
            }
        }

        
        public static function cadastrarUsuario($nome,$email,$senha,$cargo,$imagem){
            $sql = MySql::conectar()->prepare("INSERT INTO  `tb_users` VALUES(NULL, ?, ?, ?, ?, ?)");
            $sql->execute(array($nome,$email,$senha,$cargo,$imagem));
        }
    }
?>