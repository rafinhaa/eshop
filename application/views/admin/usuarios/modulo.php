<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?= $title_h2 ?>
		<small>it all starts here</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= $breadcrumb['home'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?= $breadcrumb['previous_page'] ?>"></i> Usuários cadastrados</a></li>
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
					<div class="box-tools pull-right">
						<a href="<?= base_url('admin/usuarios') ?>" type="button" class="btn btn-block btn-success btn-sm">Voltar</a>
					</div>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" action="<?= base_url('admin/usuarios/core')?>" method="post">
					<div class="box-body">
						<?= errosValidacao('message') ?>
						<div class="form-group">
								<label>Usuário</label>
								<input name="username" type="text" class="form-control" placeholder="Usuário" value="<?= ($it_user != NULL) ? $it_user->username : set_value('username')?>">
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-4">
									<label>Nome</label>
									<input name="first_name" type="text" class="form-control" placeholder="Nome" value="<?= ($it_user != NULL) ? $it_user->first_name : set_value('first_name')?>">
								</div>
								<div class="col-xs-4">
									<label>Sobrenome</label>
									<input name="last_name" type="text" class="form-control" placeholder="Sobrenome" value="<?= ($it_user != NULL) ? $it_user->last_name : set_value('last_name')?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">E-mail</label>
							<input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?= ($it_user != NULL) ? $it_user->email : set_value('email')?>">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Senha</label>
							<input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
						</div>
						<div class="form-group">
							<label>Ativar Usuário</label>
							<select name="active" class="form-control">
								<?php if ($it_user ) { ?>
									<option value="0" <?= ($it_user->active == 0 ? 'selected' : '') ?> >Não</option>
									<option value="1" <?= ($it_user->active == 1 ? 'selected' : '') ?> >Sim</option>
								<?php } else { ?>
									<option value="0" >Não</option>
									<option value="1" selected >Sim</option>
								<?php } ?>
							</select>
						</div>
						<?php if ($it_user ) { ?>
							<input type="hidden" name="id" value="<?= $it_user->id ?>"
						<?php } ?>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</section>
<!-- /.content -->
