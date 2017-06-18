<div id="wrapper">

        <?php $this->view('templates/panel_template/navigation'); ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Administrador</h1>
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
                        <div class="panel-heading">
                            Informações do administrador.
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="text-center"><strong><?php echo $nome; ?></strong></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12"><strong>Email: </strong><?php echo $email; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12"><strong>CPF: </strong><?php echo $cpf; ?></div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-12">
                                    <?php echo anchor('painel/administradores/editar/' . $id, 'Editar', array('class' => 'btn btn-primary')); ?>
                                    <?php echo anchor('painel/administradores/deletar/' . $id, 'Excluir', array('class' => 'btn btn-danger')); ?>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
</div>
