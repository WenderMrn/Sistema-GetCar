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
                <?php if($this->session->flashdata('errors')): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('errors'); ?></div>
                <?php endif; ?>
            </div>

            <div class="row">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item active">
                    <a class="nav-link" data-toggle="tab" href="#allusers" role="tab">Todos os Usuários</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#pendentusers" role="tab">Usuários Pendentes</a>
                  </li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane active" id="allusers" role="tabpanel">
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
                                                    <th>Situação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($usuarios as $row): ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo anchor('painel/usuarios/' . $row['id'], $row['nome']); ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['cpf']; ?></td>
                                                        <td>
                                                            <?php if($row['aprovado'] == 0): ?>
                                                                <span class="label label-warning">Aprovação pendente</span>
                                                            <?php elseif($row['aprovado'] == 1): ?>
                                                                <span class="label label-success">Aprovado</span>
                                                            <?php else: ?>
                                                                <span class="label label-danger">Aprovação negada</span>

                                                            <?php endif; ?>
                                                            
                                                        </td>
                                                        
                                                    </tr>

                                                <?php endforeach; ?>
                                                
                                            </tbody>
                                        </table>
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
                  <div class="tab-pane" id="pendentusers" role="tabpanel">
                      <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-8">Lista os usuários pendentes de aprovação</div>
                                        <div class="col-lg-4">
                                            <!-- <input type="text" name="pesquisa" id="pesquisa_pendente" class="form-control" placeholder="Pesquisar"> -->
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
                                        <table id="user_pending" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nome</th>
                                                    <th>Email</th>
                                                    <th>CPF</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($usuarios_pendentes as $row): ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo anchor('painel/usuarios/' . $row['id'], $row['nome']); ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['cpf']; ?></td>
                                                        <td>
                                                            <?php echo anchor('painel/usuarios/aprovar/'.$row['id'], 'Aprovar', array('class' => 'btn btn-success')); ?>
                                                            <?php echo anchor('painel/usuarios/negar/'.$row['id'], 'Negar', array('class' => 'btn btn-danger')); ?>
                                                            
                                                        </td>
                                                        
                                                    </tr>

                                                <?php endforeach; ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
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
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?php echo anchor('painel/usuarios/adicionar', 'Novo Usuário', array('class' => 'btn btn-primary')); ?>
                    </div>
                </div>

            </div>
            
            
            
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
                        $("#user_result > tbody").html("<tr><td colspan='5' class='text-center'>Nenhum resultado encontrado para essa pesquisa.</td></tr>");
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
                            if(elemento['aprovado'] == 0){
                               tr.append('<td><span class="label label-warning">Aprovação pendente</span></td>');
                            }else if(elemento['aprovado'] == 1){
                               tr.append('<td><span class="label label-success">Aprovado</span></td>');
                            }else{
                               tr.append('<td><span class="label label-danger">Aprovação negada</span></td>');
                            }
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