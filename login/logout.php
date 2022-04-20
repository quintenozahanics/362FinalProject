<?php include '../view/header.php'; ?>
<?php
    session_start();
    session_destroy();
    header("Location: index.php");
?>
<?php include '../view/footer.php'; ?>