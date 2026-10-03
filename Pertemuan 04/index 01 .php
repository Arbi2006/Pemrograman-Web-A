<?php
declare(strict_types=1);?>

<!DOCTYPE html>
<html>
<head>
    <title> IF PHP 01 </title>
<head>
<body>

<?php
$suhu = 38;

if ($suhu > 37){
    echo "Suhu $suhu derajat : demam.\n";
}

$stok = 0;
if ($stok === 0) {
    echo "Stok habis.\n";
}
?>
</body>
</html>
