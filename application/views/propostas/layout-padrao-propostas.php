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

        <form action="#" method="GET" class="card-body">
          
          <table class="table table-bordered">
            <tbody>
            <tr>
              <td>Equipamento</td>
              <td>
              <select name="equipamento" class="custom-select form-control-border" onchange="form_submit(this)">
                  <option>Selecione</option>
                  <?php foreach($equipamentos AS $equipamento){ ?>
                      <option value="<?=$equipamento->id?>" <?php if($this->input->get('equipamento') == $equipamento->id){echo'selected';}?>><?=$equipamento->nome?></option>
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
                  <input name="potencia" type="number" value="<?=$this->input->get('potencia') ?>" onblur="form_submit(this)" class="form-control">
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
                  <input name="fator_potencia" value="<?=$this->input->get('fator_potencia') ?>" onblur="form_submit(this)" type="number" class="form-control">
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
                  <input name="rendimento" value="<?=$equipamento_select->rendimento?>" onblur="form_submit(this)" type="number" class="form-control" readonly>
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
              <select name="numero_de_baterias" onchange="form_submit(this)" class="custom-select form-control-border">
                <option>Selecione</option>

                <?php foreach($quantidade_de_baterias AS $qdb){ ?>
                  <option value="<?=$qdb->quantidade?>" <?php if($this->input->get('numero_de_baterias') == $qdb->quantidade){echo'selected';}?>><?=$qdb->quantidade?></option>
                <?php } ?>
              </select>
              </td>
              
            </tr>
            </tbody>

            <tbody>
            <tr>
              <td>Tensão final de descarga</td>
              <td>
              <select name="tensao_final_de_carga" onchange="form_submit(this)" class="custom-select form-control-border">
                <option>Selecione</option>

                <?php foreach($filtro_tensao_de_carga AS $tensao_carga){ ?>
                  <option value="<?=$tensao_carga->valor?>" <?php if($this->input->get('tensao_final_de_carga') == $tensao_carga->valor){echo'selected';}?>><?=$tensao_carga->valor?></option>
                <?php } ?>
              </select>
              </td>
              
            </tr>
            </tbody>

            <tbody>
            <tr>
              <td>Autonomia</td>
              <td>
              <select name="autonomia" onchange="form_submit(this)" class="custom-select form-control-border">
                <option>Selecione</option>

                <?php foreach($filtro_autonomia AS $autonomia){ ?>
                  <option value="<?=$autonomia->valor?>" <?php if($this->input->get('autonomia') == $autonomia->valor){echo'selected';}?>><?=$autonomia->valor?></option>
                <?php } ?>
              </select>
              </td>
              
            </tr>
            </tbody>

            <tbody>
            <tr>
              <td>Fator de envelhecimento</td>
              <td>
              <select name="fator_de_envelhecimento" onchange="form_submit(this)" class="custom-select form-control-border">
                <option>Selecione</option>

                <?php foreach($filtro_fator_de_envelhecimento AS $envelhecimento){ ?>
                  <option value="<?=$envelhecimento->valor?>" <?php if($this->input->get('fator_de_envelhecimento') == $envelhecimento->valor){echo'selected';}?>><?=$envelhecimento->valor?></option>
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

<script type="text/javascript">
function form_submit(t){
  //$('.preloader').css('height', '100%');
  //$('.animation__shake').show();
  t.form.submit();
}
</script>