<?php 
			$con = new mysqli ("localhost","root","","fuzzy_ahp-karyawan");
			$jum=mysqli_query($con,"SELECT count(*) as JML from kriteria");
			$j=mysqli_fetch_array($jum);
			$lim=$j['JML'];
			$i=0;
?>
<script type="text/javascript">
	//var jsondata = "";
	var color = Chart.helpers.color;
		var barChartData = {
			labels: [<?php 
			$kriteria=mysqli_query($con,"SELECT * from kriteria");
			while ($kr=mysqli_fetch_array($kriteria)) {
				if ($i < $lim) { $koma=","; }else{ $koma=""; }
				echo "'".$kr['kriteria']."'".$koma;
			}?>
					],

</script>
<?php
	// $con = new mysqli ("localhost","root","","fuzzy_ahp-karyawan");
	// $jum=mysqli_query($con,"SELECT count(*) as JML from kriteria");
	// 		$j=mysqli_fetch_array($jum);
	// 		$lim=$j['JML'];	
	$i=0;
	$data="";
	$kriteria=mysqli_query($con,"SELECT * from kriteria");
	while ($row=mysqli_fetch_array($kriteria)) {
		
		$i++;
		if ($i==1) {
			$brack1="[";
		}else{
			$brack1="";
		}
		if ($i==$lim) {
			$brack2="]";
		}else{
			$brack2="";
		}
		$kurang=mysqli_query($con,"SELECT count(nilai) as kurang from nilai_alternatif where id_kriteria= '$row[id_kriteria]' and nilai='1' and periode = '".$_GET['ta']."'");
		$k=mysqli_fetch_array($kurang);
		//echo $k['kurang'];

		$cukup=mysqli_query($con,"SELECT count(nilai) as cukup from nilai_alternatif where id_kriteria= '$row[id_kriteria]' and nilai='2' and periode = '".$_GET['ta']."'");
		$c=mysqli_fetch_array($cukup);
		//echo $c['cukup'];

		$baik=mysqli_query($con,"SELECT count(nilai) as baik from nilai_alternatif where id_kriteria= '$row[id_kriteria]' and nilai='3' and periode = '".$_GET['ta']."'");
		$b=mysqli_fetch_array($baik);
		//echo $b['baik'];
		if ($i < $lim) {
			$koma=",";
		}else{
			$koma="";
		}
		//$arr = array($row['kriteria'] => [ 'kurang' => $k['kurang'], 'cukup' => $c['cukup'], 'baik' => $b['baik']]);
		$arr = array('kurang' => $k['kurang'], 'cukup' => $c['cukup'], 'baik' => $b['baik']);
		//$nama=$row['kriteria'].'":';
		//$json = $brack1.'{["'.$nama.json_encode([$arr]).'"]}'.$koma.$brack2;
		//$json[$i] = $brack1.json_encode([$arr]).$koma.$brack2;
		$json[$i] = json_encode($arr).$koma;
		//$data += $json;
		echo $json[$i];
		?>
		<script type="text/javascript">
			jsondata =+ <?php echo $json[$i];?> 
		</script>
		<?php
	}

	//echo $data;
	
?>
<script type="text/javascript">
	console.log(jsondata);
</script>