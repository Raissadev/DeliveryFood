<form method="post" class="formSearch w90 center justSpaceEvenly itemsFlex marginDownMiddle posRelative">
    <?php
        \models\shopModel::getItemShopFood();
    ?>
    <input name="busca" type="search" placeholder="Pesquisar aqui..." class="w100" autocomplete="off" />
    <button name="acao_search" type="submit"><i data-feather="search"></i></button>
</form>

<section class="containerListFoods">
    <div class="wrap w90 center">
        <ul class="list itemsFlex">
            <?php
                $foodsAdmin = \models\adminModel::getProductsAdmin();
                foreach($foodsAdmin as $key => $value){
            ?>
            <li class="boxSingle">
                <a href="<?php echo BASE; ?>product?id=<?php echo $value['id'] ?>">
                    <figure>
                        <img src="<?php echo BASE; ?>uploads/<?php echo $value['image'] ?>" />
                    </figure>
                    <div class="infoFood textCenter">
                        <h4><?php echo $value['name']; ?></h4>
                    </div>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</section>


