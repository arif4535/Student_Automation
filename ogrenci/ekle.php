<?php 
session_start();
if(!isset($_SESSION["id"])){
	header("Location:../login.php");
}
include("../db.php"); 

if(isset($_POST['addbutton'])) 
{
    $yeniKayit = $pdo->prepare("INSERT INTO sinformation SET Name = :Name, SNumber = :Number,Email = :Email, Major = :Major,Grade = :Grade,Class = :Class,dersler= :dersler,aktifmi = :aktifmi");
    $ekle = $yeniKayit->execute(array(
        "Name" => $_POST['Name'],
        "Number" => $_POST['Number'],
		"Email" => $_POST['Email'],
        "Major" => $_POST['Major'],
        "Grade" => $_POST['Grade'],
		"dersler" => $_POST['dersler'],
        "Class" => $_POST['flexRadioDefault'],
		"aktifmi" => 1
    ));
			
    if($ekle) 
    {
        header("Location:../index.php");
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
                        <h1 class="mt-4">Öğrenci Ekle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Yeni bir öğrenci ekleyin.</li>
                        </ol>
                                             
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-plus me-1"></i>
                               Öğrenci Ekleme Formu
                            </div>
                            <div class="card-body">
                            <div class="card border-0 rounded-lg">
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="Name" type="text" placeholder="Enter your name" />
                                                        <label for="inputFirstName"> İsim Soyisim </label> 
                                                    </div>                                                                       
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="Grade" type="text" placeholder="Enter your name" />
                                                        <label for="inputFirstName"> Sınıf </label> 
                                                    </div>                                                                       
                                                </div>
											</div>
											<div class="row mb-3">
												<div class="col-md-6">
                                                    <div class="form-floating mb-4 mb-md-0">
													<div class="form-check">
														<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
														<label class="form-check-label" for="flexRadioDefault1">
															Birinci Öğrenim
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2">
														<label class="form-check-label" for="flexRadioDefault1">
															İkinci Öğrenim
														</label>
													</div>
                                                    </div>                                                                       
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-4 mb-md-0">
                                                        <input class="form-control" name="Number" type="number" placeholder="Enter your position" />
                                                        <label for="inputLastName">Okul Numarası</label>
                                                    </div>
                                                </div>
                                            </div>
											
                                            <div class="row mb-3">
												<div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="Major"  type="text" placeholder="enter your salary" />
                                                        <span class="glyphicon glyphicon-pencil hide editMode"></span>
                                                        <label for="inputPasswordConfirm">Bölüm</label>
                                                    </div>
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-3">
                                                        <input class="form-control" name="Email"  type="email" placeholder="Enter your office name" />
                                                        <label for="inputPassword">Okul Mail</label>
                                                    </div>
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-3">
                                                        <input class="form-control" name="dersler"  type="text" placeholder="Enter your office name" />
                                                        <label for="inputPassword">dersler</label>
                                                    </div>
                                                </div>
                                            </div>	

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit" name="addbutton">Yeni Öğrenci Ekle</button></div>
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
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
    
                                                