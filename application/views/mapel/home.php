        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
              <h1 class="page-header"><?php echo $judul; ?></h1>

          

<?php $this->session->flashdata('alert_msg'); ?>
        
  <div class="table-responsive">
    <table class="table table-hover">
    <a href="<?= base_url('mapel/add_mapel/') ?>" class="btn btn-success">Tambah mapel</a>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Mata Pelajaran</th>
          <th>Nama Guru</th>
         
          <th colspan="2"><center>Aksi</center></th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($data_mapel as $key => $value){ ?>
        <tr>
          <td><?= $value->id_mapel ?></td>
          <td><?= $value->nama_mapel ?></td>
          <td><?= $value->nama_guru ?></td>
          <td style="text-align: right;"><a class="btn btn-info" href="<?= base_url('/mapel/editmapel/') . $value->id_mapel?>">Edit</a></td>
          <td style="text-align: left;">
          <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini');" class="btn btn-danger" href="<?= base_url('/mapel/hapusmapel/') . $value->id_mapel?>">Hapus</a></td>
        </tr>
       <?php } ?>
      </tbody>
    </table>
  </div>