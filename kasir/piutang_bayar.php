<?php
if ($_SESSION['level'] == "admin")
	{
$jual_id=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/development-bundle/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/development-bundle/themes/ui-lightness/jquery.ui.all.css">
	<script src="JQuery-UI-1.8.17.custom/development-bundle/jquery-1.7.1.js"></script>
	<script src="JQuery-UI-1.8.17.custom/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="JQuery-UI-1.8.17.custom/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="JQuery-UI-1.8.17.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
    <script src="JQuery-UI-1.8.17.custom/development-bundle/ui/i18n/jquery.ui.datepicker-id.js"></script>
	<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/development-bundle/demos/demos.css">
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	$(function() {
		$( "#datepicker1" ).datepicker();
	});
	$(function() {
		$( "#datepicker2" ).datepicker();
	});
	</script>
<style type="text/css">
body
{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
}
td
{
	padding:5px 9px;
	border:none;
}
#datepicker{
	padding:3px 5px;
	margin:0px 3px;
	border:1px solid #c0d3e2;
	border-radius:3px;
}
#input{
	height:20px;
	border:1px solid #c0d3e2;
}
</style>
</head>

<body>
<div id="judulHalaman"><strong>Form bayar piutang</strong></div>
<form id="form1" name="form1" method="post" action="proses.php">
<input name="jual_id" type="hidden" value="<?php echo "$jual_id"; ?>" />
<input name="proses" type="hidden" value="piutang_bayar" />
  <table border="0" cellspacing="1" cellpadding="0">
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
        <tr>
      <td>Pelanggan Nama</td>
      <td>:</td>
      <td>
	  	<?php 
			$sql="SELECT * FROM piutang WHERE jual_id='$jual_id'";
			$query=mysql_query($sql);
	  		$data=mysql_fetch_array($query);
			echo $data['pelanggan_nama'];
		?>
      </td>
    </tr>
    <tr>
      <td>Tanggal Jatuh Tempo</td>
      <td>:</td>
      <td>
	  	<?php 
			echo $data['tgl_jatuh_tempo'];
		?>
      </td>
    </tr>
    <tr>
      <td>Sisa Piutang</td>
      <td>:</td>
      <td>
      
	  	<?php 
			$hutang="SELECT * FROM piutang_detail WHERE jual_id='$jual_id' ORDER BY inc DESC";
			$qhutang=mysql_query($hutang);
	  		$row=mysql_fetch_array($qhutang);
			echo "Rp ".digit($row['sisa_bayar']);
		?>
      </td>
    </tr>
    <tr>
      <td>Tanggal Bayar</td>
      <td>:</td>
      <td><label>
        <input type="text" name="tgl_bayar" id="datepicker" />
      </label></td>
    </tr>
    <tr>
      <td>Jumlah Bayar</td>
      <td>:</td>
      <td><label>
        <input type="text" name="jml_bayar" id="input" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="simpan" id="tombol" value="simpan" />
      </label>
        <label>
          <input type="reset" name="batal" id="tombol" value="batal" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
	}
	else
	{
		echo "anda tidak berhak meng-akses halaman ini !";
	}
?>