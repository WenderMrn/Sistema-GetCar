<div id="wrapper">

        <?php $this->view('templates/panel_template/navigation'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Usuários</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
            </div>
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-lg-8">Lista de todos os usuários cadastrados</div>
                                <div class="col-lg-4">
                                    <input type="text" name="pesquisa" id="pesquisa" class="form-control" placeholder="Pesquisar">
                                </div>
                            </div>
                            
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row" style="margin: 5px;">
                                <div class="col-lg-6 col-lg-offset-6 text-right">
                                    
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="user_result" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>CPF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($usuarios as $row): ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo anchor('painel/usuarios/' . $row['id'], $row['nome']); ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['cpf']; ?></td>
                                                
                                            </tr>

                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="row">
                                    <div class="col-lg-12">
                                        <?php echo anchor('painel/usuarios/adicionar', 'Novo Usuário', array('class' => 'btn btn-primary')); ?>
                                    </div>
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script type="text/javascript">

    base_url_show = "<?php echo site_url('painel/usuarios/'); ?>";

    window.onload = function(e){
        $("input#pesquisa").keyup(function(event) {
                $.ajax({
                    url: '<?php echo site_url("painel/usuarios/pesquisar"); ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {'search': $(this).val()},
                })
                .done(function(result) {
                    // console.log(result);
                    $("#user_result > tbody").html("");
                    console.log(result.length);
                    if(result.length == 0){
                        $("#user_result > tbody").html("<tr><td colspan='4' class='text-center'>Nenhum resultado encontrado para essa pesquisa.</td></tr>");
                    }else{
                        $.each(result,function(index, elemento) {
                            // console.log(elemento['nome']);
                            var tr = $("<tr></tr>");
                            tr.append('<td>'+elemento['id']+'</td>');
                            var nome = $("<a href=''></a>");
                            nome.attr('href', base_url_show+elemento['id']);
                            nome.text(elemento['nome']);
                            tr.append('<td>'+nome.prop('outerHTML')+'</td>');
                            tr.append('<td>'+elemento['email']+'</td>');
                            tr.append('<td>'+elemento['cpf']+'</td>');
                            $("#user_result > tbody").append(tr);
                        });
                        
                    }
                    
                    
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            });
    }
       

    </script>