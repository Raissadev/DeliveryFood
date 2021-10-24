<style> footer{display:none} </style>
<?php
    $food = \models\productModel::getFood();
    \models\shopModel::getAvaliation($_GET['id']);
?>
<section class="productContainer marginDownSmall">
    <div class="wrap w90 center">
        <figure class="imgProcuct marginDownSmall">
            <img src="<?php echo BASE ?>uploads/<?php echo $food['image'] ?>" />
        </figure>
        <div class="title">
            <h3><?php echo $food['name'] ?></h3>
            <p><?php echo $food['price'] ?> R$</p>
        </div>
    </div>
</section>

<section class="descriptionIconContainer marginDownMiddle">
    <div class="wrap w90 center itemsFlex alignCenter justSpaceBetween">
        <div class="col">
            <h3>🔥</h3>
            <p>Energy</p>
            <h6><?php echo $food['energy'] ?>kcal</h6>
        </div>
        <div class="col">
            <h3>⚖</h3>
            <p>Weight</p>
            <h6><?php echo $food['weight'] ?>g</h6>
        </div>
        <div class="col">
            <h3>⭐</h3>
            <p>Rating</p>
            <h6><?php $rating = \models\shopModel::getRatings($food['id']); ?></h6>
        </div>
    </div>
</section>

<section class="descriptionTextContainer marginDownMiddle">
    <div class="wrap w90 center">
        <h4>Description</h4>
        <p><?php echo $food['description'] ?></p>
    </div>
</section>

<section class="avaliationContainer">
    <div class="wrap w90 center">
        <form method="post" class="feedBack">
            <ul class="stars marginDownSmall itemsFlex">
                <li><input type="checkbox" name="star" value="1" /><i class="star starOne" data-feather="star"></i></li>
                <li><input type="checkbox" name="star" value="2" /><i class="star starTwo" data-feather="star"></i></li>
                <li><input type="checkbox" name="star" value="3" /><i class="star starThree" data-feather="star"></i></li>
                <li><input type="checkbox" name="star" value="4" /><i class="star starFour" data-feather="star"></i></li>
                <li><input type="checkbox" name="star" value="5" /><i class="star starFive" data-feather="star"></i></li>
            </ul>
            <textarea name="feedback" placeholder="Descrição" class="w100 marginDownSmall" autocomplete="off" ></textarea>
            <button type="submit" name="action" class="btnAction marginTopSmall"><span>Enviar</span></button>
        </form>
    </div>
</section>

<?php
    include('includes/footer_cart.php');
?>