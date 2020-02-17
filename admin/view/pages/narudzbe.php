<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Narudžbe</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/">Početna</a></li>
            <li class="breadcrumb-item active">Admin panel - Narudžba</li>
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
            <h3 class="card-title">Narudžbe - Kliknite na info da vidite proizvode iz narudžbe</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Id</th>
                <th>Korisnik</th>
                <th>Status</th>
                <th>Ukupna cena</th>
                <th>Više info</th>
              </tr>
              </thead>
              <tbody>
                <?php  foreach ($narudzbe as $narudzba): ?>
                <tr>
                  <td><?= $narudzba->narudzba_id?></td>
                  <td><?= $narudzba->ime?> <?= $narudzba->prezime?>
                  </td>
                  <td>
                    <?php
                    if($narudzba->narudzba_obradjena==0):
                      ?>
                      <span class="badge badge-danger">Nije obrađena</span>
                    <?php else:?>
                      <span class="badge badge-success">Obradjena</span>
                    <?php endif;?>
                  </td>
                  <td> <?= $narudzba->ukupna_cena?></td>
                  <td> <a href="index.php?adminpage=narudzbainfo&id=<?=$narudzba->narudzba_id?>" class="btn btn-block btn-primary">Info</a></td>
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
