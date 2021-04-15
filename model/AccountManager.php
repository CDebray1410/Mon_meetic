<?php

class AccountManager extends MainManager
{
    public function inscription($last_name, $first_name, $birth_date, $gender, $city, $email, $pass, $pass_check, $hobbies)
    {
        $db = $this->connectDb();
        
        $last_name_strip = strip_tags($last_name);
        $first_name_strip = strip_tags($first_name);
        $check_name_length = (strlen($last_name_strip) < 3 || strlen($last_name_strip) > 40 && strlen($first_name_strip) < 3 || strlen($first_name_strip) > 40); 
        $name_taken = false;
        
        $current_date = date("Y-m-d");
        $check_diff = date_diff(date_create($birth_date), date_create($current_date));
        $person_age = $check_diff->format('%y');
        
        $gender_strip = strip_tags($gender);
        $city_strip = strip_tags($city);
        
        $email_strip = htmlspecialchars($email);
        $mail_taken = false;

        $pass_chars = htmlspecialchars($pass);
        $pass_check_chars = htmlspecialchars($pass_check);
        $check_pass_verif = ($pass_chars == $pass_check_chars);

        $hobbies_join = implode(", ", $hobbies);

        $final_check = [];

        if ($check_name_length) {   
            array_push($final_check, 1);
            throw new Exception('Le nom et le prénom doivent faire entre 3 et 40 caractère !');
        } else {
            array_push($final_check, 0);
            $get_name = $db->prepare('SELECT last_name, first_name FROM members WHERE last_name = :last_name AND first_name = :first_name');
            $get_name->execute(
                array(
                'last_name' => $last_name_strip,
                'first_name' => $first_name_strip
                )
            );
            $check_name_taken = ($donnees = $get_name->fetch());
            $get_name->closeCursor();
    
            if ($check_name_taken) {
                array_push($final_check, 1);
                $name_taken = false;
                throw new Exception('L\'utilisateur : ' . $last_name_strip . ' ' . $first_name_strip . ', existe déjà !');
            } else {
                array_push($final_check, 0);
                $name_taken = true;
            }
        }

        if ($person_age <= 17) {
            array_push($final_check, 1);
            throw new Exception('Vous devez avoir plus de 18 ans !');
        } else {
            array_push($final_check, 0);
        }
    
        if (!preg_match('#^[a-zA-Z0-9-_\.]+@[a-z]+\.[a-z]{2,4}$#', $email_strip)) {
            array_push($final_check, 1);
            throw new Exception('L\'email est invalide !');
        } else {
            array_push($final_check, 0);
            $get_mail = $db->prepare('SELECT e_mail FROM members WHERE e_mail = :e_mail');
            $get_mail->execute(
                array(
                'e_mail' => $email_strip
                )
            );
            $check_mail_taken = ($donnees = $get_mail->fetch());
            $get_mail->closeCursor();
    
            if ($check_mail_taken) {
                array_push($final_check, 1);
                $mail_taken = false;
                throw new Exception('L\'email : ' . $email_strip . ' est déjà utilisé !');
            } else {
                array_push($final_check, 0);
                $mail_taken = true;
            }
        }        
    
        if ($pass_chars != $pass_check_chars) {
            array_push($final_check, 1);
            throw new Exception('Le mot de passe doit être le même que le mot mot de passe de vérification !');
        } else {
            array_push($final_check, 0);
        }
    
        if (implode('', $final_check) == '000000') {
            $pass_hache = password_hash($pass_chars, PASSWORD_DEFAULT);
            $member = $db->prepare('INSERT INTO members(last_name, first_name, birth_date, member_age, gender, city, e_mail, pass, hobbies, inscription_date) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE())');
            $created_account = $member->execute(
                array(
                $last_name_strip,
                $first_name_strip,
                $birth_date,
                $person_age,
                $gender_strip,
                $city_strip,
                $email_strip,
                $pass_hache,
                $hobbies_join
                )
            );
            return $created_account;
        }
    }

    public function connection($email, $pass)
    {
        $db = $this->connectDb();

        if (!empty($email) && !empty($pass)) {
            $email_strip = htmlspecialchars($email);
            $pass_strip = strip_tags($pass);
        
            $get_email_password = $db->prepare('SELECT * FROM members WHERE e_mail = :e_mail');  
            $get_email_password->execute(
                array(
                'e_mail' => $email_strip
                )
            );
            
            $result= $get_email_password->fetch();
        
            $get_email_password->closeCursor();
            
            if (!$result) {
                throw new Exception('Mauvais email ou mot de passe !');
            } else {
                $isPasswordCorrect = password_verify($pass_strip, $result['pass']);
                if ($isPasswordCorrect) {
                    $_SESSION['id_member'] = $result['id_member'];
                    $_SESSION['last_name'] = $result['last_name'];
                    $_SESSION['first_name'] = $result['first_name'];
                    $_SESSION['birth_date'] = $result['birth_date'];
                    $_SESSION['member_age'] = $result['member_age'];
                    $_SESSION['gender'] = $result['gender'];
                    $_SESSION['city'] = $result['city'];
                    $_SESSION['e_mail'] = $result['e_mail'];
                    $_SESSION['hobbies'] = $result['hobbies'];
                    $_SESSION['inscription_date'] = $result['inscription_date'];
                } else {
                    throw new Exception('Mauvais email ou mot de passe !');
                }
            }
        }
    }

    public function disconnectAccount()
    {
        $_SESSION = array();
        session_destroy();
    }

    public function changeEmail($id_member, $new_mail)
    {
        $db = $this->connectDb();
        $email_strip = htmlspecialchars($new_mail);
        $mail_taken = false;
        $final_check = [];

        if (!preg_match('#^[a-zA-Z0-9-_\.]+@[a-z]+\.[a-z]{2,4}$#', $email_strip)) {
            array_push($final_check, 1);
            throw new Exception('Email invalide !');
        } else {
            array_push($final_check, 0);
            $get_mail = $db->prepare('SELECT e_mail FROM members WHERE e_mail = :e_mail');
            $get_mail->execute(
                array(
                'e_mail' => $email_strip
                )
            );
            $check_mail_taken = ($donnees = $get_mail->fetch());
            $get_mail->closeCursor();
    
            if ($check_mail_taken) {
                array_push($final_check, 1);
                $mail_taken = false;
                throw new Exception('L\'email : ' . $email_strip . ' est déjà utilisé !');
            } else {
                array_push($final_check, 0);
                $mail_taken = true;
            }
        }

        if (implode('', $final_check) == '00') {
            $change_mail = $db->prepare('UPDATE members SET e_mail = :e_mail WHERE id_member = :id_member');
            $change_mail->execute(
                array(
                'e_mail' => $email_strip,
                'id_member' => $id_member
                )
            );
            $_SESSION['e_mail'] = $email_strip;
            return true;
        } else {
            return false;
        }
    }

    public function changePass($id_member, $new_pass)
    {
        $db = $this->connectDb();
        $pass_hache = strip_tags(password_hash($new_pass, PASSWORD_DEFAULT));
    
        $change_password = $db->prepare('UPDATE members SET pass = :pass WHERE id_member = :id_member');
        $change_password->execute(
            array(
            'pass' => $pass_hache,
            'id_member' => $id_member
            )
        );
    }

    public function deleteAccount($id_member)
    {
        $db = $this->connectDb();
    
        $change_password = $db->prepare('UPDATE members SET last_name = "", first_name  = "", birth_date  = CURDATE(), member_age  = 0, gender  = "", city = "null", e_mail = "null", pass = "", hobbies = "null", inscription_date = CURDATE() WHERE id_member = :id_member');
        $change_password->execute(
            array(
            'id_member' => $id_member
            )
        );

    }
}