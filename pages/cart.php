<?php
    if(!isset($_SESSION['carrinho'])){
        echo "<script> alert('Você não possui items no carrinho'); </script>";
        echo '<script> location.href = "'.BASE.'" </script>';
        die();
    }
?>
<section class="containerCart shopListFoods">
    <div class="wrap">
        <nav class="cartNavItems">
            <div class="itemsFlex justEnd marginDownSmall">
            <?php \models\checkoutModel::resetCart(); ?>
                <a href="<?php echo BASE; ?>cart?reset"><i data-feather="refresh-cw"></i></a>
            </div>
            <ul class="content">
                <?php
                    $foodsCart = $_SESSION['carrinho'];
                    $total = 0;
                    $delivery = 20.00;
                    foreach($foodsCart as $key => $value){
                    $idFood = $value;
                    $items = \MySql::connect()->prepare("SELECT * FROM `foods` WHERE id = '$idFood'");
                    $items->execute();
                    $items = $items->fetch();
                    $valor = $value * $items['price'];
                    $total+=$valor;
                ?>
                <li class="marginDownSmall listCart">
                    <a href="<?php echo BASE ?>product?id=<?php echo $items['id'] ?>" class="w100 itemsFlex alignCenter">
                        <figure class="itemsFlex alignCenter">
                            <img src="<?php echo BASE ?>uploads/<?php echo $items['image'] ?>" />
                        </figure>
                        <div class="col w70">
                            <h3><?php echo $items['name']; ?></h3>
                            <div class="itemsFlex alignCenter">
                                <p class="w70 limitLineClampOne"><?php echo $items['description'] ?></p>
                                <p class="price w30 textRight"><?php echo $items['price'] ?> R$</p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </nav>
        <div class="row">
            <div class="rowInformations checkouRow">
                <div class="col marginDownSmall itemsFlex alignCenter justSpaceBetween">
                    <p>SubTotal</p><p><?php echo number_format($total, 2, ',', ' ') ?> R$</p>
                </div>
                <div class="col marginDownSmall itemsFlex alignCenter justSpaceBetween">
                    <p>Delivery</p><p><?php echo number_format($delivery, 2, ',', ' ') ?> R$</p>
                </div>
                <div class="col itemsFlex alignCenter justCenter">
                    <a class="button itemsFlex alignCenter justCenter w50 openModal"><span>Checkout</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modalContent hide">
    <section class="containerPayments">
        <div class="wrap">
            <div class="card marginDownSmall posRelative">
                <form id="payment-form" method="post" >
                <?php 
                     if(isset($_POST['payment'])){
                        require('./classes/models/paymentModel.php');
                        \models\checkoutModel::getPaymentInsert($_POST['user_id'], $_POST['product_id'], $_POST['payment_id'], $_POST['card_number'], $_POST['date_valid'], $_POST['cvv'], $_POST['amount']); 
                        $payment = new Payment;
                        $payment->customers($_POST['id'],$_POST['user'],$_POST['email']);
                        $payment->withCard();
                    }
                ?>
                    <div class="card centered">
                        <img class="logo" src="https://gist.githubusercontent.com/beckettnormington/9b6427d6f220b6f94e324c86d01cee30/raw/ad33f00e6e29e8e6662c4accb07bc3b0b90841a0/mastercard.svg" \>
                        <img class="chip" src="https://img.icons8.com/ios/452/sim-card-chip.png" height="45" \>
                        <p class="digits">
                            <input type="text" name="card_number" placeholder="1234 5678 9012 3456" class="w100" autocomplete="off" required />
                        </p>
                        <div class="itemsFlex alignCenter justSpaceBetween">
                            <p class="nameInput w50">
                                <input type="text" name="cvv" placeholder="CVV" autocomplete="off" required />
                            </p>
                            <p class="valid-text w50 textRight">Valid Thru<br><d class="valid-date">
                                <input type="text" name="date_valid" placeholder="4/22" class="w100 textRight" autocomplete="off" required />
                            </d></p>
                        </div>
                        <input type="hidden" name="payment_id" value="<?php echo uniqid(); ?>" />
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>" />
                        <input type="hidden" name="user" value="<?php echo $_SESSION['user']; ?>" />
                        <input type="hidden" name="product_id" value="<?php echo implode(', ', $_SESSION['carrinho']); ?>" />
                        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" />
                        <input type="hidden" name="latitude" value="<?php echo $_SESSION['latitude']; ?>" />
                        <input type="hidden" name="longitude" value="<?php echo $_SESSION['longitude']; ?>" />
                        <input type="hidden" name="amount" value="<?php echo $total; ?>" />
                        <button type="submit" class="btnIcon" name="payment"><i data-feather="send"></i></button>
                    </div>
                </form>
            </div>
            <div class="closeModal openModal textRight">
                <a>Fechar</a>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo BASE; ?>js/checkout.js"></script>
