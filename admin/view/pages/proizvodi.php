

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Proizvodi</h1>
          <a class="btn btn-primary btn-sm" href="index.php?adminpage=dodajproizvod" style="margin-top: 25px;">
            <i class="fas fa-folder">
            </i>
            Dodaj proizvod
          </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/">Početna</a></li>
            <li class="breadcrumb-item active">Admin panel - Proizvodi</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Svi proizvodi</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Id</th>
                <th>Naziv</th>
                <th>Tip proizvoda</th>
                <th>Glavna cena</th>
                <th>Više info</th>
              </tr>
              </thead>
              <tbody>
              <?php  foreach ($proizvodi as $proizvod): ?>
                <tr>
                  <td><?= $proizvod->id?></td>
                  <td><?= $proizvod->naziv?></td>
                  <td><?= $proizvod->kat_naziv?>
                  </td>
                  <td>
                    <?php
                    if($proizvod->cena_popust!=null):
                      ?>
                      <?=$proizvod->cena_popust ?>
                    <?php else:?>
                      <?=$proizvod->cena ?>
                    <?php endif;?>
                  </td>
                  <td>
                    <a class="btn btn-info btn-sm" href="index.php?adminpage=azurirajproizvod&idp=<?= $proizvod->id?>">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Ažuriraj
                    </a>
                    <a class="btn btn-danger btn-sm" href="index.php?adminpage=obrisiproizvod&idp=<?= $proizvod->id?>">
                      <i class="fas fa-trash">
                      </i>
                      Obriši
                    </a></td>
                </tr>
              <?php endforeach;?>
              </tbody>
              <tfoot>
              <tr>
                <th>Id</th>
                <th>Korisnik</th>
                <th>Status</th>
                <th>Ukupna cena</th>
                <th>Više info</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
