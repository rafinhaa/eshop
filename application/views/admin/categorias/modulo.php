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
				<form role="form" action="<?= base_url('admin/produtos/core')?>" method="post">
					<div class="box-body">
						<?= errosValidacao('message') ?>
						<div class="form-group">
							<label>Nome</label>
							<input name="name" type="text" class="form-control" placeholder="Nome" value="<?= ($it_product != NULL) ? $it_product->nome : set_value('name')?>">
						</div>
						<div class="form-group">
							<label>Ativar Categoria</label>
							<select name="active" class="form-control">
								<?php if ($it_product ) { ?>
									<option value="0" <?= ($it_product->ativo == 0 ? 'selected' : '') ?> >Não</option>
									<option value="1" <?= ($it_product->ativo == 1 ? 'selected' : '') ?> >Sim</option>
								<?php } else { ?>
									<option value="0" >Não</option>
									<option value="1" selected >Sim</option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<div class="form-group">
								<label>Categoria pai</label>
								<select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" name="id_categoria_pai">
									<option value="0">Nenhum</option>
									<?php if ($it_category == NULL){
										foreach ($cat_pai as $cat) { ?>
											<option value="<?= $cat->id ?>"><?= $cat->nome ?></option>
										<?php }
									}else{
										foreach ($cat_pai as $cat) { ?>
											<option value="<?= $cat->id ?>" <?= ($it_category->id_categoriapai ==  $cat->id ? 'selected' : '') ?> ><?= $cat->nome ?></option>
										<?php }
									}
									?>
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
