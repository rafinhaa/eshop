<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Shop Grid</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                <a href="#" class="btn">ADICIONAR NO CARRINHO</a>
                            </div>
                        </div>
                    </div>
                    <!--/ End Button Widget -->
                </div>
            </div>
        </div>
    </div>
</section>