<?php 
session_start();
if(!isset($_SESSION["id"])){
	header("Location:../login.php");
}
include("../db.php"); 
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Öğrenci Ekle</title>
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
                        <h1 class="mt-4">Öğrenci Listesi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Aşağıdan şu an sistemde kayıtlı olan öğrenci projelerinin bilgilerini görebilirsiniz ve proje ataması yapabilirsiniz.</li>
                        </ol>   
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-list me-1"></i>
                               Öğrenciler
                            </div>
                            <div class="card-body">	
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>İsim Soyisim</th>
                                            <th>Öğrenci Numarası</th>
                                            <th>E-mail</th>
                                            <th>Bölüm</th>
                                            <th>Sınıf</th>
                                            <th>Öğrenim</th>
										</tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>İsim Soyisim</th>
                                            <th>Öğrenci Numarası</th>
                                            <th>E-mail</th>
                                            <th>Bölüm</th>
                                            <th>Sınıf</th>
                                            <th>Öğrenim</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php    
											$sql = "SELECT * FROM sinformation WHERE aktifmi=1";
                                            $result = $pdo->query($sql);
                                            while($row = $result->fetch(PDO::FETCH_ASSOC))
                                            {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row["Name"]; ?></td>
                                                    <td><?php echo $row["SNumber"]; ?></td>
                                                    <td><?php echo $row["Email"]; ?></td>
                                                    <td><?php echo $row["Major"]; ?></td>
                                                    <td><?php echo $row["Grade"]; ?></td>
                                                    <td><?php echo $row["Class"]; ?></td>
													
                                                    <td>
                                                    <a href="<?php echo $siteUrl; ?>/ogrenci/guncelle.php?id=<?php echo $row["s_id"]; ?>">
													<button class="btn btn-primary btn-sm" id="editbutton"><i class="fas fa-pencil-alt"></i></button></a>
													</td>
													
													<td>	
													<a href="<?php echo $siteUrl; ?>/ogrenci/sil.php?id=<?php echo $row["s_id"]; ?>">	
                                                    <button class="btn btn-danger btn-sm" id="delbutton"><i class="fas fa-trash-alt"></i></button></a>
													</td>																										
													
                                                </tr>
										
                                            <?php } ?>                             
                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Tüm Hakları Saklıdır &copy; Arif Değirmenci</div>
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
    
                                                