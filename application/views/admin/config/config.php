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
					<input type="text" class="form-control" id="exampleInputTitle1" placeholder="Título" name="titulo" value="<?= (isset($query->titulo) && $query->titulo != NULL) ? $query->titulo : set_value('titulo')?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmpresa">Empresa</label>
					<input type="text" class="form-control" id="exampleInputEmpresa" placeholder="Empresa" name="empresa" value="<?= (isset($query->empresa) && $query->empresa != NULL) ? $query->empresa : set_value('empresa')?>">
				</div>
				<div class="form-group">
					<label for="exampleInputCEP">CEP</label>
					<input type="text" class="form-control" id="exampleInputCEP" placeholder="CEP" name="cep" value="<?= (isset($query->cep) && $query->cep != NULL) ? $query->cep : set_value('cep')?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEndereco">Endereço</label>
					<input type="text" class="form-control" id="exampleInputEndereco" placeholder="Endereço" name="endereco" value="<?= (isset($query->endereco) && $query->endereco != NULL) ? $query->endereco : set_value('endereco')?>">
				</div>
				<div class="form-group">
					<label for="exampleInputBairro">Bairro</label>
					<input type="text" class="form-control" id="exampleInputBairro" placeholder="Bairro" name="bairro" value="<?= (isset($query->bairro) && $query->bairro != NULL) ? $query->bairro : set_value('bairro')?>">
				</div>
				<div class="form-group">
					<label for="exampleInputCom">Complemento</label>
					<input type="text" class="form-control" id="exampleInputCom" placeholder="Complemento" name="complemento" value="<?= (isset($query->complemento) && $query->complemento != NULL) ? $query->complemento : set_value('complemento')?>">
				</div>
				<div class="form-group">
					<label for="exampleInputCidade">Cidade</label>
					<input type="text" class="form-control" id="exampleInputCidade" placeholder="Cidade" name="cidade" value="<?= (isset($query->cidade) && $query->cidade != NULL) ? $query->cidade : set_value('cidade')?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEstado">Estado</label>
					<input type="text" class="form-control" id="exampleInputEstado" placeholder="Estado" name="estado" value="<?= (isset($query->estado) && $query->estado != NULL) ? $query->estado : set_value('estado')?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail">Email</label>
					<input type="email" class="form-control" id="exampleInputEmail" placeholder="Email" name="email" value="<?= (isset($query->email) && $query->email != NULL) ? $query->email : set_value('email')?>">
				</div>
				<div class="form-group">
					<label for="exampleInputTelefone">Telefone</label>
					<input type="text" class="form-control" id="exampleInputTelefone" placeholder="Telefone" name="telefone" value="<?= (isset($query->telefone) && $query->telefone != NULL) ? $query->telefone : set_value('telefone')?>">
				</div><div class="form-group">
					<label for="exampleInputPDestaque">Produtos em destaque</label>
					<input type="text" class="form-control" id="exampleInputPDestaque" placeholder="Produtos em destaque" name="p_destaque" value="<?= (isset($query->p_destaque) && $query->p_destaque != NULL) ? $query->cep : set_value('p_destaque')?>">
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
