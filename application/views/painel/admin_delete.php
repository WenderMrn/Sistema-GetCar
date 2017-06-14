<div id="wrapper">

        <?php $this->view('templates/panel_template/navigation'); ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Deletar Administrador</h1>
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
                            Confirme a exclusão do admin abaixo.
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="text-center">Você tem certeza que deseja excluir o admin <strong><?php echo $nome; ?></strong>?</h3>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-4 col-lg-offset-2"><button class="btn btn-success btn-lg btn-block btn_to_action_form">SIM</button></div>
                                <div class="col-lg-4"><?php echo anchor('painel/administradores', 'NÃO', array('class' => 'btn btn-danger btn-lg btn-block')); ?></div>
                            </div>
                            <?php echo form_open('painel_controller/admin_delete_post', array('id' => 'form_hidden_to_submit'), array('id' => $id)); ?>
                            <?php echo form_close(); ?>
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
