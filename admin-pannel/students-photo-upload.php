<?php include 'header.php';?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">


    </div>


    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Resim yükleyin</h2>
                      <a style="float: right;" class="btn btn-success" href="students-gallery.php?student_number=<?php echo $_GET['student_number']; ?>"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Yüklenen resimleri gör</a>

                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      
                      <p>Resimlerinizi sürükleyerek veya aşağı çift tıklayarak ekleyebilirsiniz.</p>
                      
                      <form action="../netting/studentgallery.php" class="dropzone">
                        <input type="hidden" name="student_number" value="<?php echo $_GET['student_number']?>">
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
<!-- /page content -->



<?php include 'footer.php'; ?>
