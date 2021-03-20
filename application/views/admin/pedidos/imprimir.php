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
          <br>
          <b>Pedido ID:</b> <?= $pedido->id ?><br>
          <b>Payment Due:</b> <?= $pedido->ultima_atualizacao?><br>
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
              <th>Descrição</th>
              <th>Valor unitario</th>
              <th>Valor total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($itens as $i) { ?>
                <tr>
                <td><?= $i->quantidade ?></td>
                <td><?= $i->nome_item ?></td>
                <td><?= formataMoedaReal($i->valor_unitario) ?></td>
                <td><?= formataMoedaReal($i->valor_total_item) ?></td>
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
            <?php
              switch ($pedido->id_status) {
                case 1:
                  echo 'Aguardando pagamento';
                  break;
                case 2:
                  echo 'Pagamento confirmado';
                  break;
                case 3:
                  echo 'Enviado';
                  break;
                case 4:
                  echo 'Cancelado';
                  break;
              }
            ?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Valores</p>

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Total produtos:</th>
                <td><?= formataMoedaReal($pedido->total_produto) ?></td>
              </tr>
              <tr>
              <tr>
                <th>Envio:</th>
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
          <button onclick="window.print();" href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
          
        </div>
      </div>
    </section>