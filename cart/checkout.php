<?php include '../view/header.php';

    if (empty($_SESSION["cart"])) {
        $errorMsg = '<p style="color: red; font-size: 24pt;"> Must have items in cart to check out </p>';
    }
    else {
        $dsn = 'mysql:host=sql5.freemysqlhosting.net;dbname=sql5483898';
        $username = 'sql5483898';
        $password = 'ulgzmHhz7l';
        $db = new PDO($dsn, $username, $password);
        
        $data = ['uname' => $_SESSION["uname"],
            'cart' => get_cart_items(),
            'subtotal' =>  get_subtotal(),
            'finalTotal' => get_finalTotal()];
            $query = "INSERT INTO orders (uname, subtotal, finalTotal, cart) VALUES (:uname, :subtotal, :finalTotal, :cart)";
            $statement = $db->prepare($query);
    
            try{
                $statement->execute($data);
                $errorMsg = "<p style='color: green; font-size: 24pt;'> Order Added </p>";
            }
            catch(Exception $e){
                echo "Error: " . $e->getMessage();
            }
        }

?>
    <main>
        <h2>Checkout Receipt</h2>
        <?php echo '<strong><p style="color: black; font-size: 12pt">Viewing order for ' . $_SESSION["uname"] . ' </p></strong>'; 
        if (empty($_SESSION['cart']) || 
                  count($_SESSION['cart']) == 0) : ?>
            <p>Go buy something.</p>
        <?php else: ?>
            <table>
                <tr id="cart_header">
                    <th class="left">Item</th>
                    <th class="right">Item Cost</th>
                    <th class="right">Quantity</th>
                    <th class="right">Item Total</th>
                </tr>

            <?php foreach( $_SESSION['cart'] as $key => $item ) :
                $cost  = number_format($item['listPrice'],  2);
                $total = number_format($item['total'], 2);
            ?>
                <tr>
                    <td>
                        <?php echo $item['productName']; ?>
                    </td>
                    <td class="right">
                        $<?php echo $cost; ?>
                    </td>
                    <td class="right">
                        <?php echo $item['qty']; ?>
                    </td>
                    <td class="right">
                        $<?php echo $total; ?>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
            <tr id="cart_footer">
                    <td colspan="3"><b>Subtotal</b></td>
                    <td class="right">$<?php echo get_subtotal(); ?></td>
                </tr>
                <tr>
                    <td colspan="3"><b>With Tax</b>
                    <td class="right">$<?php echo get_salesTax(); ?></td>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><b>Final Total with Shipping</b>
                    <td class="right"><b>$<?php echo get_finalTotal(); ?></b></td>
                    </td>
                </tr>
            </table>
            <p>Screenshot page for personal records.</p>
            <p><a href=".?action=confirm">Click Here To Confirm Once You Have Your Receipt</a>
            </form>
        <?php endif; ?> 
    </main>
    <?php include '../view/footer.php'; ?>