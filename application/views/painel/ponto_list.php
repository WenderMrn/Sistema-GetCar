<div id="wrapper">
        <?php $this->view('templates/panel_template/navigation'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pontos de locação</h1>
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

           <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista dos meus pontos de locações
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Endereço</th>
                                            <th>Responsáveis</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                       <?php foreach ($pontos as $ponto) { 

                                                echo '<tr>';
                                                echo ' <td>'.$ponto->getId().'</td>';
                                                echo ' <td>'.$ponto->getNome().'</td>';
                                                echo ' <td>'.$ponto->getEndereco().'</td>';
                                                echo ' <td>'.$this->session->admin['nome'].'</td>';                                                
                                                echo '<td class="text-center">';
                                                echo anchor('painel/pontos/'. $ponto->getId(), 'Ver', array('class' => 'btn btn-primary'));
                                                echo '&nbsp';
                                                echo anchor('painel/pontos/editar/' . $ponto->getId(), 'Ediar', array('class' => 'btn btn-primary'));
                                                echo '&nbsp';
                                                echo anchor('#', 'Deletar', 
                                                        array(
                                                        'class' => 'btn btn-danger',
                                                        'data-id-ponto' =>  $ponto->getId(),
                                                        'data-nome-ponto' =>  $ponto->getNome(),
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#deletePonto'));
                                                echo '</td>';
                                                echo '</tr>';
                                         } ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="row">
                                    <div class="col-lg-12">
                                        <?php echo anchor('painel/pontos/adicionar', 'Novo ponto de locação', array('class' => 'btn btn-primary')); ?>
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
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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