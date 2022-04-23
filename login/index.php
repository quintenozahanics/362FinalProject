<?php

$dsn = "mysql:host=sql5.freemysqlhosting.net; dbname=sql5483898";
$username = "sql5483898";
$password = "ulgzmHhz7l";
$errorMsg = "";

$db = new PDO($dsn, $username, $password);

if (isset($_POST["login"])) {
    if (empty($_POST["uname"]) || empty($_POST["pass"])) {
        $errorMsg = '<p style="color: red; font-size: 24pt;"> ERROR: Fields cannot be blank </p>';
    } else {
        $query = "SELECT * FROM users WHERE uname = :uname AND pass = :pass AND type = 'A'";
        $statement = $db->prepare($query);
        $statement->execute(

            array(
                'uname' => $_POST["uname"],
                'pass' => $_POST["pass"]
            )

        );

        $counter = $statement->rowCount();

        if ($counter > 0) {
            $_SESSION["uname"] = $_POST["uname"];
            header("Location:adminSuccess.php");
        } else {
            $query = "SELECT * FROM users WHERE uname = :uname AND pass = :pass";
            $statement = $db->prepare($query);
            $statement->execute(

                array(
                    'uname' => $_POST["uname"],
                    'pass' => $_POST["pass"]
                )

            );

            $counter = $statement->rowCount();

            if ($counter > 0) {
                $_SESSION["uname"] = $_POST["uname"];
                header("Location:userSuccess.php");
            } else {
                $errorMsg = '<p style="color: red; font-size: 24pt;"> ERROR: Invalid credentials. </p>';
            }
        }
    }
}

?>

<?php include '../view/header.php'; ?>
<h2>Login</h2>
<form method="POST">
    <input type="text" placeholder="Username:" name="uname"></input>
    <br>
    <input type="password" placeholder="Password:" name="pass"></input>
    <br>
    <input type="submit" value="Login" name="login">
    <br>
    <p><a href="createAccount.php">Create Account</a>
    <br>
    <p><a href="../allProducts/">Continue as guest</a>
</form>

<?php
if (isset($errorMsg)) {
    echo '<span>' . $errorMsg . '</span>';
}
?>
<?php include '../view/footer.php'; ?>