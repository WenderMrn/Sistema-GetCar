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
                                                echo ' <td>'.$ponto['id'].'</td>';
                                                echo ' <td>'.$ponto['nome'].'</td>';
                                                echo ' <td>'.$this->session->admin['nome'].'</td>';
                                                echo ' <td>'.$ponto['endereco'].'</td>';
                                                echo '<td class="text-center">';
                                                echo anchor('', 'Ver', array('class' => 'btn btn-primary'));
                                                echo '&nbsp';
                                                echo anchor('', 'Ediar', array('class' => 'btn btn-primary'));
                                                 echo '&nbsp';
                                                echo anchor('', 'Deletar', array('class' => 'btn btn-danger'));
                                                echo '</td>';
                                                echo '</tr>';
                                         } ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="row">
                                    <div class="col-lg-12">
                                        <?php echo anchor('painel/administradores/adicionar', 'Novo Administrador', array('class' => 'btn btn-primary')); ?>
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

