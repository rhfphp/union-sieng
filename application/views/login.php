<!-- Login Form -->
<html>
<head>
	<title>Cadastro de Usuário</title>
	<!-- Adicionando o Bootstrap 5 ao projeto -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="row justify-content-center">
<?php if ($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success_msg'); ?>
        </div>
      <?php endif; ?>
  <div class="col-md-6 col-lg-4">
    <div class="card shadow-lg">
      <div class="card-header">
        <h4 class="card-title">Login</h4>
      </div>
<?php if ($this->session->flashdata('error_msg')): ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $this->session->flashdata('error_msg'); ?>
  </div>
<?php endif; ?>
      <div class="card-body">
        <?php echo form_open('Login/login'); ?>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo set_value('email'); ?>">
            <div class="invalid-feedback"><?php echo form_error('email'); ?></div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" id="password" name="password">
            <div class="invalid-feedback"><?php echo form_error('password'); ?></div>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me" value="1">
            <label class="form-check-label" for="remember_me">Lembrar-me</label>
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
