<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Prijavite se na naš Newsletter</h2>
                <span>Dobijajte ažuriranja putem e-pošte o našim najnovijim prodavnicama i specijalnim ponudama</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="index.php?page=newsletter" class="subscribe-form" method="post">
                    <div class="form-group d-flex">
                        <input type="email" class="form-control" placeholder="Unesite vašu e-mail adresu" name="mail">
                        <input type="submit" value="Prijavi se" class="submit px-3" name="subNews">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="ftco-footer ftco-section" style="padding-bottom: 20px;">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Bojanjica</h2>
              <p>Za Vas biramo samo najkvalitetnije organske proizvode,nudeći pri tom najbolje što nam priroda može pružiti.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Meni</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Početna</a></li>
                <li><a href="#" class="py-2 d-block">Proizvodi</a></li>
                <li><a href="#" class="py-2 d-block">Blog</a></li>
                <li><a href="#" class="py-2 d-block">Kontakt</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Informacije</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="index.php?page=autor" class="py-2 d-block">Autor</a></li>
	                <li><a href="dokumentacija.pdf" class="py-2 d-block">Dokumentacija</a></li>

	              </ul>
<!--	              <ul class="list-unstyled">-->
<!--	                <li><a href="#" class="py-2 d-block">FAQs</a></li>-->
<!--	                <li><a href="#" class="py-2 d-block">Contact</a></li>-->
<!--	              </ul>-->
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Imate pitanje?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Narodnih Heroja, Beograd, Srbija</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+123456789</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">office@bojanjica.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>

      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="app/assets/js/jquery.min.js"></script>
  <script src="app/assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="app/assets/js/popper.min.js"></script>
  <script src="app/assets/js/bootstrap.min.js"></script>
  <script src="app/assets/js/jquery.easing.1.3.js"></script>
  <script src="app/assets/js/jquery.waypoints.min.js"></script>
  <script src="app/assets/js/jquery.stellar.min.js"></script>
  <script src="app/assets/js/owl.carousel.min.js"></script>
  <script src="app/assets/js/jquery.magnific-popup.min.js"></script>
  <script src="app/assets/js/aos.js"></script>
  <script src="app/assets/js/jquery.animateNumber.min.js"></script>
  <script src="app/assets/js/bootstrap-datepicker.js"></script>
  <script src="app/assets/js/scrollax.min.js"></script>
  <script src="app/assets/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="app/assets/js/google-map.js"></script>
  <script src="app/assets/js/main.js"></script>

    <?php
        if(isset($_GET['page'])):
    ?>
            <?php
            if($_GET['page']=='proizvod'):
                ?>
                <script src="app/assets/js/proizvodi.js"></script>
            <?php endif;?>
            <?php
            if($_GET['page']=='proizvodi'):
                ?>
                <script src="app/assets/js/sviproizvodi.js"></script>
            <?php endif;?>
            <?php
            if($_GET['page']=='reglog'):
                ?>
                <script src="app/assets/js/reglog.js"></script>
            <?php endif;?>
            <?php
            if($_GET['page']=='korpa'):
                ?>
                <script src="app/assets/js/korpa.js"></script>
            <?php endif;?>
            <?php
            if($_GET['page']=='placanje'):
                ?>
                <script src="app/assets/js/placanje.js"></script>
            <?php endif;?>
            <?php
            if($_GET['page']=='mojnalog'):
                ?>
                <script src="app/assets/js/mojnalog.js"></script>
            <?php endif;?>
    <?php endif;?>
  </body>
</html>