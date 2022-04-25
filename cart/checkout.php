<?php include '../view/header.php'; ?>
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
                    <td>$<?php echo get_subtotal(); ?></td>
                </tr>
            </table>
            <p>Screenshot page for personal records.</p>
            <p><a href=".?action=confirm">Click Here To Confirm Once You Have Your Receipt</a>
            </form>
        <?php endif; ?>
        
        <a style='float: right;' href="../login/userSuccess.php">Back to Home</a></p> 
    </main>
    <?php include '../view/footer.php'; ?>    