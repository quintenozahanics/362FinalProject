<?php include '../view/header.php'; ?>
<h2>Sign Up</h2>
<h2>Input Information</h2>
<form method="POST">
    <input type="text" name="fullName">Enter Full Name: </input>
    <br>
    <input type="text" name="uname">Enter Username: </input>
    <br>
    <input type="password" name="pass">Enter Password: </input>
    <br>
    <input type="submit" value="Create Account" name="create">
    <br>
    <p><a href="index.php">Back to Login</a>
</form>

<?php
if (isset($errorMsg)) {
    echo '<span>' . $errorMsg . '</span>';
}
?>
<?php include '../view/footer.php'; ?>