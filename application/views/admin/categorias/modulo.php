<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?= $title_h2 ?>
		<small>it all starts here</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= $breadcrumb['home'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?= $breadcrumb['previous_page'] ?>"></i> Categorias cadastradas</a></li>
		<li class="active"><?= $breadcrumb['this_page'] ?></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<?= $this->session->flashdata('message') ?>
	<!-- Default box -->
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Formulário de Cadastro</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" action="<?= base_url('admin/categorias/core')?>" method="post">
					<div class="box-body">
						<?= errosValidacao('message') ?>
						<div class="form-group">
							<label>Nome</label>
							<input name="name" type="text" class="form-control" placeholder="Nome" value="<?= ($it_category != NULL) ? $it_category->nome : set_value('name')?>">
						</div>
						<div class="form-group">
							<label>Ativar Categoria</label>
							<select name="active" class="form-control">
								<?php if ($it_category ) { ?>
									<option value="0" <?= ($it_category->ativo == 0 ? 'selected' : '') ?> >Não</option>
									<option value="1" <?= ($it_category->ativo == 1 ? 'selected' : '') ?> >Sim</option>
								<?php } else { ?>
									<option value="0" >Não</option>
									<option value="1" selected >Sim</option>
								<?php } ?>
							</select>
						</div>
						<?php if ($it_category ) { ?>
							<input type="hidden" name="id" value="<?= $it_category->id ?>"
						<?php } ?>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Enviar</button>
						<a href="<?= base_url('admin/categorias') ?>" class="btn btn-sm btn-default btn-flat pull-right">Voltar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</section>
<!-- /.content -->
