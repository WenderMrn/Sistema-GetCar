<div id="wrapper">

        <?php $this->view('templates/panel_template/navigation'); ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ponto de Locação</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            <?php if($this->session->flashdata('errors')): ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('errors'); ?></div>
            <?php endif; ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edite os dados do administrador abaixo.
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <?php echo form_open('ponto_controller/ponto_edit_post'); ?>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input class="form-control" name="nome" id="nome" value="<?php echo $ponto->getNome(); ?>">
                                            <input type="hidden" name="id" value="<?php echo $ponto->getId(); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <input class="form-control" name="endereco" id="endereco" value="<?php echo $ponto->getEndereco(); ?>">
                                        </div>
                                    
                                    </div>

                                    
                                        <div class="col-lg-12">
                                            
                                            <div class="form-group">
                                                <?php echo form_submit('btn_edit_user', 'Salvar', array('class' => 'btn btn-primary')); ?>
                                                <a href="javascript:window.history.go(-1);" class="btn btn-default">Voltar</a>
                                            </div>
                                           
                                           
                                        </div>
                                    
                                <?php echo form_close(); ?>
                                
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