<?php require APPROOT . '/views/inc/header.php'; ?>


<?php
if (!empty($data)) {
    echo $data['title'];
}

?>

<?php //echo URLROOT;
//// Test on how we can access the app root
//    echo APPROOT;
//    echo SITENAME;

require APPROOT . '/views/inc/footer.php';