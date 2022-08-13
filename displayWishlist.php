<?php
include('dashboard/function.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem_wishlist'])) {
        $deleteCart = $Cart->deleteCart($_POST['item_id'], 'wishlist');
    }
    if (isset($_POST['cart-submit'])) {
        $Cart->saveToCart($_POST['item_id2']);
    }
}
if (count($Cart->getData('cart')) > 0) {
    $in_cart = $Cart->getCartId($Cart->getData('cart'));
} else {
    $in_cart = [];
}

include('header.php');
?>
<section class="pageBanner">
    <h3>WishList</h3>

</section>
<section class="container">
    <table class="table ">
        <tr>
            <th>Course</th>
            <th>Price</th>
            <th>-</th>
        </tr>
        <?php
        foreach ($Cart->getData('wishlist') as $item) :
            if (isset($_SESSION['user_id'])) {
                if ($item['user_id'] == $_SESSION['user_id']) {
                    $cart = $course->getCourse($item['course_id']);
                    $subTotal[] = array_map(function ($item) use ($in_cart) {
        ?>
                        <tr>
                            <td class="d-flex">
                                <img src="uploads/courses/<?php echo $item["img"] ?>" width="50px" alt="">
                                <h3 class="thePrice"><?php echo $item["name"] ?></h3>
                            </td>
                            <td>
                                <p>$<?php echo $item["price"] ?></p>
                            </td>
                            <td >
                                <div class="d-flex">
                                <form method="post">
                                    <input type="hidden" value="<?php echo $item["id"] ?>" name="item_id">
                                    <button name="deleteItem_wishlist" class="cartBtn" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                                <form method="post" >
                                    <input type="hidden" value="<?php echo $item['id']  ?>" name="item_id2">
                                    <?php
                                    if (in_array($item['id'], $in_cart)) {
                                        echo '<button  class="inCartBtn" disabled >in cart</button>';
                                    } else {
                                        echo '<button type="submit"  class="cartBtn" name="cart-submit" >add to cart</button>';
                                    }
                                    ?>
                                </form>
                                </div>
                            </td>
                        </tr>
        <?php
                        return $item['price'];
                    }, $cart);
                }
            }
        endforeach;
        ?>
    </table>
    <div class="d-flex justify-content-end">
        <div class="counttt">

            <p>
                <span>WhishList Items:</span>
                <?php
                echo count($Cart->getData('wishlist'))   ?>
            </p>
            <br>
            <p>
                <span> SubTotal:</span>
                $
                <?php
                echo  isset($subTotal) ? $Cart->getSum($subTotal) : 0;
                ?>
            </p>
        </div>
    </div>
</section>


<?php
include('footer.php');
?>