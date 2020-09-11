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
					<label for="exampleInputTitle1">Título</label>
					<input type="text" class="form-control" id="exampleInputTitle1" placeholder="Título" name="titulo" value="<?= $query->titulo?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmpresa">Empresa</label>
					<input type="text" class="form-control" id="exampleInputEmpresa" placeholder="Empresa" name="empresa" value="<?= $query->empresa?>">
				</div>
				<div class="form-group">
					<label for="exampleInputCEP">CEP</label>
					<input type="text" class="form-control" id="exampleInputCEP" placeholder="CEP" name="cep" value="<?= $query->cep?>">
				</div>
				<div class="form-group">
					<label for="exampleInputBairro">Bairro</label>
					<input type="text" class="form-control" id="exampleInputBairro" placeholder="Bairro" name="bairro" value="<?= $query->bairro?>">
				</div>
				<div class="form-group">
					<label for="exampleInputCom">Complemento</label>
					<input type="text" class="form-control" id="exampleInputCom" placeholder="Complemento" name="complemento" value="<?= $query->complemento?>">
				</div>
				<div class="form-group">
					<label for="exampleInputCidade">Cidade</label>
					<input type="text" class="form-control" id="exampleInputCidade" placeholder="Cidade" name="cidade" value="<?= $query->cidade?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEstado">Estado</label>
					<input type="text" class="form-control" id="exampleInputEstado" placeholder="Estado" name="estado" value="<?= $query->estado?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail">Email</label>
					<input type="email" class="form-control" id="exampleInputEmail" placeholder="Email" name="email" value="<?= $query->email?>">
				</div>
				<div class="form-group">
					<label for="exampleInputTelefone">Telefone</label>
					<input type="text" class="form-control" id="exampleInputTelefone" placeholder="Telefone" name="telefone" value="<?= $query->telefone?>">
				</div><div class="form-group">
					<label for="exampleInputPDestaque">Produtos em destaque</label>
					<input type="text" class="form-control" id="exampleInputPDestaque" placeholder="Produtos em destaque" name="p_destaque" value="<?= $query->p_destaque?>">
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
