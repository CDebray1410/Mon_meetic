<?php $title = "Recherche" ?>

<?php 
    $menu = 1;
    require 'parts_of_code/header.php';
    $header = ob_get_clean();
?>
<?php ob_start(); ?>
    <fieldset>
    <legend>Rechercher des membres</legend>
        <form action="index.php?action=researchSend" method="POST" id="search_form">
            <div>
                <label for="gender">Sexe : </label>
                <select name="gender" id="gender">
                    <option value="null">Tous</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select>
            </div>

            <div><label for="city">Ville : </label><input type="text" name="city" id="city" /></div>

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
            </div>

            <div>
                <label for="age_slice">Tranche d'âge entre : </label>
                <select name="age_slice" id="age_slice">
                    <option value="null">Tous</option>
                    <option value="18/25">18 / 25</option>
                    <option value="25/35">25 / 35</option>
                    <option value="35/45">35 / 45</option>
                    <option value="45">45 et +</option>
                </select>
            </div>

            <div class="no_border"><input type="submit" value="Rechercher" /></div>
        </form>
    </fieldset>
<?php
if (empty($_SESSION['first_name'])) {
    header('Location: index.php?action=connectionForm');
}
    $content = ob_get_clean();
    require 'template.php';
?>