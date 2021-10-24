<?php
    \models\adminModel::registerProduct();
?>
<section class="registerProductContainer marginDownSmall">
    <div class="wrap itemsFlex alignCenter justCenter w90 center">
        <form method="post" enctype="multipart/form-data" class="registerProduct w100 textCenter">
            <input type="text" name="name" placeholder="Nome" class="w100 marginDownSmall" autocomplete="off" />
            <textarea name="description" placeholder="Descrição" class="w100 marginDownSmall" autocomplete="off" ></textarea>
            <input type="text" name="price" placeholder="Preço" class="w100 marginDownSmall" autocomplete="off" />
            <input type="text" name="energy" placeholder="Calorias" class="w100 marginDownSmall" autocomplete="off" />
            <input type="text" name="weight" placeholder="Peso" class="w100 marginDownSmall" autocomplete="off" />
            <div class="row itemsFlex alignCenter justSpaceBetween">
                <div class="textLeft w49">
                    <label>Imagem</label>
                    <input type="file" name="image" class="w100 marginTopSmall" />
                </div>
                <div class="textLeft w49">
                    <label>Imagem transparente</label>
                    <input type="file" name="image_transparent" placeholder="Imagem com fundo transparente" class="w100 marginTopSmall" />
                </div>
            </div>
            <button type="submit" name="action" class="btnAction marginTopSmall">Registrar produto</button>
        </form>
    </div>
</section>