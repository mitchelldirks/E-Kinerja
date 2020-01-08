<?php
$ta=$_GET['ta'];

?>
<style type="text/css">
	
.file-drop-area {
  position: relative;
  display: flex;
  align-items: center;
  width: 450px;
  max-width: 100%;
  padding: 25px;
  border: 1px dashed #999;
  border-radius: 3px;
  transition: 0.2s;
  &.is-active {
    background-color: rgba(255, 255, 255, 0.05);
  }
}

.fake-btn {
  flex-shrink: 0;
  background-color: rgba(255, 255, 255, 0.04);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 8px 15px;
  margin-right: 10px;
  font-size: 12px;
  text-transform: uppercase;
}
.file-msg {
  font-size: small;
  font-weight: 300;
  line-height: 1.4;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.file-input {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  cursor: pointer;
  opacity: 0;
  &:focus {
    outline: none;
  }
}
.submit{
  width: 450px;
  max-width: 100%;
  padding: 25px;
  border: 1px dashed #999;
  border-radius: 3px;
  transition: 0.2s;
}  
.submit:hover{
  	background:#aaa;
  	transition: 0.4s;
  }

.excel{
	background: green;
	color: black;
}
.excel-title,th{
	background: rgb(33, 115, 70);
	color: #fff;
}
.cells,tr{
	grid-template-columns: 40px repeat(11, calc((100% - 50px) / 11));
	grid-template-rows: repeat(21, 25px);
	grid-gap: 1px;
	background: white;
	grid-auto-flow: dense;
	max-width: 100%;
	overflow: hidden;
	&__spacer {
		background: $gray-dark;
		position: relative;
		&:after {
			content: "";
			position: absolute;
			right: 4px;
			bottom: 4px;
			height: 80%;
			width: 100%;
			background: linear-gradient(
				135deg,
				transparent 30px,
				#bbb 30px,
				#bbb 55px,
				transparent 55px
			);
		}
	}
	/*input, button {
		border: none;
		background: #fff;
		padding: 0 6px;
		font-family: 'Noto Sans', sans-serif;
	}*/
}
.cells,tr:hover{
	background: #999;
}
.num{
	text-align: right;
}
</style>

<div class="col-lg-5">
<h2>Import Data karyawan <br><small>Periode <?php echo $_GET['ta'];?><small></h2>
<form method="post" enctype="multipart/form-data" action="page/karyawan/import.php">
<input type="text" name="periode" value="<?php echo $_GET['ta'];?>" hidden required>
<div class="file-drop-area">
  <span class="fake-btn">Choose files</span>
  <span class="file-msg">or drag and drop files here</span>
  <input class="file-input" type="file" name="fileexcel" accept=".xls" multiple required>
  <input type="text" name="author" value="<?php echo $_SESSION['name']; ?>" hidden>
</div>

  <button type="submit" class="submit" value="Upload"><i class="fa fa-upload"></i> Upload</button>

</form>
</div>

<div class="col-lg-7">
	<?php 
	$imp=mysqli_query($con,"SELECT * FROM karyawan where periode='$ta' order by nama_karyawan");
	if(mysqli_num_rows($imp) > 0){
	if ($_SESSION['logged']=1) {
		?>
	<div class="col-lg-8">
		<h2>Data Tersimpan</h2>
	</div>
	<!-- <div class="col-lg-4">
		<h2><a href="?p=apus-import" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Hapus Data</a></h2>
	</div> -->
<?php } ?>
	<?php $no=1;
	
        echo "<table class='table table-hover' id='example2'>";
        echo "<thead><tr><th>No.</th><th>NIP</th><th>Nama karyawan</th><th>Jenis Kelamin</th><th>Golongan</th><th>Pangkat</th><th>Jabatan</th></tr></thead><tbody>";
        while($row = mysqli_fetch_array($imp)){
        	 		if($row['nama_karyawan']=='Tinkywinky'){
                        $style="style='background: #551a8b;color:white;'";
                      }elseif($row['nama_karyawan']=='Dipsy'){
                        $style="style='background: #9DD744;color:white;'";
                      }elseif($row['nama_karyawan']=='Lala'){
                        $style="style='background: #f2eb0d;color:black;'";
                      }elseif($row['nama_karyawan']=='Poo'){
                        $style="style='background: #ef1026;color:white;'";
                      }else{
                        $style="";
                      }
        	echo "<tr>";
        	echo "<td>".$no."</td>";
          echo "<td class='num'>".$row['NIP']."</td>";
        	echo "<td $style>".$row['nama_karyawan']."</td>";
        	echo "<td>".$row['JK']."</td>";
        	echo "<td>".$row['Golongan']."</td>";
        	echo "<td>".$row['Pangkat']."</td>";
        	echo "<td>".$row['Jabatan']."</td>";
        	// echo "<td>".$row['creator']."</td>";
        	// echo "<td>".$row['waktu']."</td>";
        	echo "</tr>";
        	$no++;
        }
        echo "</tr></table>";
    }


	 ?>
</div>
<div class="cells">
	<div id="cells"></div>

</div>


<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">
	var $fileInput = $('.file-input');
var $droparea = $('.file-drop-area');

// highlight drag area
$fileInput.on('dragenter focus click', function() {
  $droparea.addClass('is-active');
});

// back to normal state
$fileInput.on('dragleave blur drop', function() {
  $droparea.removeClass('is-active');
});

// change inner text
$fileInput.on('change', function() {
  var filesCount = $(this)[0].files.length;
  var $textContainer = $(this).prev();

  if (filesCount === 1) {
    // if single file is selected, show file name
    var fileName = $(this).val().split('\\').pop();
    $textContainer.text(fileName);
  } else {
    // otherwise show number of files
    $textContainer.text(filesCount + ' files selected');
  }
});
</script>

 <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">
  var $fileInput = $('.file-input');
var $droparea = $('.file-drop-area');

// highlight drag area
$fileInput.on('dragenter focus click', function() {
  $droparea.addClass('is-active');
});

// back to normal state
$fileInput.on('dragleave blur drop', function() {
  $droparea.removeClass('is-active');
});

// change inner text
$fileInput.on('change', function() {
  var filesCount = $(this)[0].files.length;
  var $textContainer = $(this).prev();

  if (filesCount === 1) {
    // if single file is selected, show file name
    var fileName = $(this).val().split('\\').pop();
    $textContainer.text(fileName);
  } else {
    // otherwise show number of files
    $textContainer.text(filesCount + ' files selected');
  }
});
</script>