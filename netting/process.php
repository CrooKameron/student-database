<?php
error_reporting(~E_NOTICE);
ob_start();
session_start();
include('connect.php');
 

if (isset($_POST['adminlogin'])) {

    $account_mail = $_POST['account_mail'];
    $account_password = md5($_POST['account_password']);  
    

    
    $askaccount = $db->prepare("SELECT * FROM admin_pannel where account_mail=:accmail and account_password=:accpassword");
    $askaccount->execute(array(
        'accmail' => $account_mail,
        'accpassword' => $account_password
    ));
    
    $count = $askaccount->rowCount();

    if ($count == 1) {
        $_SESSION['account_mail'] = $account_mail;
        header("Location:../admin-pannel/index.php");
    } else {
        header("Location:../admin-pannel/login.php?durum=incorrect");
    }
}





if (isset($_POST['editstudent'])) {

    $student_number = $_POST['student_number'];

    $save = $db->prepare("UPDATE student_information SET 
        student_number=:student_number,
        student_surname=:student_surname,
        student_name=:student_name,
        student_parent_name=:student_parent_name,
        student_parent_phonenumber=:student_parent_phonenumber,
        student_branch=:student_branch,
        student_class=:student_class,
        student_socialsecuritynumber=:student_socialsecuritynumber
        WHERE student_number=$student_number");


    $insert = $save->execute(array(
        'student_number' => $student_number,
        'student_surname' => $_POST['student_surname'],
        'student_name' => $_POST['student_name'],
        'student_parent_name' => $_POST['student_parent_name'],
        'student_parent_phonenumber' => $_POST['student_parent_phonenumber'],
        'student_branch' => $_POST['student_branch'],
        'student_class' => $_POST['student_class'],
        'student_socialsecuritynumber' => $_POST['student_socialsecuritynumber']
        
    ));

    if ($insert) header("Location: ../admin-pannel/students.php?durum=basarili");
    else header("Location: ../admin-pannel/students.php?durum=basarisiz");
}





if ($_GET['deletestudent'] == "true") {
    $destroy = $db->prepare("DELETE from student_information where student_number=:numb");
    $control = $destroy->execute(array(
        'numb' => $_GET['student_number']
    ));

    if ($control) header("Location: ../admin-pannel/students.php?durum=basarili");
    else header("Location: ../admin-pannel/students.php?durum=basarisiz");
}


if (isset($_POST['addstudent'])) {

    $student_number = $_POST['student_number'];



    $save = $db->prepare("INSERT INTO student_information SET 
        student_number=:student_number,
        student_surname=:student_surname,
        student_name=:student_name,
        student_parent_name=:student_parent_name,
        student_parent_phonenumber=:student_parent_phonenumber,
        student_branch=:student_branch,
        student_class=:student_class,
        student_socialsecuritynumber=:student_socialsecuritynumber
    ");


    $insert = $save->execute(array(

        'student_number' => $student_number,
        'student_surname' => $_POST['student_surname'],
        'student_name' => $_POST['student_name'],
        'student_parent_name' => $_POST['student_parent_name'],
        'student_parent_phonenumber' => $_POST['student_parent_phonenumber'],
        'student_branch' => $_POST['student_branch'],
        'student_class' => $_POST['student_class'],
        'student_socialsecuritynumber' => $_POST['student_socialsecuritynumber']
    ));

    if ($insert) header("Location: ../admin-pannel/students.php?durum=basarili");
    else header("Location: ../admin-pannel/students.php?durum=basarisiz");
}



if ($_GET['deleteaccount'] == "true") {
    $destroy = $db->prepare("DELETE from admin_pannel where account_id=:id");
    $control = $destroy->execute(array(
        'id' => $_GET['account_id']
    ));

    if ($control) header("Location: ../admin-pannel/accounts.php?status=sucsess");

    else header("Location: ../admin-pannel/accounts.php?status=fail");
}




// delete student images 

// if (isset($_POST['productphotodelete'])) {

//     $product_id = $_POST['product_id'];


//     echo $checklist = $_POST['productphotoselect'];


//     foreach ($checklist as $list) {

//         $sil = $db->prepare("DELETE from productphoto where productphoto_id=:productphoto_id");
//         $kontrol = $sil->execute(array(
//             'productphoto_id' => $list
//         ));
//     }

//     if ($kontrol) {

//         Header("Location:../production/product-gallery.php?product_id=$product_id&status=ok");
//     } else {

//         Header("Location:../production/product_gallery.php?product_id=$product_id&status=no");
//     }
// }








































// if (isset($_POST['editaccountinformation'])) {

//     $accountsave = $db->prepare("UPDATE account SET 
        
//         account_mail=:account_mail,
//         account_password=:account_password
//         WHERE account_id = {$_POST['account_id']} ");

//     $update = $accountsave->execute(array(
//         'account_mail' => $_POST['account_mail'],
//         'account_password' => $_POST['account_password']
//     ));

//     if ($update) {
//         header('Location:../admin-pannel/accounts.php?status=update_success');
//     } else {
//         header('Location:../admin-pannel/accounts.php?status=update_fail');
//     }
// }




if (isset($_POST['generalsettingssend'])) {

    $settingsave = $db->prepare("UPDATE settings SET 
    
    settings_title=:settings_title,
    settings_description=:settings_description,
    settings_keywords=:settings_keywords,
    settings_author=:settings_author,
    settings_maintenance=:settings_maintenance
    WHERE settings_id = 0");

    $update = $settingsave->execute(array(
        'settings_title' => $_POST['settings_title'],
        'settings_description' => $_POST['settings_description'],
        'settings_keywords' => $_POST['settings_keywords'],
        'settings_author' => $_POST['settings_author'],
        'settings_maintenance' => $_POST['settings_maintenance']

    ));

    if ($update) {
        header('Location:../production/generalsettings.php?status=update_success');
    } else {
        header('Location:../production/generalsettings.php?status=update_fail');
    }
}

if (isset($_POST['uploadlogo'])) {

    $uploads_dir = '../../dimg';

    @$tmp_name = $_FILES['settings_logo']["tmp_name"];
    @$name = $_FILES['settings_logo']["name"];

    $uniquenumber4 = rand(20000, 32000);
    $refimgyol = substr($uploads_dir, 6) . "/" . $uniquenumber4 . $name;


    @move_uploaded_file($tmp_name, "$uploads_dir/$uniquenumber4$name");


    $edit = $db->prepare("UPDATE settings SET
    settings_logo=:logo
    WHERE settings_id=0");
    $update = $edit->execute(array(
        'logo' => $refimgyol
    ));
    if ($update) {

        $deleteimageunlink = $_POST['old_path'];
        unlink("../../$deleteimageunlink");

        Header("Location:../production/generalsettings.php?status=update_success");
    } else {

        Header("Location:../production/generalsettings.php?status=update_success");
    }
}


if (isset($_POST['communicationsettingssend'])) {

    $settingsave = $db->prepare(
        "UPDATE settings SET 
    
    settings_phone1=:settings_phone1,
    settings_gsm1=:settings_gsm1,
    settings_fax1=:settings_fax1,
    settings_mail1=:settings_mail1,
    settings_phone2=:settings_phone2,
    settings_gsm2=:settings_gsm2,
    settings_fax2=:settings_fax2,
    settings_mail2=:settings_mail2,
    settings_city=:settings_city,
    settings_district=:settings_district,
    settings_adress=:settings_adress,
    settings_shift=:settings_shift
    WHERE settings_id = 0"
    );

    $update = $settingsave->execute(array(
        'settings_phone1' => $_POST['settings_phone1'],
        'settings_gsm1' => $_POST['settings_gsm1'],
        'settings_fax1' => $_POST['settings_fax1'],
        'settings_mail1' => $_POST['settings_mail1'],
        'settings_phone2' => $_POST['settings_phone2'],
        'settings_gsm2' => $_POST['settings_gsm2'],
        'settings_fax2' => $_POST['settings_fax2'],
        'settings_mail2' => $_POST['settings_mail2'],
        'settings_city' => $_POST['settings_city'],
        'settings_district' => $_POST['settings_district'],
        'settings_adress' => $_POST['settings_adress'],
        'settings_shift' => $_POST['settings_shift']
    ));

    if ($update) {
        header('Location:../production/communicationsettings.php?status=update_success');
    } else {
        header('Location:../production/communicationsettings.php?status=update_fail');
    }
}

if (isset($_POST['apisettingssend'])) {

    $settingsave = $db->prepare("UPDATE settings SET 
    
    settings_maps=:settings_maps,
    settings_analystic=:settings_analystic,
    settings_zopim=:settings_zopim
    WHERE settings_id = 0");

    $update = $settingsave->execute(array(

        'settings_maps' => $_POST['settings_maps'],
        'settings_analystic' => $_POST['settings_analystic'],
        'settings_zopim' => $_POST['settings_zopim']
    ));

    if ($update) {
        header('Location:../production/apisettings.php?status=update_success');
    } else {
        header('Location:../production/apisettings.php?status=update_fail');
    }
}
if (isset($_POST['socialsettingssend'])) {

    $settingsave = $db->prepare(
        "UPDATE settings SET 
    
    settings_facebook=:settings_facebook,
    settings_twitter=:settings_twitter,
    settings_youtube=:settings_youtube,
    settings_google=:settings_google
    WHERE settings_id = 0"
    );

    $update = $settingsave->execute(array(
        'settings_facebook' => $_POST['settings_facebook'],
        'settings_twitter' => $_POST['settings_twitter'],
        'settings_youtube' => $_POST['settings_youtube'],
        'settings_google' => $_POST['settings_google']
    ));

    if ($update) {
        header('Location:../production/socialsettings.php?status=update_success');
    } else {
        header('Location:../production/socialsettings.php?status=update_fail');
    }
}

if (isset($_POST['mailsettingssend'])) {

    $settingsave = $db->prepare(
        "UPDATE settings SET 
    
    settings_smtpuser=:settings_smtpuser,
    settings_smtppassword=:settings_smtppassword,
    settings_smtphost=:settings_smtphost,
    settings_smtpport=:settings_smtpport
    WHERE settings_id = 0"
    );

    $update = $settingsave->execute(array(
        'settings_smtpuser' => $_POST['settings_smtpuser'],
        'settings_smtppassword' => $_POST['settings_smtppassword'],
        'settings_smtphost' => $_POST['settings_smtphost'],
        'settings_smtpport' => $_POST['settings_smtpport']
    ));

    if ($update) {
        header('Location:../production/mailsettings.php?status=update_success');
    } else {
        header('Location:../production/mailsettings.php?status=update_fail');
    }
}

if (isset($_POST['aboutuspagesettingssend'])) {

    $settingsave = $db->prepare("UPDATE about SET 
    
    about_title=:about_title,
    about_content=:about_content,
    about_video=:about_video,
    about_vision=:about_vision,
    about_mission=:about_mission
    WHERE about_id = 0");

    $update = $settingsave->execute(array(
        'about_title' => $_POST['about_title'],
        'about_content' => $_POST['about_content'],
        'about_video' => $_POST['about_video'],
        'about_vision' => $_POST['about_vision'],
        'about_mission' => $_POST['about_mission']

    ));

    if ($update) {
        header('Location:../production/about.php?status=update_success');
    } else {
        header('Location:../production/about.php?status=update_fail');
    }
}

if (isset($_POST['editmenuproperties'])) {

    $menu_id = $_POST['menu_id'];

    $menu_seourl = seo($_POST['menu_name']);

    $settingsave = $db->prepare("UPDATE menu SET
    menu_name=:menu_name,
    menu_detail=:menu_detail,
    menu_url=:menu_url,
    menu_video=:menu_video,
    menu_order=:menu_order,
    menu_seourl=:menu_seourl,
    menu_status=:menu_status
    where menu_id = $menu_id
    ");

    $update = $settingsave->execute(array(
        'menu_name' => $_POST['menu_name'],
        'menu_detail' => $_POST['menu_detail'],
        'menu_url' => $_POST['menu_url'],
        'menu_video' => $_POST['menu_video'],
        'menu_order' => $_POST['menu_order'],
        'menu_seourl' => $menu_seourl,
        'menu_status' => $_POST['menu_status']
    ));

    if ($update) header('Location:../production/menu.php?status=update_success');

    else header('Location:../production/menu.php?status=update_fail');
}


if ($_GET['deletemenu'] == "true") {
    $destroy = $db->prepare("DELETE from menu where menu_id=:id");
    $control = $destroy->execute(array(
        'id' => $_GET['menu_id']
    ));

    if ($control) header("Location: ../production/menu.php?status=success");

    else header("Location: ../production/menu.php?status=fail");
}


if (isset($_POST['menuadd'])) {
    $menu_seourl = seo($_POST['menu_name']);
    $addsetting = $db->prepare("INSERT INTO menu SET 
    menu_name=:menu_name,
    menu_detail=:menu_detail,
    menu_url=:menu_url,
    menu_order=:menu_order,
    menu_seourl=:menu_seourl,
    menu_status=:menu_status
    ");

    $update = $addsetting->execute(array(
        'menu_name' => $_POST['menu_name'],
        'menu_detail' => $_POST['menu_detail'],
        'menu_url' => $_POST['menu_url'],
        'menu_order' => $_POST['menu_order'],
        'menu_seourl' => $menu_seourl,
        'menu_status' => $_POST['menu_status']
    ));

    if ($update) header('Location:../production/menu.php?status=update_success');

    else header('Location:../production/menu.php?status=update_fail');
}


if (isset($_POST['editslider'])) {

    $slideredit = $db->prepare("UPDATE slider SET 
        slider_name=:slider_name,
        slider_link=:slider_link,
        slider_order=:slider_order,
        slider_title=:slider_title,
        slider_desc=:slider_desc,
        slider_status=:slider_status,
        slider_oldprice=:slider_oldprice,
        slider_price=:slider_price,
        slider_bestdeal=:slider_bestdeal
        WHERE slider_id = {$_POST['slider_id']}
        ");

    $update = $slideredit->execute(array(
        'slider_name' => $_POST['slider_name'],
        'slider_link' => $_POST['slider_link'],
        'slider_order' => $_POST['slider_order'],
        'slider_title' => $_POST['slider_title'],
        'slider_desc' => $_POST['slider_desc'],
        'slider_status' => $_POST['slider_status'],
        'slider_oldprice' => $_POST['slider_oldprice'],
        'slider_price' => $_POST['slider_price'],
        'slider_bestdeal' => $_POST['slider_bestdeal']
    ));


    if ($update) header('Location:../production/slider.php?status=success');

    else header('Location:../production/slider.php?status=fail');
}

/*
if (isset($_POST['editsliderimage'])) {
    
        $editslider = $_GET['slider_id'];

        $uploads_dir = '../../dimg/slider';
    
        @$tmp_name = $_FILES['slider_imagepath']["tmp_name"];
        @$name = $_FILES['slider_imagepath']["name"];
        
        $uniquenumber1=rand(20000,32000);
        $uniquenumber2=rand(20000,32000);
        $uniquenumber3=rand(20000,32000);
        $uniquenumber4=rand(20000,32000); 
        $uniquename = $uniquenumber1.$uniquenumber2.$uniquenumber3.$uniquenumber4;
        $refimgyol=substr($uploads_dir, 6)."/".$uniquename.$name;
    
        
        @move_uploaded_file($tmp_name, "$uploads_dir/$uniquename$name");    
    

        $edit=$db->prepare("UPDATE slider SET 
        slider_imagepath=:slider_imagepath
        WHERE slider_id = $editslider
        ");

        $update=$edit->execute(array('slider_imagepath'=>$refimgyol));



        if ($update) {
    
            $deleteimageunlink=$_POST['old_path'];
            unlink("../../$deleteimageunlink");
    
            Header("Location:../production/slider.php?status=success");
        } 
        else {
            Header("Location:../production/slider.php?status=success");
        }
    
    
}
*/


if (isset($_POST['slideradd'])) {


    $editslider = $_GET['slider_id'];

    $uploads_dir = '../../dimg/slider';

    @$tmp_name = $_FILES['slider_imagepath']["tmp_name"];
    @$name = $_FILES['slider_imagepath']["name"];

    $uniquenumber1 = rand(20000, 32000);
    $uniquenumber2 = rand(20000, 32000);
    $uniquenumber3 = rand(20000, 32000);
    $uniquenumber4 = rand(20000, 32000);
    $uniquename = $uniquenumber1 . $uniquenumber2 . $uniquenumber3 . $uniquenumber4;
    $refimgyol = substr($uploads_dir, 6) . "/" . $uniquename . $name;


    @move_uploaded_file($tmp_name, "$uploads_dir/$uniquename$name");


    $addslider = $db->prepare("INSERT INTO slider SET 
        slider_name=:slider_name,
        slider_link=:slider_link,
        slider_order=:slider_order,
        slider_title=:slider_title,
        slider_desc=:slider_desc,
        slider_status=:slider_status,
        slider_imagepath=:slider_imagepath,
        slider_oldprice=:slider_oldprice,
        slider_price=:slider_price
        ");

    $update = $addslider->execute(array(
        'slider_name' => $_POST['slider_name'],
        'slider_link' => $_POST['slider_link'],
        'slider_order' => $_POST['slider_order'],
        'slider_title' => $_POST['slider_title'],
        'slider_desc' => $_POST['slider_desc'],
        'slider_status' => $_POST['slider_status'],
        'slider_imagepath' => $refimgyol,
        'slider_oldprice' => $_POST['slider_oldprice'],
        'slider_price' => $_POST['slider_price']
    ));






    if ($update) header('Location:../production/slider.php?status=success');

    else header('Location:../production/slider.php?status=fail');
}


if (isset($_POST['bundleproductadd'])) {

    $addbundle = $db->prepare("INSERT INTO bundle SET 
        bundle_product_id=:bundle_product_id,
        bundle_slider_id=:bundle_slider_id
    ");

    $update = $addbundle->execute(array(
        'bundle_product_id' => $_POST['Product_id'],
        'bundle_slider_id' => $_POST['slider_id']
    ));


    if ($update) header('Location:../production/slider-product-edit.php?status=success&slider_id=' . $_POST['slider_id']);

    else header('Location:../production/slider-product-edit.php?status=fail&slider_id=' . $_POST['slider_id']);
}

if ($_GET['deleteslider'] == "true") {
    $destroy = $db->prepare("DELETE from slider where slider_id=:id");
    $control = $destroy->execute(array(
        'id' => $_GET['slider_id']
    ));

    if ($control) header("Location: ../production/slider.php?status=success");

    else header("Location: ../production/slider.php?status=fail");
}

if (isset($_POST['addcategory'])) {

    $category_seourl = seo($_POST['category_name']);

    $save = $db->prepare("INSERT INTO category SET 
        category_name=:catname,
        category_seourl=:catseourl,
        category_order=:catorder,
        category_status=:category_status
    ");

    $insert = $save->execute(array(
        'catname' => $_POST['category_name'],
        'catseourl' => $category_seourl,
        'catorder' => $_POST['category_order'],
        'category_status' => $_POST['category_status']
    ));

    if ($insert) header("Location: ../production/category.php?status=successfullyadded");

    else header("Location: ../production/category.php?status=fail");
}

if (isset($_POST['editcategoryproperties'])) {

    $category_id = $_POST['category_id'];
    $category_seourl = seo($_POST['category_name']);

    $save = $db->prepare("UPDATE category SET 
        category_name=:catname,
        category_seourl=:catseourl,
        category_order=:catorder,
        category_status=:category_status
        WHERE category_id=$category_id");

    $update = $save->execute(array(
        'catname' => $_POST['category_name'],
        'catseourl' => $category_seourl,
        'catorder' => $_POST['category_order'],
        'category_status' => $_POST['category_status']
    ));

    if ($update) header("Location: ../production/category.php?status=success");

    else header("Location: ../production/category.php?status=fail");
}


if ($_GET['deletecategory'] == "true") {
    $destroy = $db->prepare("DELETE from category where category_id=:id");
    $control = $destroy->execute(array(
        'id' => $_GET['category_id']
    ));

    if ($control) header("Location: ../production/category.php?status=success");
    else header("Location: ../production/category.php?status=fail");
}



if ($_GET['featuredproduct'] == "true") {

    $save = $db->prepare("UPDATE product SET product_featured=:product_featured WHERE product_id={$_GET['product_id']}");
    $update = $save->execute(array('product_featured' => 0));

    if ($update) header("Location: ../production/product.php?status=success");
    else header("Location: ../production/product.php?status=fail");
}


if ($_GET['undofeaturedproduct'] == "true") {

    $save = $db->prepare("UPDATE product SET product_featured=:product_featured WHERE product_id={$_GET['product_id']}");
    $update = $save->execute(array('product_featured' => 1));

    if ($update) header("Location: ../production/product.php?status=success");
    else header("Location: ../production/product.php?status=fail");
}











if (isset($_POST['addtocart'])) {

    if (!isset($_SESSION['useraccountmail'])) {
        header("Location:../../register.php?status=notregistered");
    } else {
        $save = $db->prepare("INSERT INTO cart SET 
        cart_product_qty=:cart_product_qty,
        cart_account_id=:cart_account_id,
        cart_product_id=:cart_product_id");
    }


    $insert = $save->execute(array(
        'cart_product_qty' => $_POST['cart_product_qty'],
        'cart_account_id' => $_POST['account_id'],
        'cart_product_id' => $_POST['product_id']
    ));

    if ($insert) header("Location: ../../cart.php?status=sucsess");

    else header("Location: ../../index.php?status=fail");
}

if (isset($_POST['sliderbundleaddtocart'])) {


    if (!isset($_SESSION['useraccountmail'])) {
        header("Location:../../register.php?status=notregistered");
    } else {
        $askaccount = $db->prepare("SELECT * FROM account where account_mail=:mail");
        $askaccount->execute(array(
            'mail' => $_SESSION['useraccountmail']
        ));
        $accountget = $askaccount->fetch(PDO::FETCH_ASSOC);

        $save = $db->prepare("INSERT INTO cart SET 
        cart_product_qty=:cart_product_qty,
        cart_account_id=:cart_account_id,
        cart_slider_id=:cart_slider_id");

        $insert = $save->execute(array(
            'cart_product_qty' => 1,
            'cart_account_id' => $accountget['account_id'],
            'cart_slider_id' => $_POST['slider_id']
        ));

        if ($insert) header("Location: ../../cart.php?status=sucsess");

        else header("Location: ../../index.php?status=fail");
    }
}


if ($_GET['deletecart'] == "true") {
    $destroy = $db->prepare("DELETE from cart where cart_id=:id");
    $control = $destroy->execute(array(
        'id' => $_GET['cart_id']
    ));

    if ($control) header("Location: ../../cart.php?status=success");
    else header("Location: ../../cart.php?status=fail");
}


if ($_GET['deletecartheader'] == "true") {
    $destroy = $db->prepare("DELETE from cart where cart_id=:id");
    $control = $destroy->execute(array(
        'id' => $_GET['cart_id']
    ));

    if ($control) header("Location: ../../index.php?status=success");
    else header("Location: ../../index.php?status=fail");
}

if (isset($_POST['newslettersub'])) {
    header("Location:../../index.php?status=failed");
}

if ($_GET['bundleproductdel'] == "true") {


    $destroy = $db->prepare("DELETE from bundle where bundle_id=:id");
    $control = $destroy->execute(array(
        'id' => $_GET['bundle_id']
    ));


    $sliderid = $_GET['slider_id'];

    if ($control) header('Location:../production/slider-product-edit.php?status=success&slider_id=' . $sliderid);

    else header('Location:../production/slider-product-edit.php?status=fail&slider_id=' . $sliderid);
}
