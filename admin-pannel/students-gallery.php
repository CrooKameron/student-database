<?php include 'header.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <div align="left" class="col-md-6">
                <h2> Öğrencinin resmi <small>

                    <?php if ($_GET['durum'] == "basarili") { ?> <small style="color:green;"> Değişiklikler kaydedildi! </small>
                    <?php }
                    if ($_GET['durum'] == "basarisiz") { ?> <small style="color:red;"> Bir şeyler yanlış gitti! </small>
                    <?php } else echo (null); ?>

                  </small></h2><br>
              </div>
              <form action="../netting/process.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="student_number" value="<?php echo $_GET['student_number']; ?>">

                <div align="right" class="col-md-6">
                  <button type="submit" name="productphotodelete" class="btn btn-danger "><i class="fa fa-trash" aria-hidden="true"></i> Seçilen resimleri sil</button>
                  <a class="btn btn-success" href="students-photo-upload.php?student_number=<?php echo $_GET['student_number']; ?>"><i class="fa fa-plus" aria-hidden="true"></i> Fotoğraf yükle! </a>
                </div>
                <div class="clearfix"></div>
            </div>


            <div class="x_content">


              <?php

              $atthepage = 25; // sayfada gösterilecek içerik miktarını belirtiyoruz.


              $query = $db->prepare("SELECT * from student_image");
              $query->execute();
              $total_productphoto = $query->rowCount();

              $total_page = ceil($total_productphoto / $atthepage);

              // eğer sayfa girilmemişse 1 varsayalım.
              $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

              // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
              if ($page < 1) $page = 1;

              // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
              if ($page > $total_page) $page = $total_page;

              $limit = ($page - 1) * $atthepage;

              $studentphotoask = $db->prepare("SELECT * from student_image where student_image_student_number=:id limit $limit,$atthepage");
              $studentphotoask->execute(array(
                'id' => $_GET['student_number']
              ));

              while ($studentget = $studentphotoask->fetch(PDO::FETCH_ASSOC)) { ?>



                <div class="col-md-55">
                  <label>
                    <div class="image view view-first">
                      <img style="width: 250px; height: 150px; display: block;" src="<?php echo $studentget['student_image_imagepath']; ?>" alt="image" />
                      <div class="mask">
                        <p><?php echo $studentget['productphoto_name']; ?> <?php echo $studentget['productphoto_id']; ?></p>
                        <div class="tools tools-bottom">

                          <!--<a href="#"><i class="fa fa-times"></i></a>-->

                        </div>

                      </div>

                    </div>

                    <?php array("$productphotoselect"); ?>


                    <input type="checkbox" name="productphotoselect[]" value="<?php echo $studentget['productphoto_id']; ?>"> select
                  </label>


                </div>

              <?php } ?>

              <div align="right" class="col-md-12">
                <ul class="pagination">

                  <?php

                  $s = 0;

                  while ($s < $total_page) {

                    $s++; ?>

                    <?php

                    if ($s == $page) { ?>

                      <li class="active">

                        <a href="productphoto.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                      </li>

                    <?php } else { ?>


                      <li>

                        <a href="productphoto.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                      </li>

                  <?php   }
                  }

                  ?>

                </ul>
              </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /page content -->



<?php include 'footer.php'; ?>