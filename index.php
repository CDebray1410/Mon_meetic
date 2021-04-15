<?php
    require "control/main.php";
    session_start();
try{
    if (isset($_GET['action'])) {
        switch (htmlspecialchars($_GET['action'])) {
        case 'inscriptionForm' :
            $showInscriptionForm = new Crud();
            $showInscriptionForm->showFormInscription();
            break;
        case 'inscriptionSend' :
            if ($_POST['last_name'] != null && $_POST['first_name'] != null && $_POST['birth_date'] != null && $_POST['gender'] != null && $_POST['city'] != null && $_POST['e_mail'] != null && $_POST['pass'] != null && $_POST['pass_check'] != null && $_POST['hobbies']) {
                $sendInscriptionForm = new Crud();
                $sendInscriptionForm->create('createAccount', $_POST['last_name'], $_POST['first_name'], $_POST['birth_date'], $_POST['gender'], $_POST['city'], $_POST['e_mail'], $_POST['pass'], $_POST['pass_check'], $_POST['hobbies']);
            } else {
                throw new Exception('Every input must be filled !');
            }
            break;
        case 'connectionForm' :
            $showConnectionForm = new Crud();
            $showConnectionForm->showFormConnection();
            break;
        case 'connectionSend' :
            if ($_POST['e_mail'] != null && $_POST['pass'] != null) {
                $sendConnectionForm = new Crud();
                $sendConnectionForm->read("connect", $_POST['e_mail'], $_POST['pass']);
            } else {
                throw new Exception('Every input must be filled !');
            }
            break;
        case 'disconnect' :
            $disconnect = new Crud();
            $disconnect->read("disconnect");
            break;
        case 'my_account' :
            $showMyAccount = new Crud();
            $showMyAccount->showMyAccount();
            break;
        case 'changeEmail' :
            if ($_POST['new_email'] != null && $_POST['new_email'] != "") {
                $changeMail = new Crud();
                $changeMail->update("email", $_SESSION['id_member'], $_POST['new_email']);                    
            } else {
                throw new Exception('Every input must be filled !');
            }
            break;
        case 'changePass' :
            if ($_POST['new_pass'] != null && $_POST['new_pass'] != "") {
                $changePass = new Crud();
                $changePass->update("pass", $_SESSION['id_member'], null, $_POST['new_pass']);
            } else {
                throw new Exception('Every input must be filled !');
            }
            break;
        case 'deleteAccount' :
            $deleteAccount = new Crud();
            $deleteAccount->delete("account", $_SESSION['id_member']);
            header('Location: index.php?action=connectionForm');
            break;
        case 'researchForm' :
            $showResearchForm = new Crud();
            $showResearchForm->showFormResearch();
            break;
        case 'researchSend' :
            $showResearchResult = new Crud();
            $showResearchResult->read("searchMembers", null, null, $_POST['gender'], $_POST['city'], $_POST['hobbies'], $_POST['age_slice']);
            break;
        case 'chatroom' :
            $showChatroom = new Crud();
            $showChatroom->read("chatroom");
            break;
        case 'chatroomSend' :
            $chatroomSend = new Crud();
            $chatroomSend->create("chatroomMessage", $_SESSION['last_name'], $_SESSION['first_name'], null, null, null, null, null, null, null, $_POST['chatroom_send']);
            break;
        default :
            $showInscriptionForm = new Crud();
            $showInscriptionForm->showFormInscription();
            break;
        }
    } else {
        $showInscriptionForm = new Crud();
        $showInscriptionForm->showFormInscription();
    }
} catch (Exception $e) {
    $error_to_print = $e->getMessage();
    include 'view/error.php';
}