<?php 

$host = 'localhost';
$username="root";
$password="";
$databyse="student";
$pdo = new PDO("mysql:host=$host;dbname=$databyse;charset=UTF8", $username, $password);
	
$siteUrl = "http://localhost";
	
/////////////////////////////
//SİTENİN İLGİLİ YERLERİNDE KULLANMAK ÜZERE KULLANICI BİLGİLERİ ÇEKİLİYOR
if(isset($_SESSION["id"])) 
{
  $kullaniciID = $_SESSION["id"];
  $kullaniciBilgisi = $pdo->query("SELECT * FROM sinformation WHERE s_id = '$kullaniciID'")->fetch();
  $yetki = $kullaniciBilgisi["yetki"];

}
//SİTENİN İLGİLİ YERLERİNDE KULLANMAK ÜZERE KULLANICI BİLGİLERİ ÇEKİLİYOR


/////////////////////////////
//OTURUM GEREKTİREN SAYFALARDA KULLANICININ LOGİN OLUP OLMADIĞININ DENETLENMESNE YARDIMCI OLUR.
//OTURUM İSTEYEN SAYFALARDA ŞUNU YAZMAN YETERLİ. oturumGerekli(); BU, EĞER LOGİN DEĞİL İSE LOGİN SAYFASINA YÖNLENDİRİR.
function oturumGerekli() { if(!isset($_SESSION["id"])) { header("Location: login.php"); exit; } }
/////////////////////////////


?>