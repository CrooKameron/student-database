<?php include "header.php";

$askstudent = $db->prepare("SELECT * FROM student_information where student_number=:student_number");
$askstudent->execute(array(
  'student_number' => $_GET['student_number']
));
$studentget = $askstudent->fetch(PDO::FETCH_ASSOC);

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
          <h2>Düzenle</h2>
            
          <ul style="list-style-type: none;">
            <li><a class="flright" close-link><i class="fa fa-close"> </i></a></li>
          </ul>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form action="../netting/process.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Numara<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $studentget['student_number'] ?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_number">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Soyisim<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $studentget['student_surname'] ?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_surname">
                </div>
              </div>
             

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İsim<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $studentget['student_name'] ?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Velinin İsmi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $studentget['student_parent_name'] ?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_parent_name">
                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Veli Tel no<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $studentget['student_parent_phonenumber'] ?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_parent_phonenumber">
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alan<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $studentget['student_branch'] ?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_branch">
                </div>
              </div>
              
              
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sınıf<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $studentget['student_class'] ?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_class">
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tc no<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $studentget['student_socialsecuritynumber'] ?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="student_socialsecuritynumber">
                </div>
              </div>




              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success" name="editstudent">Güncelle</button>
                </div>
              </div>

              <input type="hidden" name="student_number" value="<?php echo $studentget['student_number'] ?>">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>



<?php include "footer.php"; ?>