<div id="wrapper">

        <?php $this->view('templates/panel_template/navigation'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Avaliações</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                <?php if($this->session->flashdata('errors')): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('errors'); ?></div>
                <?php endif; ?>
            </div>

            <div class="row">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item active">
                    <a class="nav-link" data-toggle="tab" href="#av_sistema" role="tab">Sistema</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#av_veiculo" role="tab">Veículo</a>
                  </li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane active" id="av_sistema" role="tabpanel">
                      <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-8">Lista de todas as avaliações do sistema</div>
                                        
                                    </div>
                                    
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">

                                    <div class="row ">

                                        

                                        <?php foreach ($avaliacoes as $row): ?>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="thumbnail">
                                              
                                              <div class="caption">
                                                <h4>
                                                    <?php 
                                                        $user;
                                                        foreach ($usuarios as $usuario) {
                                                            if( $usuario['id'] == $row['usuario_id']){
                                                                $user = $usuario['nome'];
                                                            }
                                                        }
                                                        echo $user;
                                                    ?>
                                                </h4>
                                                <p class="avaliacao-star">
                                                    <?php 
                                                    $satisfacao =  $row['satisfacao'];
                                                    $resto = 5 - $satisfacao;
                                                    for ($i=0; $i < $satisfacao; $i++) { 
                                                        echo "<i class=\"glyphicon glyphicon-star\"></i>";
                                                    }

                                                    for ($i=0; $i < $resto; $i++) { 
                                                        echo "<i class=\"glyphicon glyphicon-star-empty\"></i>";
                                                    }
                                                    ?>
                                                </p>
                                                <p><?php echo $row['comentario']; ?></p>
                                                <p><?php echo anchor('painel/avaliacao/' . $row['id'], 'Visualizar', array('class' => 'btn btn-primary')); ?>
                                                    <?php echo anchor('#', 'Deletar', 
                                                        array(
                                                        'class' => 'btn btn-danger',
                                                        'data-id-avaliacao' =>  $row['id'],
                                                        'data-nome-user' =>  $user,
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#deleteAvaliacao')); ?>
                                                </p>
                                              </div>
                                            </div>
                                          </div>
                                        <?php endforeach; ?>
                                         
                                    </div>
                                  
                                    
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <div class="tab-pane" id="av_veiculo" role="tabpanel">
                      <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-8">Lista de todas as avaliações dos carros</div>
                                    </div>
                                    
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row" style="margin: 5px;">
                                        <div class="col-lg-6 col-lg-offset-6 text-right">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>

                

            </div>
            
            
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->




<div class="modal fade" id="deleteAvaliacao" tabindex="-1" role="dialog" aria-labelledby="deleteAvaliacaoLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong class="modal-title"><i class="glyphicon glyphicon-trash"></i> Excluir</strong>
      </div>
      <div class="modal-body text-center">
        <?php echo form_open('painel_controller/avaliacao_delete_post', array('id' => 'form_hidden_to_submit'), array('id' => '')); ?>
            Tem certeza que deseja excluir a avaliação de <strong></strong> ?
        <?php echo form_close(); ?>
        <hr>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
        <button type="button" class="btn btn-success btn_to_action_form">Sim</button>
      </div>
    </div>
  </div>
</div>
