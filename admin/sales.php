<?php require('../model/functions.php'); ?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Gorecki's Golf Shop</title>
    <link rel="stylesheet" type="text/css" href="../main.css?v=<?php echo time(); ?>">
</head>

<!-- the body section -->
<body style="background-color: darkgrey;">
    <center>
        <header><h1>Sales</h1></header><br><br>
        <main>
            <form method="post">
                <label>Select a Customer:</label>
                <select name="customer">
                    <?php 
                        $users = getAllCustomers();
                        foreach($users as $customer) {
                            echo "<option value='" . $customer[0] . "'>" . $customer[0] . "</option>";
                        }
                    ?>
                </select><br>

                <br><input name="all" type="submit" value="Show All Sales"/>
            </form>
                <section>
                    <!-- display a table of products -->
                    <table>
                        <tr>
                            <th>Order ID</th>
                            <th>Username</th>
                            <th>Subtotal</th>
                            <th>Total</th>
                            <th>Cart Items</th>
                        </tr>
                        <?php showAllSalesButton() ?>
                    </table>
                </section>
            </form>
            <br><br><br>
        </main>
    </center>
</body>
</html>