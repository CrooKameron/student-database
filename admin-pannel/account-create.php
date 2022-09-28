<?php include "header.php"; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Create a New Account</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form action="../netting/process.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adı<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Kullanıcı adı veya e posta adresini giriniz" type="text" id="usrname" class="form-control col-md-7 col-xs-12" name="account_mail">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Parola<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Oluşturmak istediğiniz hesabın parolasını giriniz" type="text" id="pword1" class="form-control col-md-7 col-xs-12" name="account_password">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Parola Tekrar<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Az önce girdiğiniz parolayı tekrar ediniz" type="text" id="pword2" class="form-control col-md-7 col-xs-12" name="student_name">
                </div>
              </div>




              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success" id="btnadd" name="addstudent">Ekle</button>
                </div>
              </div>

              <input type="hidden" name="product_id" value="<?php echo $productget['product_id'] ?>">



              <script>
                addEventListener("load", function(e) {
                  document.getElementById("btnadd").disabled = true;
                });



                usrname.addEventListener("input", function(e) {
                  if (this.value.length > 5) {
                    if (document.getElementById("pword1").value == "" || document.getElementById("pword2").value == "" || document.getElementById("usrname").value == "") { document.getElementById("btnadd").disabled = true;} 
                    else { document.getElementById("btnadd").disabled = false; }} 
                  else { document.getElementById("btnadd").disabled = true;}
                });


                pword1.addEventListener("input", function(e) {
                  var pw1 = document.getElementById("pword1").value;
                  var pw2 = document.getElementById("pword2").value;

                  if (pw1 == pw2) {
                    if (document.getElementById("pword1").value == "" || document.getElementById("pword2").value == "" || document.getElementById("usrname").value == "") { document.getElementById("btnadd").disabled = true;} 
                    else { document.getElementById("btnadd").disabled = false;}} 
                  else { document.getElementById("btnadd").disabled = true;}

                });


                pword2.addEventListener("input", function(e) {
                  
                  var pw1 = document.getElementById("pword1").value;
                  var pw2 = document.getElementById("pword2").value;

                  if (pw1 == pw2) {
                    if (document.getElementById("pword1").value == "" || document.getElementById("pword2").value == "" || document.getElementById("usrname").value == "") { document.getElementById("btnadd").disabled = true; } 
                    else {document.getElementById("btnadd").disabled = false;}} 
                  else { document.getElementById("btnadd").disabled = true;}

                });
              </script>




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