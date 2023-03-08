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
              <select class="custom-select form-control-border" required>
                <option>Selecione</option>

                <?php foreach($equipamentos AS $equipamento){ ?>
                <option value="<?=$equipamento->id?>"><?=$equipamento->nome?></option>
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