<?php
/*
 * This file is a "HTML centric" php file, meaning that we keep it
 * looking as HTML as much as we can. Only when we need to access a 
 * dynamic variable do we enter php mode. We then exit php mode as fast
 * as we can.
 */
?>

Hello, this is an estate...
<br><br>

<b>Description:</b><br>
<?php echo $description; ?><br><br>

<b>Price:</b> <?php echo $price; ?>