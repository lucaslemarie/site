<?php
    require ('assets/recaptcha/autoload.php');

    if(isset($_POST['submitpost'])){
        if(isset($_POST['g-recaptcha-response'])){
            if(!empty($_POST['g-recaptcha-response'])) {
                $recaptcha = new \ReCaptcha\ReCaptcha('6Ld0juAZAAAAANJZdNV6T9fplAcNLBNEAhlywqbh');
                $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
                if ($resp->isSuccess()) {

                    if(isset($_POST['email']))
                    {
                        if(!empty($_POST['firstname']) and !empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['message']))
                        {
                            $header ="MIMI-Version 1.0\r\n";
                            $header .= 'From: "web1-ll.local" <lucas.lemarie2002@gmail.com>' . "\n";
                            $header .='Content-Type:text/html; charset="utf-8"'. "\n";
                            $header .='Content-Transfer-Encoding: 8bit';


                            $message = '
                            <html>
                                <body>
                                    <ul>Prénom : '.$_POST['firstname']. '</ul>
                                    <ul>NOM : '.$_POST['name']. '</ul>
                                    <ul>adresse mail : '.$_POST['email']. '</ul>
                                    <ul>Message : '.nl2br($_POST['message']). '</ul>
                                </body>
                            </html>';
                            mail("lucas.lemarie2002@gmail.com", "Mail contact profil pro", $message, $header);
                            $msg="<p><i class='fas fa-check'></i> Votre message à bien été envoyé !</p>";
                        }else{
                            $msg="<p>Veuillez compléter tout les champs !</p>";
                        }
                    }
                }
            } else {
                $msg_captcha="<p> <i class='fas fa-times'></i> Merci de valider le captcha</p>";
            }
        }
    }

    if(isset($msg)) {
        echo $msg;
    }

    if(isset($msg_captcha)) {
        echo $msg_captcha;
    }
?>

<center>
<div class="contact">
		<h2 id="cont">Me contacter </h2>
		<form method="POST" action="index.php">
      <label for="nom" class="label">Nom<sup>*</sup> :</label>
			<input type="text" name="nom" id="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
      <label for="mail" class="label">Email<sup>*</sup> :</label>
			<input type="email" name="mail" id="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
      <label for="message" class="label">Commentaire<sup>*</sup> :</label>
			<textarea name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br />
			<input type="submit" value="Soumettre" name="mailform" id="message"/>
      <div class="g-recaptcha" data-sitekey="6Ld0juAZAAAAALL3VArQPysiEGBi97ef_nORlk_z"></div>
		</form>
</div>
</center>
