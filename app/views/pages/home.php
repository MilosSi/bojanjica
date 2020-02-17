<?php
    list($kat1, $kat2) = array_chunk($kategorije, ceil(count($kategorije) / 2));

?>


<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <?php
            foreach ($sliders as $slider):
                if($slider->aktivan==1):

        ?>
        <div class="slider-item" style="background-image: url(app/assets/images/slider/<?= $slider->putanja?>);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2"><?= $slider->naslov_mali?></h1>
                        <h2 class="subheading mb-4"><?= $slider->naslov_veliki ?></h2>
                        <p><a href="<?= $slider->link ?>" class="btn btn-primary">Pogledajte više</a></p>
                    </div>

                </div>
            </div>
        </div>
        <?php endif;?>
        <?php endforeach;?>

    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters ftco-services">
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-shipped"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Besplatna dostava</h3>
                        <span>Za narudzbine preko 1000 RSD</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-diet"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Upakovani proizvodi</h3>
                        <span>100% sveži</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-award"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Superiorni kvalitet</h3>
                        <span>Organski proizvodi</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Podrška</h3>
                        <span>24/7 Dostupni</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-category ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 order-md-last align-items-stretch d-flex">
                        <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(app/assets/images/category.jpg);">
                            <div class="text text-center">
                                <h2>BOJANJICA</h2>
                                <p>Čuvar vašeg zdravlja</p>
                                <p><a href="index.php?page=proizvodi" class="btn btn-primary">Kupujte odmah</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <?php
                        foreach ($kat1 as $kategorija1):
                            if($kategorija1->aktivna==1):
                        ?>
                        <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(app/assets/images/kategorije/<?=$kategorija1->putanja?>);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="index.php?page=proizvodi"><?= $kategorija1->naziv?></a></h2>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">

                <?php
                    foreach ($kat2 as $kategorija2):
                        if($kategorija2->aktivna==1):
                ?>
                <div class="category-wrap ftco-animate img  d-flex align-items-end" style="background-image: url(app/assets/images/kategorije/<?=$kategorija2->putanja?>);">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="index.php?page=proizvodi"><?= $kategorija2->naziv?></a></h2>
                    </div>
                </div>
                <?php endif;?>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Izdvojeni proizvodi</span>
                <h2 class="mb-4">Naši proizvodi</h2>
                <p>Organski proizvodi proverenog kvaliteta samo za vas</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!--Proizvodi            -->
            <?php
                foreach($istaknutiProizvodi as $ip):

            ?>

            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="index.php?page=proizvod&idp=<?= $ip->id?>" class="img-prod" style="min-height: 202px"><img class="img-fluid" src="app/assets/images/proizvodi/<?= $ip->putanja ?>" alt="<?= $ip->alt?>" title="<?= $ip->alt?>">
                        <?php
                            if($ip->cena_popust!=null):
                                $procenat=($ip->cena_popust*100)/$ip->cena;
                                $popustProcenat=100-$procenat;
                                $popustProcenat=round($popustProcenat);
                        ?>
                            <span class="status"><?= $popustProcenat?>%</span>
                            <div class="overlay"></div>
                        <?php endif;?>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3 style="min-height: 42px;"><a href="index.php?page=proizvod&idp=<?= $ip->id?>"><?= $ip->naziv?></a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <?php
                                    if($ip->cena_popust!=null):
                                ?>
                                    <p class="price"><span class="mr-2 price-dc"><?= $ip->cena ?> DIN</span><span class="price-sale"><?= $ip->cena_popust?></span></p>
                                <?php else:?>
                                    <p class="price"><span><?= $ip->cena ?> DIN </span></p>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="index.php?page=proizvod&idp=<?= $ip->id?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>

<section class="ftco-section img" style="background-image: url(app/assets/images/<?= $ponudaDana->putanja?>);">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                <span class="subheading" style="color: #fff;">Najbolje cene samo za tebe</span>
                <h2 class="mb-4">Ponuda dana</h2>
                <p>Izdvajamo</p>
                <h3><a href="index.php?page=proizvod&idp=<?=$ponudaDana->proizvod_id?>" style="color: #000;font-weight: bold"><?= $ponudaDana->naziv ?></a></h3>
                <span class="price"><?= $ponudaDana->cena?> DIN/Kg <a href="#" style="color: #000;"> sada samo <?= $ponudaDana->cena_popust?> DIN/Kg</a></span>
                <div id="timer" class="d-flex mt-5">
                    <div class="time" id="days"></div>
                    <div class="time pl-3" id="hours"></div>
                    <div class="time pl-3" id="minutes"></div>
                    <div class="time pl-3" id="seconds"></div>
                </div>
                <?php
                    $datum=strtotime($ponudaDana->datum_kraja_akcije);
                ?>
                <input type="hidden" id="datum_kraja" value="<?= $ponudaDana->datum_kraja_akcije?>">
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Utisci</span>
                <h2 class="mb-4">Naše zadovoljne mušterije su imale ovo da kažu:</h2>
                <p>Da li ima nešto lepše od zdrave, domaće hrane, i to one koja vam stigne pravo na vrata?</p>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <?php
                        foreach ($utisci as $utisak):
                            if($utisak->aktivan==1):

                    ?>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(app/assets/images/utisci/<?= $utisak->putanja?>)">
                            <span class="quote d-flex align-items-center justify-content-center">
                              <i class="icon-quote-left"></i>
                            </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line"><?= $utisak->utisak ?></p>
                                <p class="name"><?= $utisak->ime ?></p>
                                <span class="position"><?= $utisak->posao?></span>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>

<hr>

<section class="ftco-section ftco-partner">
    <div class="container">
        <div class="row">
            <div class="col-sm ftco-animate">
                <a href="#" class="partner" style="height: 120px;"><img src="app/assets/images/partner-1.jpg" class="img-fluid" alt="Colorlib Template" style="height: 100%;width: 100%;"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner" style="height: 120px;"><img src="app/assets/images/partner-6.jpg" class="img-fluid" alt="Colorlib Template" style="height: 100%;width: 100%;"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner" style="height: 120px;"><img src="app/assets/images/partner-7.png" class="img-fluid" alt="Colorlib Template" style="height: 100%;width: 100%;"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner" style="height: 120px;"><img src="app/assets/images/partner-8.jpg" class="img-fluid" alt="Colorlib Template" style="height: 100%;width: 100%;"></a>
            </div>
        </div>
    </div>
</section>
