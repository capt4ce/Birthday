<?php
######configuration######
$store_folder='upload';
#########################
//$doc="nFile";
if (isset( $_FILES)) echo "yepp";
echo $_FILES['nFile']['type'];
?>
