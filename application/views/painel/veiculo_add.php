<div id="wrapper">

        <?php $this->view('templates/panel_template/navigation'); ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Veículos</h1>
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
                            Preencha os dados do Veículo abaixo.
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <?php echo form_open('veiculo_controller/veiculo_add'); ?>
                                    <div class="col-lg-2">

                                        <div class="form-group">
                                            <label>Placa</label>
                                            <input class="form-control" name="placa" id="placa" value="<?php echo isset($placa)? $placa : '' ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Renavam</label>
                                            <input class="form-control" name="renavam" id="renavam" value="<?php echo isset($renavam)? $renavam : '' ?>">
                                        </div>

                                     </div>
                                     <div class="col-lg-2">    
                                        <div class="form-group">
                                            <label>Modelo</label>
                                            <input class="form-control" name="modelo" id="modelo" value="<?php echo isset($modelo)? $modelo : '' ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <input class="form-control" name="categoria" id="categoria" value="<?php echo isset($categoria)? $categoria : '' ?>">
                                        </div>

                                    </div>
                                    <div class="col-lg-2">     
                                        
                                        <div class="form-group">
                                            <label>Marca</label>
                                            <input class="form-control" name="marca" id="marca" value="<?php echo isset($marca)? $marca : '' ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Cor</label>
                                            <input class="form-control" name="cor" id="cor" value="<?php echo isset($cor)? $cor : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2"> 

                                        <div class="form-group">
                                            <label>Chassi</label>
                                            <input class="form-control" name="chassi" id="chassi" value="<?php echo isset($chassi)? $chassi : '' ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Portas</label>
                                            <input class="form-control" name="portas" id="portas" value="<?php echo isset($portas)? $portas : '' ?>">
                                        </div>

                                    </div>
                                    
                                    <div class="col-lg-3">
                                        
                                        <div class="form-group">
                                            <label>Ano</label>
                                            <input class="form-control" name="ano" id="ano" value="<?php echo isset($ano)? $ano : '' ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Ativo</label>
                                            <input class="form-control" name="ativo" id="ativo" value="<?php echo isset($ativo)? $ativo : '' ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-12">     
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