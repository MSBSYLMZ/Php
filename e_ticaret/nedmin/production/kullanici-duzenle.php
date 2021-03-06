<?php include 'header.php';


$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
$kullanicisor->execute(array(
  'id'=> $_GET['kullanici_id']
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

 ?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">


      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kullanıcı Düzenle <small>
              <?php 
              if ($_GET['durum']=='ok') {?>
                <b style="color:green;"> İşlem Başarılı
                  </b> <?php }

                  elseif($_GET['durum']=='no') {?>
                    <b style="color:red;"> İşlem Başarısız 
                      </b><?php


                    }

                    ?>



                  </small></h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form action= "../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <?php 
                    $zaman=explode(" ",$kullanicicek['kullanici_zaman']);



                     ?>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                        KAYIT TARİHİ<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date" id="first-name" name="kullanici_zaman" disabled="" value="<?php echo $zaman[0] ?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                        KAYIT SAATİ<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="time" id="first-name" name="kullanici_saat" disabled="" value="<?php echo $zaman[1] ?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                        TC<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                        AD SOYAD<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                        KULLANICI MAİL<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_mail" disabled="" value="<?php echo $kullanicicek['kullanici_mail'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                      <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                    

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                        <button type="submit" name="kullaniciduzenle" class="btn btn-success">Düzenle</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include 'footer.php' ?>