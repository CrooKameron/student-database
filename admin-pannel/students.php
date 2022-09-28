<?php
include 'header.php';

$askstudent = $db->prepare("SELECT * FROM student_information");
$askstudent->execute();
?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Öğrenciler</h2>
            <div style="margin:4px 0 0 140px; position:absolute;">
              
              <?php if ($_GET['durun'] == "basarili") { ?> <small style="color:green;"> Değişiklikler kaydedildi! </small>
              <?php }
              if ($_GET['durum'] == "basarisiz") { ?> <small style="color:red;"> Bir şeyler yanlış gitti! </small>
              <?php } else echo (null); ?>


            </div>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                <div style="margin:4px 5px 0 0;">
                  <a href="student-add.php"> <button class="btn btn-success btn-xs" name="addproduct">Öğrenci Ekle</button></a>
                </div>
              </li>


              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="txtalgncenter">Numara</th>
                  <th class="txtalgncenter">Soyisim</th>
                  <th class="txtalgncenter">İsim</th>
                  <th class="txtalgncenter">Veli adı</th>
                  <th class="txtalgncenter">Veli tel</th>
                  <th class="txtalgncenter">Alanı</th>
                  <th class="txtalgncenter">Sınıfı</th>
                  <th class="txtalgncenter">Tc</th>
                  <th class="txtalgncenter" style="width: 50px;">Resim</th>
                  <th class="txtalgncenter" style="width: 50px;">Düzenle</th>
                  <th class="txtalgncenter" style="width: 50px;">Sil</th>

                </tr>
              </thead>

              <tbody>

                <?php
                while ($studentget = $askstudent->fetch(PDO::FETCH_ASSOC)) { ?>
                  <tr>
                    <td class="txtalgncenter" width="20"><?php echo $studentget['student_number'] ?></td>
                    <td class="txtalgncenter"><?php echo $studentget['student_surname'] ?></td>
                    <td class="txtalgncenter"><?php echo $studentget['student_name'] ?></td>
                    <td class="txtalgncenter"><?php echo ($studentget['student_parent_name']) . ($studentget['product_moneyunit']) ?></td>
                    <td class="txtalgncenter"><?php echo $studentget['student_parent_phonenumber'] ?></td>
                    <td class="txtalgncenter"><?php echo $studentget['student_branch'] ?></td>
                    <td class="txtalgncenter"><?php echo $studentget['student_class'] ?></td>
                    <td class="txtalgncenter"><?php echo $studentget['student_socialsecuritynumber'] ?></td>
                    <td class="txtalgncenter"><a href="product-gallery.php?product_id=<?php echo $studentget['product_id'] ?>"><button class="btn btn-success" style="width:100%; height:100%;">Resmi düzenle</button></a></td>

                    <td><center> <a href="student-edit.php?student_number=<?php echo $studentget['student_number'] ?>"> <button style="width:100%; height:100%;" class="btn btn-primary ">Düzenle</button></a></center></td>
                    <td><center> <a href="../netting/process.php?student_number=<?php echo $studentget['student_number'] ?>&deletestudent=true"><button style="width:100%; height:100%;" class="btn btn-danger">Sil</button></a></center></td>
                  </tr>

                <?php } ?>





              </tbody>
            </table>




          </div>
        </div>
      </div>
    </div>




  </div>
</div>

<?php include 'footer.php' ?>