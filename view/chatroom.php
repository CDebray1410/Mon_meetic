<?php $title = "Chatroom" ?>

<?php 
    $menu = 1;
    require 'parts_of_code/header.php';
    $header = ob_get_clean();
?>
<?php ob_start() ?>

    <form method="POST" action="index.php?action=chatroomSend">
        <div id="chat_form"><input type="text" name="chatroom_send" class="chat_input" placeholder="Écrivez votre message ici !" minlength="3" maxlength="255" required /><input type="submit" value="Envoyer" /></div>
    </form>

    <section class="chat_container">
    <?php
        while($donnees = $checkChatroom->fetch()){
            ?>
            <div class="chat_container__message">
                <p><ins><i>Le : <?php echo $donnees['message_date_fr'] ?> . </i><strong> De : <?php echo $donnees['full_name_upper'] ?></strong><ins></p>
                <p> <?php echo $donnees['chatroom_message'] ?> </p>
            </div>
            <?php
        }
    ?>
    </section>
<?php
    if (empty($_SESSION['first_name'])) {
        header('Location: index.php?action=connectionForm');
    }
    $content = ob_get_clean();
    require 'template.php';
?>