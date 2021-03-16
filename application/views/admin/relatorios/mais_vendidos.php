<section class="invoice">
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
              <th>Id</th>
              <th>Nome</th>
              <th>Vendas</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($report as $r) { ?>
                <tr>
                <td><?= $r->cod_produto ?></td>
                <td><?= $r->nome ?></td>
                <td><?= $r->quant_vendidos ?></td>
                </tr>  
            <?php } ?>          
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button onclick="window.print();" href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
          
        </div>
      </div>
    </section>