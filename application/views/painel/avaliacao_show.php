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
                                                    
                                                    $resto = 5 - $avaliacao->getSatisfacao();
                                                    for ($i=0; $i < $avaliacao->getSatisfacao(); $i++) { 
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
                                                        
                                                              
                                        echo anchor('painel/usuarios/' . $avaliacao->getUsuario()->getId(), $avaliacao->getUsuario()->getNome());
                                                                
                                                           
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
                        		<p><?php echo $avaliacao->getComentario(); ?></p>
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


<div class="modal fade" id="deletePonto" tabindex="-1" role="dialog" aria-labelledby="deletePontoLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong class="modal-title"><i class="glyphicon glyphicon-trash"></i> Excluir</strong>
      </div>
      <div class="modal-body text-center">
        <?php echo form_open('ponto_controller/ponto_delete_post', array('id' => 'form_hidden_to_submit'), array('id' => '')); ?>
            Tem certeza que deseja excluir o ponto <strong></strong> ?
        <?php echo form_close(); ?>
        <hr>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
        <button type="button" class="btn btn-success btn_to_action_form">Sim</button>
      </div>
    </div>
  </div>
</div>
