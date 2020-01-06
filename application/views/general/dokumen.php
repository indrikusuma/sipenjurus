<h1 style="color:green;"><center>Rumah Sakit dr. Etty Asharto BATU</center></h1>
<h2>Report</h2>
<br />
<table border="1">
	<thead>
		<tr>
			<th width="50">NOMOR</th>
			<th width="150">KODE REPORT</th>
			<th width="150">TANGGAL REPORT</th>
			<th width="120">DEBET</th>
			<th width="120">KREDIT</th>
			<th width="120">SALDO</th>

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
								<td>".$value['kode_bukubesar']."</td>
								<td>".$value['tanggal_insert']."</td>
								<td>".$value['debet']."</td>
								<td>".$value['kredit']."</td>
								<td>".$value['saldo']."</td>
							</tr>";
								
				}
			else	
				echo "  <tr>
							<td colspan='5'><center>Data Report Kosong</center></td>
						</tr>";
		
		?>
	</tbody>
</table>