
<section class="welcomeContainer marginDownBigger">
    <div class="wrap w90 center">
        <div class="title marginDownSmall">
            <h2>Welcome ✨</h2>
        </div>
        <nav class="items slideContainer">
            <ul class="slide">
                <?php
                    $foods = \models\homeModel::getFoodsItems();
                    foreach($foods as $key => $value){
                ?>
                <li>
                    <a href="<?php echo BASE ?>product?id=<?php echo $value['id'] ?>" class="textCenter">
                        <figure>
                            <img src="<?php echo BASE ?>uploads/<?php echo $value['image_transparent'] ?>" />
                        </figure>
                        <h4 class="limitLineClampOne"><?php echo substr($value['name'],0,6); ?></h4>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</section>


<section class="promotionsContainer posRelative marginDownBigger">
    <div class="wrap w90 center">
        <div class="title marginDownSmall">
            <h2>Promotions Today</h2>
        </div>
        <div class="bannerPromotion itemsFlex alignCenter">
            <div class="col w60">
                <p>24, Março</p>
                <h3>Free Hot Dog!</h3>
                <p>A partir de 100$</p>
            </div>
            <figure class="foodBanner w40">
                <img src="<?php echo BASE ?>images/foodBgTransparentTwo.png" />
            </figure>
        </div>
    </div>
</section>


<section class="shopListFoods">
    <div class="wrap w90 center">
        <div class="title marginDownSmall">
            <h2>Welcome ✨</h2>
        </div>
        <div class="containerFoods">
            <ul class="content">
                <?php
                    $foods = \models\homeModel::getFoodsItems();
                    foreach($foods as $key => $value){
                ?>
                <li class="marginDownSmall">
                    <a href="<?php echo BASE ?>product?id=<?php echo $value['id'] ?>" class="w100 itemsFlex alignCenter">
                        <figure class="itemsFlex alignCenter">
                            <img src="<?php echo BASE ?>uploads/<?php echo $value['image'] ?>" />
                        </figure>
                        <div class="col w70">
                            <h3><?php echo $value['name'] ?></h3>
                            <div class="itemsFlex alignCenter">
                                <p class="w70 limitLineClampOne"><?php echo $value['description'] ?></p>
                                <p class="price w30 textRight"><?php echo $value['price'] ?> R$</p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php } ?>
            </ul>   
        </div>
    </div>
</section>