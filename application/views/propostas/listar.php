<?php $this->load->view('header') ?>

<?php $this->load->view('common/navbar') ?>

<?php $this->load->view('common/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Meus Orçamentos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Propostas</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 600px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Data</th>
                      <th>Cliente</th>
                      <th>Vendedor</th>
                      <th>Equipamentos</th>
                      <th>Opções</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($propostas AS $proposta){?>
                    <tr>
                      <td><?=$proposta->identificacao?></td>
                      <td><?=date('d/m/Y \à\s H:i:s', strtotime($proposta->dataCadastro))?></td>
                      <td><?=$proposta->cliente_nome?></td>
                      <td><?=$proposta->vendedor_nome?></td>
                      <td><?=$proposta->equipamento_nome?></td>
                      <td>
                      <div class="btn-group">
                          <button type="button" class="btn btn-default">Opções</button>
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                          <a class="dropdown-item" href="<?=base_url('propostas/visualizar/'.base64_encode($proposta->id))?>">Visualizar</a>
                          <a class="dropdown-item" href="<?=base_url('propostas/editar/'.base64_encode($proposta->id))?>">Editar</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item bg-danger" href="<?=base_url('propostas/deletar/'.base64_encode($proposta->id))?>" 
                          onclick="return confirm('Tem certeza que deseja remover esta proposta, esta ação não é reversível.')">Remover</a>
                          </div>
                      </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('footer') ?>