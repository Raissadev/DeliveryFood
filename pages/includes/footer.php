<div class="divisor"></div>
<?php 
    if($fileName != 'product.php'){
?>
<footer>
    <div class="wrap">
        <nav>
            <ul class="itemsFlex justSpaceBetween alignCenter">
                <li><a href="<?php echo BASE ?>"><i data-feather="home"></i></a></li>
                <li><a href="<?php echo BASE ?>shop"><i data-feather="search"></i></a></li>
                <li><a href="<?php echo BASE ?>shop"><i data-feather="shopping-bag"></i></a></li>
                <li class="toggleMenu"><a><i data-feather="user"></i></a></li>
            </ul>
        </nav>
    </div>
</footer>
<?php } ?>
<?php if($fileName == 'product.php'){ ?>
<footer class="footerCart" style="display:block">
    <div class="wrap">
        <form class="w90 center itemsFlex alignCenter justCenter">
            <a href="<?php echo BASE; ?>cart?addCart=<?php echo $food['id']; ?>" class=" button w100 itemsFlex alignCenter justCenter"><span>Adicionar ao Carrinho</span></a>
        </form>
    </div>
</footer>
<?php
    \models\shopModel::addToCart($food['id']);
?>
<?php } ?>
<script src="<?php echo BASE ?>js/scripts.js"></script>

</body>   
</html>
