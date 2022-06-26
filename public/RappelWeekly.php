<?php



require __DIR__ . '/../vendor/autoload.php';

use \Mailjet\Resources;

ini_set("SMTP", "ssl0.ovh.net");
ini_set("smtp_port", "465");

try {

  //  $bdd = new PDO('mysql:host=127.0.0.1:8889;dbname=mooveeclsgadmin;charset=utf8', 'mooveeclsgadmin', 'Moovee2020');
    //Requete vers la BDD
    //METTRE LES COORDONNES DE LA BDD:  PDO('mysql:host=HOTE;dbname=NOM DE LA BDD;charset=utf8', 'USERNAME', 'PASSWORD');
    $bdd = new PDO('mysql:host=mooveeclsgadmin.mysql.db:3306;dbname=mooveeclsgadmin;charset=utf8', 'mooveeclsgadmin', 'Moovee2019');

} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    echo "Can't connect to the DB";
    die('Erreur : ' . $e->getMessage());
}

$availabilitiesByParking = getAvailabilitiesByParking();

foreach ($availabilitiesByParking as $pa) {

    $users = findUserByAttachedParkings($pa['parking_id']);
    $services = getServicesByAttachedParking($pa['parking_id']);


    foreach ($services as $subArray) {
        foreach ($subArray as $val) {
            $newArray[] = $val;
        }
    }
    $unique = array_map("unserialize", array_unique(array_map("serialize", $newArray)));
    $servicesString = implode(', ', $unique);
    foreach ($users as $email) {
        $mail = $email['email'];
        $mj = new \Mailjet\Client('d7c9b622350292bb0c40c565134ca117', 'efee592de02d34ff47799949d32d7634', true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [

                    "From" => [
                        "Email" => "noreply@moovee.lu"
                    ],
                    "To" => [
                        [
                            "Email" => $mail,
                        ]
                    ],

                    "TemplateID" => 1770312,
                    "TemplateLanguage" =>  true,
                    "Variables" => [
                        "service" => $servicesString,
                    ]
                ]
            ]
        ];
        $result = $mj->post(Resources::$Email, ['body' => $body]);
    }
}

function findUserByAttachedParkings($id_parking)
{

    try {

       // $bdd = new PDO('mysql:host=127.0.0.1:8889;dbname=mooveeclsgadmin;charset=utf8', 'mooveeclsgadmin', 'Moovee2020');

        //Requete vers la BDD
        //METTRE LES COORDONNES DE LA BDD:  PDO('mysql:host=HOTE;dbname=NOM DE LA BDD;charset=utf8', 'USERNAME', 'PASSWORD');
        $bdd = new PDO('mysql:host=mooveeclsgadmin.mysql.db:3306;dbname=mooveeclsgadmin;charset=utf8', 'mooveeclsgadmin', 'Moovee2019');

    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        echo "Can't connect to the DB";
        die('Erreur : ' . $e->getMessage());
    }
    $user = $bdd->prepare('SELECT email, first_name FROM moovee_users 
                            JOIN moovee_company ON moovee_company.code_entreprise = moovee_users.code_company 
                            JOIN parkings ON parkings.company_id = moovee_company.id 
                            WHERE parkings.id = :id_parking AND moovee_users.is_deleted is null ');
    $user->bindValue('id_parking', $id_parking, PDO::PARAM_STR);
    $user->execute();
    return $user->fetchAll();
}
function getServicesByAttachedParking($code_entreprise_id)
{
    $currentDate = new \DateTime();
    $thisWeek = date("Y-m-d", strtotime($currentDate->format('Y-m-d')));
    
    try {


        //Requete vers la BDD
        //METTRE LES COORDONNES DE LA BDD:  PDO('mysql:host=HOTE;dbname=NOM DE LA BDD;charset=utf8', 'USERNAME', 'PASSWORD');
        $bdd = new PDO('mysql:host=mooveeclsgadmin.mysql.db:3306;dbname=mooveeclsgadmin;charset=utf8', 'mooveeclsgadmin', 'Moovee2019');

    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        echo "Can't connect to the DB";
        die('Erreur : ' . $e->getMessage());
    }
    $reponse = $bdd->prepare('SELECT categories.category FROM availability 
                                JOIN parkings ON availability.parking_id = parkings.id 
                                join category_provider on category_provider.id_provider_id = availability.provider_id
                                join category_location on category_location.id_category_id = category_provider.id_category_id
                                join categories  on categories.id = category_provider.id_category_id
                                WHERE availability.is_deleted = 0  and availability.affiche = 1 
                                AND category_location.id_location_id = :cid 
                                and availability.date >= :week1 
                                group by categories.category');
    $reponse->bindValue('cid', $code_entreprise_id, PDO::PARAM_INT);
    $reponse->bindValue('week1', $thisWeek, PDO::PARAM_STR);
    $reponse->execute();
    return $reponse->fetchAll();
}

function getAvailabilitiesByParking()
{
    $currentDate = new \DateTime();
    $thisWeek = date("Y-m-d", strtotime($currentDate->format('Y-m-d')));

    try {

        //$bdd = new PDO('mysql:host=127.0.0.1:8889;dbname=mooveeclsgadmin;charset=utf8', 'mooveeclsgadmin', 'Moovee2020');

        //Requete vers la BDD
        //METTRE LES COORDONNES DE LA BDD:  PDO('mysql:host=HOTE;dbname=NOM DE LA BDD;charset=utf8', 'USERNAME', 'PASSWORD');
        $bdd = new PDO('mysql:host=mooveeclsgadmin.mysql.db:3306;dbname=mooveeclsgadmin;charset=utf8', 'mooveeclsgadmin', 'Moovee2019');

    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        echo "Can't connect to the DB";
        die('Erreur : ' . $e->getMessage());
    }
    $reponse = $bdd->prepare('SELECT * FROM availability 
                                WHERE availability.is_deleted = 0  and availability.affiche = 1  
                                and availability.date >= :week1 
                                group by parking_id
                             ');

    $reponse->bindValue('week1', $thisWeek, PDO::PARAM_STR);
    $reponse->execute();
    return $reponse->fetchAll();
}
