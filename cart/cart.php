<?php
// Add an item to the cart
function add_item($key, $quantity) {
    global $productList;
    if ($quantity < 1) return;

    // If item already exists in cart, update quantity
    if (isset($_SESSION['cart'][$key])) {
        $quantity += $_SESSION['cart'][$key]['qty'];
        update_item($key, $quantity);
        return;
    }

    // Add item
    $cost = $productList[$key]['listPrice'];
    $total = $cost * $quantity;
    $item = array(
        'productName' => $productList[$key]['productName'],
        'listPrice' => $cost,
        'qty'  => $quantity,
        'total' => $total
    );
    $_SESSION['cart'][$key] = $item;
}

// Update an item in the cart
function update_item($key, $quantity) {
    $quantity = (int) $quantity;
    if (isset($_SESSION['cart'][$key])) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$key]);
        } else {
            $_SESSION['cart'][$key]['qty'] = $quantity;
            $total = $_SESSION['cart'][$key]['listPrice'] *
                     $_SESSION['cart'][$key]['qty'];
            $_SESSION['cart'][$key]['total'] = $total;
        }
    }
}

// Get cart subtotal
function get_subtotal() {
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['total'];
    }
    $subtotal_f = number_format($subtotal, 2);
    return $subtotal_f;
}

function get_salesTax() {
    $salesTax = .07;
    foreach ($_SESSION['cart'] as $item) {
        $taxCalc = $item['total'] * $salesTax;
        $taxTotal = $item['total'] + $taxCalc;
    }
    $afterTax = number_format($taxTotal, 2);
    return $afterTax;
}

function get_finalTotal() {
    $salesTax = .07;
    $shipRate = 10;
    foreach ($_SESSION['cart'] as $item) {
        $taxCalc = $item['total'] * $salesTax;
        $taxTotal = $item['total'] + $taxCalc;
        $shipTotal = $taxTotal + $shipRate;
    }
    $finalTotal = number_format($shipTotal, 2);
    return $finalTotal;
}
?>