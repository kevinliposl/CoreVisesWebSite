<?php
$session = SSession::getInstance();

//if (isset($session->email)) {
include_once 'public/headerUser.php';
//} else {
//    header('Location:?');
//}
?>		<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="table-responsive bottommargin">

                <table class="table cart">
                    <thead>
                        <tr>
                            <th class="cart-product-name">Product</th>
                            <th class="cart-product-price">Unit Price</th>
                            <th class="cart-product-quantity">Quantity</th>
                            <th class="cart-product-subtotal">Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="cart_item">
                            <td class="cart-product-name">
                                <a><?php echo $vars["name"]; ?></a>
                            </td>

                            <td class="cart-product-price">
                                &cent;<span id="priceUni"class="amount"><?php echo $vars["price"]; ?></span>
                            </td>

                            <td class="cart-product-quantity">
                                <div class="quantity clearfix">
                                    <input id="minus-button" type="button" value="-" class="minus">
                                    <input id="quantity" type="text" name="quantity" value="1" class="qty" />
                                    <input id="plus-button" type="button" value="+" class="plus">
                                </div>
                            </td>

                            <td class="cart-product-subtotal">
                                &cent;
                                <span id="price" class="amount"><?php echo $vars["price"]; ?></span>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td colspan="6">
                                <div class="row clearfix">
                                    <div class="col-md-8 col-xs-8 nopadding">
                                        <a href="?" class="button button-3d nomargin fright">Cancel Purchase</a>
                                        
                                        <form method="POST" action="?controller=Invoice&action=insertInvoice">
                                            <input id="price-value" type="hidden" class="minus" value="<?php echo $vars["price"]; ?>">
                                            
                                            <input type="submit"  class="button button-3d notopmargin fright" value="To Buy">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        

        <script>

            $("#minus-button").click(function () {
                if ($("#quantity").val() > 1) {
                    var temp = $("#quantity").val();
                    var price = $("#price-value").val();
                    temp--;
                    var retrn = temp * price;
                    $("#quantity").val(temp);
                    $("#price").html(retrn);
                }
            });

            $("#plus-button").click(function () {
                var temp = $("#quantity").val();
                var price = $("#price-value").val();
                temp++;
                var retrn = temp * price;
                $("#quantity").val(temp);
                $("#price").html(retrn);
            });
        </script>

        <?php
        include_once 'public/footer.php';

        