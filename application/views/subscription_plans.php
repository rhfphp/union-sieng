<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <h1 class="mt-5 mb-3">Escolha seu plano</h1>
    </div>
  </div>
  <div class="row">
    <?php foreach ($plans as $plan) { ?>
  <div class="col-md-4">
    <div class="card mb-4 box-shadow">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal"><?= $plan['name'] ?></h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">R$ <?= $plan['monthly_price'] ?> <small class="text-muted">/ <?= $plan['duration'] ?> dias</small></h1>
        <h6><?= $plan['description'] ?></h6>
        <a href="<?php echo base_url('register?plan=' . $plan['id']); ?>" class="btn btn-primary">Assinar</a>
      </div>
    </div>
  </div>
<?php } ?>

  </div>
</div>
