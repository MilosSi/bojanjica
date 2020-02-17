<div class="hero-wrap hero-bread" style="background-image: url('app/assets/images/slider/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Početna</a></span> <span>O nama</span></p>
                <h1 class="mb-0 bread">O Bojanjici</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(app/assets/images/about.jpg);">
                <a href="#" class="icon popup-vimeo d-flex justify-content-center align-items-center">
<!--                    <span class="icon-play"></span>-->
                </a>
            </div>
            <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section-bold mb-4 mt-md-5">
                    <div class="ml-md-0">
                        <h2 class="mb-4">Dobrodošli na eCommerce sajt Bojanjice</h2>
                    </div>
                </div>
                <div class="pb-md-5">
                    <p>Tražite svežu-organski gajenu hranu od ljudi kojima je zaista stalo? Na pravom ste mestu!
                    </p>
                    <p>Za Vas biramo samo najkvalitetnije organske proizvode,nudeći pri tom najbolje što nam priroda može pružiti.
                        Iskustva i saveti koje delimo sa Vama su istiniti i provereni jer je organska ishrana naša strast i način zivota.
                        Posebnu pažnju posvećujemo najvećem izboru organskog voća i povrća koje sa bio gazdinstava iz Srbije svakodnevno stižu u Organico.</p>
                    <p><a href="#" class="btn btn-primary">Prodavnica</a></p>
                </div>
            </div>
        </div>
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

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(app/assets/images/bg_3.jpg);">
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="10000">0</strong>
                                <span>Zadovoljih mušterije</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="100">0</strong>
                                <span>Prodavnica</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="1000">0</strong>
                                <span>Partnera</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="100">0</strong>
                                <span>Nagrade</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>