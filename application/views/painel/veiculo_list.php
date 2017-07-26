 <?php $this->view('templates/panel_template/navigation'); ?>

 <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Veículos</h1>
        </div>
        <div class="col-lg-12">
            <h4>Conheça Nossos Veículos</h4> 
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
    <div class="tab-content">
      <div class="tab-pane active" id="allusers" role="tabpanel">
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-8">Lista de todos os veículos disponíveis</div>
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

                                    </tr>
                                </thead>
                                <tbody>


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
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo anchor('painel/veiculo/adicionar', 'Novo Veículo', array('class' => 'btn btn-primary')); ?>
        <a href="javascript:window.history.go(-1);" class="btn btn-default">Voltar</a>
    </div>
</div>
</div>
</div>
        <!-- /#page-wrapper -->