<?php include '../view/header.php'; ?>
<h2>Sign Up</h2>
<h2>Input Information</h2>
<form method="POST">
    <input type="text" placeholder="Enter Full Name:" name="fullName"></input><br>
    <input type="text" placeholder="Enter Username:" name="uname"></input><br>
    <input type="password" placeholder="Enter Password:" name="pass"></input><br>
    <input type="submit" value="Create Account" name="create"><br>
</form>
<p><a href="index.php">Back to Login</a>


<?php

if (isset($_POST["create"])) {
    if (empty($_POST["uname"]) || empty($_POST["pass"]) || empty($_POST["fullName"])) {
        $errorMsg = '<p style="color: red; font-size: 24pt;"> ERROR: Fields cannot be blank </p>';
    } 
    else {
        $dsn = 'mysql:host=sql5.freemysqlhosting.net;dbname=sql5483898';
        $username = 'sql5483898';
        $password = 'ulgzmHhz7l';
        $db = new PDO($dsn, $username, $password);
        $data = ['uname' => $_POST["uname"],
            'pass' => $_POST["pass"],
            'fullName' => $_POST["fullName"]];
        $statement2 = $db->prepare("SELECT uname FROM users WHERE uname=?");
        $statement2->bindParam(1, $_POST["uname"]);
        $statement2->execute();
        $isExisting = $statement2->fetch();
        if($isExisting){
            $errorMsg = "<p style='color: red; font-size: 24pt;'> ERROR: Username already exists. </p>";
        }
        else{
            $query = "INSERT INTO users (uname, pass, FullName) VALUES (:uname, :pass, :fullName)";
            $statement = $db->prepare($query);
    
            try{
                $statement->execute($data);
                $errorMsg = "<p style='color: green; font-size: 24pt;'> User added. </p>";
            }
            catch(Exception $e){
                echo "Error: " . $e->getMessage();
            }
        
        }
    }

}

if (isset($errorMsg)) {
    echo '<span>' . $errorMsg . '</span>';
}
?>
<?php include '../view/footer.php'; ?>