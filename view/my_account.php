<?php $title = "My Account" ?>

<?php 
    $menu = 1;
    require 'parts_of_code/header.php';
    $header = ob_get_clean();
?>
<?php ob_start(); ?>
    <section class="infos_perso">
        <h2>Bonjour <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?> !</h2>
        <ul> 
            <li><?php if ($_SESSION['gender'] == "autre") { echo "Votre sexe est indéfini.";} else { ?> Vous êtes un(e) <?php echo $_SESSION['gender'] ?> <?php } ?></li>
            <li>Vous êtes née le : <?php echo date("d-m-Y", strtotime($_SESSION['birth_date'])); ?>, (<?php echo $_SESSION['member_age'] ?> ans)</li>
            <li>Vous habitez à : <?php echo $_SESSION['city'] ?></li>
            <li>Votre email est : <?php echo $_SESSION['e_mail'] ?></li>
            <li>Vous aimez : <?php echo $_SESSION['hobbies']; ?></li>
            <li>Vous êtes inscrit depuis le : <?php echo date("d-m-Y", strtotime($_SESSION['inscription_date'])) ?></li>
        </ul>
    </section>
    <section> 
        <form method="POST" action="index.php?action=changePass" id="change_pass">
            <div id="my_account__form0">
                <label for="new_pass">Vous désirez changer de mot de passe ? <input type="password" name="new_pass" id="new_pass" /></label>
                <input type="submit" value="Changer" />
                <span id="new_pass_error" class="error_message"></span>
            </div>
        </form>
        <?php
        if (!empty($_GET['changed']) && $_GET['changed'] == "password") {
            echo "<p> Votre mot de passe a bien été changé ! </p>";
        }
        ?>

        <form method="POST" action="index.php?action=changeEmail" id="change_email">
            <div id="my_account__form1">
                <label for="new_email">Vous désirez l'adresse mail de votre compte ? <input type="email" name="new_email" id="new_email" /></label>
                <input type="submit" value="Changer" />	
                <span id="new_email_error" class="error_message"></span>
            </div>
        </form>
        <?php
        if (!empty($_GET['changed']) && $_GET['changed'] == "email") {
            echo "<p> Votre email a bien été changé ! </p>";
        }
        ?>
        <p><a href="index.php?action=deleteAccount" onclick="return confirm('Êtes-vous sûr de votre choix ?')"><button class="button"> Supprimer le compte </button></a></p>
    </section>
<?php
    $content = ob_get_clean();
    if (empty($_SESSION['first_name'])) {
        header('Location: index.php?action=connectionForm');
    }
    require 'template.php';