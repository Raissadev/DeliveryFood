<section class="dicesContainer">
    <div class="wrap w90 center">
        <div class="listBoxes itemsFlex alignCenter justSpaceBetween">
            <div class="box">
                <div class="col w100 marginDownSmall">
                    <a class="icon"><i data-feather="user-plus"></i></a>
                    <h4>Total de <br /> Visitas</h4>
                    <p>Visitas</p>
                </div>
                <div class="col w100 itemsFlex alignCenter">
                    <div class="chartBar w90 marginRightDefault">
                        <span style="width: <?php $totalVisits = \controller\siteController::countVisits(); echo count($totalVisits); ?>%"></span>
                    </div>
                    <p><?php $totalVisits = \controller\siteController::countVisits(); echo count($totalVisits); ?></p>
                </div>
            </div>
            <div class="box">
                <div class="col w100 marginDownSmall">
                    <a class="icon"><i data-feather="tag"></i></a>
                    <h4>Total de <br /> Vendas</h4>
                    <p>Vendas</p>
                </div>
                <div class="col w100 itemsFlex alignCenter">
                    <div class="chartBar w90 marginRightDefault">
                        <span style="width:<?php $totalSales = \models\siteModel::totalPayments(); echo count($totalSales); ?>%"></span>
                    </div>
                    <p><?php $totalSales = \models\siteModel::totalPayments(); echo count($totalSales); ?></p>
                </div>
            </div>
            <div class="box">
                <div class="col w100 marginDownSmall">
                    <a class="icon"><i data-feather="gift"></i></a>
                    <h4>Produtos <br /> Publicados</h4>
                    <p>Produtos</p>
                </div>
                <div class="col w100 itemsFlex alignCenter">
                    <div class="chartBar w90 marginRightDefault">
                        <span style="width: <?php $countFoods = \models\adminModel::getProductsAdmin(); echo count($countFoods); ?>%"></span>
                    </div>
                    <p><?php echo count($countFoods); ?></p>
                </div>
            </div>
            <div class="box">
                <div class="col w100 marginDownSmall">
                    <a class="icon"><i data-feather="users"></i></a>
                    <h4>Total de <br /> Usuários</h4>
                    <p>Usuários</p>
                </div>
                <div class="col w100 itemsFlex alignCenter">
                    <div class="chartBar w90 marginRightDefault">
                        <span style="width: <?php $usersGet = \models\accessModel::getUsers(); echo count($usersGet); ?>%"></span>
                    </div>
                    <p><?php $usersGet = \models\accessModel::getUsers(); echo count($usersGet); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

