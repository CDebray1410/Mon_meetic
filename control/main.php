<?php

    require_once 'model/MainManager.php';
    require_once 'model/AccountManager.php';
    require_once 'model/SearchManager.php';
    require_once 'model/ChatManager.php';

class Crud
{
    public function create($selection, $last_name = null, $first_name = null, $birth_date = null, $gender = null, $city = null, $email = null, $pass = null, $pass_check = null, $hobbies = null, $message = null)
    {
        switch ($selection) {
        case 'createAccount' :
            $createAccount = new AccountManager();
            $created_account = $createAccount->inscription($last_name, $first_name, $birth_date, $gender, $city, $email, $pass, $pass_check, $hobbies);

            if ($created_account === false) {
                throw new Exception('Impossible de créer le compte !');
            } else {
                header('Location: index.php?action=connectionForm');
            }
            break;
        case 'chatroomMessage' :
            $createMessage = new ChatManager();
            $checkCreateMessage = $createMessage->ChatroomMessagesSend($first_name, $last_name, $message);

            if ($checkCreateMessage === false) {
                throw new Exception('Impossible d\'envoyer le message !');
            } else {
                header('Location: index.php?action=chatroom');
            }
            break;
        default:
            break;
        }
    }
    public function read($selection, $email = null, $pass = null, $gender = null, $city = null, $hobbies = null, $age = null)
    {
        switch ($selection) {
        case 'connect' :
            $connect = new AccountManager();
            $checking_connect = $connect->connection($email, $pass);

            if ($checking_connect === false) {
                throw new Exception('Connexion impossible !');
            } else {
                header('Location: index.php?action=my_account');
            }
            break;
        case 'disconnect' :
            $disconnect = new AccountManager();
            $disconnect->disconnectAccount();

            header('Location: index.php?action=connectionForm');
            break;
        case 'searchMembers' :
            $searchMembers = new SearchManager();
            $checkSearchMembers = $searchMembers->searchAccount($gender, $city, $hobbies, $age);

            include_once 'view/research_response.php';
            break;
        case 'chatroom' :
            $chatroom = new ChatManager();
            $checkChatroom = $chatroom->ChatroomMessagesGet();

            include_once 'view/chatroom.php';
            break;
        default :
            break;
        }
    }
    public function update($selection, $id_member, $new_mail = null, $new_pass = null)
    {
        switch ($selection) {
        case 'email' :
            $change_mail = new AccountManager();
            $checking_change = $change_mail->changeEmail($_SESSION['id_member'], $new_mail);

            if ($checking_change === false) {
                throw new Exception('Impossible de changer le mot de passe !');
            } else {
                header('Location: index.php?action=my_account&changed=email');
            }
            break;
        case 'pass' :
            $change_pass = new AccountManager();
            $checking_change = $change_pass->changePass($id_member, $new_pass);

            if ($checking_change === false) {
                throw new Exception('Impossible de changer l\'email !');
            } else {
                header('Location: index.php?action=my_account&changed=password');
            }
            break;
        default:
            break;
        }
    }
    public function delete($selection, $id_member)
    {
        switch ($selection) {
        case "account" :
            if (isset($id_member)) {
                $deleteAccount = new AccountManager();
                $deleteAccount->deleteAccount($id_member);
            }
            $deleteAccount->disconnectAccount();
            break;
        }
    }

    public function showFormInscription()
    {
        include 'view/inscription_form.php';
    }

    public function showFormConnection() 
    {
        include 'view/connection_form.php';
    }
    public function showMyAccount()
    {
        include 'view/my_account.php';
    }
    public function showFormResearch()
    {
        include 'view/research_form.php';
    }
}
