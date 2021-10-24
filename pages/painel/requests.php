<section class="requestsContainer">
    <div class="wrap w90 center">
        <ul>
            <?php
                $requests = \models\checkoutModel::deliveryRequest();
                foreach($requests as $key => $value){
                    $user = \MySql::connect()->prepare("SELECT * FROM `users` WHERE id = '$value[user_id]'");
                    $user->execute();      
                    $user = $user->fetch();
                    $product = \MySql::connect()->prepare("SELECT * FROM `foods` WHERE id = '$value[product_id]'");
                    $product->execute();      
                    $product = $product->fetch();
            ?>
            <li class="box posRelative marginDownSmall">
                <a href="<?php echo BASE; ?>location?id=<?php echo $value['user_id']; ?>">
                    <div class="col marginDownSmall">
                        <h4><?php echo $user['user']; ?></h4>  
                    </div>
                    <div class="col">
                        <p class="marginDownSmallIn">Produto da compra</p>
                        <ul class="infos itemsFlex alignCenter">
                            <li class="w50"><p><?php echo $product['name']; ?></p></li>
                            <li class="w50 textRight"><p><?php echo $value['amount']; ?> R$</p></li>
                        </ul>
                    </div>
                </a>
                <?php
                    if(isset($_GET['delete'])){
                        $idDelete = (int)$_GET['id'];
                        $requestDelete = \MySql::connect()->prepare("DELETE FROM `payments` WHERE id = '$idDelete'");
                        $requestDelete->execute();
                    }
                ?>
                <a class="iconDelete" href="<?php echo BASE; ?>?delete&id=<?php echo $value['id']; ?>"><i data-feather="x"></i></a>
            </li>
            <?php } ?>
        </ul>
    </div>
</section>


