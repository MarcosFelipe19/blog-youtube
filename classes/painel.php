<?php 
/*arrumar parte de cadastro de videos*/ 
class  Painel
{
    public static $cargo = [
        '0'=>'Normal',
        '1'=>'Sub_administrador',
        '2'=>'Administrador'
    ];

    public static function logado(){
        if(isset($_SESSION['login'])){
            return true;
        }else{
            return false;
        }
    }

    public static function loggout(){
        session_destroy();
        setcookie('lembrar',true,time()-1,'/');
        header('Location:'.INCLUDE_PATH_PAINEL);    
    }

    public static function carregarPage(){
        if(isset($_GET['url'])){
            $url = explode('/',$_GET['url']);
            if(file_exists('pages/'.$url[0].'.php')){
                include('pages/'.$url[0].'.php');
            }else{
                header('Location:'.INCLUDE_PATH_PAINEL); 
            }
        }else{
            include('pages/home.php');
        }
    }
    public static function listarUsuariosOnline(){
        self::limparUsuariosOnline();
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin_online`");
        $sql->execute();
        return $sql->fetchAll();
    }
    public static function limparUsuariosOnline(){
        $date = date('Y-m-d H:i:s');
        $sql = MySql::conectar()->prepare("DELETE FROM `tb_admin_online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
        $sql->execute();
    }
    public static function alert($tipo,$mensagem){
        if($tipo == 'sucesso'){
            echo '<div class="box-alert sucesso"><img src="'.INCLUDE_PATH.'imagens/icones/icons8-check-mark-16.png">'.$mensagem.'</div>';
        }else{
            echo '<div class="box-alert  erro"><img src="'.INCLUDE_PATH.'imagens/icones/icons8-cancelar-16.png">'.$mensagem.'</div>';
        }
    }
    public static function imagemValida($imagem,$limiteSize){
        if($imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpg' || $imagem['type'] == 'image/png'|| $imagem['type'] == 'image/svg+xml'){
            
            $tamanho = $imagem['size']/1024;
            if($tamanho <= $limiteSize){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function uploadFile($file){
        $imagemFormato = explode('.',$file['name']);
        $imagemFormato[count($imagemFormato)-1];
        $imagemNome = uniqid().'.'.$imagemFormato[count($imagemFormato)-1];
        if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.' /uploads/'.$imagemNome)){
            return $imagemNome;   
        }else{
            return false;
        }
        
    }

    public static function delete($file){
        @unlink('uploads/'.$file);
    }
    public static function insert($arr){
        $certo = true;
        $nome_tabela = $arr['nome_tabela'];
        $sqlOrder= MySql::conectar()->prepare("SELECT * FROM `$nome_tabela` ORDER BY order_id DESC LIMIT 1");
        $sqlOrder->execute();
        if($sqlOrder->rowCount() >=1){
            $order_id = $sqlOrder->fetch();
            $order_id = $order_id['order_id'] + 1;
            $arr['order_id'] = $order_id;
        }else{
            $arr['order_id'] = 1;
        }
        $query = "INSERT INTO `$nome_tabela` VALUES(null";
        foreach ($arr as $key => $value) {
            $nome = $key;
            $valor= $value;
            if($nome == 'acao' || $nome == 'nome_tabela')
                continue;
            if($value == ''){
                $certo = false;
                break;
            }
            $query.=",?";
            $parametros[] = $value;
        } 
        $query.=")";
        if($certo == true){
            $sql = MySql::conectar()->prepare($query);
            $sql->execute($parametros);
        }
        return $certo;  
    }

    public static function update($arr){
        $certo = true;
        $first = false;
        $nome_tabela = $arr['nome_tabela'];
        $query = "UPDATE `$nome_tabela` SET ";
        foreach ($arr as $key => $value) {
            $nome = $key;
            $valor= $value;
            if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id' || $nome == 'img_atual')
                continue;
            if($value == ''){
                $certo = false;
                break;
            }
            if($first == false){
                $query.= $nome."=?";
                $first = true;
            }else{
                $query .= ",".$nome."=?";
            }
            $parametros[] = $value;
        } 
        if($certo == true){
            $parametros[] = $arr['id'];
            $sql = MySql::conectar()->prepare($query." WHERE id=?");
            $sql->execute($parametros);
        }
        return $certo;  
    }

    public static function selectAll($tabela,$start = null,$end = null,$order_id = null){
        if($start == null && $end == null){
            if($order_id == null){
                $sql = MySql::conectar()->prepare("SELECT *FROM `$tabela`"); 
            }else{
            $sql = MySql::conectar()->prepare("SELECT *FROM `$tabela` ORDER BY order_id ASC");
            }
        }else{
            $sql = MySql::conectar()->prepare("SELECT *FROM `$tabela` ORDER BY order_id ASC LIMIT $start,$end");
        }
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function deletar($tabela,$id = false){
        /*DELETAR A IMAGEM DO VÍDEO*/
        if($id == false){
            $sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
       }else{
            $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
        }
        $sql->execute();
    }

    public static function redirect($url){
        echo '<script>location.href="'.$url.'"</script>';
        die();
    }
    public static function select($tabela,$query,$arr){
        $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE $query");
        $sql->execute($arr);
        return $sql->fetch();
    }
    public static function orderItem($tabela,$orderType,$idItem){
        if($orderType == 'up'){
            
            $infoItemAtual = Painel::select($tabela,'id=?',array($idItem));
            $order_id = $infoItemAtual['order_id'];
            $itemBefore = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id < $order_id ORDER BY order_id DESC LIMIT 1");
            $itemBefore->execute(); 
            if($itemBefore->rowCount() == 0){
                return;
            }
            $itemBefore = $itemBefore->fetch();
            Painel::update(array('nome_tabela'=>$tabela,'id'=>$itemBefore['id'],'order_id'=>$infoItemAtual['order_id']));
            Painel::update(array('nome_tabela'=>$tabela,'id'=>$infoItemAtual['id'],'order_id'=>$itemBefore['order_id']));

        }else if($orderType == 'down'){
            $infoItemAtual = Painel::select($tabela,'id=?',array($idItem));
            $order_id = $infoItemAtual['order_id'];
            $itemBefore = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id > $order_id ORDER BY order_id ASC LIMIT 1");
            $itemBefore->execute(); 
            if($itemBefore->rowCount() == 0){
                return;
            }
            $itemBefore = $itemBefore->fetch();
            Painel::update(array('nome_tabela'=>$tabela,'id'=>$itemBefore['id'],'order_id'=>$infoItemAtual['order_id']));
            Painel::update(array('nome_tabela'=>$tabela,'id'=>$infoItemAtual['id'],'order_id'=>$itemBefore['order_id']));
        }
    }
}

?>