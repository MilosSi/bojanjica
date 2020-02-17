<div class="hero-wrap hero-bread" style="background-image: url('app/assets/images/slider/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Početna</a></span> <span>Korpa</span></p>
                <h1 class="mb-0 bread">Moje narudžbine</h1>
            </div>
        </div>
    </div>
</div>
<div id="praz">
    <p id="praznakorpa">Vaša korpa je prazna</p>
    <p><a href="index.php?page=proizvodi" class="btn btn-primary py-3 px-4">Svi proizvodi</a></p>
</div>
<section class="ftco-section ftco-cart" id="koorpa">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                        <tr class="text-center">
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Naziv proizvoda</th>
                            <th>Cena</th>
                            <th>Količina</th>
                            <th>Ukupno</th>
                        </tr>
                        </thead>
                        <tbody id="korpapopuni">


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Kupon</h3>
                    <p>Unesi te kupon za popust ukoliko imate jedan</p>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">Kupon kod</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                    </form>
                </div>
                <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Primeni kupon</a></p>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Dostava</h3>
                    <p> Dostava se naplaćuje 200 DIN</p>
                    <p>*Za narudžbine preko 1000 DIN dostava je besplatna</p>

                </div>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
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
                <p><a href="index.php?page=placanje" class="btn btn-primary py-3 px-4">Plaćanje</a></p>
            </div>
        </div>
    </div>
</section>

