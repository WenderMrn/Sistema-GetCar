<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <?php if($this->session->flashdata('error_login')): ?>
                            <div class="alert alert-danger"><i class="fa fa-info-circle" aria-hidden="true"></i> 
                                <?php echo $this->session->flashdata('error_login'); ?>
                            </div>
                        <?php endif; ?>
                        <?php echo form_open('autenticacao/validar_login'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <?php echo form_input(
                                                        array(
                                                                'class' => 'form-control', 
                                                                'placeholder' => 'Email',
                                                                'name' => 'email',
                                                                'type' => 'email',
                                                                'autofocus' => 'true'
                                                            )
                                                );
                                    ?>


                                    
                                </div>
                                <div class="form-group">
                                    <?php echo form_password(
                                                        array(
                                                                'class' => 'form-control', 
                                                                'placeholder' => 'Senha',
                                                                'name' => 'senha',
                                                             )
                                                );
                                    ?>
                                    
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <?php echo form_checkbox(
                                                            array(
                                                                'name' => 'remember',
                                                                'value' => 'remember'
                                                            )
                                                    ); 
                                        ?>
                                        Lembrar-me
                                    </label>
                                </div>
                                <?php echo form_submit(
                                                array(
                                                    'class' => 'btn btn-lg btn-success btn-block',
                                                    'name' => 'btn_login',
                                                    'value' => 'Entrar'
                                                    )
                                            ); 
                                ?>
                                
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>