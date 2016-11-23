<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

  <h1 class="page-header"><?php echo $judul; ?></h1>
  <?= $this->session->flashdata('alert_msg'); ?>
    <form class="form-horizontal" method="POST" action="<?=base_url('mapel/act_Tambah/') ?>">
      <div class="form-group">
        <label class="col-sm-2 control-label">Mata Pelajaran</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nama_mapel">
          </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">Nama Guru</label>
          <div class="col-sm-10">
            <select class="form-control"  name="id_guru">
              <option value="">--- Pilih Guru ---</option>

              <?php foreach ($data_guru as $key => $value) {?>
              <option value="<?= $value->id_guru ?>"> <?=$value->nama_guru ?> </option>
              <?php } ?>
            </select>
          </div>
      </div>
      <div class="form-group" style="padding-top: 25px;">
        <div class="col-sm-offset-2 col-sm-10">
          <a href="<?= base_url('mapel') ?>" class="btn btn-default" >Kembali</a>
            <input type="submit" class="btn btn-success" value="Simpan">
        </div>
      </div>
    </form>
</div>