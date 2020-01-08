	<?php
	//include '../../config/connection.php';

	// $count=mysqli_query($con,"SELECT count(*) as kuota from kriteria");
	// $crit=mysqli_fetch_array($count);
	// $kuota=$crit['kuota'];
	?>
	<div id="container" style="width: 70%;">
		<canvas id="canvasMitchell1"></canvas>
	</div>

	<script>
		
		var color = Chart.helpers.color;
		var barChartData = {
			labels: ['Pengajaran', 'Penelitian dan Publikasi', 'Pengabdian Masyarakat', 'Penunjang'],
			datasets: [{
				label: 'Kurang',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
					<?php
					$kurang1=mysqli_query($con,"SELECT count(*) as kurang from nilai_alternatif where nilai = 1 and id_kriteria = 1 and periode = '".$_GET['ta']."'");
					$kurang2=mysqli_query($con,"SELECT count(*) as kurang from nilai_alternatif where nilai = 1 and id_kriteria = 2 and periode = '".$_GET['ta']."'");
					$kurang3=mysqli_query($con,"SELECT count(*) as kurang from nilai_alternatif where nilai = 1 and id_kriteria = 3 and periode = '".$_GET['ta']."'");
					$kurang4=mysqli_query($con,"SELECT count(*) as kurang from nilai_alternatif where nilai = 1 and id_kriteria = 4 and periode = '".$_GET['ta']."'");
					$k1=mysqli_fetch_array($kurang1);
					$k2=mysqli_fetch_array($kurang2);
					$k3=mysqli_fetch_array($kurang3);
					$k4=mysqli_fetch_array($kurang4);
						echo $k1['kurang'].", ";
						echo $k2['kurang'].", ";
						echo $k3['kurang'].", ";
						echo $k4['kurang'];
					?>
				]
			}, {
				label: 'Cukup',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					<?php
					$cukup1=mysqli_query($con,"SELECT count(*) as cukup from nilai_alternatif where nilai = 2 and id_kriteria=1 and periode = '".$_GET['ta']."'");
					$cukup2=mysqli_query($con,"SELECT count(*) as cukup from nilai_alternatif where nilai = 2 and id_kriteria=2 and periode = '".$_GET['ta']."'");
					$cukup3=mysqli_query($con,"SELECT count(*) as cukup from nilai_alternatif where nilai = 2 and id_kriteria=3 and periode = '".$_GET['ta']."'");
					$cukup4=mysqli_query($con,"SELECT count(*) as cukup from nilai_alternatif where nilai = 2 and id_kriteria=4 and periode = '".$_GET['ta']."'");
					$c1=mysqli_fetch_array($cukup1);
					$c2=mysqli_fetch_array($cukup2);
					$c3=mysqli_fetch_array($cukup3);
					$c4=mysqli_fetch_array($cukup4);
						echo $c1['cukup'].", ";
						echo $c2['cukup'].", ";
						echo $c3['cukup'].", ";
						echo $c4['cukup'];
					?>
				]
			}, {
				label: 'Baik',
				backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
				borderColor: window.chartColors.green,
				borderWidth: 1,
				data: [
					<?php
					$baik1=mysqli_query($con,"SELECT count(*) as baik from nilai_alternatif where nilai = 3 and id_kriteria = 1 and periode = '".$_GET['ta']."'");
					$baik2=mysqli_query($con,"SELECT count(*) as baik from nilai_alternatif where nilai = 3 and id_kriteria = 2 and periode = '".$_GET['ta']."'");
					$baik3=mysqli_query($con,"SELECT count(*) as baik from nilai_alternatif where nilai = 3 and id_kriteria = 3 and periode = '".$_GET['ta']."'");
					$baik4=mysqli_query($con,"SELECT count(*) as baik from nilai_alternatif where nilai = 3 and id_kriteria = 4 and periode = '".$_GET['ta']."'");
					$b1=mysqli_fetch_array($baik1);
					$b2=mysqli_fetch_array($baik2);
					$b3=mysqli_fetch_array($baik3);
					$b4=mysqli_fetch_array($baik4);
						echo $b1['baik'].", ";
						echo $b2['baik'].", ";
						echo $b3['baik'].", ";
						echo $b4['baik'];
					?>
				]
			}]

		};

		window.onload = function() {
			var ctx = document.getElementById('canvasMitchell1').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        },
					title: {
						display: true,
						text: 'INDEX KINERJA'
					}
				}
			});

		};

		
	</script>