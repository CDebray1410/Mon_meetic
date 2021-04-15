<?php $title = "Error" ?>

<?php 
    $menu = 1;
    require 'parts_of_code/header.php';
    $header = ob_get_clean();
?>
<?php ob_start(); ?>
    <section class="error_message__box error_message">
        <strong class="error">Error : <?php echo $error_to_print ?></strong>
    </section>
<?php 
    $content = ob_get_clean(); 
    require 'template.php';
?>