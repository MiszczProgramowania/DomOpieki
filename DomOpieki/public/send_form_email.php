<?php
/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 5/28/2016
 * Time: 9:22 PM
 */

if(isset($_POST['email'])) {



    // EDIT THE 2 LINES BELOW AS REQUIRED

    //$email_to = "dompomocy@op.pl";
    $email_to = "budzyn.grzegorz.it@gmail.com";

    $email_subject = "Skontaktowano się za pomocą formularza na stronie ddp.mikolow.eu";





    function died($error) {

        // your error code can go here
        echo $error."<br /><br />";
        echo '<a href="/">Powrót na stronę</a>';

        die();

    }

    // validation expected data exists

    if(!isset($_POST['first_name']) ||

        !isset($_POST['last_name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['phone']) ||

        !isset($_POST['comments'])) {

        died('Błąd formularza');

    }



    $first_name = $_POST['first_name']; // required

    $last_name = $_POST['last_name']; // required

    $email_from = $_POST['email']; // required

    $phone = $_POST['phone']; // not required

    $comments = $_POST['comments']; // required



    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {

        $error_message .= '<div class="alert alert-danger" role="alert">
       Imię wydaje się nie poprawne!<br/>

    </div><br />';

    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$first_name)) {

        $error_message .= '<div class="alert alert-danger" role="alert">
       Imię wydaje się nie poprawne!<br/>

    </div><br />';

    }

    if(!preg_match($string_exp,$last_name)) {

        $error_message .= '<div class="alert alert-danger" role="alert">
       Nazwisko wydaje się nie poprawne!<br/>

    </div>';

    }

    if(strlen($comments) < 2) {

        $error_message .= '<div class="alert alert-danger" role="alert">
       Opis wydaje się nie poprawny!<br/>
  
    </div>';

    }

    if(strlen($error_message) > 0) {

        died($error_message);

    }

    $email_message = "Form details below.\n\n";



    function clean_string($string) {

        $bad = array("content-type","bcc:","to:","cc:","href");

        return str_replace($bad,"",$string);

    }



    $email_message .= "First Name: ".clean_string($first_name)."\n";

    $email_message .= "Last Name: ".clean_string($last_name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Telephone: ".clean_string($phone)."\n";

    $email_message .= "Comments: ".clean_string($comments)."\n";





// create email headers

    $headers = 'From: '.$email_from."\r\n".

        'Reply-To: '.$email_from."\r\n" .

        'X-Mailer: PHP/' . phpversion();

    @mail($email_to, $email_subject, $email_message, $headers);

    ?>
    <div class="alert alert-success" role="alert">
        Dziękujemy za kontakt twój mail został wysłany!<br/>
        <a href="/">Powrót na stronę</a>
    </div>

    <?php

}

?>