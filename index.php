<!--
/*
* Author : bayyu.me
* Date : 30 Oct 2016
* Contoh Encrypt Decrypt dengan mcrypt PHP
*/
-->
<?php require_once('classEncDec.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
		<table border="0" cellpadding="10">
			<tr>
				<td>String</td>
				<td><textarea rows="4" cols="100%" name="string"></textarea></td>
			</tr>
			<tr>
				<td>Key</td>
				<td><input type="text" name="key" value="ini_key_nya"></td>
			</tr>
			<tr>
				<td>Metode</td>
				<td>
					<select name="metode">
						<option value="1">Enkripsi</option>
						<option value="2">Dekripsi</option>
					</select>
			<tr>
				<td></td>
				<td><input type="submit" value="Enkrip" name="submit"></td>
		</table>
	</form>



<?php
if($_SERVER['REQUEST_METHOD'] === "POST") {
	define('TEXT', $_POST['string']); 
	define('KUNCI', $_POST['key']);
	define('METOD', $_POST['metode']);

	$lib = new libEnkripDekrip(KUNCI);

	switch (METOD) {
		case '1':
			$enkrip = $lib->enkripsi(TEXT); 
			echo("Hasil Encrypt : " . $enkrip);
			break;
		
		case '2':
			$dekrip = $lib->dekripsi(TEXT);
			echo "Hasil Decrypt dari " . TEXT . "<br><br> Adalah : ";
			if($dekrip) {
				echo($dekrip . "<br/><br/>"); 
			} else {
				echo "Gagal di Decrypt, hasil enkripsi tidak cocok.";
			}
			break;
	}

echo
'<script>
document.getElementsByName("string")[0].value = "'.TEXT.'";
document.getElementById("metode")[0].value = "'.METOD.'";
</script>';
}
?>
</body>
</html>
