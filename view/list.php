<?php require __DIR__ . '/top.php' ?>
 

    <?php if ($data != null) : ?>
        <?php foreach($data as $account): ?>

    <div class='containerr'>
        <div class='containerBtn'>
            <div class='btnContainer'>
                <form action="#" method="post">
                    <button type="submit" >delete</button>
                </form>

                <form action="#>" method="post">
                    <button type="submit" >Add money</button>
                </form>

                <form action="#" method="post">
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