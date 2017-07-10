<div id="wrapper">

        <?php $this->view('templates/panel_template/navigation'); ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ponto De Locação</h1>
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
                                <div class="col-md-8">
                                    <div class="row">
                                    <div class="col-lg-12"><strong>Nome</strong><br><?php echo $ponto->getNome(); ?></div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-lg-12"><strong>Endereço </strong><br><?php echo $ponto->getEndereco(); ?></div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-lg-12"><strong>Veículos </strong><br>...</div>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="row">
                                            <div class="col-lg-12"><strong>Responsável </strong><br><?php echo $this->session->admin['nome']; ?></div>
                                        </div>
                                </div>
                            </div>
                            
                            
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="row">
                                <div class="col-lg-12">
                                    <?php echo anchor('painel/pontos/adicionar', 'Novo ponto de locação', array('class' => 'btn btn-primary')); ?>
                                    <?php 
                                        echo anchor('#', 'Deletar', 
                                                        array(
                                                        'class' => 'btn btn-danger',
                                                        'data-id-ponto' =>  $ponto->getId(),
                                                        'data-nome-ponto' =>  $ponto->getNome(),
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#deletePonto'));
                                     ?>
                                    <a href="javascript:window.history.go(-1);" class="btn btn-default">Voltar</a>
                                </div>
                                
                            </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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