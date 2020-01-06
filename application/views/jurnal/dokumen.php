<h1 style="color:green;"><center>Rumah Sakit dr. Etty Asharto BATU</center></h1>
<h2>Laporan Jurnal</h2>
<br />
<table border="1">
	<thead>
		<tr>
			<th width="50">NOMOR</th>
			<th width="100">KODE JURNAL</th>
			<th width="200">TANGGAL JURNAL</th>
			<th width="200">JENIS BAYAR</th>
			<th width="200">POS TRANSAKSI</th>

		</tr>	
	</thead>
	<tbody>
		<?php
								
			$i = 0;
			if (count($data))
				foreach ($data as $key => $value) {
					$i++;
					echo "  <tr>
								<td>".$i."</td>
								<td>".$value['kode_jurnal']."</td>
								<td>".$value['tanggal_jurnal']."</td>
								<td>".$value['kode_jenisbayar']."</td>
								<td>".$value['kode_postransaksi']."</td>
							</tr>";
								
				}
			else	
				echo "  <tr>
							<td colspan='5'><center>Data Jurnal Kosong</center></td>
						</tr>";
		
		?>
	</tbody>
</table>