<?php


$title = 'Home';
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

    if(empty($name) || empty($emailFrom) || empty($phone) || empty($message))
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
        $txt = "Vous avez recu un e-mail de ".$name.".\n\n".$message;

        mail($mailTo, $subject, $txt, $headers);
        header("Location: index.php?mailsend");
    }

}
?>  
<main class="main">
    <section class="showcase" id="showcase">     
        <div class="div">
            <h2>Votre premier pas vers le changement <br> commence ici</h2>
            <button class="btn" id="open-btn">Contactez-moi <span class="info-btn">pour plus d'informations </span></button>
        </div>
    </section>
    <a href="https://www.doctolib.fr/psychologue/villabe/stephanie-fortis?pid=practice-100598" class="doctolib" target="_blank">Visitez mon compte Doctolib</a>
    <div class="space">
    </div>
        <div class="psycho">
                <!-- modal -->
            <div class="modal-container" id="modal">
                <div class="modal">
                    <div class="close-btn" id="close">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="modal-header">
                        
                    </div>
                    <div class="modal-content">
                        <p>Veuillez utiliser le formulaire pour envoyer un message</p>
                        <form action="" class="modal-form" method="POST">
                            <div>
                                <label for="">Nom et Prénom <span class="etoile" required>*</span></label>
                                <input type="text" id="name" name="name" class="form-input"  placeholder="Votre Nom">
                            </div>
                            <div>
                                <label for="">E-mail <span class="etoile">*</span></label>
                                <input type="email" id="email" name="email" class="form-input" placeholder="Votre Email" required>
                            </div>
                            <div>
                                <label for="">Tél (facultatif)</label>
                                <input type="text" id="phone"  name="phone" class="form-input" placeholder="Votre Numéro">
                            </div>
                            <div>
                                <label for="" >Message <span class="etoile">*</span></label>
                                <textarea name="message" id="message"cols="30" rows="10" class="form-input" placeholder="Votre Message" required></textarea >
                            </div>
                            <button value="Envoyer" class="submit-btn">Envoyer</button>
                        </form>
                    </div>
                </div>  
            </div>
            <h1>Qu'est ce qu'un Psychologue. ?</h1>          
            <p>Le Psychologue est un professionnel au service de l'humain. Il prend en compte la personne dans sa globalité : dans sa dimension individuelle et dans sa relation avec les autres en interaction constante avec son environnement. Il amène la personne qui consulte à réfléchir sur son comportement et ses difficultés pour trouver des solutions et ainsi améliorer son bien-être et sa qualité de vie.
            </p>
            <hr>
            <p>
            Spécialiste du psychisme et du comportement humain, il peut également réaliser des analyses et des évaluations permettant de mettre en avant les fragilités psychiques ou exécutives.
            </p>
            <hr>
            <p>
            Le psychologue est soumis au Code de déontologie des Psychologues qui régit l'ensemble des droits et devoirs de la profession, tels que la discrétion professionnelle.
            </p>
        </div>
        <div class="parallax">
            <div class="flex">
            <div class="about-me">
                <img src="images/LVL_7608.JPG" alt="">
            </div>
            <div class="about-me info">
                <h3>Stéphanie Fortis</h3>
                <p><strong> 2013-2014   MASTER PSYCHOLOGIE</strong> 
                Spécialisation clinique du travail & Consultations psychosociologiques 
                Psychodynamique du travail - Connaissance des milieux - Analyse des pratiques - Conduites de groupe - Formation - Interventions  
                </p>
                <div class="hide-maitrise">
                <p>
                <strong>2012-2013 MAITRISE DE PSYCHOLOGIE</strong>  
                Spécialisation clinique de l’enfant et de l’adolescent 
                Approche clinique de l’échec scolaire - Courants théoriques - Les troubles du développement - Etudes de cas – Etude de la mémoire 
                Spécialisation clinique du travail 
                Analyses de contenu, discours, données - Gestion des conflits Institutions et organisations – Consulting - Psychologie sociale 
                </p>
                </div>
                <div class="hide"> <P>
                <strong> 2009-2012   LICENCE DE PSYCHOLOGIE</strong> 
                Psychologie de l’enfant - Psychologie interculturelle - Psychologie cognitive - Psychologie clinique - Neuropsychologie Psychanalyse - Psychologie du travail - Statistiques
                </p>
                </div>
                <a href="blog" class="btn-plus">Savoir plus</a>
            </div>
            </div>
        </div>
        <section class="services">
            <h2>Mes Services</h2>
            <hr>
            <div class="flex-contact">
                <figure>
                    <a href="enfant"><img src="images/troubleEnf.jpg" alt=""></a>
                    <figcaption>
                        <h3>Enfants</h3>
                        <p>Handicap : TSA, TDAH, Dys, Troubles du comportement...</p>
                    </figcaption>           
                </figure>
                <figure>
                    <a href="adulte"><img src="images/ado.jpg" alt=""></a>
                    <figcaption>
                        <h3>Adultes</h3>
                        <p>Accompagnement, Approches & Evaluations </p>
                    </figcaption>           
                </figure>
                <figure>
                    <a href="tests"><img src="images/test_ psycho.jpg" alt=""></a>
                    <figcaption>
                        <h3>Tests Psychotechniques </h3>
                        <p>Pour plus d'information veuillez cliquer su la bulle au-decu </p>
                    </figcaption>           
                </figure>
            </div>
        </section>
    </main>
    <?php require_once 'footer.php';?>