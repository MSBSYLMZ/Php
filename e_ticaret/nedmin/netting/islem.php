<?php 
ob_start();
session_start();
include 'baglan.php';
include '../production/fonksiyon.php';






if (isset($_POST['kullanicikaydet'])) {
	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']);
	$kullanici_passwordone=$_POST['kullanici_passwordone'];
	$kullanici_passwordtwo=$_POST['kullanici_passwordtwo'];

	if ($kullanici_passwordone==$kullanici_passwordtwo) {


		if (strlen($kullanici_passwordone)>=6) {

			$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
				
			));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();



			if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

			//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki,
					kullanici_durum=:kullanici_durum
					");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_adsoyad' => $kullanici_adsoyad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $password,
					'kullanici_yetki' => $kullanici_yetki,
					'kullanici_durum' => 1
				));

				if ($insert) {


					header("Location:../../index.php?durum=loginbasarili");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../register.php?durum=basarisiz");
				}

			} else {

				header("Location:../../register.php?durum=mukerrerkayit");



			}


		}else{
			header("Location:../../register.php?durum=eksiksifre");



		}

	}else{
		header("Location:../../register.php?durum=faklisifre");





	}


}


if (isset($_POST['hesabimduzenle'])) {
	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']);
	$kullanici_passwordone=$_POST['kullanici_passwordone'];
	$kullanici_passwordtwo=$_POST['kullanici_passwordtwo'];

	if ($kullanici_passwordone==$kullanici_passwordtwo) {


		if (strlen($kullanici_passwordone)>=6) {

			$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
				
			));

			//dönen satır sayısını belirtir
			$say=0;



			if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

			//Kullanıcı kayıt işlemi yapılıyor...
				$hesabimdüzenle=$db->prepare("UPDATE kullanici SET
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki,
					kullanici_durum=:kullanici_durum
					");
				$update=$hesabimdüzenle->execute(array(
					'kullanici_adsoyad' => $kullanici_adsoyad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $password,
					'kullanici_yetki' => $kullanici_yetki,
					'kullanici_durum' => 1
				));

				if ($update) {


					header("Location:../../index.php?durum=loginbasarili");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../hesabim.php?durum=basarisiz");
				}

			} else {

				header("Location:../../hesabim.php?durum=mukerrerkayit");



			}


		}else{
			header("Location:../../hesabim.php?durum=eksiksifre");



		}

	}else{
		header("Location:../../hesabim.php?durum=faklisifre");





	}


}



if (isset($_POST['sliderkaydet'])) {
	$uploads_dir = '../../dimg/slider';

	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];

	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;


	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:hello,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_resimyol=:slider_resimyol
		");
	$insert=$kaydet->execute(array(
		'hello'=>$_POST['slider_ad'],
		'slider_sira'=>$_POST['slider_sira'],
		'slider_link'=>$_POST['slider_link'],
		'slider_resimyol'=>$refimgyol

	));
	if($insert){

		header("Location:../production/slider.php?durum=ok");
	}else{
		header("Location:../production/slider.php?durum=no");
	}
}

if (isset($_POST['sliderduzenle'])) {
	# code...

	if($_FILES['slider_resimyol']["size"] > 0)  {

		$uploads_dir = '../../dimg/slider';

		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];

		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$slider_id=$_POST['slider_id'];

		$sliderkaydet=$db->prepare("UPDATE slider SET
			slider_ad=:slider_ad,
			slider_link=:slider_link,
			slider_sira=:slider_sira,
			slider_durum=:slider_durum,
			slider_resimyol=:resim
			WHERE slider_id={$_POST['slider_id']}");

		$update=$sliderkaydet->execute(array(
			'slider_ad'=> $_POST['slider_ad'],
			'slider_link'=> $_POST['slider_link'],
			'slider_sira'=> $_POST['slider_sira'],
			'slider_durum'=> $_POST['slider_durum'],
			'resim'=> $refimgyol

		));





		if ($update) {
			$resimsilunlink=$_POST['eski_yol'];
			unlink("../../$resimsilunlink");
			header("Location:../production/slider.php?slider_id=$slider_id&durum=ok");

		}else{
			header("Location:../production/slider.php?slider_id=$slider_id&durum=no");
		}

	} else {
		$slider_id=$_POST['slider_id'];


		$sliderkaydet=$db->prepare("UPDATE slider SET
			slider_ad=:slider_ad,
			slider_sira=:slider_sira,
			slider_link=:slider_link,
			slider_durum=:slider_durum
			WHERE slider_id={$_POST['slider_id']}");

		$update=$sliderkaydet->execute(array(
			'slider_ad'=> $_POST['slider_ad'],
			'slider_link'=> $_POST['slider_link'],
			'slider_sira'=> $_POST['slider_sira'],
			'slider_durum'=> $_POST['slider_durum']

		));


		if ($update) {
			header("Location:../production/slider.php?durum=ok&elsegirdi&id=$slider_id");

		}else{
			header("Location:../production/slider.php?durum=no&elsegirdi&id=$slider_id");
		}





	}}

	if ($_GET['slidersil']=="ok") {

		$sil=$db->prepare("DELETE from slider where slider_id=:id");
		$kontrol=$sil->execute(array(
			'id' => $_GET['slider_id']
		));


		if ($kontrol) {
			header('Location:../production/slider.php?sil=ok');
		# code...
		}else{
			header('Location:../production/slider.php?sil=no');
		}

	}



/*
if(isset($_POST['sliderimgduzenle'])){
 
    $uploads_dir = '../../imgs/slider';
 
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    @$name = $_FILES['slider_resimyol']["name"];
 
    $randomnumber1 = rand(20000,32000);
    $randomnumber2 = rand(20000,32000);
    $randomnumber3 = rand(20000,32000);
    $randomnumber4 = rand(20000,32000);
    $uniquename = $randomnumber1.$randomnumber2.$randomnumber3.$randomnumber4;
    $refimgyol = substr($uploads_dir, 6)."/".$uniquename.$name;
 
    @move_uploaded_file($tmp_name, "$uploads_dir/$uniquename$name");
 
    $slider_id=$_POST['slider_id'];
    $duzenle=$db->prepare("UPDATE slider SET 
        slider_resimyol=:resim WHERE
        slider_id={$_POST['slider_id']}"); 
    $update=$duzenle->execute(array(
        'resim' => $refimgyol
    ));
 
    if($update) {
 
        $resimsilunlink=$_POST['eski_yol'];
        unlink("../../$resimsilunlink");
 
        Header("Location:../production/slider-duzenle.php?id={$slider_id}&durum=ok"); 
    } else {
        Header("Location:../production/slider-duzenle.php?id={$slider_id}&durum=no");
    }
 
}
 
if(isset($_POST['sliderduzenle']))
{   
    $slider_id=$_POST['slider_id'];
    $sliderkaydet=$db->prepare("UPDATE slider SET 
    slider_ad=:slider_ad,
    slider_link=:slider_link,
    slider_sira=:slider_sira,
    slider_durum=:slider_durum
    WHERE slider_id={$_POST['slider_id']}
    ");
    $update=$sliderkaydet->execute(array(
        'slider_ad' => $_POST['slider_ad'],
        'slider_link' => $_POST['slider_link'],
        'slider_sira' => $_POST['slider_sira'],
        'slider_durum' => $_POST['slider_durum']
    ));
 
    if($update){
        Header("Location:../production/slider-duzenle.php?id={$slider_id}&durum=ok");
        
    } else {
        Header("Location:../production/slider-duzenle.php?id={$slider_id}&durum=no");
   
    }
}
 
if($_GET['slidersil']=="ok"){
    $sil=$db->prepare("DELETE FROM slider where slider_id=:id");
    $kontrol=$sil->execute(array(
        'id' => $_GET['id']
    ));
 
    if($kontrol) {
        Header("Location:../production/slider.php?sil=ok");
    }
    else {
        Header("Location:../production/slider.php?sil=no");
    }
}



if (isset($_POST['sliderduzenle'])) {
		echo $_POST['eski_yol'];

		$uploads_dir = '../../dimg/slider';

	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];

	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;




	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	
	$slider_id=$_POST['slider_id'];

	$sliderkaydet=$db->prepare("UPDATE slider SET
		slider_ad=:slider_ad,
		slider_link=:slider_link,
		slider_sira=:slider_sira,
		slider_durum=:slider_durum,
		slider_resimyol=:slider_resimyol
		WHERE slider_id={$_POST['slider_id']}");

	$update=$sliderkaydet->execute(array(
		'slider_ad'=> $_POST['slider_ad'],
		'slider_link'=> $_POST['slider_link'],
		'slider_sira'=> $_POST['slider_sira'],
		'slider_durum'=> $_POST['slider_durum'],
		'slider_resimyol'=> $refimgyol
		
	));





	if ($update) {
		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");
		header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

	}else{
		header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=no");
	}

}
*/
if (isset($_POST['urunkaydet'])) {

	$urun_seourl=seo($_POST['urun_ad']);

	$ayarekle=$db->prepare("INSERT INTO urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_onecikar=:urun_onecikar,
		urun_keyword=:urun_keyword,
		urun_stok=:urun_stok,
		urun_seourl=:urun_seourl,
		urun_durum=:urun_durum
		");

	$insert=$ayarekle->execute(array(
		'kategori_id'=> $_POST['kategori_id'],
		'urun_ad'=> $_POST['urun_ad'],
		'urun_detay'=> $_POST['urun_detay'],
		'urun_fiyat'=> $_POST['urun_fiyat'],
		'urun_video'=> $_POST['urun_video'],
		'urun_onecikar'=> $_POST['urun_onecikar'],
		'urun_keyword'=> $_POST['urun_keyword'],
		'urun_stok'=> $_POST['urun_stok'],
		'urun_seourl'=> $urun_seourl,
		'urun_durum'=> $_POST['urun_durum']
		
	));

	if ($insert) {
		header("Location:../production/urun.php?durum=ok");

	}else{
		header("Location:../production/urun.php?durum=no");
	}

}

if (isset($_POST['urunduzenle'])) {
	
	$urun_id=$_POST['urun_id'];
	$urun_seourl=seo($_POST['urun_ad']);

	$ayarkaydet=$db->prepare("UPDATE urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_onecikar=:urun_onecikar,
		urun_keyword=:urun_keyword,
		urun_stok=:urun_stok,
		urun_seourl=:urun_seourl,
		urun_durum=:urun_durum
		WHERE urun_id={$_POST['urun_id']}");

	$update=$ayarkaydet->execute(array(
		'kategori_id'=> $_POST['kategori_id'],
		'urun_ad'=> $_POST['urun_ad'],
		'urun_detay'=> $_POST['urun_detay'],
		'urun_fiyat'=> $_POST['urun_fiyat'],
		'urun_video'=> $_POST['urun_video'],
		'urun_onecikar'=> $_POST['urun_onecikar'],
		'urun_keyword'=> $_POST['urun_keyword'],
		'urun_stok'=> $_POST['urun_stok'],
		'urun_seourl'=> $urun_seourl,
		'urun_durum'=> $_POST['urun_durum']
	));

	if ($update) {
		header("Location:../production/urun.php?urun_id=$urun_id&durum=ok");

	}else{
		header("Location:../production/urun.php?urun_id=$urun_id&durum=no");
	}

}


if ($_GET['urunsil']=="ok") {

	$sil=$db->prepare("DELETE from urun where urun_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['urun_id']
	));


	if ($kontrol) {
		header('Location:../production/urun.php?sil=ok');
		# code...
	}else{
		header('Location:../production/urun.php?sil=no');
	}

}

if (isset($_POST['kategorikaydet'])) {

	$kategori_seourl=seo($_POST['kategori_ad']);

	$ayarekle=$db->prepare("INSERT INTO kategori SET
		kategori_ad=:kategori_ad,
		kategori_sira=:kategori_sira,
		kategori_seourl=:kategori_seourl,
		kategori_durum=:kategori_durum
		");

	$insert=$ayarekle->execute(array(
		'kategori_ad'=> $_POST['kategori_ad'],
		'kategori_sira'=> $_POST['kategori_sira'],
		'kategori_seourl'=> $kategori_seourl,
		'kategori_durum'=> $_POST['kategori_durum']
		
	));

	if ($insert) {
		header("Location:../production/kategori.php?durum=ok");

	}else{
		header("Location:../production/kategori.php?durum=no");
	}

}


if (isset($_POST['kategoriduzenle'])) {
	
	$kategori_id=$_POST['kategori_id'];
	$kategori_seourl=seo($_POST['kategori_ad']);

	$ayarkaydet=$db->prepare("UPDATE kategori SET
		kategori_ad=:kategori_ad,
		kategori_sira=:kategori_sira,
		kategori_seourl=:kategori_seourl,
		kategori_durum=:kategori_durum
		WHERE kategori_id={$_POST['kategori_id']}");

	$update=$ayarkaydet->execute(array(
		'kategori_ad'=> $_POST['kategori_ad'],
		'kategori_sira'=> $_POST['kategori_sira'],
		'kategori_seourl'=> $kategori_seourl,
		'kategori_durum'=> $_POST['kategori_durum']
		
	));

	if ($update) {
		header("Location:../production/kategori.php?kategori_id=$kategori_id&durum=ok");

	}else{
		header("Location:../production/kategori.php?kategori_id=$kategori_id&durum=no");
	}

}

if ($_GET['kategorisil']=="ok") {

	$sil=$db->prepare("DELETE from kategori where kategori_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kategori_id']
	));


	if ($kontrol) {
		header('Location:../production/kategori.php?sil=ok');
		# code...
	}else{
		header('Location:../production/kategori.php?sil=no');
	}

}



if (isset($_POST['logoduzenle'])) {
	$uploads_dir = '../../dimg';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;


	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");


	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		where ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
	));
	if($update){
		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");
		header("Location:../production/genel-ayar.php?durum=ok");
	}else{
		header("Location:../production/genel-ayar.php?durum=no");
	}
}




if (isset($_POST['admingiris'])) {
	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=($_POST['kullanici_password']);

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail'=>$kullanici_mail,
		'password'=>$kullanici_password,
		'yetki'=>5
	));
	echo $say=$kullanicisor->rowCount();
	if ($say==1) {
		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
	}else {
		header("Location:../production/login.php?durum=no");
	}
}


if (isset($_POST['kullanicigiris'])) {


	
	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	echo $kullanici_password=md5($_POST['kullanici_password']); 



	$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_password,
		'durum' => 1
	));


	$say=$kullanicisor->rowCount();



	if ($say==1) {

		echo $_SESSION['userkullanici_mail']=$kullanici_mail;

		header("Location:../../");
		exit;
	} else {


		header("Location:../../?durum=basarisizgiris");

	}


}




if (isset($_POST['genelayarkaydet'])) {
	

	//Tablo Güncelleme İşlemi
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tittle=:ayar_tittle,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_tittle'=> $_POST['ayar_tittle'],
		'ayar_description'=> $_POST['ayar_description'],
		'ayar_keywords'=> $_POST['ayar_keywords'],
		'ayar_author'=> $_POST['ayar_author']
	));

	if ($update) {
		header("Location:../production/genel-ayar.php?durum=ok");

		# code...
	}else{
		header("Location:../production/genel-ayar.php?durum=no");
	}

}


if (isset($_POST['iletisimayarkaydet'])) {
	

	//Tablo Güncelleme İşlemi
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_adres=:ayar_adres
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_tel'=> $_POST['ayar_tel'],
		'ayar_gsm'=> $_POST['ayar_gsm'],
		'ayar_faks'=> $_POST['ayar_faks'],
		'ayar_mail'=> $_POST['ayar_mail'],
		'ayar_ilce'=> $_POST['ayar_ilce'],
		'ayar_il'=> $_POST['ayar_il'],
		'ayar_adres'=> $_POST['ayar_adres']
	));

	if ($update) {
		header("Location:../production/iletisim_ayar.php?durum=ok");

		# code...
	}else{
		header("Location:../production/iletisim_ayar.php?durum=no");
	}

}
if (isset($_POST['apiayarkaydet'])) {
	

	//Tablo Güncelleme İşlemi
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_analystic'=> $_POST['ayar_analystic'],
		'ayar_maps'=> $_POST['ayar_maps'],
		'ayar_zopim'=> $_POST['ayar_zopim']
		
	));

	if ($update) {
		header("Location:../production/api_ayarlar.php?durum=ok");

		# code...
	}else{
		header("Location:../production/api_ayarlar.php?durum=no");
	}

}


if (isset($_POST['sosyalayarkaydet'])) {
	

	//Tablo Güncelleme İşlemi
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_google=:ayar_google,
		ayar_youtube=:ayar_youtube
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_facebook'=> $_POST['ayar_facebook'],
		'ayar_twitter'=> $_POST['ayar_twitter'],
		'ayar_google'=> $_POST['ayar_google'],
		'ayar_youtube'=> $_POST['ayar_youtube']
	));

	if ($update) {
		header("Location:../production/sosyal_ayarlar.php?durum=ok");

		# code...
	}else{
		header("Location:../production/sosyal_ayarlar.php?durum=no");
	}

}

if (isset($_POST['mailayarkaydet'])) {
	

	//Tablo Güncelleme İşlemi
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_smtphost=:ayar_smtphost,
		ayar_smtpuser=:ayar_smtpuser,
		ayar_smptpassword=:ayar_smptpassword,
		ayar_smptport=:ayar_smptport
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_smtphost'=> $_POST['ayar_smtphost'],
		'ayar_smtpuser'=> $_POST['ayar_smtpuser'],
		'ayar_smptpassword'=> $_POST['ayar_smptpassword'],
		'ayar_smptport'=> $_POST['ayar_smptport']
	));

	if ($update) {
		header("Location:../production/mail_ayarlar.php?durum=ok");

		# code...
	}else{
		header("Location:../production/mail_ayarlar.php?durum=no");
	}

}

if (isset($_POST['hakkimizdakaydet'])) {
	

	//Tablo Güncelleme İşlemi
	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon
		WHERE hakkimizda_id=0");

	$update=$ayarkaydet->execute(array(
		'hakkimizda_baslik'=> $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik'=> $_POST['hakkimizda_icerik'],
		'hakkimizda_video'=> $_POST['hakkimizda_video'],
		'hakkimizda_vizyon'=> $_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon'=> $_POST['hakkimizda_misyon']
	));

	if ($update) {
		header("Location:../production/hakkimizda.php?durum=ok");

		# code...
	}else{
		header("Location:../production/hakkimizda.php?durum=no");
	}

}


if (isset($_POST['kullaniciduzenle'])) {
	
	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_tc'=> $_POST['kullanici_tc'],
		'kullanici_adsoyad'=> $_POST['kullanici_adsoyad']
		
	));

	if ($update) {
		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	}else{
		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}

}
if ($_GET['kullanicisil']=="ok") {

	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
	));


	if ($kontrol) {
		header('Location:../production/kullanici.php?sil=ok');
		# code...
	}else{
		header('Location:../production/kullanici.php?sil=no');
	}

}


if (isset($_POST['menuduzenle'])) {
	
	$menu_id=$_POST['menu_id'];
	$menu_seourl=seo($_POST['menu_ad']);

	$ayarkaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		WHERE menu_id={$_POST['menu_id']}");

	$update=$ayarkaydet->execute(array(
		'menu_ad'=> $_POST['menu_ad'],
		'menu_detay'=> $_POST['menu_detay'],
		'menu_url'=> $_POST['menu_url'],
		'menu_sira'=> $_POST['menu_sira'],
		'menu_seourl'=> $menu_seourl,
		'menu_durum'=> $_POST['menu_durum']
		
	));

	if ($update) {
		header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");

	}else{
		header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
	}

}
if ($_GET['menusil']=="ok") {

	$sil=$db->prepare("DELETE from menu where menu_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['menu_id']
	));


	if ($kontrol) {
		header('Location:../production/menu.php?sil=ok');
		# code...
	}else{
		header('Location:../production/menu.php?sil=no');
	}

}

if (isset($_POST['menukaydet'])) {

	$menu_seourl=seo($_POST['menu_ad']);

	$ayarekle=$db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		");

	$insert=$ayarekle->execute(array(
		'menu_ad'=> $_POST['menu_ad'],
		'menu_detay'=> $_POST['menu_detay'],
		'menu_url'=> $_POST['menu_url'],
		'menu_sira'=> $_POST['menu_sira'],
		'menu_seourl'=> $menu_seourl,
		'menu_durum'=> $_POST['menu_durum']
		
	));

	if ($insert) {
		header("Location:../production/menu.php?durum=ok");

	}else{
		header("Location:../production/menu.php?durum=no");
	}

}


if (isset($_POST['yorumkaydet'])) {


	$ayarekle=$db->prepare("INSERT INTO yorum SET
	
		yorum_detay=:yorum_detay,
		kullanici_id=:yorum_detay
		");

	$insert=$ayarekle->execute(array(
		
		'yorum_detay'=> $_POST['yorum_detay'],
		'kullanici_id'=> $_POST['kullanici_id']
		
	));

	if ($insert) {
		header("Location:../production/yorum.php?durum=ok");

	}else{
		header("Location:../production/yorum.php?durum=no");
	}

}


?>





