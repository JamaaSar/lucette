<?php

namespace App\Mail;

use App\Entity\MooveeUsers;
use \Mailjet\Resources;


class ReponseMail
{

    /**
     * Mail for forget pass
     */
    public function sendMailForgetPass(MooveeUsers $client, String $password)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $client->getEmail()
                        ],
                    ],
                    "TemplateID" => 1834565,
                    "TemplateLanguage" => true,
                    "Variables" => [
                        "password" => $password
                    ]
                ]
            ]
        ];
        $mj->post(Resources::$Email, ['body' => $body]);
    }
    /**
     * Mail for sign up
     */
    public function sendMailSignUp(MooveeUsers $client, string $token)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $client->getEmail()
                        ]
                    ],
                    "TemplateID" => 1834483,
                    "TemplateLanguage" =>  true,
                    "Variables" => [
                        "confirmation_link" => "https://lucette.market/app/public/confirmation/$token"

                    ]
                ]
            ]

        ];
        $mj->post(Resources::$Email, ['body' => $body]);
    }
    /**
     * Send notification to remind that user have a order
     */
    public function sendNotif($order,  $dateOrder,  $orderStart,  $orderEnd,  $car)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [

                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $order,
                        ]

                    ],

                    "TemplateID" => 1839723,
                    "TemplateLanguage" =>  true,
                    "Variables" => [

                        "date" => $dateOrder,
                        "start" => $orderStart,
                        "end" => $orderEnd,
                        'car' => $car
                    ]
                ]
            ]
        ];
        $result = $mj->post(Resources::$Email, ['body' => $body]);
    }
    /**
     * send mail confirmation to user afteer order
     */
    public function sendReservation($order,  $facture,  $dateService,  $product,  $option, $price, $icsDocument)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [

                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $order,
                        ],
                        [
                            "Email" => "contact@lucette.market"
                        ]
                    ],

                    "TemplateID" => 1834611,
                    "TemplateLanguage" =>  true,
                    "html" => "<html><embed src=\"cid:id1\"></html>",
                    "Variables" => [
                        "cleanning_facture" => $facture,
                        "date" => $dateService,
                        "product" => $product,
                        'option' => $option,
                        'price' => $price
                    ],
                    "Attachments" => [
                        [
                            'ContentType' => "text/calendar",
                            'Filename' => "Appointment.ics",
                            'Base64Content' => $icsDocument
                        ]
                    ]
                ]
            ]
        ];
        $mj->post(Resources::$Email, ['body' => $body]);
    }
    public function sendReservationIndirect($order,  $dateService,  $product,  $option, $price, $icsDocument)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [

                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $order,
                        ],
                        [
                            "Email" => "contact@lucette.market"
                        ]
                    ],

                    "TemplateID" => 1834611,
                    "TemplateLanguage" =>  true,
                    "html" => "<html><embed src=\"cid:id1\"></html>",
                    "Variables" => [
                        "date" => $dateService,
                        "product" => $product,
                        'option' => $option,
                        'price' => $price
                    ],
                    "Attachments" => [
                        [
                            'ContentType' => "text/calendar",
                            'Filename' => "Appointment.ics",
                            'ContentID' => "id1",
                            'Base64Content' => $icsDocument
                        ]
                    ]
                ]
            ]
        ];
        $mj->post(Resources::$Email, ['body' => $body]);
    }
    /**
     * Send mail support
     */
    public function sendMailSupport($userfirstname, $suerlastname, $usermail, $usernumber, $object, $service, $contenu)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [

                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => 'contact@lucette.market'
                        ]
                    ],

                    "TemplateID" => 1560339,
                    "TemplateLanguage" =>  true,
                    "Variables" => [
                        "user_firstname" => $userfirstname,
                        "user_lastname" => $suerlastname,
                        "user_mail" => $usermail,
                        "user_number" => $usernumber,
                        "object" => $object,
                        "service" => $service,
                        "message" => $contenu
                    ]
                ]
            ]

        ];
        $mj->post(Resources::$Email, ['body' => $body]);
    }
    /**
     * Send rappel msg to user
     */
    public function sendRappel2($order,  $dateOrder,  $orderStart,  $orderEnd)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [

                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $order,
                        ]
                    ],

                    "TemplateID" => 1839723,
                    "TemplateLanguage" =>  true,
                    "Variables" => [

                        "date" => $dateOrder,
                        "start" => $orderStart,
                        "end" => $orderEnd,
                    ]
                ]
            ]
        ];
        $mj->post(Resources::$Email, ['body' => $body]);
    }

    /**
     * send mail by code company
     */
    function sendMailByCodeCompany($email, $date,  $stime,  $etime)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $email
                        ]
                    ],
                    "TemplateID" => 1572350,
                    "TemplateLanguage" =>  true,
                    "Variables" => [
                        "date" => $date,
                        "start" => $stime,
                        "end" => $etime,
                    ]
                ]
            ]
        ];
        $result = $mj->post(Resources::$Email, ['body' => $body]);
    }

    /**
     * Send mail to user to inform change of day/time
     */
    function sendMailToUser($email, $date, $start, $end, $newdate, $newstart, $newend, $message)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $email
                        ]
                    ],
                    "TemplateID" => 1839760,
                    "TemplateLanguage" =>  true,
                    "Variables" => [
                        "date" => $date,
                        "start" => $start,
                        "end" => $end,
                        "date1" => $newdate,
                        "start1" => $newstart,
                        "end1" => $newend,
                        "message" => $message,


                    ]
                ]
            ]
        ];
        $mj->post(Resources::$Email, ['body' => $body]);
    }

    /**
     * Send mail to provider for inform that they have a new order to validate
     * */
    function sendMailToProvider($email, $name, $date,  $location, $id, $product,  $option, $icsDocument)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $email
                        ]
                    ],
                    "TemplateID" => 1839878,
                    "TemplateLanguage" =>  true,
                    "html" => "<html><embed src=\"cid:id1\"></html>",
                    "Variables" => [
                        "name" => $name,
                        "date" => $date,
                        "location" => $location,
                        "acceptlink" =>  "https://lucette.market/app/public/provider/provideracceptedmail/$id",
                        "cancellink" => "https://lucette.market/app/public/provider/providercanceled/$id",
                        "editlink" => "https://lucette.market/app/public/provider/provideredited/$id",
                        "product" => $product,
                        'option' => $option,
                    ],
                    "Attachments" => [
                        [
                            'ContentType' => "text/calendar",
                            'Filename' => "Appointment.ics",
                            'Base64Content' => $icsDocument
                        ]
                    ]
                ]
            ]
        ];
        $result = $mj->post(Resources::$Email, ['body' => $body]);
    }
    /**
     * Send mail to provider for inform that they have a new order
     * */
    function sendMailDirectToProvider($email, $name, $date,  $location,   $product,  $option, $icsDocument)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $email
                        ]
                    ],
                    "TemplateID" => 1881378,
                    "TemplateLanguage" =>  true,
                    "html" => "<html><embed src=\"cid:id1\"></html>",
                    "Variables" => [
                        "name" => $name,
                        "date" => $date,
                        "location" => $location,
                        "product" => $product,
                        'option' => $option,
                    ],
                    "Attachments" => [
                        [
                            'ContentType' => "text/calendar",
                            'Filename' => "Appointment.ics",
                            'Base64Content' => $icsDocument
                        ]
                    ]
                ]
            ]
        ];
        $result = $mj->post(Resources::$Email, ['body' => $body]);
    }
    /**
     * send mail to user to inform cancellation
     */
    function sendCancelMailToUser($email, $date, $from, $to, $message)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $email
                        ]
                    ],
                    "TemplateID" => 1839854,
                    "TemplateLanguage" =>  true,
                    "Variables" => [
                        "message" => $message,
                        "date" => $date,
                        "from" => $from,
                        "to" => $to



                    ]
                ]
            ]
        ];
        $result = $mj->post(Resources::$Email, ['body' => $body]);
    }
    /**
     * send mail to provider to inform cancellation
     */
    function sendCancelMailToProvider($email, $date, $from, $to)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $email
                        ]
                    ],
                    "TemplateID" => 1839863,
                    "TemplateLanguage" =>  true,
                    "Variables" => [
                        "date" => $date,
                        "from" => $from,
                        "to" => $to



                    ]
                ]
            ]
        ];
        $result = $mj->post(Resources::$Email, ['body' => $body]);
    }
    /**
     * send mail to provider to inform confirmation
     */
    function sendConfirmMailToProvider($email, $dateofservice)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => $email
                        ]
                    ],
                    "TemplateID" => 1839876,
                    "TemplateLanguage" =>  true,
                    "Variables" => [
                        "date" => $dateofservice,



                    ]
                ]
            ]
        ];
        $result = $mj->post(Resources::$Email, ['body' => $body]);
    }


    public function sendRappelWeekly($service)
    {
        $mj = new \Mailjet\Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [

                    "From" => [
                        "Email" => "contact@lucette.market"
                    ],
                    "To" => [
                        [
                            "Email" => "saruul.jamaa@gmail.com",
                        ]
                    ],

                    "TemplateID" => 1819789,
                    "TemplateLanguage" =>  true,
                    "Variables" => [

                        "service" => $service,
                    ]
                ]
            ]
        ];
        $result = $mj->post(Resources::$Email, ['body' => $body]);
    }
}
