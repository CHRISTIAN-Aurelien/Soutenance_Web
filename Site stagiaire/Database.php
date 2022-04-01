<?php
//------------------------------------------------
//Connection à la BDD.
//------------------------------------------------
try {
$bdd = new PDO('mysql:host=localhost;dbname=test_ps;charset=utf8','root','');
}
catch (PDOException $e)
{
echo $e->getMessage()."\n";
die;
}
?>
