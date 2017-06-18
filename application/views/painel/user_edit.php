<div id="wrapper">

        <?php $this->view('templates/panel_template/navigation'); ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Usuário</h1>
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
                            Edite os dados do usuário abaixo.
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <?php echo form_open('painel_controller/user_edit_post', '', array('id' => $id)); ?>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nome Completo</label>
                                            <input class="form-control" name="nome" id="nome" value="<?php echo isset($nome)? $nome : '' ?>">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input class="form-control formataCPF" maxlength="14" name="cpf" id="cpf" value="<?php echo isset($cpf)? $cpf : '' ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <input class="form-control" name="endereco" id="endereco" value="<?php echo isset($endereco)? $endereco : '' ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>CEP</label>
                                            <input class="form-control formataCEP" name="cep" id="cep" maxlength="10" value="<?php echo isset($cep)? $cep : '' ?>">
                                        </div>
                                        
                                        
                                    </div>
                                
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>Cartão de Crédito</label>
                                            <input class="form-control" name="cartao_credito" id="cpf" value="<?php echo isset($cartao_credito)? $cartao_credito : '' ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo isset($email)? $email : '' ?>">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input type="password" name="senha" id="senha" class="form-control">
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <div class="form-group">
                                                <?php echo form_submit('btn_edit_admin', 'Salvar', array('class' => 'btn btn-primary')); ?>
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