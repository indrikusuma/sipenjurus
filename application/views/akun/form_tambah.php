	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Akun
			<small>Controller Akun</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-sitemap"></i> Home</a></li>
			<li class="active">Akun</li><li class="active">Tambah Data</li>
		</ol>
	</section>



<!-- Data Akun -->	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">						
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Tambah Data Akun</h3>			
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
					
						<?php if ($error){?>
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4><i class="icon fa fa-ban"></i> Alert!</h4>
								<?php echo $error; ?>
							</div>
						<?php }?>
						
						<form action="<?php echo site_url("akun/tambah")?>" method="post" enctype="multipart/form-data">
							<table border="0" style="width:100%;">										
								<tr>
									<td style="width:200px">Kode Akun</td>
									<td><input class="form-control" type="text" name="kode_akun" placeholder="Kode Akun"></td>
								</tr>
								<tr>
									<td style="width:200px">Nama Akun</td>
									<td><input class="form-control" type="text" name="nama_akun" placeholder="Nama Akun"></td>
								</tr>
								<tr>
									<td style="width:200px">Akun Induk</td>
									<td><input class="form-control" type="text" name="akun_induk" placeholder="Akun Induk"></td>
								</tr>
								<tr>
									<td style="width:200px">Saldo Normal</td>
									<td class="form-control">
										<input type="radio" name="saldo_normal" value="debit">debit
										<input type="radio" name="saldo_normal" value="kredit">kredit
									</td>
								</tr>
								<tr>
									<td style="width:200px">Saldo</td>
									<td><input class="form-control" type="text" name="saldo" placeholder="Saldo Jurnal"></td>
								</tr>
								<tr>
									<td>Report</td>
										<td class="form-control">
										<input type="radio" name="report" value="debit">debit
										<input type="radio" name="report" value="kredit">kredit
									</td>
								</tr>
							</table>						
					</div><!-- /.box-body -->					
				</div>
					<input type="submit" class="btn btn-success" value="simpan data">
					<a href="<?php echo site_url ("Akun/index")?>">
					<input type="button" class="btn btn-default" value="kembali">
					</a>
						</form>
			</div>
		</div><!-- /.box -->
	</section><!-- /.content -->
