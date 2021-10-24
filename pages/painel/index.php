<?php \models\siteModel::countVisits(); ?>

<section class="contentWelcome marginDownMiddle">
    <div class="wrap w90 center">
        <div class="title">
            <h2>Welcome, <br /> <?php echo $_SESSION['user'] ?> 👋 </h2> 
        </div>
    </div>
</section> 

<section class="contentDices">
    <div class="wrap w90 center">
        <div class="dicesList">
            <div class="box itemsFlex alignCenter marginDownSmall">
                <div class="col w50">
                    <p>Hoje</p>
                    <h4>Progresso de Vendas</h4>
                    <p>Lorem ispum amet dolor sis</p>
                </div>
                <div class="col w50">
                    <div id="chart"></div>
                </div>
            </div>
            <div class="box marginDownSmall">
                <div class="col w100">
                    <p class="marginDownSmallIn">Dados dessa semana!</p>
                    <div id="chartMy"></div>
                </div>
            </div>
        </div>
    </div>
</section> 

<?php
    include('js/charts.php');
?>
