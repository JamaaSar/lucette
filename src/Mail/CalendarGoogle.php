<?php

namespace App\Mail;


use Google_Client;
use App\Entity\EventsFromGCalendar;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



/**
 * @Route("/", name="google_")
 */
class CalendarGoogle extends AbstractController
{
 

    function getClient()
    {

        $promp = "consent";

        $client = new Google_Client();
        $client->setAuthConfig(__DIR__ . '/credentials.json');
        $client->setScopes(\Google_Service_Calendar::CALENDAR);

        $client->setAccessType('offline');
        $client->setDeveloperKey('AIzaSyBsb7FY29E9lVZXonLjkgu5VNS4qAEY0x8');
        $client->setPrompt($promp);

      

    
        return $client;
    }

    public function authentication($client)
    {

        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $auth_url = $client->createAuthUrl();
                header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));

            }
        }
    }

    public function addEvent($calendarId, $client, $summary, $location, $start, $end, $color){

        //$client->fetchAccessTokenWithAuthCode($googleToken);

        $service = new \Google_Service_Calendar($client);

        $event = new \Google_Service_Calendar_Event(array(
            'summary' => $summary,
            'location' => $location,
            'description' => 'Disponible',
            'colorId' => $color,
            'start' => array(
                'dateTime' => $start,
                'timeZone' => 'Europe/Luxembourg',
            ),
            'end' => array(
                'dateTime' => $end,
                'timeZone' => 'Europe/Luxembourg',
            ),


        ));
     
        $newEvent = $service->events->insert($calendarId, $event);
      

        return $newEvent;

       

    }
    public function delete($client, $calendarId, $eventId)
    {

        $service = new \Google_Service_Calendar($client);
        $service->events->delete($calendarId, $eventId);
    }

    public function getAllEvent($client, $calendarId){


        $service = new \Google_Service_Calendar($client);
        $optParams = array(
            'maxResults' => 10,
            'orderBy' => 'startTime',
            'singleEvents' => true,
            'timeMin' => date('c'),
        );
        $results = $service->events->listEvents($calendarId, $optParams);
        $events = $results->getItems();

        if (empty($events)) {
            print "No upcoming events found.\n";
        } else {
            print "Upcoming events:\n";
            foreach ($events as $event) {
                $start = $event->start->dateTime;
                if (empty($start)) {
                    $start = $event->start->date;
                }
                printf("%s (%s)\n",$event->getId(), $event->getSummary(), $start);
            }
        }

    }

    public function getEvent($client, $calendarId, $eventId)
    {
        $service = new \Google_Service_Calendar($client);
        $event = $service->events->get($calendarId, $eventId);

        return $event;
    }
    public function update($client, $calendarId, $event)
    {

        $service = new \Google_Service_Calendar($client);
        $service->events->update($calendarId, $event->getId(), $event);
    }
    public function getAllCalendar($client)
    {
        $service = new \Google_Service_Calendar($client);
         $calendarList = $service->calendarList->listCalendarList();
        

        return $calendarList;
    }
}
