<?php

?>

<div class="hero-wrap hero-bread" style="background-image: url('app/assets/images/slider/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Početna</a></span> <span>Plaćanje</span></p>
                <h1 class="mb-0 bread">Narudžbenica</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 ftco-animate">
               <?php
                if (isset($_SESSION['korisnik'])):
               ?>

                    <h3 class="mb-4 billing-heading" style="font-size: 30px;">Detalji narudžbenice</h3>
                    <p style="font-size: 20px;color: #82ae46">Ostale informacije su preuzete sa vašeg naloga (Ime, prezime itd) </p>
                    <p>Nalog: <span style="margin-left: 5px;color: #82ae46"><?= $_SESSION['korisnik']->ime?> <?= $_SESSION['korisnik']->prezime?></span></p>
                    <!--Glavna adresa-->

                    <input type="hidden" id="gradGlavna" value="<?= $_SESSION['korisnik']->grad ?>">
                    <input type="hidden" id="ulbrGlavna" value="<?= $_SESSION['korisnik']->brulica ?>">
                    <input type="hidden" id="posbrGlavna" value="<?= $_SESSION['korisnik']->post_br ?>">
                    <input type="hidden" id="teleGlavna" value="<?= $_SESSION['korisnik']->telefon ?>">
                    <select name="adrese" id="adrese" class="form-control" style="margin-bottom: 25px;width: 50%;">
                        <option value="0" selected>Glavna Adresa</option>
                        <?php
                            foreach ($dod_adresa as $dda):
                        ?>
                        <option value="<?= $dda->id?>"><?= $dda->brulica?></option>
                        <?php endforeach;?>
                    </select>
                    <div class="col-md-12 mojnalogbasic" id="dodatnaAdresaIzmena">
                        <h3 class="mb-4 billing-heading" style="font-size: 30px;width: 100%;">Detalji Adrese</h3>
                        <p>Grad</p><p><?= $_SESSION['korisnik']->grad ?></p>
                        <p>Ulica i broj</p><p><?= $_SESSION['korisnik']->brulica ?></p>
                        <p>Poštanski broj</p><p><?= $_SESSION['korisnik']->post_br ?></p>
                        <p>Telefon</p><p><?= $_SESSION['korisnik']->telefon ?></p>
                    </div>
                <?php
                else:
               ?>
                <form action="#" class="billing-form">
                    <h3 class="mb-4 billing-heading" style="font-size: 30px;">Detalji narudžbenice</h3>
                    <p style="font-size: 20px;color: #82ae46">Detalji vaše adrese uzeti su iz vašeg naloga </p>
                    <p>Molimo vas da se pre plaćanja registrujete (Uvid u prošle narudžbe, dodatne adrese)</p>
                    <p><a href="index.php?page=reglog" class="btn btn-primary py-3 px-4">Registracija</a></p>
                </form>

                <?php endif;?>
            </div>
            <div class="col-xl-5">
                <div class="row mt-5 pt-3">
                    <div class="col-md-12 d-flex mb-5">
                        <div class="cart-detail cart-total p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Cart Total</h3>
                            <p class="d-flex" id="ukupnaCena">

                            </p>
                            <p class="d-flex" id="ukupnoDostava">

                            </p>
                            <p class="d-flex">
                                <span>Popust</span>
                                <span>0 DIN</span>
                            </p>
                            <hr>
                            <p class="d-flex total-price" id="ukupnaKrajCena">

                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="cart-detail p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Način plaćanja</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="nacinplacanja"  value="Bankovni" data-tipp="1" class="mr-2 nacinplacanja"> Direktan bankovni transfer</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="nacinplacanja" value="Pouzecem" data-tipp="2"  class="mr-2 nacinplacanja"> Plaćanje pouzeću</label>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="form-group">-->
<!--                                <div class="col-md-12">-->
<!--                                    <div class="radio">-->
<!--                                        <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="" class="mr-2" id="uslovi"> Pročitao sam i prihvatam uslove i odredbe </label>
                                    </div>
                                </div>
                            </div>
                            <p><a href="#"class="btn btn-primary py-3 px-4" id="naruci">Naruči</a></p>
                        </div>
                    </div>
                </div>
            </div> <!-- .col-md-8 -->
        </div>
    </div>
</section> <!-- .section -->