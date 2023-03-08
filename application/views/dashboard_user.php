<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <h3>Minha Clínica</h3>
      <hr>
      <ul class="list-group">
        <li class="list-group-item"><a href="#">Dados da Clínica</a></li>
        <li class="list-group-item"><a href="#">Agenda</a></li>
        <li class="list-group-item"><a href="#">Pacientes</a></li>
        <li class="list-group-item"><a href="#">Financeiro</a></li>
      </ul>
    </div>
    <div class="col-md-9">
      <?php if ($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success_msg'); ?>
        </div>
      <?php endif; ?>
      <h3>Dashboard <?php echo $name; ?></h3>

      <hr>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total de Pacientes</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">Ver detalhes</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total de Agendamentos</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">Ver detalhes</a>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total de Faturamento</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">Ver detalhes</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total de Despesas</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">Ver detalhes</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$( '.container-fluid' ).ready(function() {
       	alert( "<?=$name; ?>" );
    });
</script>
