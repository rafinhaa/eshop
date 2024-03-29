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
      <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-aqua">
            <div class="inner">
               <h3><?= $t_pedidos ?></h3>
               <p>Pedidos</p>
            </div>
            <div class="icon">
               <i class="ion ion-bag"></i>
            </div>
            <a href="<?= base_url('admin/pedidos'); ?>" class="small-box-footer">Ver pedidos <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-green">
            <div class="inner">
               <h3><?= $t_produtos ?></h3>
               <p>Produtos</p>
            </div>
            <div class="icon">
               <i class="ion ion-cube"></i>
            </div>
            <a href="<?= base_url('admin/produtos'); ?>" class="small-box-footer">Ver produtos <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-yellow">
            <div class="inner">
               <h3><?= $t_clientes ?></h3>
               <p>Clientes</p>
            </div>
            <div class="icon">
               <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= base_url('admin/clientes'); ?>" class="small-box-footer">Ver clientes <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-red">
            <div class="inner">
               <h3><?= $t_categorias ?></h3>
               <p>Categorias</p>
            </div>
            <div class="icon">
               <i class="ion ion-filing"></i>
            </div>
            <a href="<?= base_url('admin/categorias'); ?>" class="small-box-footer">Ver categorias <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
   </div>
   <h2 class="page-header">Novidades</h2>
   <div class="row">
      <div class="col-md-6">
         <div class="box box-default">
            <div class="box-header with-border">
               <i class="fa fa-shopping-cart"></i>
               <h3 class="box-title">Últimos pedidos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Produto</th>
                  <th>Data do pedido</th>
                  <th>Status</th>
                  <th>Total</th>
                </tr>
                <?php foreach ($pedidos as $p) { ?>
                  <tr>                
                     <td><?= $p->id ?></td>
                     <td><?= $p->nome ?></td>
                     <td><?= formataDataDiaDb($p->data_cadastro) ?></td>
                     <td><?= $p->titulo_status ?></td>
                     <td><?= $p->total_pedido ?></td>
                  </tr>  
                <?php } ?>              
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="<?= base_url('admin/pedidos'); ?>" class="btn btn-sm btn-default btn-flat pull-right">Ver todos</a>
            </div>
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
         <div class="box box-default">
            <div class="box-header with-border">
               <i class="fa fa-user"></i>
               <h3 class="box-title">Novos usuários</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Usuário</th>
                  <th>Data de Cadastro</th>
                </tr>
                <?php foreach ($clientes as $c) { ?>
                  <tr>                
                     <td><?= $c->id ?></td>
                     <td><?= $c->nome ?></td>
                     <td><?= formataDataDiaDb($c->data_cadastro) ?></td>
                  </tr>  
                <?php } ?> 
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="<?= base_url('admin/clientes'); ?>" class="btn btn-sm btn-default btn-flat pull-right">Ver todos</a>
            </div>
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->
   </div>
</section>
<!-- /.content -->