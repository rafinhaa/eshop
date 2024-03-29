<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?= $breadcrumb['home'] ?>">Home<i class="ti-arrow-right"></i></a></li>
                        <li><a href="<?= $breadcrumb['categoria'] ?>">Categorias<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="<?= $breadcrumb['this_page'] ?>"><?= $breadcrumb['this_page'] ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<section class="shop checkout section">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-6 col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php for ($i = 0; $i < $count_fotos; $i++) { ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" <?= ($i == 0 ? 'class="active">' : '') ?></li>
                        <?php } ?>
                    </ol>
                    <div class="carousel-inner">
                            <?php $i = 0; foreach ($fotos as $f) { ?>
                                <div class="carousel-item <?= ($i == 0 ? 'active' : '') ?>">
                                    <img class="d-block w-100" src="<?= base_url('upload/produtos/'.$f->foto) ?>" alt="<?= $produto->nome ?>">
                                </div>
                            <?php $i++; } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>   
            </div>
            <div class="col-lg-6 col-12">
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2><?= $produto->nome ?></h2>
                        <div class="content">
                            <ul>
                                <li>Descrição<span><?= $produto->info ?></span></li>
                                <li>Marca<span><a href="<?= base_url('marca/'.$marca->meta_link) ?>"><?= $marca->nome ?></a></span></li>
                                <li>Categoria<span><a href="<?= base_url('categoria/'.$categoria->meta_link) ?>"><?= $categoria->nome ?></a></span></li>
                                <?php if($produto->estoque == 1) {?>
                                    <li>Estoque<span><?= $produto->estoque ?></span></li>
                                <?php } ?>
                                <li class="last">Valor<span><?= formataMoedaReal($produto->valor) ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <div class="single-widget">
                        <h2>CEP</h2>
                        <div class="content">
                            <ul class="calculoDeCEP">
                                <li>
                                    <div class="checkout-form">
                                        <div class="form">
                                            <div class="row">                                                
                                                <div class="form-group">
                                                    <input type="text" class="cep" name="cep" placeholder="CEP" required="required" style="margin-left: 15px;">
                                                </div>
                                                <div class="button" style="margin-left: 15px;">
                                                    <button class="btn btn-calcular-frete-produto" data-field="<?= $produto->id ?>">CALCULAR</button>
                                                </div>                                                
                                            </div>
                                        </div>                                        
                                    </div>   
                                </li>                                
                            </ul>
                        </div>
                    </div>

                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>Forma de Pagamento</h2>
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
                                <a href="#" data-id="<?= $produto->id ?>" class="btn btn-add-produto-cart">ADICIONAR NO CARRINHO</a>
                            </div>
                        </div>
                    </div>
                    <!--/ End Button Widget -->
                </div>
            </div>
        </div>
    </div>
</section>