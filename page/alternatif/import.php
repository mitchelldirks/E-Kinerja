<?php
include "../../reader/excel_reader2.php";
include "../../config/connection.php";

$period=$_POST['ta'];
// file yang tadinya di upload, di simpan di temporary file PHP, file tersebut yang kita ambil
// dan baca dengan PHP Excel Class
$data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['tmp_name']);
$hasildata = $data->rowcount($sheet_index=0);
// default nilai 
$sukses = 0;
$gagal = 0;


for ($i=2; $i<=$hasildata; $i++) {
//tambahan
  $no = $data->val($i,1); 
  $nip = $data->val($i,2); 
  $nama = $data->val($i,3); 
  $sex = $data->val($i,12);
  $gol = $data->val($i,13);
  $pang = $data->val($i,14);
  $jab = $data->val($i,15);

  $tambah=mysqli_query($con,"INSERT INTO karyawan VALUES ('$nip','$nama','$sex','$gol', '$pang', '$jab', null, null, 'na')");
  $query = mysqli_query($con,"UPDATE karyawan set nama_karyawan='$nama', NIP='$nip', JK='$sex', Golongan='$gol', Pangkat='$pang', Jabatan='$jab' where NIP='$nip'"); 

  $no = $data->val($i,1); 
  $nip = $data->val($i,2);
  $nama = $data->val($i,3); 
  $krit1 = $data->val($i,4);
  $krit2 = $data->val($i,6);
  $krit3 = $data->val($i,8);
  $krit4 = $data->val($i,10);
  $index1 = $data->val($i,5);
  $index2 = $data->val($i,7);
  $index3 = $data->val($i,9);
  $index4 = $data->val($i,11);

  $created_by = $_POST['author']; 
  $date = date('Y-m-d H:i:s');
  // $rand = rand();
 
//$query = "INSERT INTO temp VALUES (null,'$data1','$data2', '$data3', '$data4', '$data5', '$created_by', '$date')";
$tempo = "INSERT INTO temp VALUES (null,'$nip','$nama','$krit1','$krit2', '$krit3', '$krit4', '$created_by', '$date', '$period')";
$update = "UPDATE temp SET NIP='$nip', nama_karyawan='$nama', Pengajaran='$krit1', Penelitian & Publikasi='$krit2', Pengabdian Masyarakat='$krit3', Penunjang='$krit4', creator='$created_by', waktu='$date' , periode='$period' where NIP='$nip' and periode='".$period."'";
$hasil = mysqli_query($con, $tempo);
$ubah = mysqli_query($con, $update);

//end tambahan

  $_POST['kriteria1']=$index1;
  $_POST['kriteria2']=$index2;
  $_POST['kriteria3']=$index3;
  $_POST['kriteria4']=$index4;
  $created_by = $_POST['author']; 
  $date = date('Y-m-d H:i:s');
  // $rand = rand();
 
$sql = "INSERT into alternatif values(null, '$nip', '$period', 0)";
      $con->query($sql);
      $last_id = $con->insert_id;
      $dos="UPDATE karyawan SET status='ok' where nip='$nip' and periode='$period'";
      $con->query($dos);

      $sql = "select * from kriteria";
      $query = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_assoc($query)){
        $nilai = $_POST['kriteria'.$row['id_kriteria']];
        $sql = "INSERT into nilai_alternatif values (null, '$last_id', '$row[id_kriteria]', '$nilai', '$period')";
        mysqli_query($con, $sql);
      }
 
if ($sql) {$sukses++;}
else {$gagal++;}
 
//echo "<pre>";
//print_r($query);
//echo "</pre>";
 
}
echo "<script>alert('Data yang berhasil di import : ".$sukses." dan Data yang gagal diimport : ".$gagal."');window.location.href='../../index.php?p=rank&ta=$period'</script>";
//header('location: ../../index.php?p=fuzzy-upload');
?>