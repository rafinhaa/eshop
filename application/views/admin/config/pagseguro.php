<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?= $title_h2 ?>
		<small>it all starts here</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= $breadcrumb['home'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><?= $breadcrumb['this_page'] ?></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<?= getMsg('message') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Formulário</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="post" action="<?= current_url() ?>">
			<div class="box-body">
				<?= errosValidacao('message') ?>
				<div class="form-group">
					<label for="exampleInputEmail">Email</label>
					<input type="email" class="form-control" id="exampleInputEmail" placeholder="Email" name="email" value="<?= (isset($query->email) && $query->email != NULL) ? $query->email : set_value('email')?>">
				</div>
				<div class="form-group">
					<label for="exampleInputToken">Token</label>
					<input type="text" class="form-control" id="exampleInputToken" placeholder="Token" name="token" value="<?= (isset($query->token) && $query->token != NULL) ? $query->token : set_value('token')?>">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="sandbox" <?= (isset($query->sandbox) && $query->sandbox == 1) ? 'checked' : '' ?>>
							Sandbox
						</label>
                  </div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-4">
					<label>Boleto</label>
						<select name="boleto" class="form-control">
							<option value="0" <?= (isset($query->boleto) && $query->boleto == 0 ? 'selected' : '') ?>>Desativado</option>
							<option value="1" <?= (isset($query->boleto) && $query->boleto == 1 ? 'selected' : '') ?>>Ativo</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4">
					<label>Cartão</label>
					<select name="cartao" class="form-control">
						<option value="0" <?= (isset($query->cartao) && $query->cartao == 0 ? 'selected' : '') ?>>Desativado</option>
						<option value="1" <?= (isset($query->cartao) && $query->cartao == 1 ? 'selected' : '') ?>>Ativo</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4">
					<label>Transferência</label>
					<select name="transferencia" class="form-control">
						<option value="0" <?= (isset($query->transferencia) && $query->transferencia == 0 ? 'selected' : '') ?>>Desativado</option>
						<option value="1" <?= (isset($query->transferencia) && $query->transferencia == 1 ? 'selected' : '') ?>>Ativo</option>
					</select>
					</div>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="<?= base_url('admin/') ?>" class="btn btn-sm btn-default btn-flat pull-right">Voltar</a>
			</div>
		</form>
	</div>
		</div>
	</div>
</section>
<!-- /.content -->
