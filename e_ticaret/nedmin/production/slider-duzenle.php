<?php include 'header.php';
$slidersor=$db->prepare("SELECT * FROM slider where slider_id=:id");
$slidersor->execute(array(
  'id'=> $_GET['slider_id']
));
$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);

 ?>


 ?>
<head>
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
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
            <h2>Slider Ekleme <small>
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
                  <form action= "../netting/islem.php" method="POST" 
                  enctype="multipart/form-data" 
                  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <?php 
                    $zaman=explode(" ",$slidercek['slider_zaman']);



                     ?>
                     <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
             
                    <div class="form-group">
                      <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Resim Seç<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="first-name" name="slider_resimyol" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  
                     <input type="hidden" name="eski_yol" value="<?php echo $slidercek['slider_id']?>">
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                        Slider Ad<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="slider_ad" placeholder="Slider adını giriniz." required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                   

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">
                        Slider Link<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="slider_link"  va="<?php echo $slidercek['slider_link'] ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                        Slider Sıra<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="slider_sira" value="<?php echo $slidercek['slider_sira'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                        <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="heard" class="form-control" name="slider_durum" required>
                          <option value="1">Aktif</option>
                          <option value="0">Pasif</option>
                        </select>
                      </div>
                    </div>
                        <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id'] ?>">
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                        <button type="submit" name="sliderduzenle" class="btn btn-success">Kaydet</button>
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