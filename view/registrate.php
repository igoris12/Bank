<?php require __DIR__ . '/top.php'?>


<div class="regDiv">
    <form class="reg" action="<?=URL?>registrate" method="post">
        <label>Email</label>
        <div class="regEmail">
            <input type="text" name='email' placeholder='Email'>
        </div>

        <label>Name</label>
        <div class="regEmail">
            <input type="text" name='name' placeholder='Name'>
        </div>

        <label>Password</label>
        <div class="regPass">
            <input type="password" name='pass' placeholder='Passwoed'>
        </div>

        <label>Confirm password</label>
        <div class="regPass">
            <input type="password" name='confirmPass' placeholder='Repite  passwoed'>
        </div>
        
        <button type="submit">Registrate</button>
    </form>
</div>



<?php require __DIR__ . '/bottom.php'?>
