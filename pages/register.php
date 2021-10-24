<?php
    \models\accessModel::registerUser();
?>

<section class="containerAccess itemsFlex alignCenter">
    <div class="wrap w90 center">
        <div class="logoAccess textCenter marginDownMiddle">
            <i data-feather="upload-cloud"></i>
            <h4>RaissaDev</h4>
        </div>

        <form method="post" enctype="multipart/form-data" class="textCenter marginDownMiddle">
            <input type="text" name="user" placeholder="Seu nome" autocomplete="off" require />
            <input type="text" name="email" placeholder="Seu email" autocomplete="off" require />
            <div class="itemsFlex justSpaceBetween">
                <input type="text" name="latitude" placeholder="Latitude" require />
                <input type="text" name="longitude" placeholder="Longitude" require />
            </div>
            <input type="text" name="road" placeholder="Nome da Rua" autocomplete="off" require />
            <input type="password" name="password" placeholder="Sua senha" autocomplete="off" require />
            <input type="file" name="image_user" />
            <button type="submit" name="action" class="marginTopSmall"><span>Registrar Agora</span></button>
        </form>
        <div class="goToRecord textCenter">
            <p>Já possui uma conta? <a href="<?php echo BASE; ?>login">Faça login</a></p>
        </div>
    </div>
</section>
<div id="demo"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo BASE ?>js/getLocation.js"></script>



