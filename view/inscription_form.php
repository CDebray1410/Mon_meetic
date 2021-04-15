<?php $title = "Formulaire d'inscription"; ?>

<?php 
    $menu = 0;
    require 'parts_of_code/header.php';
    $header = ob_get_clean();
?>
<?php ob_start(); ?>
    <fieldset>
        <legend>Inscrivez-vous !</legend>
        <form action="index.php?action=inscriptionSend" method="POST" id="inscription_form">
            <div>
                <label for="last_name">Nom : </label><input type="text" name="last_name" id="last_name" />
                <label for="first_name">Prénom : </label><input type="text" name="first_name" id="first_name" />
                <span id="name_error" class="error_message"></span>
                <img src="public/images/valid.png" class="valid" id="valid_name_inscription" alt="symbole valide" />
            </div>
            <div><label for="birth_date">Année de naissance : </label><input type="date" name="birth_date" id="birth_date" /><span id="birth_date_error" class="error_message"></span><img src="public/images/valid.png" class="valid" id="valid_birth" alt="symbole valide" /></div>
    
            <div>
                <label for="gender">Sexe : </label>
                <select name="gender" id="gender">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select>
                <img src="public/images/valid.png" class="valid" id="valid_gender" alt="symbole valide" />
            </div>
    
            <div><label for="city">Ville : </label><input type="text" name="city" id="city" /><span id="city_error" class="error_message"></span><img src="public/images/valid.png" class="valid" id="valid_city" alt="symbole valide" /></div>
            <div><label for="e_mail">Email : </label><input type="text" name="e_mail" id="e_mail" /><span id="e_mail_error" class="error_message"></span><img src="public/images/valid.png" class="valid" id="valid_email_inscription" alt="symbole valide" /></div>
            <div><label for="pass">Mot de passe : </label><input type="password" name="pass" id="pass" /><span id="pass_error" class="error_message"></span><img src="public/images/valid.png" class="valid" id="valid_inscription_pass" alt="symbole valide" /></div>
            <div><label for="pass_check">Vérification du mot de passe : </label><input type="password" name="pass_check" id="pass_check" /><span id="pass_check_error" class="error_message"></span><img src="public/images/valid.png" class="valid" id="valid_inscription_check" alt="symbole valide" /></div>
    
            <div>
                <label>Hobbies : </label>
                <label for="video_games">Jeux video : </label>
                <input type="checkbox" name="hobbies[]" id="video_games" value="jeux video" />
                <label for="cinema">Cinema : </label>
                <input type="checkbox" name="hobbies[]" id="cinema" value="cinema" />
                <label for="reading">Lecture : </label>
                <input type="checkbox" name="hobbies[]" id="reading" value="lecture" />
                <label for="sport">Sport : </label>
                <input type="checkbox" name="hobbies[]" id="sport" value="sport" />
                <label for="dance">Dance : </label>
                <input type="checkbox" name="hobbies[]" id="dance" value="dance" />
                <label for="skateboard">Skateboard : </label>
                <input type="checkbox" name="hobbies[]" id="skateboard" value="skateboard" />
                <label for="manga">Manga : </label>
                <input type="checkbox" name="hobbies[]" id="manga" value="manga" />
                <label for="cuisiner">Cuisiner : </label>
                <input type="checkbox" name="hobbies[]" id="cuisiner" value="cuisiner" />
                <img src="public/images/valid.png" class="valid" id="valid_hobbies" alt="symbole valide" />
                <p id="hobbies_error" class="error_message"></p>
            </div>
    
            <div class="no_border"><input type="submit" value="S'inscrire" />
        </form>
    </fieldset>
<?php
if (!empty($_SESSION['first_name'])) {
    header('Location: index.php?action=my_account');
}
    $content = ob_get_clean();
    require 'template.php';
?>