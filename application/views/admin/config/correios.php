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
					<label for="exampleInputEmail">Cep de origem</label>
					<input type="text" class="form-control cep" id="exampleInputEmail" placeholder="CEP" name="cep_origem" value="<?= $query->cep_origem?>">
				</div>
				<div class="form-group">
					<label for="exampleInputFrete">Somar frete</label>
					<input type="text" class="form-control money" id="exampleInputFrete" placeholder="00,0" name="somar_frete" value="<?= $query->somar_frete?>">
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
