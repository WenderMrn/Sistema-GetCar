<div id="wrapper">

        <?php $this->view('templates/panel_template/navigation'); ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ponto de Locação</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php if(validation_errors()): ?>
                <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
            <?php endif; ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Preencha os dados do Ponto de locação abaixo.
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <?php echo form_open('ponto_controller/ponto_add_post'); ?>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Responsável</label><br>
                                            <span><?php echo $this->session->admin['nome']; ?></span>
                                        </div>

                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input class="form-control" name="nome" id="nome" value="<?php echo isset($nome)? $nome : '' ?>">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <input class="form-control" name="endereco" id="endereco" value="<?php echo isset($endereco)? $endereco : '' ?>">
                                        </div>

                                        <div class="row">
                                        <div class="col-lg-12 ">
                                            <div class="form-group">
                                                <?php echo form_submit('btn_add_ponto', 'Cadastrar', array('class' => 'btn btn-primary')); ?>       
                                                    <a href="javascript:window.history.go(-1);" class="btn btn-default">Cancelar</a>
                                            </div>
                                        </div>
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