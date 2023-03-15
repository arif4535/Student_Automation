<?php 
session_start();
if(!isset($_SESSION["id"])){
	header("Location:../login.php");
}

include("../db.php"); 


if(isset($_POST['konubuton'])) {
	$yeniKayit = $pdo->prepare("INSERT INTO konu SET Konu = :konu,Baslik = :baslik, Ders = :ders, Donem = :donem, aktifmi = :aktifmi");
    $ekle = $yeniKayit->execute(array(
        "konu" => $_POST['Konu'],
		"baslik"=>$_POST['Baslik'],
		"ders"=>$_POST['Ders'],
		"donem"=>$_POST['Donem'],
		"aktifmi" => 1
    ));
			
    if($ekle) 
    {
        header("Location:index.php");
        exit;
    }
    else {
        echo "Hata oluştu!";
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
        <title>Proje Ekle</title>
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
                        <h1 class="mt-4">Konu Ekle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Yeni bir proje konusu ekleyin.</li>
                        </ol> 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-plus me-1"></i>
                               Konu Ekleme Formu
							</div>
                            <div class="card-body">
                            <div class="card border-0 rounded-lg">
                                    <div class="card-body">
                                        <form method="post" action="">                              
                                            <div class="row mb-3">
												<div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="Baslik"  type="text" placeholder="enter your object" />
                                                        <span class="glyphicon glyphicon-pencil hide editMode"></span>
                                                        <label for="inputPasswordConfirm">Proje Başlık</label>
                                                    </div>
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
														<textarea name="Konu" class="form-control" cols="50" rows="30"></textarea>
													    <label for="inputPasswordConfirm">Proje Konusu</label>
													</div>
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="Ders"  type="text" placeholder="enter your object" />
                                                        <span class="glyphicon glyphicon-pencil hide editMode"></span>
                                                        <label for="inputPasswordConfirm">Ders Adı</label>
                                                    </div>
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="Donem">
														<option value="değer0">Dönem Seçiniz</option>
														<option value="değer1">2022-2023 Güz</option>
														<option value="değer1">2022-2023 Bahar</option>
  														</select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-dark btn-block" type="submit" name="konubuton">Yeni Konu Ekle</button>
												</div>
                                            </div>
                                        </form>
                                                                    
                                    </div>
                                </div>
                            </div>
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
    