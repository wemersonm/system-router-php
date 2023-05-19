<div class="container-cars">
    <?php
    $flashMsgSuccess = getFlash('deleteCarSuccess');
    $flashMsgError = getFlash('deleteCarError');
    if ($flashMsgSuccess): ?>
        <span class="msgSuccess">
            <?php echo $flashMsgSuccess; ?>
        </span>
    <?php elseif ($flashMsgError) : ?>
        <span class="msgError">
            <?php echo $flashMsgError; ?>
        </span>
    <?php endif; ?>
    <table class="table-cars">
        <thead>
            <tr>
                <th>VNI</th>
                <th>Marca</th>
                <th>Nome</th>
                <th>Ano</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $car) : ?>
                <tr>
                    <td> <?php echo $car->vni; ?> </td>
                    <td> <?php echo $car->carMake; ?> </td>
                    <td> <?php echo $car->carModel; ?> </td>
                    <td> <?php echo $car->carModelYear; ?> </td>
                    <td>
                        <a class="btn  btn-edit" href="/car/edit/<?php echo $car->id; ?>">Editar</a>
                        <a class="btn  btn-delete" href="/car/delete/<?php echo $car->id; ?>">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>