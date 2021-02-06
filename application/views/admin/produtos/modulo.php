<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?= $title_h2 ?>
		<small>it all starts here</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= $breadcrumb['home'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?= $breadcrumb['previous_page'] ?>"></i> Produtos cadastrados</a></li>
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
							<div class="row">
								<div class="col-xs-4">
									<label>Códido do produto</label>
									<input name="code" type="text" class="form-control" placeholder="Códido do produto" value="<?= ($it_product != NULL) ? $it_product->cod_produto : set_value('code')?>">
								</div>
								<div class="col-xs-4">
									<label>Valor</label>
									<input name="value" type="text" class="form-control" placeholder="Valor" value="<?= ($it_product != NULL) ? $it_product->valor : set_value('value')?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-4">
									<label>Peso</label>
									<input name="size" type="text" class="form-control" placeholder="Peso" value="<?= ($it_product != NULL) ? $it_product->peso : set_value('size')?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-2">
									<label>Altura</label>
									<input name="height" type="text" class="form-control" placeholder="Altura" value="<?= ($it_product != NULL) ? $it_product->altura : set_value('height')?>">
								</div>
								<div class="col-xs-2">
									<label>Largura</label>
									<input name="width" type="text" class="form-control" placeholder="Largura" value="<?= ($it_product != NULL) ? $it_product->largura : set_value('width')?>">
								</div>
								<div class="col-xs-2">
									<label>Comprimento</label>
									<input name="length" type="text" class="form-control" placeholder="Comprimento" value="<?= ($it_product != NULL) ? $it_product->comprimento : set_value('length')?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Informações</label>
							<textarea name="information" type="text" class="form-control" placeholder="Informações" value="<?= ($it_product != NULL) ? $it_product->info : set_value('information')?>"></textarea>
						</div>
						<div class="form-group">
							<label>Controlar estoque</label>
							<select name="control_stok" class="form-control">
								<?php if ($it_product ) { ?>
									<option value="0" <?= ($it_product->controlar_estoque == 0 ? 'selected' : '') ?> >Não</option>
									<option value="1" <?= ($it_product->controlar_estoque == 1 ? 'selected' : '') ?> >Sim</option>
								<?php } else { ?>
									<option value="0" >Não</option>
									<option value="1" selected >Sim</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Quantidade estoque</label>
							<input name="stock" type="text" class="form-control" placeholder="Estoque" value="<?= ($it_product != NULL) ? $it_product->estoque : set_value('stock')?>">
						</div>
						<div class="form-group">
							<label>Marca</label>
							<select name="brandy" class="form-control">
								<?php if ($it_product ) { ?>
									<?php foreach ($marcas as $m) { ?>
										<option value="<?= $m->id ?>" <?= ($it_product->id == $m->id ? 'selected' : '') ?> ><?= $m->nome ?></option>
									<?php } ?>
								<?php } else { ?>
									<?php foreach ($marcas as $m) { ?>
										<option value="<?= $m->id ?>" ><?= $m->nome ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Categoria</label>
							<select name="category" class="form-control">
								<?php if ($it_product ) { ?>
									<?php foreach ($categorias as $c) { ?>
										<option value="<?= $c->id ?>" <?= ($it_product->id == $c->id ? 'selected' : '') ?> ><?= $c->nome ?></option>
									<?php } ?>
								<?php } else { ?>
									<?php foreach ($categorias as $c) { ?>
										<option value="<?= $c->id ?>" ><?= $c->nome ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Destaque</label>
							<select name="featured" class="form-control">
								<?php if ($it_product ) { ?>
									<option value="0" <?= ($it_product->destaque == 0 ? 'selected' : '') ?> >Não</option>
									<option value="1" <?= ($it_product->destaque == 1 ? 'selected' : '') ?> >Sim</option>
								<?php } else { ?>
									<option value="0" >Não</option>
									<option value="1" selected >Sim</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Ativar produto</label>
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
						<?php if ($it_product ) { ?>
							<input type="hidden" name="id" value="<?= $it_product->id ?>"
						<?php } ?>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Enviar</button>
						<a href="<?= base_url('admin/produtos') ?>" class="btn btn-sm btn-default btn-flat pull-right">Voltar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</section>
<!-- /.content -->
