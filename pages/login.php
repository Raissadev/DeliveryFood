<?php
    \models\accessModel::checkLogin();
    \models\accessModel::loginUser();
?>

<section class="containerAccess itemsFlex alignCenter">
    <div class="wrap w90 center">
        <div class="logoAccess textCenter marginDownMiddle">
            <i data-feather="upload-cloud"></i>
            <h4>RaissaDev</h4>
        </div>
        <form method="post" autocomplete="off" class="textCenter marginDownMiddle">
            <input type="text" name="user" placeholder="Seu nome" autocomplete="off" />
            <input type="password" name="password" placeholder="Sua senha" autocomplete="off" />
            <div class="itemsFlex alignCenter marginDownSmall">
                <input type="checkbox" name="remember" /> <label>Lembrar-me</label>
            </div>
            <button type="submit" name="action"><span>Entrar Agora</span></button>
        </form>
        <div class="goToRecord textCenter">
            <p>Não possui uma conta? <a href="<?php echo BASE; ?>register">Registre-se</a></p>
        </div>
    </div>
</section>