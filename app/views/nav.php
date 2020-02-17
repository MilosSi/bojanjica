<body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md-5 pr-4 d-flex topper align-items-center">

						    <span class="text"><?= $_SESSION['h1'] ?></span>
					    </div>
					    <div class="col-md-2 pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">office@bojanjica.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">Dostava : 3-5 radnih dana & Besplatno vraćanje</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/">Bojanjica</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Meni
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="/" class="nav-link">Početna</a></li>
                <li class="nav-item active"><a href="index.php?page=proizvodi" class="nav-link">Proizvodi</a></li>
<!--	             <li class="nav-item dropdown">-->
<!--                  <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Proizvodi</a>-->
<!--                  <div class="dropdown-menu" aria-labelledby="dropdown04">-->
<!--                      <a class="dropdown-item" href="index.php?page=proizvodi">Svi proizvodi</a>-->
<!--                    <a class="dropdown-item" href="shop.html">Voće</a>-->
<!--                    <a class="dropdown-item" href="wishlist.html">Povrće</a>-->
<!--                    <a class="dropdown-item" href="product-single.html">Sokovi</a>-->
<!--                    <a class="dropdown-item" href="cart.html">Sušeno voće</a>-->
<!---->
<!--                  </div>-->
<!--                </li>-->
	          <li class="nav-item"><a href="index.php?page=onama" class="nav-link">O nama</a></li>
<!--	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>-->
	          <li class="nav-item"><a href="index.php?page=kontakt" class="nav-link">Kontakt</a></li>
                <?php
                    if(isset($_SESSION['korisnik'])):
                ?>
                <li class="nav-item"><a href="index.php?page=mojnalog" class="nav-link">
                    Moj nalog
                </a></li>
                <?php else: ?>
                <li class="nav-item"><a href="index.php?page=reglog" class="nav-link">
                    Registracija
                </a></li>
                <?php endif;?>
	          <li class="nav-item cta cta-colored"><a href="index.php?page=korpa" class="nav-link" id='brojnarud'><span class="icon-shopping_cart"></span>[0]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->