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
									<input class="sp_celphones" type="number" name="number" placeholder="" required="required">
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
									<label>Country<span>*</span></label>
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
									<label>State / Divition<span>*</span></label>
									<select name="state-province" id="state-province">
										<option value="divition" selected="selected">New Yourk</option>
										<option>Los Angeles</option>
										<option>Chicago</option>
										<option>Houston</option>
										<option>San Diego</option>
										<option>Dallas</option>
										<option>Charlotte</option>
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
						<h2>CART  TOTALS</h2>
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
						<h2>Payments</h2>
						<div class="content">
							<div class="checkbox">
								<label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label>
								<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Cash On Delivery</label>
								<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox"> PayPal</label>
							</div>
						</div>
					</div>
					<!--/ End Order Widget -->
					<!-- Payment Method Widget -->
					<div class="single-widget payement">
						<div class="content">
							<img src="images/payment-method.png" alt="#">
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