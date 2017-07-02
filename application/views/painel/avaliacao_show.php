<div id="wrapper">

        <?php $this->view('templates/panel_template/navigation'); ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Avaliação</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            <?php if(validation_errors()): ?>
                <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
            <?php endif; ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        	<div class="row">
                        		<div class="col-md-2">
                        			<h4>Satisfação</h4>
                        			<p class="avaliacao-star">
                                                    <?php 
                                                    $satisfacao =  $result['satisfacao'];
                                                    $resto = 5 - $satisfacao;
                                                    for ($i=0; $i < $satisfacao; $i++) { 
                                                        echo "<i class=\"glyphicon glyphicon-star\"></i>";
                                                    }

                                                    for ($i=0; $i < $resto; $i++) { 
                                                        echo "<i class=\"glyphicon glyphicon-star-empty\"></i>";
                                                    }
                                                    ?>
                                                </p>
                        		</div>
                        		<div class="col-md-9">
                        			<h4>Avaliado por</h4>
                        			<p><?php 
                                                        foreach ($usuarios as $usuario) {
                                                            if( $usuario['id'] == $result['usuario_id']){
                                                              
                                                                echo anchor('painel/usuarios/' . $usuario['id'], $usuario['nome']);
                                                                
                                                            }
                                                        }
                                                    ?></p>
                        		</div>
                        		<div class="col-md-1">
                        			<img src="<?php echo base_url('assets/img/computer.svg'); ?>" alt="Avaliação do sistema" class="img-av-sistema">
                        		</div>
                        	</div>
                        	<hr>
                        	<div class="row">
                        		<div class="col-md-12">	
                        		<h4>Comentário</h4>
                        		<p><?php echo $result['comentario']; ?></p>
                        		</div>
                        	</div>
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-md-12">
            		<a href="javascript:window.history.go(-1);" class="btn btn-default">Voltar</a></div>
            	</div>
            	
        </div>
        <!-- /#page-wrapper -->
</div>
