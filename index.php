<?php 
session_start();
include("db.php");
oturumGerekli();



function veriSay($tablo, $kosul, $deger) 
{
	global $pdo;	
	$sorgu = $pdo->query("SELECT COUNT(*) FROM $tablo WHERE $kosul = $deger")->fetchColumn();
	return $sorgu;
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
        <title>Öğrenci</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?php echo $siteUrl; ?>/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
	
    <body class="sb-nav-fixed">
        <?php include("ustmenu.php"); ?>
        <div id="layoutSidenav">
			<?php include("solmenu.php"); ?>
            <div id="layoutSidenav_content">
                <main>
					<div class="card mb-4">
						<div class="container-fluid px-4">
							<h1 class="mt-4">Ana Sayfa</h1>
							<ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                        <?php 
						$sql = "SELECT * FROM sinformation WHERE s_id = $kullaniciID";
						$result = $pdo->query($sql);
						$row = $result->fetch(PDO::FETCH_ASSOC);
						echo $row["Name"];?> , Hoşgeldiniz
						</li>
                        </ol>
						
                       <?php if($yetki == 1) { ?><div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">
									<h5 class="card-title"><?php echo "Toplam Öğrenci: ".veriSay("sinformation", "aktifmi", 1); ?> </h5>
									<p class="card-text">Sistemdeki öğrenci bilgileri ve proje ataması için:</p>
									</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo $siteUrl; ?>/ogrenci/ogrencidetay.php">buraya tıklayınız</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
						</div><?php } ?>
						
						<div class="row">
                            <div class="col-md-6 mb-3 ">
                                <div class="card bg-secondary text-white mb-3">
                                    <div class="card-body">
									<h5 class="card-title"><?php echo "Sistemde Bulunan Proje Sayısı: ".veriSay("konu", "aktifmi", 1); ?></h5>
									<p class="card-text">Sistemdeki öğrenci projeleri bilgilerine daha detaylı ulaşmak için:</p>
									</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo $siteUrl; ?>/konu/konudetay.php">buraya tıklayınız</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
						</div>
						
						<div class="row">
                            <div class="col-md-6 mb-3 ">
                                <div class="card bg-secondary text-white mb-3">
                                    <div class="card-body">
									<h5 class="card-title"><?php echo "Sistemde bulunan belgeler: " ?></h5>
									<p class="card-text">Sistemdeki teslim edilecek belgelere ulaşmak için:</p>
									</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="https://tf.selcuk.edu.tr/index.php?lang=tr&birim=033001&page=1247">buraya tıklayınız</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
						</div>
						
					</div>
                </main>
				
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Tüm Hakları Saklıdır &copy; Arif DEĞİRMENCİ </div>
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