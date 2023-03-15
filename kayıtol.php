<?php 
session_start();
include("db.php"); 

if(isset($_POST['kayıtol'])) 
{
    $yeniKayit = $pdo->prepare("INSERT INTO sinformation SET Name = :Name,Email = :Email,aktifmi = :aktifmi,yetki = :yetki,sifre = :sifre");
    $ekle = $yeniKayit->execute(array(
        "Name" => $_POST['Name'],
		"Email" => $_POST['Email'],
		"aktifmi" => 1,
		"yetki" => $_POST['flexRadioDefault'],
		"sifre" => $_POST['sifre']
    ));
			
    if($ekle) 
    {
        header("Location: index.php");
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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Giriş Yap</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hoşgeldiniz!</h1>
                                    </div>
                                    <form class="user"  method="post" action="">
										<div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail"  name="Email" placeholder="Öğrenci/Öğretmen Numara/E-posta" value="Email">
                                        </div>
										<div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputName"  name="Name" placeholder="Öğrenci/Öğretmen isim soyisim" value="Name">
                                        </div>                                        
										<div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="sifre" id="exampleInputPassword" placeholder="Şifre">
                                        </div>
                                        
										<div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="sifre" id="exampleInputPassword" placeholder="Şifre">
                                        </div>  
										<div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
													<label class="form-check-label" for="flexRadioDefault1">
														Öğretmen
													</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2">
													<label class="form-check-label" for="flexRadioDefault1">
														Öğrenci
													</label>
												</div>
                                                </div>                                                                       
                                        </div>											
										<button class="btn btn-primary btn-user btn-block" name="kayıtol">Kaydı Tamamla</button><div class="row mb-3">
									
									</form>
                                
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>