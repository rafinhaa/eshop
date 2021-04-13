<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?= $breadcrumb['home'] ?>">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="<?= $breadcrumb['this_page'] ?>">Carrinho</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<!-- Shopping Cart -->
<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUTO</th>
								<th>NOME</th>
								<th class="text-center">PREÇO</th>
								<th class="text-center">QUANTIDADE</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($produtos as $p) { ?>
								<tr class="itemCartFin<?= $p->id ?>">
									<td class="image" data-title="No"><img src="<?= base_url('/upload/produtos/'.$p->foto) ?>" alt="#"></td>
									<td class="product-des" data-title="Description">
										<p class="product-name"><a href="#"><?= $p->nome ?></a></p>
										<p class="product-des"><?= $p->info ?></p>
									</td>
									<td class="price" data-title="Price"><span><?= formataMoedaReal($p->valor) ?> </span></td>
									<td class="qty" data-title="Qty"><!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number btn-minus" data-type="minus" data-field="<?= $p->id ?>">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="<?= $p->id ?>" class="input-number"  data-min="1" data-max="100" value="<?= $p->quant ?>">
											<div class="button plus">
												<a href="#" type="button" class="btn btn-primary btn-number btn-plus" data-type="plus" data-field="<?= $p->id ?>">
													<i class="ti-plus"></i>
												</a>
											</div>
										</div>
										<!--/ End Input Order -->
									</td>
									<td class="total-amount" data-title="Total"><span><span class="sub-total<?= $p->id ?>"><?= formataMoedaReal($p->subtotal) ?></span></td>
									<td class="action" data-title="Remove"><a href="#" class="removeCarrinhoFin" data-id="<?= $p->id ?>"><i class="ti-trash remove-icon"></i></a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
											<form action="#" target="_blank">
												<input class="cep" name="cep" placeholder="Digite seu CEP">
												<button class="btn btn-calcular-frete-carrinho">Calcular</button>
											</form>
									</div></br>
									<div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Código do cupom">
											<button class="btn">Aplicar</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Subtotal<span class="SubTotalFin"><?= formataMoedaReal($total) ?></span></li>
										<li>Peso<span class="PesoFin"><?= $peso ?></span></li>
										<li class="last">Total<span class="TotalFin"><?= formataMoedaReal($total) ?></span></li>
									</ul>
									<div class="button5">
										<a href="#" class="btn">COMPRAR</a>
										<a href="<?= base_url('/') ?>" class="btn">Continuar comprando</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->