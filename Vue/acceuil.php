<?php
require_once('base.php');
$titre = 'Acceuil';
?>
<?php
ob_start(); ?>

<!-- code html qui ira dans la variable $corps -->

<?php $corps = ob_get_clean(); ?>