<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?= $breadcrumb['home'] ?>">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="<?= $breadcrumb['this_page'] ?>">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
		
<!-- Start Checkout -->
<section class="shop checkout section">
	<div class="container">
		<div class="row"> 
			<div class="col-lg-8 col-12">
				<div class="checkout-form">
					<h2>Finalizar compra</h2>
					<p>Porf favor faça <u><a href="<?php base_url("checkout/login"); ?>">login</a></u> ou crie uma nova conta.</p>
					<div class="col-12">
						<div class="create-account">
							<input id="cbox" type="checkbox">
							<label>Create an account?</label>
						</div>
					</div>
					<!-- Form -->
					<form class="form" method="post" action="#">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Nome<span>*</span></label>
									<input type="text" name="name" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Sobrenome<span>*</span></label>
									<input type="text" name="name" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>CPF<span>*</span></label>
									<input class="cpf" type="text" name="cpf" placeholder="" required="required">
								</div>
							</div>							
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Telefone<span>*</span></label>
									<input class="sp_celphones" type="text" name="number" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-12">
								<div class="form-group">
									<label>Email<span>*</span></label>
									<input type="email" name="email" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Senha<span>*</span></label>
									<input type="password" name="email" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Confirmar senha<span>*</span></label>
									<input type="password" name="c_senha" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Pais<span>*</span></label>
									<select name="country_name" id="country">
										<option value="BR" selected="selected">Brazil</option>									
									</select>
								</div>
							</div>							
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>CEP<span>*</span></label>
									<input class="cep" type="text" name="post" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
							<div class="form-group">
								<label>Estado<span>*</span></label>
								<select name="state-province" id="state-province">									
									<option value="AC">Acre</option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amapá</option>
									<option value="AM">Amazonas</option>
									<option value="BA">Bahia</option>
									<option value="CE">Ceará</option>
									<option value="DF">Distrito Federal</option>
									<option value="ES">Espírito Santo</option>
									<option value="GO">Goiás</option>
									<option value="MA">Maranhão</option>
									<option value="MT">Mato Grosso</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Pará</option>
									<option value="PB">Paraíba</option>
									<option value="PR">Paraná</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piauí</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rondônia</option>
									<option value="RR">Roraima</option>
									<option value="SC">Santa Catarina</option>
									<option value="SP" selected="selected">São Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
								</select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Endereço<span>*</span></label>
									<input type="text" name="address" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Número<span>*</span></label>
									<input type="number" name="number" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Complemento</label>
									<input type="text" name="complement" placeholder="">
								</div>
							</div>							
						</div>
					</form>
					<!--/ End Form -->
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="order-details">
					<!-- Order Widget -->
					<div class="single-widget">
						<h2>TOTAL</h2>
						<div class="content">
							<ul>
								<li>Sub Total<span>$330.00</span></li>
								<li>(+) Shipping<span>$10.00</span></li>
								<li class="last">Total<span>$340.00</span></li>
							</ul>
						</div>
					</div>
					<!--/ End Order Widget -->
					<!-- Order Widget -->
					<div class="single-widget">
						<h2>Pagamento</h2>
						<div class="content">
							<div class="checkbox ">
								<label class="checkbox-inline " for="1"><input name="payment" class="select-option-checkout" id="1" value="1" type="radio"> Cartão de crédito</label>
								<label class="checkbox-inline " for="2"><input name="payment" class="select-option-checkout" id="2" value="2" type="radio"> Boleto</label>
								<label class="checkbox-inline " for="3"><input name="payment" class="select-option-checkout" id="3" value="3" type="radio"> Transferência bancária</label>							
							</div>
					</div>
					<!--/ End Order Widget -->
					<!-- Payment Method Widget -->
					<div class="single-widget pagamento-cartao d-none">
                        <h2>Dados do cartão</h2>
                        <div class="content">
                            <ul class="dadosCartao">
                                <li>
                                    <div class="checkout-form">
                                        <div class="form">
                                            <div class="row">
												<div class="col-lg-12 col-md-12 col-12">
													<div class="form-group">
														<label>Número do cartão<span>*</span></label>
														<input class="cart-number" type="text" name="cc_numero" placeholder="" required="required">
													</div>
												</div> 
												<div class="col-lg-12 col-md-12 col-12">
													<div class="form-group">
														<label>Nome do titular<span>*</span></label>
														<input type="text" name="cc_titular" placeholder="" required="required">
													</div>
												</div>  
												<div class="col-lg-12 col-md-12 col-12">
													<div class="form-group">
														<label>Validade do cartão<span>*</span></label>
														<input class="cart-val" type="text" name="cc_validade" placeholder="" required="required">
													</div>
												</div>  
												<div class="col-lg-12 col-md-12 col-12">
													<div class="form-group">
														<label>Código de segurança<span>*</span></label>
														<input class="cart-code" type="text" name="cc_codigo" placeholder="" required="required">
													</div>
												</div>   
                                            </div>
                                        </div>                                        
                                    </div>   
                                </li>                                
                            </ul>
                        </div>
                    </div>
					<!-- Payment Method Widget -->
					<div class="single-widget pagamento-boleto d-none">
                        <h2>Boleto</h2>
                        <div class="content">
                            <ul class="boleto">
                                <li>
									Você será redirecionado para imprimir o boleto
                                </li>                                
                            </ul>
                        </div>
                    </div>
					<!--/ End Payment Method Widget -->
					<!-- Payment Method Widget -->
					<div class="single-widget pagamento-transferencia d-none">
                        <h2>Transferência</h2>
                        <div class="content">
                            <ul class="transferencia">
                                <li>
									Você será redirecionado para a página com os dados
                                </li>                                
                            </ul>
                        </div>
                    </div>
					<!--/ End Payment Method Widget -->
					<!-- Button Widget -->
					<div class="single-widget get-button">
						<div class="content">
							<div class="button">
								<a href="#" class="btn">proceed to checkout</a>
							</div>
						</div>
					</div>
					<!--/ End Button Widget -->
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Checkout -->

<!-- Start Shop Services Area  -->
<section class="shop-services section home">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Service -->
				<div class="single-service">
					<i class="ti-rocket"></i>
					<h4>Free shiping</h4>
					<p>Orders over $100</p>
				</div>
				<!-- End Single Service -->
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Service -->
				<div class="single-service">
					<i class="ti-reload"></i>
					<h4>Free Return</h4>
					<p>Within 30 days returns</p>
				</div>
				<!-- End Single Service -->
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Service -->
				<div class="single-service">
					<i class="ti-lock"></i>
					<h4>Sucure Payment</h4>
					<p>100% secure payment</p>
				</div>
				<!-- End Single Service -->
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Service -->
				<div class="single-service">
					<i class="ti-tag"></i>
					<h4>Best Peice</h4>
					<p>Guaranteed price</p>
				</div>
				<!-- End Single Service -->
			</div>
		</div>
	</div>
</section>
<!-- End Shop Services -->