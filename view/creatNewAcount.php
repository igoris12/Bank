
<?php 
 require __DIR__ . '/top.php';
?>

<div class='containerr'>
  <div class="creatContainer">
    <form action="<?=URL?>creat" method="post">
      <div class='inputContent'>
        <label >Nmae: </label><input  type="text" name="firstName" placeholder="First name">
        <label >Last name: </label><input  type="text" name="lastName" placeholder="Last name">
        <label >Personal code: </label><input  type="text" name="pesonCode" placeholder="Personal code">
        <!-- <label >Nr: </label><input  type="text" name="acNumber" value=""> -->
      </div>
      
      <button type="submit">Nauja Saskaita</button>
    </form>
  </div>
  
</div>


<?php require __DIR__ . '/bottom.php' ?>