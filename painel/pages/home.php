<?php $usuariosOnline = Painel::listarUsuariosOnline();
     
     $pegavisitasTotal = MySql::conectar()->prepare("SELECT * FROM `tb-admin_visitas`");
     $pegavisitasTotal->execute();
     $pegavisitasTotal = $pegavisitasTotal->rowCount();
     
     $date = date('Y-m-d');
     $pegavisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb-admin_visitas` WHERE dia = '$date'");
     $pegavisitasHoje->execute();
     $pegavisitasHoje = $pegavisitasHoje->rowCount();

     $usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin_users`");
     $usuariosPainel ->execute();
     $usuariosPainel  = $usuariosPainel ->fetchAll();
?>
        <div class="box-content  w100">
                <h2>Painel de controle -   <?php echo NOME_EMPRESA ?></h2>              
                <div class="box-metricas">
                    <div class="box-metrica-single">
                        <div class="box-metrica-wraper">
                            <h2>Usuários Online No Site</h2>
                            <p><?php echo count($usuariosOnline)?></p>   
                        </div>
                    </div><!--box-metrica-single-->
                </div><!--box-metricas-->

                <div class="box-metricas">
                    <div class="box-metrica-single">
                        <div class="box-metrica-wraper">
                            <h2>Total de Visitas</h2>
                             <p><?php echo $pegavisitasTotal?></p>   
                        </div>
                    </div><!--box-metrica-single-->
                </div><!--box-metricas-->

                <div class="box-metricas">
                    <div class="box-metrica-single">
                        <div class="box-metrica-wraper">
                            <h2>Visitas Hoje</h2>
                             <p><?php echo $pegavisitasHoje?></p>   
                        </div>
                    </div><!--box-metrica-single-->
                </div><!--box-metricas-->
                <div class="clear"></div>
        </div><!--box-content-->
        
        <div class="box-content  w100 left">
        <h2>Usuários online</h2>
                <div class="table-reponsive">
                    <div class="row">
                        <div class="col">
                            <span>IP</span>
                        </div><!--col-->
                        <div class="col">
                            <span>Última Ação</span>
                        </div><!--col-->
                        <div class="clear"></div>
                    </div><!--row-->
                    <?php
                         foreach ($usuariosOnline as $key => $value) {
                   ?>
                    <div class="row">
                        <div class="col">
                            <span><?php echo $value['ip'];?></span>
                        </div><!--col-->
                        <div class="col">
                            <span><?php echo date('Y/m/d H:i:s',strtotime($value['ultima_acao']));?></span>
                        </div><!--col-->
                        <div class="clear"></div>
                    </div><!--row-->
                    <?php
                        }
                    ?>
            </div><!--table-responsive-->
        </div><!--box-content-->

        <div class="box-content  w100 left">
        <h2>Usuários do Painel</h2>
                <div class="table-reponsive">
                    <div class="row">
                        <div class="colP">
                            <span>Nome</span>
                        </div><!--col-->

                        <div class="colP">
                            <span>E-mail</span>
                        </div><!--col-->
                        <div class="colP">
                            <span>Cargo</span>
                        </div><!--col-->
                        <div class="clear"></div>
                    </div><!--row-->
                    <?php
                         foreach ($usuariosPainel as $key => $value) {
                   ?>
                    <div class="row">
                        <div class="colP">
                            <span><?php echo $value['nome'];?></span>
                        </div><!--col-->
                        <div class="colP">
                            <span><?php echo $value['email'];?></span>
                        </div><!--col-->
                        <div class="colP">
                            <span><?php echo pegaCargo($value['cargo']);?></span>
                        </div><!--col-->
                        <div class="clear"></div>
                    </div><!--row-->
                    <?php
                        }
                    ?>
            </div><!--table-responsive-->
        </div><!--box-content-->
        <div class="clear"></div>
    