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
            <h2>Menü Ekleme <small>
              


                  </small></h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form action= "../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <?php 
                    $zaman=explode(" ",$menucek['menu_zaman']);



                     ?>


                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                        Menü Ad<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="menu_ad" placeholder="Menü adını giriniz." required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Menü Detay <span class="required">*</span>
                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <textarea  class="ckeditor" id=" editor1" name="menu_detay"><?php echo $menucek['menu_detay']; ?></textarea>
                      </div>
                    </div>

                    <script type="text/javascript">

                      CKEDITOR.replace( 'editor1',

                      {

                        filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                        filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                        filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                        filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                        filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                        filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                        forcePasteAsPlainText: true

                      } 

                      );

                    </script>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">
                        Menü URL<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="menu_url"  placeholder="Menü URL giriniz." class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" placeholder="Menü adını giriniz." for="first-name">
                        Menü Sıra<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="menu_sira" placeholder="Menü sıra no. giriniz." required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                        <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Durum<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="heard" class="form-control" name="menu_durum" required>
                          <option value="1">Aktif</option>
                          <option value="0">Pasif</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                        <button type="submit" name="menukaydet" class="btn btn-success">Kaydet</button>
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