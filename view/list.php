<?php require __DIR__ . '/top.php' ?>
 

    <?php if ($accounts != null) : ?>
        <?php foreach($accounts as $account): ?>

    <div class='containerr'>
        <div class='containerBtn'>
            <div class='btnContainer'>
                <form action="<?= URL?>delete/<?= $account['id']?>" method="post">
                    <button type="submit" >delete</button>
                </form>

                <form action="<?= URL?>add/<?= $account['id']?>" method="get">
                    <button type="submit" >Add money</button>
                </form>

                <form action="<?= URL?>sub/<?= $account['id']?>" method="get">
                    <button type="submit" >Subtract money</button>   
                </form>
            </div>   
        </div>
            
        <div class='infoContainer'>
            <span class='item'><b>Acount number:</b> <?= $account['aNumber']?> </span>
            <p class='item'><b>Name:</b> <?= $account['name']?></p>
            <p class='item'><b>Lastname:</b> <?= $account['lastName']?></p>
            <p class='item'><b>Person Code:</b> <?= $account['personCode']?> </p>
            <p class='item'><b>Balance:</b> <?= $account['balance']?> EUR</p>
        </div>
    </div>

        <?php endforeach ?>
    <?php endif ?>

<?php require __DIR__ . '/bottom.php' ?>