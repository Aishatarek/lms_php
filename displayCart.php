<?php
include('dashboard/function.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   if (isset($_POST['deleteItem_cart'])) {
      $deleteCart = $Cart->deleteCart($_POST['item_id']);
   }
   if (isset($_POST['wishlist-submit'])) {
      $Cart->saveForLater($_POST['item_id2']);
   }
}
//is in the wishlist
if (count($Cart->getData('wishlist')) > 0) {
   $in_wishList = $Cart->getCartId($Cart->getData('wishlist'));
} else {
   $in_wishList = [];
}
include('header.php');
?>
<section class="pageBanner">
   <h3>Cart</h3>

</section>
<section class="container">
   <table class="table ">
      <tr>
         <th>Course</th>
         <th>Price</th>
         <th>-</th>
      </tr>
      <?php
      foreach ($Cart->getData('cart') as $cartt) :
         if ($cartt['user_id'] == $_SESSION['user_id']) {
            $cart = $course->getcourse($cartt['course_id']);
            $subTotal[] = array_map(function ($item) use ($in_wishList) {
      ?>
               <tr>
                  <td class="d-flex">
                     <img src="uploads/courses/<?php echo $item["img"] ?>" width="50px" alt="">
                     <h3 class="thePrice"><?php echo $item["name"] ?></h3>
                  </td>
                  <td>
                     <p><?php echo $item["price"] ?></p>
                     <input type="hidden" class="iprice" value="<?php echo $item["price"] ?>">
                  </td>
                  <td>
                     <div class="d-flex">
                        <form method="post">
                           <input type="hidden" value="<?php echo $item["id"] ?>" name="item_id">
                           <button name="deleteItem_cart" class="cartBtn" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                        <form method="post">
                           <input type="hidden" value="<?php echo $item['id']  ?>" name="item_id2">
                           <?php
                           if (in_array($item['id'], $in_wishList)) {
                              echo '<button  class="inWishBtn" disabled ><i class="fas fa-heart"></i></button>';
                           } else {
                              echo '<button type="submit"  class="WishBtn" class="prowishbtnd ml-2" name="wishlist-submit" ><i class="far fa-heart"></i></button>';
                           }
                           ?>
                        </form>
                     </div>
                  </td>
                  <td class="itotal">
                     $<?php echo $item["price"] ?>
                  </td>
               </tr>
      <?php
               return $item["price"];
            }, $cart);
         }
      endforeach;
      ?>
   </table>
   <div class="d-flex justify-content-end">
      <div class="counttt">

         <p>
            <span class="span">Cart Items:</span>
            <span id="Titems">
               <?php
               echo  count($Cart->getData('cart'))
               ?>
            </span>

         </p>
         <br>
         <p>
            <span class="span"> SubTotal:</span>
            <span id="gTotal">
               $
               <?php
               echo isset($subTotal) ? $Cart->getSum($subTotal) : 0;
               ?>
            </span>

         </p>
      </div>
   </div>
</section>

<?php
include('footer.php');
?>