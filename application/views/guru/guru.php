        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php echo $this->session->flashdata('alert_msg'); ?>
<h1 class="page-header"><?=$judul?></h1>



          <a href="<?=base_url('guru/add_guru')?>" class="btn btn-primary">Tambah guru</a>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              foreach ($data_guru as $key => $value) {
               ?>
                <tr>
                  <td><?=$value->id_guru?></td>
                  <td><?=$value->nama_guru?></td>
                  <td>
                  <a href="<?=site_url('guru/edit/'.$value->id_guru)?>" class="btn btn-info">Edit</a>
                  <a href="<?=site_url('guru/hapus/'.$value->id_guru)?>" class="btn btn-danger" 
                  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');">Hapus</a>
                  </td>
                </tr>
                <?php 
              }
              ?>
              </tbody>
            </table>
          </div>
                  </div>