<form method="post" class="formSearch w90 center justSpaceEvenly itemsFlex marginDownMiddle">
    <?php
        \models\shopModel::getItemShopFood();
    ?>
    <input name="busca" type="search" placeholder="Pesquisar aqui..." class="w100" autocomplete="off" />
    <button name="acao_search" type="submit"><i data-feather="search"></i></button>
</form>

<section class="listFoods marginDownMiddle">
    <div class="wrap w90 center">
        <div class="title marginDownSmall">
            <h2>Foods</h2>
        </div>
        <div class="slideFoods">
            <ul class="slide slideContainer">
                <?php
                    $foodsShop = \models\shopModel::getItemShopFood();
                    foreach($foodsShop as $key => $value){
                ?>
                <li>
                    <a href="<?php echo BASE ?>product?id=<?php echo $value['id'] ?>" class="w100">
                    <figure style="background-image:url('<?php echo BASE ?>uploads/<?php echo $value['image'] ?>')">
                        <h4 class="price"><span><?php echo $value['price'] ?> R$</span></h4>
                    </figure>
                    </a>
                </li>
                <?php } ?>
            </ul>   
        </div>
    </div>
</section>

<section class="listFoods marginDownSmall">
    <div class="wrap w90 center">
        <div class="title marginDownSmall">
            <h2>Today's Offer ✨</h2>
        </div>
        <div class="containerFoods">
            <ul class="content">
                <?php
                    $foodsShop = \models\shopModel::getItemShopFood();
                    foreach($foodsShop as $key => $value){
                ?>
                <li class="marginDownSmall">
                    <a href="<?php echo BASE ?>product?id=<?php echo $value['id'] ?>" class="w100 itemsFlex alignCenter">
                        <div class="col w60">
                            <h3><?php echo $value['name'] ?></h3>
                            <p class="limitLineClampOne"><?php echo $value['description'] ?></p>
                            <h4 class="price"><?php echo $value['price'] ?>R$</h4>
                        </div>
                        <figure class="w40">
                            <img src="<?php echo BASE ?>uploads/<?php echo $value['image_transparent'] ?>" />
                        </figure>
                    </a>
                </li>
                <?php } ?>
            </ul>   
        </div>
    </div>
</section>