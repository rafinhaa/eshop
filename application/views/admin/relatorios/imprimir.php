<section class="invoice">
<?php
 echo '<pre>';
 print_r($report);
 echo dataDiaDb();
 echo '</pre>';
?>
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i><?= $loja->empresa ?>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">

        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">

        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <br>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>N. Pedido</th>
              <th>Cliente</th>
              <th>Tipo frete</th>
              <th>Valor frete</th>
              <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($report as $r) { ?>
                <tr>
                <td><?= $r->id ?></td>
                <td><?= $r->nome ?></td>
                <td><?= $r->forma_envio ?></td>
                <td><?= formataMoedaReal($r->total_produto) ?></td>
                <td><?= formataMoedaReal($r->total_frete) ?></td>
                <td><?= formataMoedaReal($r->total_pedido) ?></td>
                </tr>  
            <?php } ?>          
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Método de pagamento:</p>
          
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">

          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Valores</p>

          <div class="table-responsive">
            <table class="table">

            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button onclick="window.print();" href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
          
        </div>
      </div>
    </section>