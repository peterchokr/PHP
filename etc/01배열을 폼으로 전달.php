<?php
$a = array("일", "이", "삼");
$a_send = urlencode(serialize($a));
?>
<form action="a2.php" method="post">
    <input type="hidden" name="arr" value="<?= $a_send?>">
    <input type="submit" value="전달">
</form>
