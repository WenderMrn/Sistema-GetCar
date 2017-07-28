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
   <!-- <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item <?php ($this->uri->segment(3)!='me')?'active':''; ?>">
            <a class="nav-link" href="<?php echo base_url("painel/veiculos"); ?>">Todos Veículos</a>
        </li>
        <li class="nav-item <?php ($this->uri->segment(3)=='me')?'active':''; ?>">
            <a class="nav-link" href="<?php echo base_url("painel/veiculos/me"); ?>">Meus Veículos</a>
        </li>
    </ul> -->
<div class="tab-content">
  <div class="tab-pane active" id="todos_veiculos" role="tabpanel">
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
                    <?php foreach ($veiculos as $veiculo): ?>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="<?php echo base_url('/assets/img/default-car'); ?>" class="img-responsive" height="120" alt="carro exemplo">
                                    </div>
                                    <div class="col-md-6">
                                        <dl>
                                          <dt>Marca</dt>
                                          <dd> <?php echo $veiculo->getMarca(); ?></dd>
                                      </dl>
                                  </div>
                                  <div class="col-md-6">
                                    <dl>
                                      <dt>Cor</dt>
                                      <dd><?php echo $veiculo->getCor(); ?></dd>
                                  </dl>
                              </div> 
                          </div>
                          <div class="row">
                             <div class="col-md-6">
                                <dl>
                                    <dt>Modelo</dt>
                                    <dd><?php echo $veiculo->getModelo(); ?></dd>
                                    <dl>
                                    </div>
                                    <div class="col-md-6">
                                        <dl>
                                            <dt>Nº Portas</dt>
                                            <dd><?php echo $veiculo->getPortas(); ?></dd>
                                            <dl>
                                            </div> 
                                        </div>
                                        <p><?php echo anchor('#' . $veiculo->getId(), 'Visualizar', array('class' => 'btn btn-primary')); ?>
                                            <?php echo anchor('#', 'Deletar', 
                                                array(
                                                    'class' => 'btn btn-danger',
                                                    'data-id-avaliacao' =>  $veiculo->getId(),
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#deleteAvaliacao')); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php echo anchor('painel/veiculo/adicionar', 'Novo Veículo', array('class' => 'btn btn-primary')); ?>
                                        <?php echo anchor('dashboard', 'Voltar', array('class' => 'btn btn-default')); ?>
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
        </div>
  </div>
</div>
        <!-- /#page-wrapper -->