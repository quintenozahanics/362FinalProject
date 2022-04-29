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
                </select>
                <input type="submit" name="uname" value="Select Customer"><br>
                <input type="submit" name="deleteSale" value="Delete Selected"><br>
                <br><input name="all" type="submit" value="Show All Sales"/>
            </form>
            <form method="post" name="form2">
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
                        <?php 
                                if(isset($_POST['all'])){
                                    $orders = getAllSales();
                                    foreach($orders as $order) :
                                        echo "<tr>";
                                        echo "<th>" . $order[0] . "</th>";
                                        echo "<th>" . $order[1] . "</th>";
                                        echo "<th>" . $order[2] . "</th>";
                                        echo "<th>" . $order[3] . "</th>";
                                        echo "<th>" . $order[4] . "</th>";
                                        echo "<td><input type='checkbox' name='checkbox[]' value='".$order[0]."' id='checkbox'></td>";
                                        echo "</tr>";
                                    endforeach; 
                            
                                }
                            
                            if(isset($_POST["uname"])) {
                                $selectOption = $_POST['customer'];
                                searchACustomer($selectOption);
                            }
                            if(isset($_POST['deleteSale'])){

                                $checkedBoxes = $_POST['checkbox'];
                                deleteSale();
                            }
                        ?>
                    </table>
                </section>
            </form>
            <br><br><br>
        </main>
    </center>
</body>
</html>