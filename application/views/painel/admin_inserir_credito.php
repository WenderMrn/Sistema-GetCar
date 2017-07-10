<div id="wrapper">

        <?php $this->view('templates/panel_template/navigation'); ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Inserir Crédito</h1>
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
                                <?php echo form_open('painel_controller/credito_add_post'); ?>
                                    <div class="col-lg-6">
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input class="form-control formataCPF" maxlength="14" name="cpf" id="cpf" value="<?php echo isset($cpf)? $cpf : '' ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Valor</label>
                                            <input type="text" class="form-control" name="valor" id="valor" value="">
                                        </div>
  
                                    </div>
                                    
                                
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <label>Nome do usuário</label>
                                            <input type="text" class="form-control" name="nome" id="nome" value="<?php echo isset($nome)? $nome : '' ?>">
                                        </div>
                                     
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo form_submit('btn_add_credio', 'Creditar', array('class' => 'btn btn-primary')); ?>  
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
    window.onload = function(e){
        
        $("#cpf").keyup(function(evento) {
           var cpf = $(this).val();
           var user_id = $("#user_id").val();
           var valor = $("#valor").val();

           if(cpf.length == 14){
               $.ajax({
                    url: '<?php echo site_url("painel/get_user_to_credit"); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {cpf: cpf},
                })
                .done(function(json) {
                    if(json["user_id"]){
                        $("#user_id").val(json["user_id"]);
                        $("#nome").val(json["nome"]);
                    }
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
           }
        });
        
    }

</script>