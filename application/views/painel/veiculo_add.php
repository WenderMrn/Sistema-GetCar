<div id="wrapper">

    <?php $this->view('templates/panel_template/navigation'); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Adicionar Veículo</h1>
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
                    Preencha abaixo os dados do Veículo.
                </div>

                <div class="panel-body">
                    <div class="row">
                        <?php echo form_open('veiculo_controller/veiculo_add_post'); ?>
                        <div class="col-lg-12">
                            <a href="">
                               <div class="col-lg-6"> 
                                   <!-- <img src="<?php echo base_url('/assets/img/default-car'); ?>" class="img-rounded" height="350" alt="carro exemplo">-->
                                   <div class="imagem-veiculo" style="background: url(<?php echo base_url('/assets/img/default-car'); ?>) no-repeat bottom center scroll;">
                                        Alterar Imagem
                                   </div>
                               </div>
                            </a>
                        </div>

                        <div class="col-lg-2">

                            <div class="form-group">
                                <label>Placa</label>
                                <input class="form-control placa-veiculo-mask" name="placa" id="placa" value="<?php echo isset($placa)? $placa : '' ?>">
                            </div>

                            <div class="form-group">
                                <label>Renavam</label>
                                <input class="form-control renavam-mask" name="renavam" id="renavam" value="<?php echo isset($renavam)? $renavam : '' ?>">
                            </div>

                        </div>
                        <div class="col-lg-3">    
                            <div class="form-group">
                                <label>Modelo</label>
                                <input class="form-control" name="modelo" id="modelo" value="<?php echo isset($modelo)? $modelo : '' ?>">
                            </div>

                            <div class="form-group">
                                <label>Categoria</label>
                                <select class="form-control" name="categoria" id="categoria" value="<?php echo isset($categoria)? $categoria : '' ?>">
                                    <option value"1">Hatch Compacto</option>
                                    <option value"2">Hatch Médio(ou H. Esport)</option>
                                    <option value"3">Sedan Compacto</option>
                                    <option value"4">Sedan Médio</option>
                                    <option value"5">Sedan Grande</option>
                                    <option value"6">Minivan</option>
                                    <option value"7">Perua</option>
                                    <option value"8">Picape</option>
                                    <option value"9">Utilitário</option>
                                    <option value"10">Esportivos</option>
                                </select>
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
                        <div class="col-lg-3"> 

                            <div class="form-group">
                                <label>Chassi</label>
                                <input class="form-control chassi-mask" name="chassi" id="chassi" value="<?php echo isset($chassi)? $chassi : '' ?>">
                            </div>

                            <div class="form-group">
                                <label>Portas</label>
                                <input class="form-control number-mask" name="portas" id="portas" value="<?php echo isset($portas)? $portas : '' ?>">
                            </div>

                        </div>

                        <div class="col-lg-2">

                            <div class="form-group">
                                <label>Ano</label>
                                <input type="date" class="form-control date-mask" name="ano" id="ano" value="<?php echo isset($ano)? $ano : '' ?>">
                            </div>

                            <div class="form-group">
                                <label>Ativo</label>
                                <select class="form-control" name="ativo" id="ativo" value="<?php echo isset($ativo)? $ativo : '' ?>">
                                    <option value"1">Sim</option>
                                    <option value"0">Não</option>
                                </select>
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
<script type="text/javascript">
   
</script>