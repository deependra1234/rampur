
<?php

if (isset($_REQUEST['fn'])) {
    require_once './FunctionHelper.php';
    $FH = new HelperFunction();

    if ($_REQUEST['fn'] == "getHeadName") {

        echo $FH->getHeadName($_REQUEST['ward']);
    } if ($_REQUEST['fn'] == "getfamilyDetail") {


        echo $FH->getFamilyDetail($_REQUEST['fid']);
    }
}
?>