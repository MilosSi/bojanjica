<?php
if($narudzbainfo->dodatna_adresa!=null)
{
  foreach ($dodatna_adresa as $da)
  {
    $grad=$da->grad;
    $brojiulica=$da->brulica;
    $postbr=$da->post_br;
    $telefon=$da->telefon;
  }
}
else
{
  $grad=$narudzbainfo->grad;
  $brojiulica=$narudzbainfo->brulica;
  $postbr=$narudzbainfo->post_br;
  $telefon=$narudzbainfo->telefon;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Narudžba info</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/">Početna</a></li>
            <li class="breadcrumb-item active">Admin panel - Narudžba info</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-5">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Podaci o naručiocu</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Ime i prezime</label>
              <input type="text" id="inputName" class="form-control" value="<?= $narudzbainfo->ime?> <?= $narudzbainfo->prezime?>">
            </div>
            <div class="form-group">
              <label for="inputName">Grad</label>
              <input type="text" id="inputName" class="form-control" value="<?= $grad?>">
            </div>
            <div class="form-group">
              <label for="inputName">Ulica</label>
              <input type="text" id="inputName" class="form-control" value="<?= $brojiulica?>">
            </div>
            <div class="form-group">
              <label for="inputName">Poštanski Broj</label>
              <input type="text" id="inputName" class="form-control" value="<?= $postbr?>">
            </div>
            <div class="form-group">
              <label for="inputName">Telefon</label>
              <input type="text" id="inputName" class="form-control" value="<?= $telefon?>">
            </div>

            <!--            <div class="form-group">-->
            <!--              <label for="inputDescription">Project Description</label>-->
            <!--              <textarea id="inputDescription" class="form-control" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>-->
            <!--            </div>-->

          </div>



          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-7">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Podaci o narudžbi</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <input type="hidden" value="<?= $_GET['id'] ?>" id="idnar">
            <div class="form-group">
              <label for="inputName">Ukupno za plaćanje</label>
              <input type="text" id="inputName" class="form-control" value="<?= $narudzbainfo->ukupna_cena?>">
            </div>
            <div class="form-group">
              <label for="inputName">Način plaćanja</label>
              <input type="text" id="inputName" class="form-control" value="<?= $narudzbainfo->nacina_placanja?>">
            </div>
            <div class="form-group">
              <label for="inputStatus">Status</label>
              <select class="form-control custom-select" id="status">
                <option selected disabled>Izaberite</option>
                <option <?= ($narudzbainfo->narudzba_obradjena==0)? 'selected':'' ?> value="0">Nije obradjena</option>
                <option <?= ($narudzbainfo->narudzba_obradjena==1)? 'selected':'' ?> value="1">Obradjena</option>

              </select>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Files</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table">
              <thead>
              <tr>
                <th>Id</th>
                <th>Naziv</th>
                <th>Pakovanje</th>
                <th>Broj Naručenih</th>
                <th>Cena Proizvoda/1</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($naruceni_proizvodi as $np):
                if($np->tip_p_id==1)
                {
                  if($np->cena_popust!=null)
                  {
                    $kolicina=$np->izabrana_cena/$np->cena_popust;
                    $kolicina=$kolicina.'kg';
                  }
                  else
                  {
                    $kolicina=$np->izabrana_cena/$np->cena;
                    $kolicina=$kolicina.'kg';
                  }


                }
                else
                {
                  foreach ($kolicinas as $kol )
                  {
                    if($np->proizvod_id==$kol->proizvod_id)
                    {
                      $kolicina=$kol->kolicina;
                    }
                  }

                  if($np->tip_p_id==3)
                  {
                    $kolicina=($kolicina/1000)."L";
                  }
                }


              ?>

              <tr>
                <td><?= $np->proizvod_id?></td>
                <td><?= $np->naziv?></td>
                <td><?= $kolicina?></td>
                <td><?= $np->narudzba_kolicina?></td>
                <td><?= $np->cena?></td>
              </tr>
              <?php endforeach;?>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a href="index.php?adminpage=narudzbe" class="btn btn-secondary">Nazad</a>

      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
