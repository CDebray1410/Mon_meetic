<?php $title = "Résultat de la recherche" ?>

<?php 
    $menu = 1;
    require 'parts_of_code/header.php';
    $header = ob_get_clean();
?>
<?php ob_start() ?>
    <section class="members_data" id="members_data_container">
        <span id="slide_count"></span>
        <?php
        while ($donnees = $checkSearchMembers->fetch()) {
            if ($donnees['first_name'] != $_SESSION['first_name'] && $donnees['first_name'] != "") {
                ?>
                    <div class="slide fade_in">
                        <p>Membre : <?php echo $donnees['first_name'] . " " . $donnees['last_name'] ?></p>
                        <p>Genre : <?php echo $donnees['gender'] ?></p>
                        <p>Age : <?php echo $donnees['member_age'] ?></p>
                        <p>Ville : <?php echo $donnees['city'] ?></p>
                        <p>Email : <?php echo $donnees['e_mail'] ?></p>
                        <p>Hobbies : <?php echo $donnees['hobbies'] ?></p>
                    </div>
                <?php
            }
        }
        ?>
        <a class="slide__buttons slide__buttons--left" onclick="changeMember(-1)"></a>
        <a class="slide__buttons slide__buttons--right" onclick="changeMember(1)"></a>
    </section>
<?php
if (empty($_SESSION['first_name'])) {
    header('Location: index.php?action=connectionForm');
}
    $content = ob_get_clean();
    require 'template.php';
?>