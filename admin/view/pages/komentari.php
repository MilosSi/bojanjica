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
                      <a href="javascript:void(0)" class="btn btn-sm btn-secondary"> Komentar nije odobren </a>
                      <a href="index.php?adminpage=komentarlogika&idk=<?= $komentari->komentar_id?>" class="btn btn-sm bg-teal"> Aktiviraj </a>
                    <?php else: ?>
                      <a href="javascript:void(0)" class="btn btn-sm bg-teal"> Komentar je odobren </a>
                      <a href="index.php?adminpage=komentarlogika&delete=1&idk=<?= $komentari->komentar_id?>" class="btn btn-sm btn-danger">
                        <i class="fas fa-user"></i>Obriši komentar
                      </a>
                    <?php endif;?>




                  </div>
                </div>
              </div>
            </div>
          <?php endforeach;?>

        </div>
      </div>
      <!-- /.card-body -->

      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
