<h1 style="color:green;">Rumah Sakit dr. Etty Asharto BATU</h1>
<h2>Laporan Akun</h2>
<br />
<table border="1">
	<thead>
		<tr>
			<th width="50">NOMOR</th>
			<th width="100">NAMA AKUN</th>
			<th width="100">NAMA AKUN</th>
			<th width="100">LEVEL</th>
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
								<td>".$value['kode_akun']."</td>
								<td>".$value['nama_akun']."</td>
								<td>".$value['level']."</td>
							</tr>";
								
				}
			else	
				echo "  <tr>
							<td colspan='5'><center>Data Referensi Kosong</center></td>
						</tr>";
		
		?>
	</tbody>
</table>