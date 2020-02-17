<?php

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Admin</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/">Početna</a></li>
            <li class="breadcrumb-item active">Admin panel - Početna</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">



        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Narudžbe</span>
              <span class="info-box-number"><?= $brojNovihNarudzba->broj_novih ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Broj korisnika</span>
              <span class="info-box-number"><?= $brojKorisnika->broj_korisnika ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Poslednje narudžbine</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Korisnik</th>
                    <th>Status</th>
                    <th>Ukupna cena</th>
                    <th>Više informacija</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                    foreach ($narudzbe as $narudzba):
                  ?>
                    <tr>
                      <td><a href="pages/examples/invoice.html"><?= $narudzba->narudzba_id?></a></td>
                      <td><?= $narudzba->ime?> <?= $narudzba->prezime?></td>
                      <td>
                        <?php
                          if($narudzba->narudzba_obradjena==0):
                        ?>
                            <span class="badge badge-danger">Nije obrađena</span>
                        <?php else:?>
                            <span class="badge badge-success">Obradjena</span>
                        <?php endif;?>
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?= $narudzba->ukupna_cena?></div>
                      </td>
                      <td>
                        <a href="index.php?adminpage=narudzbainfo&id=<?=$narudzba->narudzba_id?>" class="btn btn-block btn-primary">Info</a>

                      </td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="index.php?adminpage=narudzbe" class="btn btn-sm btn-info float-left">Pogledaj sve narudžbe</a>

            </div>
            <!-- /.card-footer -->
          </div>

          <!-- /.card -->


        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->

          <!-- PRODUCT LIST -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Novi proizvodi</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                <?php foreach ($noviProizvodi as $proizvod): ?>
                <li class="item">
                  <div class="product-img">
                    <img src="../app/assets/images/proizvodi/<?= $proizvod->putanja?>" alt="<?= $proizvod->alt?>" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?= $proizvod->naziv?>
                      <span class="badge badge-warning float-right"><?= $proizvod->cena ?> DIN</span></a>
                    <span class="product-description">
                        <?= substr($proizvod->opis,0,50); ?>
                      </span>
                  </div>
                </li>
                <?php endforeach;?>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="index.php?adminpage=proizvodi" class="uppercase">Pogledaj sve proizvode</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
          <?php
            foreach ($noviKomentari as $komentari):
              $datum=date("d-m-Y", strtotime($komentari->datum_komentara ));
          ?>
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">

              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-12">
                    <h2 class="lead"><b><?= $komentari->ime ?> <?= $komentari->prezime ?></b></h2>
                    <p class="text-muted text-sm"><b>Datum postavke: </b> <?= $datum?> </p>
                    <p class="text-muted text-sm"><b>Komentar ostavljen na proizvodu: </b> <?= $komentari->naziv?> </p>
                    <p class="text-muted text-sm"><b>Naslov komentara: </b> <?= $komentari->naslov?> </p>
                    <hr>
                    <p class="text-muted text-sm"><b>Tekst komentara: </b> <?= $komentari->komentar?> </p>

                  </div>

                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <?php if($komentari->aktivan==0):?>
                    <a href="#" class="btn btn-sm btn-secondary"> Komentar nije odobren </a>
                  <?php else: ?>
                    <a href="#" class="btn btn-sm bg-teal"> Komentar je odobren </a>
                  <?php endif;?>



                </div>
              </div>
            </div>
          </div>
          <?php endforeach;?>

        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
          <a href="index.php?adminpage=komentari" class="btn btn-sm btn-primary">Pogledaj sve komentare</a>
        </nav>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
