<?php
$flashErrorInsertCar = getFlash('errorInsertCar');
if ($flashErrorInsertCar) : ?>
    <?php echo $flashErrorInsertCar; ?>
<?php endif; ?>

<form method='POST' action="/car/insert">
    VNI <br>
    <input type="text" name="vni"><br>
    <div class="flash-message"><?php echo getFlash('vni'); ?> </div>
    Marca <br>
    <input type="text" name="carMake"><br>
    <div class="flash-message"><?php echo getFlash('carMake'); ?> </div>
    Nome <br>
    <input type="text" name="carModel"><br>
    <div class="flash-message"><?php echo getFlash('carModel'); ?> </div>
    Ano <br>
    <input type="text" name="carModelYear"><br>
    <div class="flash-message"><?php echo getFlash('carModelYear'); ?> </div>
    <input type="submit" name="submit" value="Cadastrar">
</form>