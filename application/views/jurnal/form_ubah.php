	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Akun
			<small>Rumah Sakit dr. Etty Asharto</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Akun</li><li class="active">Ubah Data</li>
		</ol>
	</section>



<!-- Data Akun -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Ubah Data Akun</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
						
						<?php if ($error){?>
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							<?php echo $error; ?>
						</div>
						<?php }?>
						
							<form action="<?php echo site_url("akun/ubah")?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="kode_akun" value="<?php echo @$data['kode_akun']?>">
							<table border="0" style="width:100%;">
								<tr>
									<td style="width:200px">Kode Akun</td>
									<td><input class="form-control" type="text" value="<?php echo @$data['kode_akun']?>" disabled></td>
								</tr>
								<tr>
									<td>Nama Akun</td>
									<td><input class="form-control" type="text" name="nama_akun"  placeholder="Nama Akun" value="<?php echo @$data['nama_akun']?>"></td>
								</tr>
								<tr>
									<td>Akun Induk</td>
									<td><input class="form-control" type="text" name="akun_induk"  placeholder="Nama Akun" value="<?php echo @$data['akun_induk']?>"></td>
								</tr>
								<tr>
									<td style="width:200px">Saldo Normal</td>
									<td class="form-control">
										<input type="radio" name="saldo_normal" value="debit" <?php if (@$data['saldo_normal'] == "debit") echo "checked";?>>debit
										<input type="radio" name="saldo_normal" value="kredit" <?php if (@$data['saldo_normal'] == "kredit") echo "checked";?>>kredit
									</td>
								</tr>
								<tr>
									<td>Saldo</td>
									<td><input class="form-control" type="text" name="saldo"  placeholder="Nama Akun" value="<?php echo @$data['saldo']?>"></td>
								</tr>
								<tr>
									<td>Report</td>
										<td class="form-control">
										<input type="radio" name="report" value="debit" <?php if (@$data['saldo_normalreport'] == "debit") echo "checked";?>>debit
										<input type="radio" name="report" value="kredit" <?php if (@$data['saldo_normalreport'] == "kredit") echo "checked";?>>kredit
									</td>
								</tr>
								
								
								<tr>
									<td colspan="2">
										<input type="submit" value="ubah data">
											<a href="<?php echo site_url ("akun/index")?>">
											<input type="button" value="kembali">
											</a>
									</td>		
										
								</tr>
								
							</table>
							</form>
						
						
					</div><!-- /.box-body -->
				</div>
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->