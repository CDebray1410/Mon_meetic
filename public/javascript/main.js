$(document).ready(
    function my_hover ()
    {
        $(".page__nav > li").mouseover(function() {
            $(this).children("ul").show();
        });
        $(".page__nav > li").mouseout(function() {
            $(this).children("ul").hide();
        });
    },

    $("#inscription_form").on("submit", function (event) {
        let last_name = $('#last_name');
        let first_name = $('#first_name');
        let birth_date = $('#birth_date');
        let birth_array = birth_date.val().split('-');
        let birth_year = birth_array[0];
        let current_year = new Date().getFullYear();
        let age = current_year - birth_year;
        let city = $('#city');
        let e_mail = $('#e_mail');
        let pass = $('#pass');
        let pass_check = $('#pass_check');
        let hobbies = $('[name="hobbies[]"]:checked').length;

        let name_error = $('#name_error'), name_valid = $('#valid_name_inscription');
        let birth_date_error = $('#birth_date_error'), birth_valid = $('#valid_birth');
        let city_error = $('#city_error'), city_valid = $('#valid_city');
        let e_mail_error = $('#e_mail_error'), email_valid = $('#valid_email_inscription');
        let pass_error = $('#pass_error'), pass_valid = $('#valid_inscription_pass');
        let pass_check_error = $('#pass_check_error'), pass_check_valid = $('#valid_inscription_check');
        let hobbies_error = $('#hobbies_error'), hobbies_valid = $('#valid_hobbies');
        let gender_valid = $('#valid_gender');
        
        if (last_name.val() === '' || first_name.val() === '') {
            name_error.text('Le nom ET le prénom sont requis !');
            name_valid.hide();
            event.preventDefault();
        } else if (last_name.val().length < 3 || first_name.val().length < 3) {
            name_error.text('3 caractère minimum pour le nom et le prénom !');
            name_valid.hide();
            event.preventDefault();
        } else {
            name_error.text('');
            name_valid.show();
        }

        if (birth_date.val() === '') {
            birth_date_error.text('Vous devez choisir une date de naissance !');
            birth_valid.hide();
            event.preventDefault();
        } else if (age <= 18) {
            birth_date_error.text('Vous devez avoir plus de 18 ans !');
            birth_valid.hide();
            event.preventDefault();
        } else {
            birth_date_error.text('');
            birth_valid.show();
        }

        gender_valid.show();

        if (city.val() === '') {
            city_error.text('Vous devez entrer le nom d\'une ville !');
            city_valid.hide();
            event.preventDefault();
        } else if (city.val() == 'null') {
            city_error.text('Le nom de la ville ne peut pas être null !');
            city_valid.hide();
            event.preventDefault();
        } else {
            city_error.text('');
            city_valid.show();
        }

        if (e_mail.val() === '') {
            e_mail_error.text('Vous devez entrer un email !');
            email_valid.hide();
            event.preventDefault();
        } else if (e_mail.val() == 'null') {
            e_mail_error.text('L\'email ne peut pas être null !');
            email_valid.hide();
            event.preventDefault();
        } else {
            e_mail_error.text('');
            email_valid.show();
        }

        if (pass.val() === '') {
            pass_error.text('Entrez un mot de passe !');
            pass_valid.hide();
            event.preventDefault();
        } else if (pass.val().length < 3) {
            pass_error.text('Le mot de passe doit faire au moins 3 charactères !');
            pass_valid.hide();
            event.preventDefault();
        } else {
            pass_error.text('');
            pass_valid.show();
        }

        if (pass_check.val() === '') {
            pass_check_error.text('Verifiez votre mot de passe !');
            pass_check_valid.hide();
            event.preventDefault();
        } else if (pass_check.val() !== pass.val()) {
            pass_check_error.text('Le mot de passe et sa vérification doivent être identique !');
            pass_check_valid.hide();
            event.preventDefault();
        } else {
            pass_check_error.text('');
            pass_check_valid.show();
        }

        if(hobbies < 1){
            hobbies_error.text('Veuillez sélectionner au moins un hobbie !');
            hobbies_valid.hide();
            event.preventDefault();
        }
        else{
            hobbies_error.text('');
            hobbies_valid.show();
        }
    }),

    $("#connection_form").on("submit", function (event) {
        let e_mail_connection = $('#e_mail');
        let pass_connection = $('#pass');
    
        let e_mail_error = $('#e_mail_connect_error'), email_connect_valid = $('#valid_email_connect');
        let pass_error = $('#pass_connect_error'), pass_connect_valid = $('#valid_pass_connect');
        let error_check = [];
    
        if (e_mail_connection.val() === '') {
            e_mail_error.text('Vous devez entrer un email !');
            email_connect_valid.hide();
            error_check.push('1');
        } else {
            e_mail_error.text('');
            email_connect_valid.show();
            error_check.push('0');
        }


        if (pass_connection.val() === '') {
            pass_error.text('Vous devez entrer un mot de passe !');
            pass_connect_valid.hide();
            error_check.push('1');
        } else if (pass_connection.val().length < 3) {
            pass_error.text('Le mot de passe doit faire au moins 3 charactères !');
            pass_connect_valid.hide();
            error_check.push('1');
        } else {
            pass_error.text('');
            pass_connect_valid.show();
            error_check.push('0');
        }
    
        let error_final_check = error_check.join('');
        if (error_final_check != 00) {
            event.preventDefault();
        } else {
            return true;
        }
    }),

    $('#change_pass').on("submit", function (event) {
        let new_pass = $('#new_pass');
        let new_pass_error = $('#new_pass_error');
        if (new_pass.val() === '') {
            new_pass_error.text('Le champ doit être rempli !');
            event.preventDefault();
        } else if (new_pass.val().length < 3) {
            new_pass_error.text('Le mot de passe doit faire au moins 3 charactères !');
            event.preventDefault();
        } else {
            new_pass_error.text('');
        }
    }),

    $('#change_email').on("submit", function (event) {
        let new_email = $('#new_email');
        let new_email_error = $('#new_email_error');
        if (new_email.val() === '') {
            new_email_error.text('Le champ doit être rempli !');
            event.preventDefault();
        } else {
            new_email_error.text('');
        }
    }),

)