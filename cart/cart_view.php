<?php include '../view/header.php'; ?>
    <main>
        <h2>Cart</h2>
        <?php echo '<strong><p style="color: black; font-size: 12pt">Viewing cart for ' . $_SESSION["uname"] . ' </p></strong>'; 
        if (empty($_SESSION['cart']) || 
                  count($_SESSION['cart']) == 0) : ?>
            <p>There are no items in your cart.</p>
        <?php else: ?>
            <form action="." method="post">
            <input type="hidden" name="action" value="update">
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
                        <input type="text" class="cart_qty"
                            name="newqty[<?php echo $key; ?>]"
                            value="<?php echo $item['qty']; ?>">
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
                <tr>
                    <td colspan="3"><b>With Tax</b>
                    <td>$<?php echo get_salesTax(); ?></td>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><b>After Shipping</b>
                    <td>$<?php echo get_finalTotal(); ?></td>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="right">
                        <input type="submit" value="Update Cart">
                    </td>
                </tr>
            </table>
            <p>Click "Update Cart" to update quantities in your
                cart. Enter a quantity of 0 to remove an item.
            </p>
            </form>
        <?php endif; ?>
        
        <p><a href=".?action=show_add_item" method="post">Add Item</a>
        <a href=".?action=empty_cart">Empty Cart</a>
        <a style='float: right;' href="../login/userSuccess.php">Back to login</a></p> 
        <a href=".?action=checkout">Checkout</a>
    </main>
    <?php include '../view/footer.php'; ?>    