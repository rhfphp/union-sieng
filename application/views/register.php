<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Usuário</title>
	<!-- Adicionando o Bootstrap 5 ao projeto -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
	<div class="row justify-content-center">
		<div class="col-md-6 col-lg-4">
			<div class="card shadow-lg">
				<div class="card-header">
					<h4 class="card-title">Cadastro</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="<?php echo base_url('register/save'); ?>">
						<div class="mb-3">
							<label for="name" class="form-label">Nome:</label>
							<input type="text" name="name" id="name" class="form-control" required>
						</div>

						<div class="mb-3">
							<label for="email" class="form-label">E-mail:</label>
							<input type="email" name="email" id="email" class="form-control" required>
						</div>

						<div class="mb-3">
							<label for="password" class="form-label">Senha:</label>
							<input type="password" name="password" id="password" class="form-control" minlength="6" required>
						</div>

						<div class="mb-3">
							<label for="password_confirm" class="form-label">Confirme a Senha:</label>
							<input type="password" name="password_confirm" id="password_confirm" class="form-control" minlength="6" required>
						</div>

						<div class="mb-3">
							<label for="plan_id" class="form-label">Plano:</label>
							<select name="plan_id" id="plan_id" class="form-select" required>
								<option value="">Selecione um plano</option>
								<?php foreach($plans as $plan): ?>
									<option value="<?php echo $plan['id']; ?>" data-clinic-limit="<?php echo $plan['clinic_limit']; ?>"><?php echo $plan['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>



						<div class="mb-3">
							<input type="submit" value="Cadastrar" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
