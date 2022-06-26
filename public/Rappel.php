<?php


ini_set("SMTP","ssl0.ovh.net");
ini_set("smtp_port","465");


use App\Mail\ReponseMail;
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
$reponse = $bdd->prepare('SELECT * FROM planned_cleaning WHERE planned_cleaning.valide is null AND planned_cleaning.supprime is null AND planned_cleaning.date =:date');
$reponse->bindValue('date', $tomorrow, PDO::PARAM_STR);
$reponse->execute();

//Pour chaque entretiens trouvés:
foreach ($reponse as $order){

    //On recupère l'utilisateur associé a l'entretien
    $user = $bdd->prepare('SELECT * FROM moovee_users WHERE moovee_users.id = :iduser AND planned_cleaning.supprime is null');
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


    $message = new ReponseMail();
    $message->sendRappel2($mail, $tomorrowMess, round($order['planned_start'] / 60) . ':' . $minstart,  round($order['planned_end'] / 60) . ':' . $minend);
    
  
}