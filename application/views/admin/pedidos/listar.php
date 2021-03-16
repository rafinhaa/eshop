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
					<h3 class="box-title">Pedidos</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-hover">
						<thead>
						<tr>
							<th style="width: 10px">#</th>							
							<th>Nome do cliente</th>
							<th>Total</th>
							<th>Status</th>
							<th>Opções</th>
						</tr>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($pedidos as $p) { ?>
							<tr>
								<td><?= $p->id ?></td>
								<td><?= $p->nome ?></td>
								<td><?= formataMoedaReal($p->total_pedido) ?></td>
								<td class="text-center">
									<?php
											switch ($p->status) {
												case 1:
													echo '<small class="label pull-center bg-blue">Aguardando pagamento</small>';
													break;
												case 2:
													echo '<small class="label pull-center bg-green">Pagamento confirmado</small>';
													break;
												case 3:
													echo '<small class="label pull-center bg-yellow">Enviado</small>';
													break;
												case 4:
													echo '<small class="label pull-center bg-red">Cancelado</small>';
													break;
											}
									?>
								</td>
								<td class="text-center">
									<div class="btn-group">
										<?php createModelButton("modal-info",'Mudar Status','#modal-info-' . $p->id) ?>
										<a href="<?= base_url('admin/pedidos/cod_ratreio/' . $p->id) ?>" type="button" class="btn btn-primary">Rastreio</a>
										<a href="<?= base_url('admin/pedidos/imprimir/' . $p->id) ?>" type="button" target="_blank" class="btn btn-primary">Imprimir</a>
									</div>		
									<?php createModalMessage('modal-info','modal-info-' . $p->id,'Atualizar status pedido ' . $p->id,'											
											<div class="form-group">
											<select name="new-status" class="form-control">
											  <option value="1">Aguardando pagamento</option>
											  <option value="2">Pagamento confirmado</option>
											  <option value="3">Enviado</option>
											  <option value="4">Cancelado</option>
											</select>
										  </div>
									', base_url('admin/pedidos/mudar_status/'.$p->id),'Atualizar') ?>							
								</td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
						<tr>
						<th style="width: 10px">#</th>
							<th>Nome do cliente</th>
							<th>Total</th>
							<th>Status</th>
							<th>Opções</th>
						</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
				<!-- box-footer -->
				<div class="box-footer clearfix">
					<div class="btn-group">
					<button type="button" class="btn bg-red">Relatórios</button>
					<button type="button" class="btn bg-red dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?= base_url('admin/relatorios/diario/') ?>">Vendas diárias</a></li>
						<li><a href="#">Vendas por período</a></li>
						<li><a href="<?= base_url('admin/relatorios/mais_vendidos/') ?>">Produtos mais vendidos</a></li>
					</ul>
					</div>					
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

