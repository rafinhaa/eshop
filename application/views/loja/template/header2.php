<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> <?= $dados->telefone ?></li>
                            <li><i class="ti-email"></i> <?= $dados->email ?></li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-location-pin"></i> <?= $dados->endereco ?></li>
                            <li><i class="ti-alarm-clock"></i> <a href="#">Descontos</a></li>
                            <li><i class="ti-user"></i> <a href="#">Minha conta</a></li>
                            <li><i class="ti-power-off"></i><a href="login.html#">Entrar</a></li>
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="<?= base_url('/'); ?>"><img src="<?= base_url('public/images/logo.png') ?>" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"><div class="slicknav_menu"><a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_collapsed" style="outline: none;"><span class="slicknav_menutxt"></span><span class="slicknav_icon slicknav_no-text"><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span></span></a><ul class="slicknav_nav slicknav_hidden" aria-hidden="true" role="menu" style="display: none;">
                                            <li class="active"><a href="<?= base_url('/'); ?>" role="menuitem" tabindex="-1">Home</a></li>
                                            <li><a href="#" role="menuitem" tabindex="-1">Product</a></li>												
                                            <li><a href="#" role="menuitem" tabindex="-1">Service</a></li>
                                            <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="-1" class="slicknav_item slicknav_row" style="outline: none;"><a href="#" tabindex="-1">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                <span class="slicknav_arrow">►</span></a><ul class="dropdown slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                                                    <li><a href="shop-grid.html" role="menuitem" tabindex="-1">Shop Grid</a></li>
                                                    <li><a href="cart.html" role="menuitem" tabindex="-1">Cart</a></li>
                                                    <li><a href="checkout.html" role="menuitem" tabindex="-1">Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#" role="menuitem" tabindex="-1">Pages</a></li>									
                                            <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="-1" class="slicknav_item slicknav_row" style="outline: none;"><a href="#" tabindex="-1">Blog<i class="ti-angle-down"></i></a>
                                                <span class="slicknav_arrow">►</span></a><ul class="dropdown slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                                                    <li><a href="blog-single-sidebar.html" role="menuitem" tabindex="-1">Blog Single Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html" role="menuitem" tabindex="-1">Contact Us</a></li>
                                        </ul></div></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select style="display: none;">
                                <option selected="selected">Categorias</option>
                                <?php foreach ($categorias as $c){ ?>
                                    <option value="<?= $c->id ?>"><?= $c->nome ?></option>
                                <?php } ?>
                            </select>
                            <div class="nice-select" tabindex="0">
                                <span class="current">Categorias</span>
                                <ul class="list">
                                    <li data-value="All Category" class="option selected">Todas</li>
                                    <?php foreach ($categorias as $c){ ?>
                                        <li data-value="<?= $c->nome ?>" class="option"><?= $c->nome ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <form action="<?= base_url('busca') ?>" method="POST">
                                <input name="search" placeholder="Pesquise produtos aqui....." type="search">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?= count($produtos_cart) ?></span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span class="countItens"><?= count($produtos_cart) ?> Itens</span>
                                    <a href="<?= base_url('carrinho') ?>">Ver carrinho</a>
                                </div>
                                <ul class="shopping-list">
                                    <?php foreach($produtos_cart as $p) { ?>
                                        <li class="itemCart<?= $p->id ?>">
                                            <a href="#" class="remove" title="Remove this item" data-id="<?= $p->id ?>"><i class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="<?= base_url('/produto/'.$p->meta_link) ?>"><img src="<?= base_url('upload/produtos/'.$p->foto) ?>" alt="#"></a>
                                            <h4><a href="<?= base_url('/produto/'.$p->meta_link) ?>"><?= $p->nome ?></a></h4>
                                            <p class="quantity"><?= $p->quant ?>x - <span class="amount"><?= formataMoedaReal($p->valor) ?></span></p>
                                        </li>
                                        <?php } ?>
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount"><?= formataMoedaReal($total) ?></span>
                                    </div>
                                    <a href="checkout.html" class="btn animate">Comprar</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">	
                                    <div class="nav-inner">	
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="active"><a href="<?= base_url('/'); ?>">Home</a></li>
                                            <li><a href="#">Product</a></li>												
                                            <li><a href="#">Service</a></li>
                                            <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                <ul class="dropdown">
                                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Pages</a></li>									
                                            <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>