<div id="wrapper">

        <?php $this->view('templates/panel_template/navigation'); ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Adicionar Administrador</h1>
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
                            Preencha os dados do administrador abaixo.
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <?php echo form_open('painel/admin_add_post'); ?>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input class="form-control" name="nome" id="nome" value="<?php echo isset($nome)? $nome : '' ?>">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input class="form-control" name="cpf" id="cpf" value="<?php echo isset($cpf)? $cpf : '' ?>">
                                        </div>

                                        <?php echo form_submit('btn_add_admin', 'Cadastrar', array('class' => 'btn btn-primary')); ?>
                                        
                                    </div>
                                
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo isset($email)? $email : '' ?>">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input type="password" name="senha" id="senha" class="form-control">
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