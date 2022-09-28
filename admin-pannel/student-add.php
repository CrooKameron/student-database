<?php include "header.php"; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add Product</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form action="../netting/process.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

 
            
            
            
            
            
            
            
            


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Numara<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Öğrencinin okul numarasını giriniz" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_number">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Soyisim<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Öğrencinin soyismini giriniz" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_surname">
                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İsim<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Öğrencinin soyismini giriniz" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_name">
                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Velinin ismi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Öğrencinin velisinin ismini giriniz" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_parent_name">
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Velinin telefon numarası<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Öğrencinin velisinin telefon numarasını giriniz" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_parent_phonenumber">
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alanı<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Öğrencinin alanınını giriniz" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_branch">
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sınıf<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Öğrencinin sınıfını giriniz" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_class">
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tc no<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Öğrencinin tc kimlik numarasını giriniz" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_socialsecuritynumber">
                </div>
              </div>
              

              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success" name="addstudent">Ekle</button>
                </div>
              </div>

              <input type="hidden" name="product_id" value="<?php echo $productget['product_id'] ?>">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>



<!-- /page content -->
<?php include "footer.php"; ?>