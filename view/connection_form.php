<?php $title = "Connection" ?>

<?php 
    $menu = 0;
    require 'parts_of_code/header.php';
    $header = ob_get_clean();
?>
<?php ob_start(); ?>
    <fieldset>
    <legend>Connection</legend>
        <form action="index.php?action=connectionSend" method="POST" id="connection_form" >
            <div><label for="e_mail">E-mail : </label><input type="email" name="e_mail" id="e_mail"  /><span id="e_mail_connect_error" class="error_message"></span><img src="public/images/valid.png" class="valid" id="valid_email_connect" alt="symbole valide" /></div>
            <div><label for="pass">Password : </label><input type="password" name="pass" id="pass" /><span id="pass_connect_error" class="error_message"></span><img src="public/images/valid.png" class="valid" id="valid_pass_connect" alt="symbole valide" /></div>
            <div class="no_border"><input type="submit" value="Connexion" /></div>
        </form>
    </fieldset>
<?php
if (!empty($_SESSION['first_name'])) {
    header('Location: index.php?action=my_account');
}

    $content = ob_get_clean();
    require 'template.php';
?>