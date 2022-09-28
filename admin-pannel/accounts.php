<?php
include 'header.php';

$askstudent = $db->prepare("SELECT * FROM admin_pannel");
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
            <h2>Hesap Listesi</h2>
            &nbsp;&nbsp;&nbsp;

            <?php if ($_GET['durum'] == "basarili") { ?> <small style="color:green;"> Değişiklikler kaydedildi! </small>
            <?php }
            if ($_GET['durum'] == "basarisiz") { ?> <small style="color:red;"> Bir şeyler yanlış gitti! </small>
            <?php } else echo (null); ?>

            <ul class="nav navbar-right panel_toolbox">
              <li class="dropdown">
                <div style="margin:4px 5px 0 0;"><a href="account-create.php"> <button class="btn btn-success btn-xs" name="createaccount">Hesap Oluştur</button></a></div>
              </li>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">




            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="text-align:center; width: 40px;">Hesap numarası</th>
                  <th style="text-align:center;">Mail adresi</th>
                  <th style="text-align:center;">Şifrelenmiş parola</th>
                  <th style="text-align:center;">Sil</th>

                </tr>
              </thead>

              <tbody>

                <?php while ($studentget = $askstudent->fetch(PDO::FETCH_ASSOC)) { ?>
                  <tr>
                    <td style="width: 40px;" class="txtalgncenter"><?php echo $studentget['account_id'] ?></td>
                    <td class="txtalgncenter"><?php echo $studentget['account_mail'] ?></td>
                    <td class="txtalgncenter"><?php echo $studentget['account_password'] ?></td>
                    <td>
                      <center> <a href="../netting/process.php?account_id=<?php echo $studentget['account_id'] ?>&deleteaccount=true"><button style="width:100%; height:30px;" class="btn btn-danger btn-xs">Delete</button></a></center>
                    </td>
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