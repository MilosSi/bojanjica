<?php

?>
<div class="hero-wrap hero-bread" style="background-image: url('app/assets/images/slider/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Početna</a></span> <span>Moj nalog</span></p>
                <h1 class="mb-0 bread"><?= $_SESSION['korisnik']->ime ?> <?= $_SESSION['korisnik']->prezime?></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row p-5">
        <div class="col-md-6 mojnalogbasic">
            <h3 class="mb-4 billing-heading" style="font-size: 30px;width: 100%;">Detalji naloga</h3>
            <p>Ime</p><p><?= $_SESSION['korisnik']->ime ?></p>
            <p>Prezime</p><p><?= $_SESSION['korisnik']->prezime ?></p>
            <p>Grad</p><p><?= $_SESSION['korisnik']->grad ?></p>
            <p>Ulica i broj</p><p><?= $_SESSION['korisnik']->brulica ?></p>
            <p>Poštanski broj</p><p><?= $_SESSION['korisnik']->post_br ?></p>
            <p>Telefon</p><p><?= $_SESSION['korisnik']->telefon ?></p>
        </div>
        <div class="col-md-6 mojnalogbasic">
            <p style="width: 50%;"><a href="index.php?page=logout" class="btn btn-primary py-3 px-4" style="width: 100%; ">Izloguj se</a></p>

        </div>

        <div class="col-md-12">
            <h3 class="mb-4 billing-heading" style="font-size: 30px;width: 100%; margin-top: 15px;">Dodatne adrese</h3>
        </div>
        <?php
            if($dod_adresa!=null):
        ?>
            <?php
                foreach($dod_adresa as $adrese):
            ?>
                <div class="col-md-4 dodatnaadresa">
                    <h3 class="mb-4 billing-heading" style="font-size: 20px;width: 100%;">Adresa: <?= $adrese->brulica ?></h3>
                    <p>Grad</p><p><?= $adrese->grad ?></p>
                    <p>Ulica</p><p><?= $adrese->brulica ?></p>
                    <p>Poštanski broj</p><p><?= $adrese->post_br ?></p>
                    <p>Telefon</p><p><?= $adrese->telefon ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif;?>
    </div>


    <div class="row p-5">
        <div class="col-md-6 mojnalogbasic">
            <form action="index.php?page=dodatnaadresa" class="billing-form" method="post" onsubmit="return provera()">

                <h3 class="mb-4 billing-heading">Dodatna adresa</h3>
                <div class="row align-items-end">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="grad" id="gradLabel">Grad</label>
                            <input type="text" class="form-control" placeholder="Beograd" id="grad" name="grad">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="adresa" id="adresaLabel">Ulica i broj</label>
                            <input type="text" class="form-control" placeholder="Aleksandra Vučića 52" id="adresa" name="adresa">
                        </div>
                    </div>
                    <div class="w-100"></div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="posbr" id="posbrLabel">Poštanski broj</label>
                            <input type="text" class="form-control" placeholder="12345" id="posbr" name="posbr">
                        </div>
                    </div>

                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="telefon" id="telefonLabel">Telefon</label>
                            <input type="text" class="form-control" placeholder="123456789" id="telefon" name="telefon">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" value="Dodaj adresu" class="btn btn-primary py-3 px-5" style="border-radius:0.25rem; ">
                        </div>
                    </div>
                </div>
            </form><!-- END -->
        </div>



    </div>
</div>