<?php

echo 'ok';

ini_set("SMTP","ssl0.ovh.net");
ini_set("smtp_port","465");
try
{
    //Requete vers la BDD
    //METTRE LES COORDONNES DE LA BDD:  PDO('mysql:host=HOTE;dbname=NOM DE LA BDD;charset=utf8', 'USERNAME', 'PASSWORD');
$bdd = new PDO('mysql:host=mooveeclsgadmin.mysql.db:3306;dbname=mooveeclsgadmin;charset=utf8', 'mooveeclsgadmin', 'Moovee2019');

}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    echo "Can't connect to the DB";
    die('Erreur : '.$e->getMessage());

}

//On charge la date de demain pour la requete et pour l'affichage
$tomorrow = date("Y-m-d", strtotime('tomorrow'));
$tomorrowMess = date("d-m-Y", strtotime('tomorrow'));


//$datetime = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
//echo $datetime->format('Y-m-d');

//Requete cherchant tout les entretiens de demain
$reponse = $bdd->prepare('SELECT * FROM planned_cleaning WHERE planned_cleaning.valide is null AND planned_cleaning.date =:date');
$reponse->bindValue('date', $tomorrow, PDO::PARAM_STR);
$reponse->execute();

//Pour chaque entretiens trouvés:
foreach ($reponse as $order){

    //On recupère l'utilisateur associé a l'entretien
    $user = $bdd->prepare('SELECT * FROM moovee_users WHERE moovee_users.id = :iduser');
    $user->bindValue('iduser', $order['userid_id'], PDO::PARAM_INT);
    $user->execute();

    //On récupère son email
    foreach ($user as $email) {
        $mail = $email['email'];
    }
    //echo  $order['id']."<br>";

    //On met en place l'affichage de l'heure dans le mail (on verifie juste si les minutes sont en dessous de 10 et donc si il y a besoin d'un 0 devant le chiffre.
    $minstart = "";
    if ($order['planned_start']%60<10){
        $minstart = "0";
    }
    $minstart .= $order['planned_start']%60;

    $minend = "";
    if ($order['planned_end']%60<10){
        $minend = "0";
    }
    $minend .= $order['planned_end']%60;



    //On prépare le mail

    //Destinataire.
    $to      = $mail;
    $to	     = 'sebastien@moovee.lu';

    //Sujet
    $subject = 'MooveeClean Reminder';

    //Mail
    $message = '
	<html><body>
	<div>
        <h1 style="text-align:center;font-family:Arial,Helvetica,sans-serif">Moove<span style="color:#30c794">e</span> Clean</h1>
        <br>
        <br>
        <p style="font-family:Calibri">
            Dear Member,
        </p>
        <p style="font-family:Calibri">
            This is a reminder from <a href="https://moovee-clean.lu" target="_blank" data-saferedirecturl="https://moovee-clean.lu">moovee-clean.lu</a>
        </p>
        <p style="font-family:Calibri">
            You have an order for tomorrow '. $tomorrowMess .' from '. round($order['planned_start']/60) .':'. $minstart .' To '. round($order['planned_end']/60) .':'. $minend .'.
        </p>
        <p style="font-family:Calibri">
            <strong style="color:darkorange">This e-mail is strictly personal, please dont forward it.</strong>
        </p>
        <p style="font-family:Calibri">
            Have a great day !
        </p>
        <p style="font-family:Calibri;font-weight:bold">
            Moove<span style="color:#30c794">e</span> Clean Team
        </p>

        <br><img src="https://ci5.googleusercontent.com/proxy/H9HGt1ul3YK0M7zL6Sz0HoaBT07HnI0qmDrG_ZH4C7xNkb55TfmD3w4cNyG6HJAI9rtOu7owaPb4PrQvnPapJR_-Jf7-kTe04SEvIJxT2rcbTfAMdtRksZK1h-iCFCioMOCSzyXtOiWvdZiix0Q0o8eyCh2aja-q2bPVBxwtM4S5shENhugy=s0-d-e1-ft#http://9qgv.mjt.lu/oo/AMIAADa-44cAAAAAAAAAAI3ix5wAAABEon4AAAAAAAxJBgBctI3-_dZD6syOTBCPuIhsZ49yTgAMT70/1a150f2d/e.gif" height="1" width="1" alt="" border="0" style="height:1px;width:1px;border:0" class="CToWUd"><div class="yj6qo"></div><div class="adL">
        </div></div>
	</body></html>';

    //En-tête
    //$headers = 'From: noreply@moovee.lu' . "\r\n" .
      //  'Reply-To: noreply@moovee.lu' . "\r\n" .
	//'MIME-Version: 1.0\r\n' .
        //'X-Mailer: PHP/' . phpversion() .
	//'Content-Type: text/html; charset=ISO-8859-1\r\n';

	$headers = 'From: noreply@moovee.lu' . '\r\n';
	$headers .= 'Reply-To: noreply@moovee.lu' . '\r\n';
	$headers .= 'MIME-Version: 1.0' . '\r\n';
	$headers .= 'Content-Type: text/html; charset=ISO-8859-1\r\n';

echo $headers;
    //Envoie du mail
    mail($to, $subject, $message, $headers);
    //echo $message;
}