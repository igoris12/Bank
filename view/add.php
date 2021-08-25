
<?php require __DIR__ . '/top.php' ?>
<div class='containerr'>
    <div class='actionForm'>
        <form action="<?= $account['id']?>" method="post">
            <input  type="text" name="money" placeholder="0">
            <button type="submit" >Add money</button>
        </form>
    </div>
    <div class='infoContainer'>
        <span class='item'><b>ID:</b> <?= $account['id']?></span>
        <span class='item'><b>Acount number:</b> <?= $account['aNumber']?> </span>
        <p class='item'><b>Name:</b> <?= $account['name']?></p>
        <p class='item'><b>Lastname:</b> <?= $account['lastName']?></p>
        <p class='item'><b>Person Code:</b> <?= $account['personCode']?> </p>
        <p class='item'><b>Balance:</b> <?= $account['balance']?> EUR</p>
    </div>
</div>
<?php require __DIR__ . '/bottom.php' ?>
