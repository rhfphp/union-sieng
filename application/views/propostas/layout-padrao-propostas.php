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
              <li class="breadcrumb-item"><a href="<?=base_url('propostas')?>">Propostas</a></li>
              <li class="breadcrumb-item active">Nova Proposta</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <form action="#" method="post" class="card-body">
          
          <table class="table table-bordered">
            <tbody>
            <tr>
              <td>Equipamento</td>
              <td>
              <select class="custom-select form-control-border" id="select_equipamento" required ">
                <option>Selecione</option>

                <?php foreach($equipamentos AS $equipamento){ ?>
                <option value="<?=$equipamento->id?>"><?=$equipamento->nome?></option>
                <?php } ?>
              </select>
              </td>
              
            </tr>
            </tbody>
            <tbody>
            <tr>
              <td>Potência do UPS (kVA)</td>
              <td>
              <div class="input-group mb-3">
                  <input type="number" class="form-control" require>
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                  </div>
                </div>
              </td>

              </tr>
            </tbody>
            <tbody>
            <tr>
              <td>Fator de potência aplicado a carga</td>
              <td>
              <div class="input-group mb-3">
                  <input type="number" class="form-control" require>
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                  </div>
                </div>
              </td>
              
            </tr>
            </tbody>
            <tbody>
            <tr>
              <td>Rendimento</td>
              <td>
              <div class="input-group mb-3">
                  <input type="number" class="form-control" readonly>
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                  </div>
                </div>
              </td>
              
            </tr>
            </tbody>

            <tbody>
            <tr>
              <td>Número de baterias</td>
              <td>
              <select class="custom-select form-control-border" required>
                <option>Selecione</option>

                <?php foreach($banco_baterias AS $banco_bateria){ ?>
                <option value="<?=$banco_bateria->equipamento?>"><?=$banco_bateria->quantidade?></option>
                <?php } ?>

              </select>
              </td>
              
            </tr>
            </tbody>
          </table>
          
        </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

<?php $this->load->view('footer') ?>
<script type="text/javascript">
$(document).ready(function(){
  $('#select_equipamento').on('change', function(){
    var valor = $(this).val();
    $('#select_equipamento').load('Propostas/listar_banco_baterias/' + valor);
  });
});
  
</script>

<?php if($alterado_com_sucesso){ ?>
    <link rel="stylesheet" href="<?=base_url('assets/plugins/toastr/toastr.min.css')?>">
    <script src="<?=base_url('assets/plugins/toastr/toastr.min.js')?>"></script>
    <script type="text/javascript">
      $(document).Toasts('create', {
          class: 'bg-success',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    </script>


 <?php } ?>