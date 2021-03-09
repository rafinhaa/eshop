<section class="invoice">
      <!-- title row -->
      <div class="row">
      <?php 
      echo '<pre>';
      print_r($pedido);
      print_r($loja);
      print_r($itens);
      ?>
      ?>
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> AdminLTE, Inc.
            <small class="pull-right">Date: 2/10/2014</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          De
          <address>
            <strong><?= $loja->empresa ?></strong><br>
            <?= $loja->endereco ?><br>
            <?= $loja->cidade ?>, <?= $loja->cep ?><br>
            <?= $loja->bairro ?>, <?= $loja->complemento ?><br>
            Telefone: <?= $loja->telefone ?><br>
            Email: <?= $loja->email ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Para
          <address>
            <strong><?= $pedido->nome ?></strong><br>
            <?= $pedido->endereco ?><br>
            <?= $pedido->cidade ?>, <?= $pedido->cep ?><br>
            <?= $pedido->bairro ?>, <?= $pedido->complemento ?><br>
            Telefone: (804) 123-5432<br>
            Email: <?= $pedido->email ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice <?= $pedido->id ?></b><br>
          <br>
          <b>Pedido ID:</b> <?= $pedido->id ?><br>
          <b>Payment Due:</b> <?= $pedido->ultima_atualizacao?><br>
          <b>Account:</b> 968-34567
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
              <th>Qty</th>
              <th>Product</th>
              <th>Serial #</th>
              <th>Description</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($itens as $i) { ?>
                <tr>
                <td><?= $i->quantidade ?></td>
                <td><?= $i->nome_item ?></td>
                <td>455-981-221</td>
                <td>El snort testosterone trophy driving gloves handsome</td>
                <td><?= formataMoedaReal($i->valor_total) ?></td>
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
          <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Subtotal:</th>
                <td><?= formataMoedaReal($pedido->total_produto) ?></td>
              </tr>
              <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td><?= formataMoedaReal($pedido->total_frete) ?></td>
              </tr>
              <tr>
                <th>Total:</th>
                <td><?= formataMoedaReal($pedido->total_pedido) ?></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>