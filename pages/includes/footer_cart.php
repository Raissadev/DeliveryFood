<div class="divisor"></div>
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