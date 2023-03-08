<?php $this->load->view('common/navbar') ?>

<?php if ($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success_msg'); ?>
        </div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('error')): ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $this->session->flashdata('error'); ?>
  </div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Clínicas cadastradas</h5>
    </div>
    <div class="card-body">
        <?php if ($clinics): ?>
            <ul class="list-group">
                <?php foreach ($clinics as $clinic): ?>
                    <li class="list-group-item">
                        <a href="<?php echo site_url('clinic/details/' . $clinic->id); ?>">
                            <?php echo $clinic->name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhuma clínica cadastrada</p>
        <?php endif; ?>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Cadastrar nova clínica</h5>
    </div>
    <div class="card-body">
        <a href="<?php echo site_url('clinic/create'); ?>" class="btn btn-primary">Cadastrar</a>
    </div>
</div>
