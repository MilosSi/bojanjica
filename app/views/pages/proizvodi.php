<?php

?>

<div class="hero-wrap hero-bread" style="background-image: url('app/assets/images/slider/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Početna</a></span> <span>Svi proizvodi</span></p>
                <h1 class="mb-0 bread">Orgaski proizvodi</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 filteri">
                <input type="search" name="pretraga" id="pretraga" placeholder="Jagode">
                <button class="submitPretraga" id="submitPretraga">Pretraži</button>
                <hr>
                <p id="filterp">Filteri</p>
                <form action="#" method="get" id="filteriform">
                    <?php
                        foreach($kategorije as $kategorija):
                    ?>
                    <input type="checkbox" name="kategorija" value="<?= $kategorija->kat_id ?>"><span id="cbxvalue"><?= $kategorija->naziv ?></span><br>
                    <?php endforeach;?>
                    <hr>
                    Min cena : <input type="text" placeholder="0" value="0" id="pretraga" class="minVre"><br>
                    Max cena : <input type="text" placeholder="1500" value="1500" id="pretraga" class="maxVre"><br>

                    <input type="submit" name="sub" class="submitPretraga" id="submitFilter" value="Filter">
                    <hr>



                </form>

            </div>

            <div class="col-md-9"?>
                <div class="row ajaxispis">
                    <?php
                        foreach($proizvodi as $proizvod):
                    ?>
                        <div class="col-md-6 col-lg-4 ftco-animate">
                            <div class="product">
                                <a href="index.php?page=proizvod&idp=<?= $proizvod->id?>" class="img-prod" style="min-height: 202px"><img class="img-fluid" src="app/assets/images/proizvodi/<?= $proizvod->putanja ?>" alt="<?= $proizvod->alt?>" title="<?= $proizvod->alt?>">
                                    <?php
                                    if($proizvod->cena_popust!=null):
                                        $procenat=($proizvod->cena_popust*100)/$proizvod->cena;
                                        $popustProcenat=100-$procenat;
                                        $popustProcenat=round($popustProcenat);
                                        ?>
                                        <span class="status"><?= $popustProcenat?>%</span>
                                        <div class="overlay"></div>
                                    <?php endif;?>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3 style="min-height: 42px;"><a href="index.php?page=proizvod&idp=<?= $proizvod->id?>"><?= $proizvod->naziv?></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <?php
                                            if($proizvod->cena_popust!=null):
                                                ?>
                                                <p class="price"><span class="mr-2 price-dc"><?= $proizvod->cena ?> DIN</span><span class="price-sale"><?= $proizvod->cena_popust?> DIN</span></p>
                                            <?php else:?>
                                                <p class="price"><span><?= $proizvod->cena ?> DIN </span></p>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex">
                                            <a href="index.php?page=proizvod&idp=<?= $proizvod->id?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                <span><i class="ion-ios-menu"></i></span>
                                            </a>
<!--                                            <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">-->
<!--                                                <span><i class="ion-ios-cart"></i></span>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="heart d-flex justify-content-center align-items-center ">-->
<!--                                                <span><i class="ion-ios-heart"></i></span>-->
<!--                                            </a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>

                </div>

            </div>
        </div>
        <div class="row mt-5 ajaxvis">
            <div class="col text-center">
                <div class="block-27">


                    <ul>
                        <li><a href="index.php?page=proizvodi&s=1">&lt;</a></li>
                        <?php
                            for($i=1;$i<=$brojStranica;$i++):
                        ?>
                        <?php
                            if($i==$brojStrane):
                        ?>
                            <li class="active"><span><?= $i?></span></li>
                        <?php else:?>
                            <li><a href="index.php?page=proizvodi&s=<?=$i ?>"><?=$i ?></a></li>
                        <?php endif;?>
                        <?php endfor;?>
                        <li><a href="index.php?page=proizvodi&s=<?= $i-1?>">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>