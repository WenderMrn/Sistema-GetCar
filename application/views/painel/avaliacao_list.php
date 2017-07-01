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
            </div>
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de todas as avaliações
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Usuário</th>
                                            <th>Nível de satisfação</th>
                                            <th>Comentário</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($avaliacoes as $row): ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td>
                                                	<?php 
                                                		foreach ($usuarios as $usuario) {
                                                			if( $usuario['id'] == $row['usuario_id']){
                                                				echo anchor('painel/usuarios/' . $usuario['id'], $usuario['nome']);
                                                				
                                                			}
                                                		}
                                                	?>
                                                </td>
                                                <td><?php echo $row['satisfacao']; ?></td>
                                                <td><?php echo $row['comentario']; ?></td>
                                                
                                            </tr>

                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
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