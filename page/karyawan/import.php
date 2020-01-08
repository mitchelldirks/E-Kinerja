<?php
include "../../reader/excel_reader2.php";
include "../../config/connection.php";
 
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

  $cek=mysqli_query($con,"SELECT * from karyawan where NIP='$nip' and periode='".$_POST['periode']."'");
  if (mysqli_num_rows($cek) > 0) {
  $query = mysqli_query($con,"UPDATE karyawan set nama_karyawan='$nama', NIP='$nip', JK='$sex', Golongan='$gol', Pangkat='$pang', Jabatan='$jab' where NIP='$nip' and periode='".$_POST['periode']."'"); 
  }else{  
  $query=mysqli_query($con,"INSERT INTO karyawan VALUES (null,'$nip','$nama','$sex','$gol', '$pang', '$jab', null, null,'".$_POST['periode']."', 'na')");
  }
  // $tambah=mysqli_query($con,"INSERT INTO karyawan VALUES (null,'$nip','$nama','$sex','$gol', '$pang', '$jab', null, null,'".$_POST['periode']."', 'na')");
  // $query = mysqli_query($con,"UPDATE karyawan set nama_karyawan='$nama', NIP='$nip', JK='$sex', Golongan='$gol', Pangkat='$pang', Jabatan='$jab' where NIP='$nip' and periode='".$_POST['periode']."'"); 

if ($query) {
  $sukses++;
}else{
  $gagal++;
}
 
//echo "<pre>";
//print_r($query);
//echo "</pre>";
 
}
echo "<script>alert('Data yang berhasil di import : ".$sukses.", Data yang gagal diimport : ".$gagal."');window.location.href='../../index.php?p=karyawan&act=upload&ta=".$_POST['periode']."'</script>";
//header('location: ../../index.php?p=karyawan&act=upload');
?>