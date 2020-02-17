<?php

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 p-5" id="checkout">
            <p>Hvala vam na ukazanom poverenju</p>
            <p>Potrudićemo se da vaša narudžbine stigne u najkraćem vremenskom roku !</p>
            <p>Broj vaše narudžbenice je <b><?= $idNarudzbenice?></b></p>
            <?php
                if($tipPlacanja==1):
            ?>
                <p>Bankovni račun na koji vršite uplatu je <b>193-4587-521</b> dok je poziv na broj <b>192-<?= $idNarudzbenice?></b></p>
            <?php endif;?>
            <p style="width: 20%; margin: 20px auto;"><a href="index.php?page=home" class="btn btn-primary py-3 px-4" style="width: 100%; ">Početna</a></p>
        </div>
    </div>
</div>
