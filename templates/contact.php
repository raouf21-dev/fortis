<?php
$title = 'Contact';
require_once 'header.php';

$msg = '';
$msgClass = '';

$name = $emailFrom = $subject = $phone = $message = "";
function verifyInput($var){
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);

    return $var;
}

if(isset($_POST['submit']))
{
    $name        = verifyInput(htmlspecialchars($_POST['name']));
    $emailFrom   = verifyInput(htmlspecialchars($_POST['email']));
    $phone       = verifyInput(htmlspecialchars($_POST['phone']));
    $message     = verifyInput(htmlspecialchars($_POST['message']));

    if(empty($name) || empty($emailFrom) || empty($message))
    {
        $msg = "Veuillez remplir tous les champs requis";
        $msgClass = "alert-danger";
    }
    else if(empty($name))
    {
        $msg = "Veuillez entrer votre nom";
        $msgClass = "alert-danger";
    }
    else if(empty($emailFrom)) 
    {
        $msg = "Veuillez entrer un email";
        $msgClass = "alert-danger";
    }
    else if(filter_var($emailFrom, FILTER_VALIDATE_EMAIL) === false)
    {
        $msg = "Veuillez entrer un email valide";
        $msgClass = "alert-danger";
    }
    else if(empty($message))
    {
        $msg = "Veuillez ecrir votre message ";
        $msgClass = "alert-danger";
    }
    else 
    {
        $mailTo = "stephanie.fortis@gmail.com";
        $headers = "De ".$emailFrom;
        $subject = "Contact - Mon Site";
        $txt = "Vous avez recu un mail de ".$name.".\n\n".$message;

        mail($mailTo, $subject, $txt, $headers);
        header("Location: home?mailsend");
    }

}

?>
    <div class="contact">
            <img src="images/contact us.jpg" alt="">
    </div>
    <a href="https://www.doctolib.fr/psychologue/villabe/stephanie-fortis?pid=practice-100598" class="doctolib" target="_blank">Visitez mon compte Doctolib</a>
    <div class="container contact-page">

        <h2>Contact</h2>
    <hr>
        <p>Veuillez utiliser le formulaire sur cette page pour envoyer un message. Vous pouvez également appeler ou envoyer un courriel à tout moment en utilisant les informations ci-dessous.</p>

        <i class="fas fa-phone-alt fa-2x"></i> <span class="contact-phone">+33 6 50 95 47 67</span>
        <i class="far fa-envelope fa-2x"></i> <span class="contact-email">stephanie.fortis@gmail.com</span>
        <form action="" class="contact-form" method="POST">
            <?php if($msg) :?>
                <div class="alert <?= $msgClass ?>"><?= $msg ?></div>
            <?php endif ?>
            <div>
                <label for="">Nom et Prénom <span class="etoile">*</span></label>
                <input type="text" id="name" name="name" class="form-input"  placeholder="Votre Nom" value="<?php echo $name?>">
            </div>
            <div>
                <label for="">E-mail <span class="etoile">*</span></label>
                <input type="text" id="email" name="email" class="form-input" placeholder="Votre Email" value="<?php echo $emailFrom?>">
            </div>
            <div>
                <label for="">Tél (Facultatif)</label>
                <input type="text" id="phone"  name="phone" class="form-input" placeholder="Votre Numéro" value="<?php echo $phone?>">
            </div>
            <div>
                <label for="">Message <span class="etoile">*</span></label>
                <textarea name="message" id="message"cols="30" rows="10" class="form-input" placeholder="Votre Message"><?php echo $message?></textarea >
            </div>
            <input type="submit" value="Envoyer" name="submit" class="submit-btn" >
        </form>
    </div>

<?php require_once 'footer.php'?>