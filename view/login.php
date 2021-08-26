<?php require __DIR__ . '/top.php'?>

<form class="login" action="<?=URL?>login" method="post">
    <label>Email:</label>
    <div class="loginEmail">
        <input type="text" name='email'>
    </div>
    <label>Password</label>
    <div class="loginPass">
        
        <input type="password" name='pass' >
    </div>
    
    <button type="submit">Login</button>
</form>


<?php require __DIR__ . '/bottom.php'?>
