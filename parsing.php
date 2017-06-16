<?php
$file = $_FILES["file"]["tmp_name"];
//print_r($file);

$string = file_get_contents($file);
$json = json_decode($string,TRUE);

$jsonIterator = new RecursiveIteratorIterator(
	new RecursiveArrayIterator(json_decode($string,TRUE)),
	RecursiveIteratorIterator::SELF_FIRST);
?>
	
	<table border="1">
	<tr style='background:green;color:white'>  
	   	<th>NRP</th> 
 	 	<th>NAMA</th>
		<th>JURUSAN</th>
		<th>JENIS KELAMIN</th>
	</tr>
<?php
// $jumArray=count($json);
// for($i=0;$i<$jumArray;$i++) {
foreach ($json as $key => $value) {
?>
	<tr>
		<td><?php echo $value['nrp']; ?></td>
		<td><?php echo $value['nama']; ?></td>
		<td><?php echo $value['jurusan']; ?></td>
		<td><?php echo $value['jenis_kelamin']; ?></td>
	</tr>
<?php	
};
	echo "</table>";
//print_r(count($json[0]));
?>