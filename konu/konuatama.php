<?php 

session_start();
if(!isset($_SESSION["id"])){
	header("Location:../login.php");
}

include("../db.php");
	
if(!isset($_GET['id']) || $_GET['id'] == ""){
	header("Location: $siteUrl");
	exit;	
}
else {
	$id = $_GET['id'];
}
	
if(isset($_POST['konuAta'])) {
	if (!isset($_POST['konuradio']))
	{
		echo "konulardan birini seçiniz";
		exit;
	}
	
	else {
		$yeniKayit = $pdo->prepare("UPDATE sinformation SET konu = :K_ID WHERE s_id = :S_ID");
		$atamayap = $yeniKayit->execute(array(
			"K_ID" => $_POST["konuradio"],
			"S_ID" => $id,

		));		
		
		if($atamayap) 
		{
			header("Location: $siteUrl/ogrenci/ogrencidetay.php");
			exit;
		}
		else {
			echo "Hata oluştu!";
			exit;
		}
	}
}
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Projelerimiz</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?php echo $siteUrl; ?>/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include("../ustmenu.php"); ?>
		<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include("../solmenu.php"); ?>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Öğrenci Projeler Listesi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Aşağıdan şu an sistemde kayıtlı olan öğrenci projelerinin bilgilerini görebilirsiniz.</li>
                        </ol>
                            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-list me-1"></i>Projeler
							</div>
							<form action="" method="post">
                            <div class="card-body">
                                        <?php 
											$sql = "SELECT * FROM konu WHERE aktifmi=1";
                                            $result = $pdo->query($sql);
                                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                            ?> 
													<div class="form-check">
														<input class="form-check-input" type="radio" name="konuradio" value="<?php echo $row["id"]; ?>" id="konuradio">
														<label class="form-check-label" for="flexRadioDefault1">
															<?php echo $row["baslik"]; ?> [<?php echo $row["konu"]; ?>]
														</label>
													</div>																						
                                            <?php } ?>
											
											
											
											<div class="row">
												<div class="col-md mx-auto">
													<div class="d-flex justify-content-end">
														<button type="submit" class="btn btn-info pull-right btn-l btn float-right" name="konuAta">Projeyi Ata</button>
													</div>
												</div>
											</div>
											
										</div>
							</form>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo $siteUrl; ?>/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo $siteUrl; ?>/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo $siteUrl; ?>/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?php echo $siteUrl; ?>/js/datatables-simple-demo.js"></script>
    </body>
</html>