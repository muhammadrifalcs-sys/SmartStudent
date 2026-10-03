<?php 
session_start();
if (!isset($_SESSION['login'])) {
	header("location: index.php");
}
include 'koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>SMART STUDENT</title>
	<link rel="stylesheet" type="text/css" href="desain/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="desain/data-table/datatables.min.css">
	<style type="text/css">
	.ft{
		bottom: 0;
	    width: 100%;
	    position: fixed;
	    height:50px;
	    line-height:50px;
	    background:#3c3a3a;
	    color:#fff;
	    padding-left: 10px;
 	 }
	</style>
</head>
<body class="d-flex flex-column min-vh-100">
	<?php include 'menu.php';?>
	<div class="container col-12 px-4" style="padding-bottom:70px;">
		<div class="row">
			<div class="col-12">
				<br>
				<?php include 'conten.php';?>
			</div>
		</div>
	</div>
<footer class="footer">
	<div class="ft">
		<marquee>POLITEKNIK ISTIKOM BINA CITRA INFORMATIKA</marquee>
	</div>
</footer>
</body>
<script type="text/javascript" src="desain/js/jquery.js"></script>
<script type="text/javascript" src="desain/js/bootstrap.js"></script>
<script type="text/javascript" src="desain/js/bootstrap.min.js"></script>
<script type="text/javascript" src="desain/data-table/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="desain/data-table/datatables.min.js"></script>
<script type="text/javascript">
	new DataTable('#data');
</script>
</html>