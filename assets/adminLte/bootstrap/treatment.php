<?php
$mrn = null;
$fname = '';
$mname = '';
$pFullname = '';
include_once './User.php';
include_once './Patient.php';
include_once './xray.php';
include_once './General.php';
include_once './Admission.php';
include_once './Payment.php';
include_once './Procedure.php';
include_once './medical.php';
include_once './LabTest.php';
include_once './VitalSign.php';
include_once './assesment.php';
include_once './Remind.php';
session_start();
$msg = '';
if (isset($_REQUEST['msg'])) {

    $msg = $_REQUEST['msg'];
}


if (isset($_POST['submittest'])) {
    $username = $_SESSION['username'];
    $department = $_POST['department'];
    $xy = $_POST['orders'];
    $testcat = $_POST['inputlabcat'];
    $card = $_POST['card'];

    $status = "UnPaid";

    print_r($or);

    $m = "Doctor";
    $ass = $_POST['assid'];

    //echo $department." ".$card." assid".$ass;
    $or = new Xray();
    $or->addtestorder($xy, $testcat, $card, $department, $status, $username, $m, $ass);
}
if (isset($_POST['submitlab'])) {
    $username = $_SESSION['username'];
    $testcat = 'Lab Order';
    $card = $_POST['card'];
    $ass = $_POST['assid'];
    $department = $_POST['department'];

    $ct = $_POST['order'];
    $glue = ',';
    $na = implode($glue, $ct);
    $m = "Doctor";
    //echo $na;
    // $x=count($orders);
    $status = "UnPaid";
//echo $card;
    $or = new LabTest();
    $or->addlaborder($na, $testcat, $card, $department, $status, $username, $m, $ass);
}
if (isset($_POST['submitpro'])) {
    $username = $_SESSION['username'];
    $testcat = 'procedure';
    $card = $_POST['card'];
    $department = $_POST['department'];
    $ass = $_POST['assid'];
    $m = "Doctor";

    $ct = $_POST['order'];
    // $x=count($orders);
    $status = "UnPaid";

    $or = new Procedure();
    $or->addprocedureorder($ct, $testcat, $card, $department, $status, $username, $m, $ass);
}
if (isset($_POST['submit_draft'])) {
    $username = $_SESSION['username'];

    $compliant = $_POST['compliant'];
    $illness = $_POST['illness'];
    $medication = $_POST['medication'];
    $alergies = $_POST['alergies'];
    $diagnosis = $_POST['diagnosis'];
    $assesiment = $_POST['Assesment'];
    $card = $_POST['card'];

    $assidd = $_POST['assid'];
    $mdradio = $_POST['md'];
    $rvradio = $_POST['rv'];
    $status = 'Draft';
    $fmradio = $_POST['fm'];

    $ec = new Medical();
    $sso = $ec->getsocialid();
    $mdo = $ec->getmedicalid();
    $fmo = $ec->getfamilyid();

    $rvo = $ec->getreview();
    $or = new Assesment();
    echo $assesiment;
     $fass = $or->addassesmentdraft($username, $card, $assidd, $compliant, $illness, $medication, $alergies, $diagnosis, $assesiment, $status);
    $sremark = null;
    while ($so = mysqli_fetch_array($sso)) {
        $smid = trim($so['id']);
        $oo = $smid . "socialremark";

        $sremark = trim($_POST[$oo]);
        if ($sremark != null) {
            $rsoc = $ec->addsocilaresult($username, $smid, $sremark, $card, $assidd, $status, $fass);
        }
    }



    foreach ($mdradio as $mid => $value) {

        $mmd = trim($so['id']);

        $o = $mid . "remark";
        $mdremark = $_POST[$o];
        $rmed = $ec->addmedicalresult($username, $mid, $value, $mdremark, $card, $assidd, $status, $fass);
    }
    $mkey = array_keys($mdradio);


    $rows = [];
    while ($mo = mysqli_fetch_array($mdo)) {
        $rows[] = $mo['id'];
    }
    $result = [];
    $result[] = array_diff($rows, $mkey);
    $result = $result[0];

    foreach ($result as $key => $value) {

        $m = "";
        $k = $value;
        $k = trim($k);
        $u = $k . "remark";
        if (isset($_POST[$u])) {
            $kremark = trim($_POST[$u]);

            if ($kremark != null) {
                $rsoc = $ec->addmedicalresult($username, $k, $m, $kremark, $card, $assidd, $status, $fass);
            }
        }
    }
    //---->review types results add section
    foreach ($rvradio as $rvmid => $rvalue) {
        $o = $rvmid . "rvremark";
        $rvremark = $_POST[$o];
        $rev = $ec->addreviewresult($username, $rvmid, $rvalue, $rvremark, $card, $assidd, $status, $fass);
    }
    $mkey = array_keys($rvradio);


    $rows = [];
    while ($mo = mysqli_fetch_array($rvo)) {
        $rows[] = $mo['id'];
    }
    $result = [];
    $result[] = array_diff($rows, $mkey);
    $result = $result[0];

    foreach ($result as $key => $value) {

        $m = "";
        $k = $value;
        $k = trim($k);
        $u = $k . "rvremark";
        if (isset($_POST[$u])) {
            $kremark = trim($_POST[$u]);

            if ($kremark != null) {
                $rsoc = $ec->addreviewresult($username, $k, $m, $kremark, $card, $assidd, $status, $fass);
            }
        }
    }
    //----family type result add
    foreach ($fmradio as $fmid => $fvalue) {
        $o = $fmid . "fmremark";
        $fmremark = $_POST[$o];
        $fma = $ec->addfamilyresult($username, $fmid, $fvalue, $fmremark, $card, $assidd, $status, $fass);
    }
    $mkey = array_keys($fmradio);


    $rows = [];
    while ($mo = mysqli_fetch_array($fmo)) {
        $rows[] = $mo['id'];
    }
    $result = [];
    $result[] = array_diff($rows, $mkey);
    $result = $result[0];

    foreach ($result as $key => $value) {

        $m = "";
        $k = $value;
        $k = trim($k);
        $u = $k . "fmremark";
        if (isset($_POST[$u])) {
            $kremark = trim($_POST[$u]);

            if ($kremark != null) {
                $rsoc = $ec->addfamilyresult($username, $k, $m, $kremark, $card, $assidd, $status, $fass);
            }
        }
    }
    if ($fass) {
        $msg = "Assesment Submited Successfuly and last id is" . $fass;
        //echo $assesiment;
        //echo $rmed." ".$msg;
        header("location:treatment.php?msg=$msg &id=$card &assId=$assidd");
        exit();
    } else {
        $msg = "Assesiment not Submited Successfuly";
        //echo $assesiment;
        //echo $rmed." ".$msg;
        header("location:treatment.php?msg=$msg&id=$card&assId=$assidd");
    }
}
if (isset($_POST['submitt'])) {
    $username = $_SESSION['username'];

    $compliant = $_POST['compliant'];
    $illness = $_POST['illness'];
    $medication = $_POST['medication'];
    $alergies = $_POST['alergies'];
    $diagnosis = $_POST['diagnosis'];
    $assesiment = $_POST['Assesment'];
    $card = $_POST['card'];

    $assidd = $_POST['assid'];
    $mdradio = $_POST['md'];
    $rvradio = $_POST['rv'];
    $status = 'Final';
    $fmradio = $_POST['fm'];

    $ec = new Medical();
    $sso = $ec->getsocialid();
    $mdo = $ec->getmedicalid();
    $fmo = $ec->getfamilyid();

    $rvo = $ec->getreview();
    $or = new Assesment();
    $fass = $or->addassesmentdraft($username, $card, $assidd, $compliant, $illness, $medication, $alergies, $diagnosis, $assesiment, $status);

    $sremark = null;
    while ($so = mysqli_fetch_array($sso)) {
        $smid = trim($so['id']);
        $oo = $smid . "socialremark";

        $sremark = trim($_POST[$oo]);
        if ($sremark != null) {
            $rsoc = $ec->addsocilaresult($username, $smid, $sremark, $card, $assidd, $status, $fass);
        }
    }



    foreach ($mdradio as $mid => $value) {

        $mmd = trim($so['id']);

        $o = $mid . "remark";
        $mdremark = $_POST[$o];
        $rmed = $ec->addmedicalresult($username, $mid, $value, $mdremark, $card, $assidd, $status, $fass);
    }
    $mkey = array_keys($mdradio);


    $rows = [];
    while ($mo = mysqli_fetch_array($mdo)) {
        $rows[] = $mo['id'];
    }
    $result = [];
    $result[] = array_diff($rows, $mkey);
    $result = $result[0];

    foreach ($result as $key => $value) {

        $m = "";
        $k = $value;
        $k = trim($k);
        $u = $k . "remark";
        if (isset($_POST[$u])) {
            $kremark = trim($_POST[$u]);

            if ($kremark != null) {
                $rsoc = $ec->addmedicalresult($username, $k, $m, $kremark, $card, $assidd, $status, $fass);
            }
        }
    }
    //---->review types results add section
    foreach ($rvradio as $rvmid => $rvalue) {
        $o = $rvmid . "rvremark";
        $rvremark = $_POST[$o];
        $rev = $ec->addreviewresult($username, $rvmid, $rvalue, $rvremark, $card, $assidd, $status, $fass);
    }
    $mkey = array_keys($rvradio);


    $rows = [];
    while ($mo = mysqli_fetch_array($rvo)) {
        $rows[] = $mo['id'];
    }
    $result = [];
    $result[] = array_diff($rows, $mkey);
    $result = $result[0];

    foreach ($result as $key => $value) {

        $m = "";
        $k = $value;
        $k = trim($k);
        $u = $k . "rvremark";
        if (isset($_POST[$u])) {
            $kremark = trim($_POST[$u]);

            if ($kremark != null) {
                $rsoc = $ec->addreviewresult($username, $k, $m, $kremark, $card, $assidd, $status, $fass);
            }
        }
    }
    //----family type result add
    foreach ($fmradio as $fmid => $fvalue) {
        $o = $fmid . "fmremark";
        $fmremark = $_POST[$o];
        $fma = $ec->addfamilyresult($username, $fmid, $fvalue, $fmremark, $card, $assidd, $status, $fass);
    }
    $mkey = array_keys($fmradio);


    $rows = [];
    while ($mo = mysqli_fetch_array($fmo)) {
        $rows[] = $mo['id'];
    }
    $result = [];
    $result[] = array_diff($rows, $mkey);
    $result = $result[0];

    foreach ($result as $key => $value) {

        $m = "";
        $k = $value;
        $k = trim($k);
        $u = $k . "fmremark";
        if (isset($_POST[$u])) {
            $kremark = trim($_POST[$u]);

            if ($kremark != null) {
                $rsoc = $ec->addfamilyresult($username, $k, $m, $kremark, $card, $assidd, $status, $fass);
            }
        }
    }
    if ($fass) {
        $msg = "Assesment Submited Successfuly and last id is" . $fass;
        //echo $rmed." ".$msg;
        header("location:treatment.php?msg=$msg &id=$card &assId=$assidd");
        exit();
    } else {
        $msg = "Assesment not Submited Successfuly";
        //echo $rmed." ".$msg;
        header("location:treatment.php?msg=$msg&id=$card&assId=$assidd");
    }
}

if (!isset($_REQUEST['assId'])) {
    //header("location:500.php");
}
if (isset($_REQUEST['id'])) {

    $mrn = $_REQUEST['id'];
    $assId = $_REQUEST['assId'];
    $or = new Assesment();
    $om = new Medical();
    $pt = $or->getdraftassesmnet($mrn, $assId);

    if (!($pt == NULL)) {
        $com = $pt['compliant'];
        $ill = $pt['illness'];
        $med = $pt['current_medication'];
        $ale = $pt['allergies'];
        $dif = $pt['differntial_diagnosis'];
        $ass = $pt['assesiment'];
    } else {
        $com = NULL;
        $ill = NULL;
        $med = NULL;
        $ale = NULL;
        $dif = NULL;
        $ass = NULL;
    }
    $user = new Patient();
    $editUser = $user->getPatientById($mrn);
    while ($row = mysqli_fetch_array($editUser)) {
        $fname = $row['fname'];
        $mname = $row['mname'];
        $tel = $row['mobile'];
        $age = $row['age'];
        $sex = $row['sex'];
        $city = $row['city'];
        $subcity = $row['subcity'];
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HMS | Treatment</title>
        <link rel="shorcut icon" href="dist/img/logo.ico"/>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            function getMed(data) {
                var ajaxRequest; // The variable that makes Ajax possible!
                try {
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequest = new XMLHttpRequest();
                } catch (e) {
                    // Internet Explorer Browsers
                    try {
                        ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }
                // Create a function that will receive data
                // sent from the server and will update
                // div section in the same page.
                ajaxRequest.onreadystatechange = function () {
                    if (ajaxRequest.readyState == 4) {
                        var ajaxDisplay = document.getElementById('ajaxDiv');
                        ajaxDisplay.innerHTML = ajaxRequest.responseText;
                    }
                }
                // Now get the value from user and pass it to
                // server script.
                var drugName = data.id.valueOf();
                var word = document.getElementById(drugName).value;

                // console.log(drugName);
                var queryString = "?word=" + word;
                ajaxRequest.open("GET", "getDrug.php" +
                        queryString, true);
                ajaxRequest.send(null);
            }
        </script>
    </head>
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <?php include_once './layout/doctor/dnavigation.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <?php
                        if ($msg != '') {
                            echo "<div class='alert alert-info' role='alert'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>" . $msg . "</div>";
                        }
                        ?>
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                    <img class="profile-user-img img-responsive img-circle" src="dist/img/user4-128x128.jpg" alt="User profile picture">
                                    <h3 class="profile-username text-center"><?php echo "$fname $mname"; ?> </h3>
                                    <p class="text-muted text-center">Sex: <?php echo "$sex"; ?> </p>
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Age</b> <span class="pull-right"><?php echo "$age"; ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Mobile No</b> <span class="pull-right"><?php echo "$tel"; ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Address</b> <span class="pull-right"><?php echo "$city/ $subcity"; ?></span>
                                        </li>
                                    </ul>

                                    <a href="patientHistory.php?id=<?php echo $mrn; ?>& assId=<?php echo $assId; ?>" class="btn btn-primary btn-block"><b>View Patient History</b></a>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- /.col -->
                        <div class="col-md-9">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">


                                    <li class="active"><a href="#settings" class="glyphicon glyphicon-edit" data-toggle="tab"> Data Entry</a></li>

                                    <li><a href="#addorder" class="glyphicon glyphicon-picture" data-toggle="tab"> Image study order</a></li>
                                    <li><a href="#med" class="fa fa-medkit" data-toggle="tab">  Medication order</a></li>
                                    <li><a href="#laborder" class="fa fa-stethoscope" data-toggle="tab">  Lab order</a></li>

                                    <li><a href="#procedure" class="fa fa-user-md" data-toggle="tab">  Procedure order</a></li>
                                </ul>
                                <div class="tab-content">

                                    <div class=" active tab-pane" id="settings">
                                        <form class="form-horizontal" enctype="multipart/form-data" action="?" id="assesmentform" method="post">
                                            <div class="form-group">
                                                <label for="inputs" class="col-sm-2 control-label">Chief Compliant</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" required="true"  id="inputs" name="compliant" placeholder="Enter Noticed Symptoms Here..."><?php echo $com; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputp" class="col-sm-2 control-label">Present Illness History</label>
                                                <div class="col-sm-10">

                                                    <textarea  class="form-control" id="inputp" name="illness" placeholder="Enter Any Illness Here..."><?php echo $ill; ?></textarea>
                                                    <input type="hidden" name="card" value="<?php echo $mrn; ?>">
                                                    <input type="hidden" name="assid" value="<?php echo $assId; ?>">
                                                </div>
                                            </div>
                                            <div class="panel-group" id="accordion">


                                                <div class='panel panel-default '>
                                                    <div class='panel-heading' >
                                                        <h4 class="panel-title">
                                                            <a class='glyphicon glyphicon-folder-open' data-toggle='collapse' data-parent='#accordion' href='#medCatagory'> Past Medical History</a>
                                                        </h4>
                                                    </div>
                                                    <div id='medCatagory' class='panel-collapse collapse'>
                                                        <div class="panel-body">
                                                            <ul>
                                                                <table class="table-hover table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>Yes<?php echo'&nbsp; &nbsp; &nbsp;'; ?></th>
                                                                            <th>No<?php echo'&nbsp; &nbsp; &nbsp;'; ?></th>
                                                                            <th><?php echo'&nbsp; &nbsp; &nbsp;'; ?>Remark</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <?php
                                                                    $ob = new Medical();
                                                                    $ecc = $ob->getmedical();
                                                                    echo "<tbody>";
                                                                    while ($row = mysqli_fetch_array($ecc)) {
                                                                        extract($row);
                                                                        $mdr = $ob->getmedicaldraftresult($id, $mrn, $assId);
                                                                        $mre = $mdr['result'];
                                                                        $mrem = $mdr['remark'];

                                                                        $chyes = NULL;
                                                                        $chno = NULL;
                                                                        if ($mre == 'yes') {
                                                                            $chyes = 'checked="checked"';
                                                                        }
                                                                        if ($mre == 'no') {
                                                                            $chno = 'checked="checked"';
                                                                        }
                                                                        echo '<tr>';

                                                                        $m = $id . "remark";
                                                                        echo "<td><B>&nbsp; &nbsp;$medicalName &nbsp;&nbsp;&nbsp;&nbsp;</b></input></br></td>";
                                                                        echo "<td><input type='radio' name='md[$id]' value='yes' $chyes > &nbsp;&nbsp;&nbsp;&nbsp;<B> </b></input></br></td>";
                                                                        echo "<td><input type='radio' name='md[$id]' value='no' $chno> &nbsp;&nbsp;&nbsp;&nbsp;<B> </b></input></br></td>";
                                                                        echo "<td><input type='text' name='$m' value='$mrem'> </br></td>";
                                                                        echo '</tr>';
                                                                    }
                                                                    echo "</tbody>";
                                                                    ?> 
                                                                </table>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>                                           

                                            </div>
                                            <div class="form-group">
                                                <label for="inputpl" class="col-sm-2 control-label">Current Medication</label>
                                                <div class="col-sm-10">
                                                    <textarea  class="form-control" name="medication" id="inputpl" placeholder="Enter Current Medication Here..."><?php echo $med; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputpt" class="col-sm-2 control-label">Allergies</label>
                                                <div class="col-sm-10">
                                                    <textarea  class="form-control" id="inputpt" name="alergies" placeholder="Enter Any Alergies Exibited Or Treated Before Here..."><?php echo $ale; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="panel-group" id="accordion">


                                                <div class='panel panel-default '>
                                                    <div class='panel-heading' >
                                                        <h4 class="panel-title">
                                                            <a class='glyphicon glyphicon-folder-open' data-toggle='collapse' data-parent='#accordion' href='#famCatagory'> Family History</a>
                                                        </h4>
                                                    </div>
                                                    <div id='famCatagory' class='panel-collapse collapse'>
                                                        <div class="panel-body">
                                                            <ul>
                                                                <table class="table-striped table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>Normal<?php echo'&nbsp;&nbsp;&nbsp;&nbsp;' ?></th>
                                                                            <th>Abnormal<?php echo'&nbsp;&nbsp;&nbsp;&nbsp;' ?></th>
                                                                            <th>Remark</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <?php
                                                                    $ob = new Medical();
                                                                    $ecc = $ob->getfamily();
                                                                    echo "<tbody>";
                                                                    while ($row = mysqli_fetch_array($ecc)) {
                                                                        echo '<tr>';
                                                                        extract($row);
                                                                        $fmr = $ob->getfamilydraftresult($id, $mrn, $assId);
                                                                        $fre = $fmr['result'];
                                                                        $frem = $fmr['remark'];

                                                                        $fchyes = NULL;
                                                                        $fchno = NULL;
                                                                        if ($fre == 'Norman') {
                                                                            $fchyes = 'checked="checked"';
                                                                        }
                                                                        if ($fre == 'Abnorman') {
                                                                            $fchno = 'checked="checked"';
                                                                        }
                                                                        $fm = $id . "fmremark";
                                                                        echo "<td><B>&nbsp;&nbsp;&nbsp;&nbsp;$reviewName &nbsp;&nbsp;&nbsp;&nbsp;</b></input></br></td>";
                                                                        echo "<td><input type='radio' name='fm[$id]' value='Norman' $fchyes> &nbsp;&nbsp;&nbsp;&nbsp;<B> </b></input></br></td>";
                                                                        echo "<td><input type='radio' name='fm[$id]' value='Abnorman' $fchno> &nbsp;&nbsp;&nbsp;&nbsp;<B> </b></input></br></td>";
                                                                        echo "<td><input type='text' name='$fm' value='$frem'> &nbsp;&nbsp;&nbsp;&nbsp;</input></br></td>";
                                                                        echo '</tr>';
                                                                    }
                                                                    echo "</tbody>";
                                                                    ?> 
                                                                </table>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>                                           

                                            </div>

                                            <div class="panel-group" id="accordion">


                                                <div class='panel panel-default '>
                                                    <div class='panel-heading' >
                                                        <h4 class="panel-title">
                                                            <a class='glyphicon glyphicon-folder-open' data-toggle='collapse' data-parent='#accordion' href='#socCatagory'> Social History</a>
                                                        </h4>
                                                    </div>
                                                    <div id='socCatagory' class='panel-collapse collapse'>
                                                        <div class="panel-body">
                                                            <ul>
                                                                <table class="table-striped table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th><?php echo'&nbsp;&nbsp;&nbsp;&nbsp;' ?>Remark</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <?php
                                                                    $ob = new Medical();
                                                                    $ecc = $ob->getsocial();
                                                                    echo "<tbody>";
                                                                    while ($row = mysqli_fetch_array($ecc)) {
                                                                        echo '<tr>';
                                                                        extract($row);
                                                                        $mdr = $ob->getsocialdraftresult($id, $mrn, $assId);

                                                                        $srem = $mdr['remark'];


                                                                        $soc = $id . "socialremark";
                                                                        echo "<td><B>&nbsp;&nbsp;&nbsp;&nbsp;$reviewName &nbsp;&nbsp;&nbsp;&nbsp;</b></input></br></td>";

                                                                        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='$srem' name=$soc> &nbsp;&nbsp;&nbsp;&nbsp</input></br></td>";
                                                                        echo '</tr>';
                                                                    }
                                                                    echo "</tbody>";
                                                                    ?> 
                                                                </table>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>                                           

                                            </div>
                                            <div class="panel-group" id="accordion">


                                                <div class='panel panel-default '>
                                                    <div class='panel-heading' >
                                                        <h4 class="panel-title">
                                                            <a class='glyphicon glyphicon-folder-open' data-toggle='collapse' data-parent='#accordion' href='#reCatagory'> Review System</a>
                                                        </h4>
                                                    </div>
                                                    <div id='reCatagory' class='panel-collapse collapse'>
                                                        <div class="panel-body">
                                                            <ul>
                                                                <table class="table-hover table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Names</th>
                                                                            <th>Normal<?php echo '&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;' ?> </th>
                                                                            <th>Abnormal<?php echo '&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;' ?> </th>
                                                                            <th><?php echo '&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;' ?> Remark </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <?php
                                                                    $ob = new Medical();
                                                                    $ecc = $ob->getreview();
                                                                    echo "<tbody>";
                                                                    while ($row = mysqli_fetch_array($ecc)) {
                                                                        echo '<tr>';
                                                                        extract($row);
                                                                        $mdr = $ob->getreviewdraftresult($id, $mrn, $assId);
                                                                        $rre = $mdr['result'];
                                                                        $rrem = $mdr['remark'];

                                                                        $rchyes = NULL;
                                                                        $rchno = NULL;
                                                                        if ($rre == 'Norman') {
                                                                            $rchyes = 'checked="checked"';
                                                                        }
                                                                        if ($rre == 'Abnorman') {
                                                                            $rchno = 'checked="checked"';
                                                                        }
                                                                        $rv = $id . "rvremark";
                                                                        echo "<td><B>&nbsp; &nbsp; $reviewName &nbsp;&nbsp;&nbsp;&nbsp;</b></input></br></td>";
                                                                        echo "<td><input type='radio' name='rv[$id]' value='Norman' $rchyes> &nbsp;&nbsp;&nbsp;&nbsp;<B> </b></input></br></td>";
                                                                        echo "<td><input type='radio' name='rv[$id]' value='Abnorman' $rchno> &nbsp;&nbsp;&nbsp;&nbsp;<B> </b></input></br></td>";
                                                                        echo "<td><input typ='text' name='$rv' value='$rrem'> </input></br></td>";
                                                                        echo '</tr>';
                                                                    }
                                                                    echo "</tbody>";
                                                                    ?> 
                                                                </table>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>                                           

                                            </div>
                                            <div class="panel-group" id="accordion">


                                                <div class='panel panel-default '>
                                                    <div class='panel-heading' >
                                                        <h4 class="panel-title">
                                                            <a class='glyphicon glyphicon-folder-open' data-toggle='collapse' data-parent='#accordion' href='#phyCatagory'> Physical Exam</a>
                                                        </h4>
                                                    </div>
                                                    <div id='phyCatagory' class='panel-collapse collapse'>
                                                        <div class="panel-body">
                                                            <ul>
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>Yes</th>
                                                                            <th>No</th>
                                                                            <th>Remark</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <?php
                                                                    $ob = new Medical();
                                                                    $ecc = $ob->getmedical();
                                                                    echo "<tbody>";
                                                                    while ($row = mysqli_fetch_array($ecc)) {
                                                                        echo '<tr>';
                                                                        extract($row);
                                                                        echo "<td><B>$medicalName &nbsp;&nbsp;&nbsp;&nbsp;</b></input></br></td>";
                                                                        echo "<td><input type='radio' name='yes[]' value='$id'> &nbsp;&nbsp;&nbsp;&nbsp;<B> </b></input></br></td>";
                                                                        echo "<td><input type='radio' name='no[]' value='$id'> &nbsp;&nbsp;&nbsp;&nbsp;<B> </b></input></br></td>";
                                                                        echo "<td><input type='text' name='remarkk' > &nbsp;&nbsp;&nbsp;&nbsp;<B> </b></input></br></td>";
                                                                        echo '</tr>';
                                                                    }
                                                                    echo "</tbody>";
                                                                    ?> 
                                                                </table>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>                                           

                                            </div>
                                            <div class="form-group">
                                                <label for="inputa" class="col-sm-2 control-label">Differential Diagnosis</label>
                                                <div class="col-sm-10">
                                                    <input value="<?php echo $dif; ?>" type="text" class="form-control" name="diagnosis" id="inputa" placeholder="Enter Differential Diagnosis Here...">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="assesInput" class="col-sm-2 control-label">Assesment </label>
                                                <div class="col-sm-10">
                                                    <input value="<?php echo $ass; ?>" type="text" list="listOfDisease" class="form-control" id="assesInput" name="assesment" placeholder="Enter Final Medical Assesment Here...">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-sm-3">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button type="submit" class="btn btn-primary" name="submitt">Submit</button>
                                                        <button type="submit" class="btn btn-warning" id="sub_draft" name="submit_draft">Save As Draft</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <datalist id='listOfDisease'>

                                            </datalist>
                                        </form>
                                    </div><!-- /.tab-pane -->
                                   <div class=" tab-pane" id="addorder">
                                        <form class="form-horizontal" method="post" action="?" id="imageStudyOrder">
                                            <h4>New Order</h4>
                                            <div class="form-group"><input type="hidden" value="<?php echo $mrn ?>" name="card">
                                                <input type="hidden" value="<?php echo $assId ?>" name="assid">
                                                <label for="inputlabcat" class="col-sm-2 control-label" >Select Test Category</label>
                                                <div class="col-sm-4">
                                                    <select name="inputlabcat" class="form-control" id="inputlabcat" onchange="gettestcat()">
													<option value="">--Select Test Category--</option>
                                                        <?php
                                                        $spec = new General();
                                                        $getSpec = $spec->gettestorder();
                                                        while ($row1 = mysqli_fetch_array($getSpec)) {

                                                            echo "<option value='$row1[catagoryname]' >$row1[catagoryname]</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="departmentInput" class="col-sm-2 control-label">Department</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="department" id="departmentInput">
													<option value="">--Select Department--</option>
                                                        <?php
                                                        $department = new General();
                                                        $getDepartment = $department->getDepartment();
                                                        while ($userDepartmentRow = mysqli_fetch_array($getDepartment)) {
                                                            echo "<option value='$userDepartmentRow[deptName]'>$userDepartmentRow[deptName]</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="panel-group" id="accordion">


                                                <div class='panel panel-default '>
                                                    <div class='panel-heading' >
                                                        <h4 class="panel-title">
                                                            <a class='glyphicon glyphicon-folder-open' data-toggle='collapse' data-parent='#accordion' href='#lab'> Image Study Orders</a>
                                                        </h4>
                                                    </div>
                                                    <div id='lab' class='panel-collapse collapse'>
                                                        <div class="panel-body">
                                                            <ul>
                                                                <li style="list-style: none;">
                                                                    <p id="labss"></p>
                                                                </li>
                                                                <div ></div>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>                                           

                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" id="sub" name="submittest">Submit</button>
													<button type="reset" class="btn btn-warning" id="sub" >Reset</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="med">
                                        <form method="post" id="medAddId" role="form">
                                            <div class="form-group">

                                                <a href="#" name="addBtn" id="addBtnId" class="btn btn-flat glyphicon glyphicon-plus btn-primary">ADD</a>
                                                <input type="hidden" value="<?php echo "$_SESSION[username]"; ?>" name="orderedBy"/>
                                                <input type="hidden" value="<?php echo "$_REQUEST[id]"; ?>" name="mrn"/>

                                                <table class="table table-responsive" id="medTableId">

                                                    <tr>
                                                        <th><small>Medications</small></th>
                                                        <th><small>Dose</small></th>
                                                        <th><small>Frequency</small></th>
                                                        <th><small>Route</small></th>
                                                        <th><small>Start Date</small></th>
                                                        <th><small>No Of Days</small></th>
                                                        <th><small>Quantity</small></th>
                                                        <th><small>Form</small></th>
                                                        <th><small>Remark</small></th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="medName[]" onkeyup="getMed(this)" id="medNameId" class="form-control" list='ajaxDiv'/></td>
                                                        <td><input type="text" name="dose[]" id="medDoseId" class="form-control" /></td>
                                                        <td><input type="text" name="frequency[]" id="medFrequencyId" class="form-control" /></td>
                                                        <td><input type="text" name="rote[]" id="medRoteId" class="form-control" /></td>
                                                        <td><input type="date" name="startDate[]" id="medDateId" class="form-control" /></td>
                                                        <td><input type="number" name="noOfDays[]" id="medNoOfDaysId" class="form-control" min="1" value="1"/></td>
                                                        <td><input type="text" name="quantity[]" id="medQuantityId" class="form-control" /></td>                         
                                                        <td><input type="text" name="form[]" id="medFormId" class="form-control" /></td>
                                                        <td><input type="text" name="remark[]" id="medRemarkId" class="form-control" /></td>                         
                                                    </tr>
                                                </table>
                                                <datalist id='ajaxDiv'>

                                                </datalist>
                                                <input type="button" name="medSubmit" class="btn btn-primary" id="medSubmitId" value="Submit" />
                                            </div>
                                        </form>
                                        Medication Taken
                                        <table id="example2" class="table table-bordered table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th><small>Medications</small></th>
                                                    <th><small>Dose</small></th>
                                                    <th><small>Frequency</small></th>
                                                    <th><small>Route</small></th>
                                                    <th><small>Quantity</small></th>                                                       
                                                    <th><small>Form</small></th>
                                                    <th><small>Start Date</small></th>
                                                    <th><small>Stop Date</small></th>
                                                    <th><small>Remark</small></th>
                                                    <th><small>Ordered By </small></th>
                                                </tr>
                                            </thead>
                                            <tbody id="medTakenBody">

                                            </tbody>

                                        </table>

                                    </div>

                                      <div class=" tab-pane" id="laborder">
                                        <form class="form-horizontal" method="post" action="?">
                                            <h4>New Lab Test Order</h4>

                                            <div class="form-group">


                                                <input type="hidden" value="Laboratory" name="department">
                                                <input type="hidden" value="<?php echo $mrn ?>" name="card">
                                                <input type="hidden" value="<?php echo $assId ?>" name="assid">
                                            </div>
                                            <div class="panel-group" id="accord">
                                                <?php
                                                $labTestCatagory = new LabTest();
                                                $testCatagories = $labTestCatagory->getAllTestCatagory();
                                                while ($catagoryRow = mysqli_fetch_array($testCatagories)) {
                                                    echo "<div class='panel panel-default'>";
                                                    echo "<div class='panel-heading'>";
                                                    echo '<h4 class="panel-title">';
                                                    echo "<a class='glyphicon glyphicon-folder-open' data-toggle='collapse' data-parent='#accordion' href='#labCata$catagoryRow[catid]'> $catagoryRow[catagoryname] </a>";
                                                    echo "</h4>";
                                                    echo "</div>";
                                                    echo "<div id='labCata$catagoryRow[catid]' class='panel-collapse collapse'>";
                                                    echo '<div class="panel-body">';
                                                    echo "<ul>";
                                                    $getTestByCatagory = $labTestCatagory->getTestByCatagoryName($catagoryRow['catagoryname']);

                                                    echo "<li style='list-style-type:none;'>";
                                                    echo "<table id='example2' class='table table-bordered table-hover'>";
                                                    echo "<thead>";
                                                    echo "<tr>";
                                                    echo"<th></th>";

                                                    echo "<th><?php echo $catagoryRow[catagoryname]?> Name</th>";
                                                    echo "<th>Description</th>";
                                                    echo "<th>Fee in birr</th>";
                                                    echo "<th>Date Created</th>";

                                                    echo "</tr>";
                                                    echo" </thead>";


                                                    $getTestByCatagory = $labTestCatagory->getTestByCatagoryName($catagoryRow['catagoryname']);
                                                    echo "<tbody>";

                                                    while ($row = mysqli_fetch_array($getTestByCatagory)) {
                                                        echo '<tr>';
                                                        echo "<td><input type='checkbox' name='order[]' value='$row[oid]' style='width=20px'></td>";
                                                        echo "<td>$row[ordername]</td>";
                                                        echo "<td>$row[description]</td>";
                                                        echo "<td>$row[fee]</td>";

                                                        echo "<td>$row[dateCreated]</td>";

                                                        echo '</tr>';
                                                    }

                                                    echo "</tbody>";
                                                    echo "</table>";
                                                    echo "</li>";

                                                    echo "</ul>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                ?>

                                            </div>


                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger" id="sub" name="submitlab">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="procedure">
                                        <form class="form-horizontal" method="post" action="?">
                                            <h4>New Procedure Order</h4>
                                            <div class="form-group">

                                                <input type="hidden" value="<?php echo $mrn ?>" name="card">
                                                <input type="hidden" value="<?php echo $assId ?>" name="assid">
                                            </div>
                                            <div class="form-group">
                                                <label for="departmentInput" class="col-sm-2 control-label">Department</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="department" id="departmentInput">
                                                        <?php
                                                        $department = new General();
                                                        $getDepartment = $department->getDepartment();
                                                        while ($userDepartmentRow = mysqli_fetch_array($getDepartment)) {
                                                            echo "<option value='$userDepartmentRow[deptName]'>$userDepartmentRow[deptName]</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="panel-group" id="accordion">


                                                <div class='panel panel-default '>
                                                    <div class='panel-heading' >
                                                        <h4 class="panel-title">
                                                            <a class='glyphicon glyphicon-folder-open' data-toggle='collapse' data-parent='#accordion' href='#labCatagory'> Procedures</a>
                                                        </h4>
                                                    </div>
                                                    <div id='labCatagory' class='panel-collapse collapse'>
                                                        <div class="panel-body">
                                                            <ul>
                                                                <?php
                                                                $ob = new Procedure();
                                                                $ecc = $ob->getProcedure();
                                                                while ($row = mysqli_fetch_array($ecc)) {
                                                                    extract($row);
                                                                    echo "<input type='checkbox' name='order[]' value='$oid'> &nbsp;&nbsp;&nbsp;&nbsp;<B>$ordername</b></input></br>";
                                                                }
                                                                ?> 
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>                                           

                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger" id="sub" name="submitpro">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.nav-tabs-custom -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <!--Footer-->
            <?php include_once './layout/footer.php'; ?>
            <!-- Control Sidebar -->
            <?php include_once './layout/sidebar.php'; ?>
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg assToggle"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.min.js"></script>
        <!-- Slim scroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="dist/js/generalScript.js"></script>
        <script src="plugins/iCheck/icheck.min.js"></script>        
        <script src="dist/js/bootstrapValidator.min.js"></script>
        <script src="dist/js/adminGeneral.js"></script>

        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <script src="dist/js/doctorAssignment.js"></script>
        <script>

                                                            $(document).ready(function () {
                                                                $('#addBtnId').click(function () {
                                                                    var rowIndex = 1;
                                                                    //$('#medTableId').append('<tr id="row' + rowIndex + '"><td><input type="text" name="medNamee[]" id="medNameId" class="form-control" /></td><td><input type="text" name="medName[]" id="medNameId" class="form-control" /></td><td><a href="#"  id="' + rowIndex + '" class="btn btn-flat btn-danger btn-sm glyphicon glyphicon-remove btn_remove"></a></td> </tr>');
                                                                    $('#medTableId').append('<tr id="row' + rowIndex + '"><td><input type="text" name="medName[]" onkeyup="getMed(this)" id="medNameId' + rowIndex + '" class="form-control" list="ajaxDiv"/></td> <td><input type="text" name="dose[]" id="medDoseId" class="form-control" /></td> <td><input type = "text" name = "frequency[]" id = "medFrequencyId" class = "form-control" /> </td> <td><input type = "text" name = "rote[]" id = "medRoteId" class = "form-control" /> </td><td><input type = "date" name = "startDate[]" id = "medDateId" class = "form-control" /> </td><td><input type="number" name="noOfDays[]" id="medNoOfDaysId" class="form-control" min="1" value="1"/></td><td><input type="text" name="quantity[]" id="medQuantityId" class="form-control" /> </td><td><input type="text" name="form[]" id="medFormId" class="form-control" /> </td><td><input type="text" name="remark[]" id="medRemarkId" class="form-control" /> </td> <td><a href="#"  id="' + rowIndex + '" class="btn btn-flat btn-danger btn-sm glyphicon glyphicon-remove btn_remove"></a></td></tr>');
                                                                    rowIndex++;

                                                                });
                                                                $(document).on('click', '.btn_remove', function () {
                                                                    var btn_Id = $(this).attr("id");
                                                                    $("#row" + btn_Id + "").remove();
                                                                });
                                                                $('#assesInput').keyup(function () {
                                                                    var keyWord = $('#assesInput').val();
                                                                    //console.log(keyWord);
                                                                    $.ajax({
                                                                        url: "getDisease.php",
                                                                        method: "GET",
                                                                        data: {"keyWord": keyWord},
                                                                        success: function (data, textStatus, jqXHR) {
                                                                            $('#listOfDisease').html('');
                                                                            $('#listOfDisease').html(data);
                                                                            //console.log(data);
                                                                        }
                                                                    });
                                                                });
                                                                $("#medSubmitId").click(function () {

                                                                    $.ajax({
                                                                        url: "med.php",
                                                                        method: "POST",
                                                                        data: $('#medAddId').serialize(),
                                                                        success: function (data) {
                                                                            $('#medAddId')[0].reset();
                                                                            $('#medTakenBody').html(data);
                                                                           //console.log(data);
                                                                        },
                                                                        error: function (jqXHR, textStatus, errorThrown) {
                                                                            console.log(errorThrown);
                                                                        }
                                                                    });
                                                                });
                                                                function gettestcat() {
                                                                    var parm = document.getElementById('inputlabcat').value;
                                                                    // document.getElementById("txtHint").innerHTML =parm;
                                                                    // alert("The selected value is "+parm);
                                                                    var ajaxRequest; // The variable that makes Ajax possible!
                                                                    try {
                                                                        // Opera 8.0+, Firefox, Safari
                                                                        ajaxRequest = new XMLHttpRequest();
                                                                    } catch (e) {
                                                                        // Internet Explorer Browsers
                                                                        try {
                                                                            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                                                                        } catch (e) {
                                                                            try {
                                                                                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                                                                            } catch (e) {
                                                                                // Something went wrong
                                                                                alert("Your browser broke!");
                                                                                return false;
                                                                            }
                                                                        }
                                                                    }
                                                                    // Create a function that will receive data
                                                                    // sent from the server and will update
                                                                    // div section in the same page.
                                                                    ajaxRequest.onreadystatechange = function () {
                                                                        if (ajaxRequest.readyState === 4) {
                                                                            var ajaxDisplay = document.getElementById('labss');
                                                                            ajaxDisplay.innerHTML = ajaxRequest.responseText;
                                                                        }
                                                                    };
                                                                    // Now get the value from user and pass it to
                                                                    // server script.
                                                                    var word = parm;
                                                                    var id = parm;
                                                                    var queryString = "?word=" + word;
                                                                    ajaxRequest.open("GET", "getlabcat.php" +
                                                                            queryString, true);
                                                                    ajaxRequest.send(null);
                                                                }
                                                                $('#artMsg').fadeOut(10000);

                                                                $('#assesmentform').bootstrapValidator({
                                                                    fields: {
                                                                        compliant: {
                                                                            validators: {
                                                                                notEmpty: {
                                                                                    message: 'Compliant is required and can\'t be empty'
                                                                                }
                                                                            }
                                                                        },
                                                                        assesment: {
                                                                            validators: {
                                                                                notEmpty: {
                                                                                    message: 'Final assesment is required and can\'t be empty'
                                                                                }
                                                                            }
                                                                        }




                                                                    }
                                                                });
                                                                $('#imageStudyOrder').bootstrapValidator({
                                                                    fields: {
                                                                        inputlabcat: {
                                                                            validators: {
                                                                                notEmpty: {
                                                                                    message: 'Lab category is required and can\'t be empty'
                                                                                }
                                                                            }
                                                                        }}
                                                                });

                                                            });

        </script>
    </body>
</html>
