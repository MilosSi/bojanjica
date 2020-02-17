
<?php

?>

<div class="hero-wrap hero-bread" style="background-image: url('app/assets/images/slider/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Početna</a></span> <span class="mr-2"><a href="index.php?page=svproizvodi">Svi proizvodi</a></span> <span>Zaseban proizvod</span></p>
                <h1 class="mb-0 bread"><?= $proizvod->naziv ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="app/assets/images/proizvodi/<?= $proizvod->putanja ?>" class="image-popup"><img src="app/assets/images/proizvodi/<?= $proizvod->putanja ?>" class="img-fluid" alt="<?= $proizvod->alt ?>" title="<?= $proizvod->alt?>"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?= $proizvod->naziv ?></h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
<!--                    <p class="text-left mr-4">-->
<!--                        <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>-->
<!--                    </p>-->
<!--                    <p class="text-left">-->
<!--                        <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>-->
<!--                    </p>-->
                </div>

                <?php
                if($proizvod->cena_popust!=null):
                    ?>
                    <p class="price"><span class="mr-2 price-dc" style="color: #82ae46;text-decoration: line-through"><?= $proizvod->cena ?> DIN</span><span class="price-sale" id="mainprice" data-mainp="<?= $proizvod->cena_popust ?>"><?= $proizvod->cena_popust?> DIN</span></p>
                <?php else:?>
                    <p class="price"><span id="mainprice" data-mainp="<?= $proizvod->cena ?>"><?= $proizvod->cena ?> DIN </span></p>
                <?php endif;?>

                <?php
                    //Tip proizvoda komentar
                    if($proizvod->tp_id==1){
                        $komentar="Cena se odnosi na vrednost od 1 KG";
                    }
                    elseif($proizvod->tp_id==2)
                    {
                        $komentar="Proizvod se prodaje u pakovanju";
                    }
                    else
                    {
                        $komentar="Proizvod se prodaje u staklenoj ambalaži";
                    }


                ?>
                <p><?= $komentar?></p>
                <p><?= $proizvod->opis ?>
                </p>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group d-flex">
                            <div class="select-wrap">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>

                                <?php
                                    if($proizvod->tp_id==1):
                                ?>
                                <select name="" id="tp1" class="form-control kolicinacena" data-tid="<?= $proizvod->tp_id?>" data-idp="<?= $proizvod->id ?>">
                                    <option value="500">500G</option>
                                    <option value="1000" selected>1KG</option>
                                    <option value="2000">2KG</option>
                                    <option value="5000">5KG</option>
                                </select>
                                <?php
                                    elseif ($proizvod->tp_id==2):
                                ?>
                                <select name="" id="tp2" class="form-control kolicinacena" data-tid="<?= $proizvod->tp_id?>" data-idp="<?= $proizvod->id ?>">
                                    <?php foreach ($ceneProizvoda as $cp):?>
                                        <option value="<?= $cp->id?>" <?= ($cp->glavna_cena==1)? 'selected': '';?>><?= $cp->kolicina?>g</option>
                                    <?php endforeach;?>
                                </select>
                                <?php
                                    else:
                                ?>
                                <select name="" id="tp2" class="form-control kolicinacena" data-tid="<?= $proizvod->tp_id?>" data-idp="<?= $proizvod->id ?>">
                                    <?php foreach ($ceneProizvoda as $cp):?>
                                        <option value="<?= $cp->id?>" <?= ($cp->glavna_cena==1)? 'selected': '';?>><?= $cp->kolicina/1000?>L</option>
                                    <?php endforeach;?>
                                </select>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <?php if($proizvod->tp_id!=6):?>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                               <i class="ion-ios-remove"></i>
                                </button>
                                </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                    <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                 <i class="ion-ios-add"></i>
                             </button>
                            </span>
                        </div>

                    <?php endif; ?>
                    <div class="w-100"></div>
                </div>
                <p><a href="#" id="dodajukorpu" data-idproizvoda="<?= $proizvod->id ?>" class="btn btn-black py-3 px-5">Dodaj u korpu</a></p>
                <div class="col-md-12" style="padding-right: 0px;padding-left: 0px;margin-top: 25px;">
                    <?php
                        if(isset($_SESSION['korisnik'])):
                    ?>
                    <form action="index.php?page=dodajkomentar" class="billing-form" method="post" onsubmit="return provera()">
                        <input type="hidden" name="idProzivda" value="<?= $proizvod->id?>">
                        <h3 class="mb-4 billing-heading">Komentar</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="naslov" id="naslovLabel">Naslov</label>
                                    <input type="text" class="form-control" placeholder="Naslov komentara" id="naslov" name="naslov">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ocenaProizvoda" id="ocenaProizvodaLabel">Ocena proizvoda</label>
                                    <select class="form-control" id="ocenaProizvoda" name="ocenaProizvoda">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-100"></div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="komentar" id="komentarLabel">Komentar</label>
                                    <textarea class="form-control" id="komentar" name="komentar" rows="3" style="width: 100%;text-align: left;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Pošalji komentar" name="subKomentar" class="btn btn-primary py-3 px-5" style="border-radius:0.25rem; ">
                                </div>
                            </div>
                        </div>
                    </form><!-- END -->
                    <?php else:?>
                            <form action="#" class="billing-form">
                                <p style="font-size: 20px;color: #82ae46">Ulogujte se kako bi ostavljali komentare na proizvodima </p>

                                <p><a href="index.php?page=reglog" class="btn btn-primary py-3 px-4">Logovanje</a></p>
                            </form>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Komentari</span>
                <?php
                    $aktivan=0;
                    foreach ($komentari as $komentar)
                    {
                        $aktivan=$aktivan+$komentar->aktivan;
                    }
                    if($komentari!=null && $aktivan!=0):
                ?>
                <h2 class="mb-4">Naše zadovoljne mušterije su imale ovo da kažu:</h2>
                <?php else:?>
                <h2 class="mb-4">Ovaj proizvod još nema komentara</h2>
                <p>Budite prvi koji će komentarisati ovaj proizvod</p>
                <?php endif;?>

            </div>
        </div>
        <?php
            if($komentari!=null):
        ?>
        <div class="row ftco-animate">
            <div class="col-md-8" style="margin:0 auto">
                <div class="carousel-komentari owl-carousel">
                    <?php
                    foreach ($komentari as $komentar):
                        if($komentar->aktivan==1):
                            $datum = date("d-m-Y", strtotime($komentar->datum_komentara));

                            ?>
                            <div class="item">
                                <div class="testimony-wrap p-4">
                                    <div class="user-img mb-5" style="right: 30px;">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                      <i class="icon-quote-left"></i>
                                    </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class=" pl-4 line"><?= $komentar->komentar ?></p>
                                        <p class="name"><?= $komentar->ime ?></p>
                                        <span class="position"><?= $datum?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</section>


<section class="ftco-section" style="padding-top: 25px;">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Proizvodi</span>
                <h2 class="mb-4">Povezani proizvodi</h2>
                <p>Izdvajamo iz naše ponude</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <?php
                foreach ($proizvodiPoKategoriji as $ppk):
                    if($ppk->id!=$proizvod->id):
            ?>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="index.php?page=proizvod&idp=<?=$ppk->id?>" class="img-prod" style="height: 200px;"><img class="img-fluid" src="app/assets/images/proizvodi/<?= $ppk->putanja ?>" alt="<?= $ppk->alt ?>" title="<?= $ppk->alt ?>">
                        <?php
                        if($ppk->cena_popust!=null):
                            $procenat=($ppk->cena_popust*100)/$ppk->cena;
                            $popustProcenat=100-$procenat;
                            $popustProcenat=round($popustProcenat);
                            ?>
                            <span class="status"><?= $popustProcenat?>%</span>
                            <div class="overlay"></div>
                        <?php endif;?>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3 style="min-height: 42px;"><a href="#"><?= $ppk->naziv?></a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <?php
                                if($ppk->cena_popust!=null):
                                    ?>
                                    <p class="price"><span class="mr-2 price-dc"><?= $ppk->cena ?> DIN</span><span class="price-sale"><?= $ppk->cena_popust?></span></p>
                                <?php else:?>
                                    <p class="price"><span><?= $ppk->cena ?> DIN </span></p>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="index.php?page=proizvod&idp=<?=$ppk->id?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
<!--                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">-->
<!--                                    <span><i class="ion-ios-cart"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="heart d-flex justify-content-center align-items-center ">-->
<!--                                    <span><i class="ion-ios-heart"></i></span>-->
<!--                                </a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
</section>
