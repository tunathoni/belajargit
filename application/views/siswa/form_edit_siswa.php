<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <?php echo $this->session->flashdata('alert_msg'); ?>

  <h1 class="page-header"><?=$judul?></h1>

  <form class="form-horizontal" method="POST" action="<?=site_url('siswa/act_edit')?>">
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
	    <div class="col-sm-10">
	      <input type="hidden" name="id" id="id_siswa" value="<?=$data_siswa->id?>" class="form-control" readonly>
	      <input type="text" name="nama" value="<?=$data_siswa->nama?>" class="form-control" placeholder="Nama">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
	    <div class="col-sm-10">
	      <input type="text" name="alamat" value="<?=$data_siswa->alamat?>" class="form-control" placeholder="Alamat">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Kelas</label>
	    <div class="col-sm-10">
	      <select class="form-control" name="id_kelas">
	      	<option value="">-- Pilih Kelas --</option>
	      	<?php foreach ($kelas as $key => $value): ?>
	      		<?php 
		      		if ($value->id_kelas == $data_siswa->id_kelas) {
		      			$selected = 'selected';
		      		}else{
		      			$selected = '';
		      		}	
	      		?>
	      		<option value="<?=$value->id_kelas?>" <?=$selected?>><?=$value->nama_kelas?></option>
	      	<?php endforeach ?>
	      </select>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <a href="<?=site_url('siswa')?>" class="btn btn-default">Kembali</a>
	      <button type="submit" class="btn btn-success">Simpan</button>
	    </div>
	  </div>
  </form>
</div>