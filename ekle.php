<?php
include("db.php");

if(isset($_POST['kullanıcıEkle'])) 
{
	if($_POST['kullaniciadi'] == "" || $_POST['isimsoyisim'] == "" || $_POST['eposta'] == ""|| ! filter_var($_POST['eposta'], FILTER_VALIDATE_EMAIL) || $_POST['telefon'] == ""|| !ctype_digit($_POST['telefon']))
	{
		echo "hack girişimi";
	}
	else
	{
		$yeniKayit = $db->prepare("INSERT INTO kullanıcılar SET 
			id = :id, 
			isimsoyisim = :isimsoyisim,
			kullaniciadi = :kullaniciadi,
			eposta = :eposta,
			telefon = :telefon
			ders
		");
		$insert = $yeniKayit->execute(array(
			"id" => NULL,
			"isimsoyisim" =>$_POST['isimsoyisim'],
			"kullaniciadi" =>$_POST['kullaniciadi'],
			"eposta" =>$_POST['eposta'],	
			"telefon" =>$_POST['telefon']
			));
			if($insert)
			{
				<script language="javascript">
				window.alert("kayıt başarılı")
				</script>
				echo "kayıt başarılı";
				header("Location: liste.php");
			}
	
	}
	 
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <title>Floating labels example for Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/examples/floating-labels/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" action="" method="post">
      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" name="eposta" required autofocus>
        <label for="inputEmail">Email address</label>
      </div>

      <div class="form-label-group">
        <input type="text" id="kullaniciadi" class="form-control" name="kullaniciadi" required>
        <label for="kullaniciadi">kullaniciadi</label>
      </div>
	  
	  <div class="form-label-group">
        <input type="text" id="isimsoyisim" class="form-control" name="isimsoyisim" required>
        <label for="isimsoyisim">isimsoyisim</label>
      </div>
	  
	  <div class="form-label-group">
        <input type="tel" id="telefon" maxlength="10" class="form-control" name="telefon" required>
        <label for="telefon">telefon</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" name="kullanıcıEkle" type="submit"> Kullanıcıyı Ekle </button>
	  
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
	  
    </form>
  </body>
</html>
