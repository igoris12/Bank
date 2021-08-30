<?php require __DIR__ . '/top.php'?>

<div class="loginContainer">
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
</div>



<?php require __DIR__ . '/bottom.php'?>
