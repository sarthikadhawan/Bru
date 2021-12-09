<?php 
$a = $_GET['q'];
$b = $a+24;
for($i=$a;$i<$b;$i++):
?><td data-room-id="<?= $i;?>"></td>
<?php endfor;
    ?>