<?php include 'header.php';



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
                        <input type="text" id="first-name" name="slider_link"  placeholder="Slider URL giriniz." class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" placeholder="Slider adını giriniz." for="first-name">
                        Slider Sıra<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="slider_sira" placeholder="Slider sıra no. giriniz." required="required" class="form-control col-md-7 col-xs-12">
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
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                        <button type="submit" name="sliderkaydet" class="btn btn-success">Kaydet</button>
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