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
	<!-- Default box -->
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Relatórios</h3>
				</div>
				<!-- /.box-body -->
				<!-- box-footer -->
				<div class="box-footer clearfix">					
					<a href="<?= base_url('admin/') ?>" class="btn btn-sm btn-default btn-flat pull-right">Voltar</a>
				</div>
				<!-- /.box-footer -->
			</div>
			<!-- /.box -->
		</div>
	</div>
	</div>
</section>
<!-- /.content -->

