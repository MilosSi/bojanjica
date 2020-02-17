<?php

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dodaj proizvod</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="/admin/"><a href="#">Početna / </a></li>
            <li class="breadcrumb-item active">Admin - Dodaj proizvod</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <form action="index.php?adminpage=dodajproizvodlogika" method="post" style="width: 100%;display: flex;" enctype="multipart/form-data">
        <div class="col-md-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Proizvod info</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Naziv proizvoda</label>
                <input type="text" id="naziv" name="naziv" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Opis proizvoda</label>
                <textarea id="opis" name="opis" class="form-control" rows="4"></textarea>
              </div>
              <!--            -->
              <div class="form-group">
                <label for="inputStatus">Kategorija proizvoda</label>
                <select class="form-control custom-select" name="kategorija_id" id="kategorija_id">

                  <option selected disabled>Izaberite</option>
                  <?php foreach($kategorija as $kat):?>
                    <option value="<?= $kat->kat_id?>"><?= $kat->naziv?></option>
                  <?php endforeach;?>

                </select>
              </div>

              <div class="form-group">
                <label for="inputStatus">Tip cene proizvoda</label>
                <select class="form-control custom-select" name="tip_p_id" id="tip_p_id">

                  <option selected disabled>Izaberite</option>
                  <?php foreach($tipovi as $tip):?>
                    <option value="<?= $tip->id?>"><?= $tip->naziv?></option>
                  <?php endforeach;?>

                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputFile">Slika proizvoda</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="slika" name="slika">
                    <label class="custom-file-label" for="slika">Izaberi sliku</label>
                  </div>

                </div>
              </div>
              <div class="form-group">
                <label for="inputName">Opis slike</label>
                <input type="text" id="alt" name="alt" class="form-control">
              </div>

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="istaknuti_p" name="istaknuti_p" value="1">
                <label class="form-check-label" for="istaknuti_p">Istaknuti proizvod</label>
              </div>



            </div>
            <input type="submit" id="sub" name="subDodaj" value="Dodaj novi proizvod" class="btn btn-success float-right">
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-8 cenablok">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Cena blok</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="row cenaostali">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="inputEstimatedBudget">Količina (1000 g/ml)</label>
                    <input type="number" id="kolicina" name="kolicina" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="inputEstimatedBudget">Cena</label>
                    <input type="number" id="cena" name="cena" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="inputEstimatedBudget">Cena popust</label>
                    <input type="number" id="cena_popust" name="cena_popust" class="form-control">
                  </div>
                </div>
              </div>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </form>
    </div>
    <div class="row">
      <div class="col-12">
        <a href="index.php?adminpage=proizvodi" class="btn btn-secondary">Nazad</a>

      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
