	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pegawai
			<small>Rumah Sakit dr. Etty Asharto</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Pegawai</li><li class="active">Ubah Data</li>
		</ol>
	</section>



<!-- Data Pegawai -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Ubah Data Pegawai</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
					
						<form action="<?php echo site_url("pegawai/edit")?>" method="post" enctype="multipart/form-data">
							<table border="0" style="width:100%;">										
								<div class="form-group">
									<label class="control-label col-lg-3">Kode Pegawai</label>
									<div class="col-lg-9">					
									<input type="text" name="kode_pegawai" value="<?=set_value('kode_pegawai', @$data['kode_pegawai'])?>" class="form-control">
									<small class="text-danger help-block"><?= form_error('kode_pegawai')?></small>
								</div>
							</div>
								
									<div class="form-group">
									<label class="control-label col-lg-3">Jabatan</label>
									<div class="col-lg-9">
										<select name="jabatan" class="form-control">
											<?php
												foreach($data_jabatan as $v){
												$selected = ($v['kode_jabatan'] == set_value('jabatan', @$data['kode_jabatan'])) ? 'selected' : '';
											?> 
												<option value="<?=$v['kode_jabatan']?>"><?=$v['nama_jabatan']?></option>
											<?php } ?>
										</select>
										</div>
									</div>
								
								<div class="form-group">
									<label class="control-label col-lg-3">Nama</label>
									<div class="col-lg-9">					
										<input type="text" name="nama" value="<?=set_value('nama', @$data['nama'])?>" class="form-control">
										<small class="text-danger help-block"><?= form_error('nama')?></small>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-3">Jenis Kelamin</label>
									<div class="col-lg-9">					
										<input type="text" name="kelamin" value="<?=set_value('kelamin', @$data['kelamin'])?>" class="form-control">
										<small class="text-danger help-block"><?= form_error('kelamin')?></small>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-3">Alamat</label>
									<div class="col-lg-9">					
									<input type="text" name="alamat" value="<?=set_value('alamat', @$data['alamat'])?>" class="form-control">
									<small class="text-danger help-block"><?= form_error('alamat')?></small>
								</div>
							</div>
							<div class="form-group">
									<label class="control-label col-lg-3">Email</label>
									<div class="col-lg-9">					
									<input type="text" name="email" value="<?=set_value('email', @$data['email'])?>" class="form-control">
									<small class="text-danger help-block"><?= form_error('email')?></small>
								</div>
							</div>
							<div class="form-group">
									<label class="control-label col-lg-3">Password</label>
									<div class="col-lg-9">					
									<input type="text" name="password" value="<?=set_value('password', @$data['password'])?>" class="form-control">
									<small class="text-danger help-block"><?= form_error('password')?></small>
								</div>
							</div>
							</table>						
					</div><!-- /.box-body -->					
				</div>
					<input type="submit" class="btn btn-success" value="simpan data">
					<a href="<?php echo site_url ("pegawai/index")?>">
					<input type="button" class="btn btn-default" value="kembali">
					</a>
				</form>
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->
