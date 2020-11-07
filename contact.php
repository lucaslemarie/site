<?php
if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"Lucas Lemarié"<lucas.lemarie2002@gmail.com>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';

		$message='
		<html>
			<body>
				<div align="center">
					<br />
					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					<br />
					'.nl2br($_POST['message']).'
					<br />
				</div>
			</body>
		</html>
		';

		mail("lucas.lemarie2002@gmail.com", "CONTACT - Lucas Lemarié", $message, $header);
		$msg="Votre message a bien été envoyé !";
	}
	else
	{
		$msg="Tous les champs doivent être complétés !";
	}
}
?>
<center>
<div class="contact">
		<h2 id="cont">Me contacter </h2>
		<form method="POST" action="">
      <label for="nom" class="label">Nom<sup>*</sup> :</label>
			<input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
      <label for="mail" class="label">Email<sup>*</sup> :</label>
			<input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
      <label for="message" class="label">Commentaire<sup>*</sup> :</label>
			<textarea name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br />
			<input type="submit" value="Soumettre" name="mailform" id="Soumettre"/>
		</form>
		<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>
</div>
</center>
</html>
