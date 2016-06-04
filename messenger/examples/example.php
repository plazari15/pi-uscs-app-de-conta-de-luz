<?php

// Welcome Message Template. Includes two buttons
$welcome_message = array(
    'button' => array(

        'text' => "Hi mate, thanks god, you are here. Let's start talking man. Do you like cars?",

        'buttons' => array(
            // Button can be postback or web url
            array(
                'title' => 'Yes',
                'type' => 'postback',
                'payload' => 'UserClickYes'
            ),

            array(
                'title' => 'No',
                'type' => 'postback',
                'payload' => 'UserClickNo'
            )
        )
    )
);


$help_text = array(
    'button' => array(
        'text' => "Let's talk about bot features. Bot can send message in various format, for example, buttons below, and:",
        'buttons' => array(
            array(
                'title' => 'Text',
                'type' => 'postback',
                'payload' => 'UserClickText'
            ),

            array(
                'title' => 'Image',
                'type' => 'postback',
                'payload' => 'UserClickImage'
            ),

            array(
                'title' => 'Custom Template',
                'type' => 'postback',
                'payload' => 'UserClickCustomTemplate'
            ),
        )
    )
);

$cars = array(
    // A generic bubble
    array(
        "title" => "Lamborghini",
        "image_url" => "http://pictures.topspeed.com/IMG/crop/201603/2016-lamborghini-centenar-5_800x0w.jpg",
        "subtitle" => "Amazing speed",
        "buttons" => array(
            array(
                "type" => "web_url",
                "url" => "https://lamborghini.com",
                "title" => "Buy Now"
            ),
            array(
                "type" => "postback",
                "payload" => "BuyLamborghiniTomorrow",
                "title" => "Buy Tomorrow"
            )
        )
    ),

    // Another generic bubble
    array(
        "title" => "Rolls Royce",
        "image_url" => "http://static.robbreport.com/sites/default/files/images/articles/2015Sep/1642581//rolls-royce-dawn-02.jpg",
        "subtitle" => "Most Luxury Car",
        "buttons" => array(
            array(
                "type" => "web_url",
                "url" => "https://www.rolls-roycemotorcars.com/en-GB/home.html",
                "title" => "Buy Now"
            ),
            array(
                "type" => "postback",
                "payload" => "BuyRollsRoyceTomorrow",
                "title" => "Buy Tomorrow"
            )
        )
    ),

    // Yet another generic bubble
    array(
        "title" => "Ferrari",
        "image_url" => "https://cdn1.vox-cdn.com/thumbor/-pG8Dcb_qtRf6te3ug12FHhqUDs=/1020x0/cdn0.vox-cdn.com/uploads/chorus_asset/file/4156848/Ferrari_F12tdf_3low.0.jpg",
        "subtitle" => "I like the horse",
        "buttons" => array(
            array(
                "type" => "web_url",
                "url" => "http://www.ferrari.com/en_en/",
                "title" => "Buy Now"
            ),
            array(
                "type" => "postback",
                "payload" => "BuyFerrariTomorrow",
                "title" => "Buy Tomorrow"
            )
        )
    ),
);

$receipt = array(
    'type' => 'receipt',
    'content' => array(
        "name" => "Stephane Crozatier",
        "order_number" => time(),
        "currency" => "USD",
        "payment_method" => "Visa 2345",
        "order_url" => "http://petersapparel.parseapp.com/order?order_id=123456",
        "elements" => [
            [
                "title" => "Classic White T-Shirt",
                "subtitle" => "100% Soft and Luxurious Cotton",
                "quantity" => 2,
                "price" => 50,
                "currency" => "USD",
                "image_url" => "http://petersapparel.parseapp.com/img/whiteshirt.png"
            ],
            [
                "title" => "Classic Gray T-Shirt",
                "subtitle" => "100% Soft and Luxurious Cotton",
                "quantity" => 1,
                "price" => 25,
                "currency" => "USD",
                "image_url" => "http://petersapparel.parseapp.com/img/grayshirt.png"
            ]
        ],
        "address" => [
            "street_1" => "1 Hacker Way",
            "street_2" => "",
            "city" => "Menlo Park",
            "postal_code" => "94025",
            "state" => "CA",
            "country" => "US"
        ],
        "summary" => [
            "subtotal" => 75.00,
            "shipping_cost" => 4.95,
            "total_tax" => 6.19,
            "total_cost" => 56.14
        ],
        "adjustments" => [
            [
                "name" => "New Customer Discount",
                "amount" => 20
            ],
            [
                "name" => "$10 Off Coupon",
                "amount" => 10
            ]
        ]
    )
);

$answers = array(
    // Set welcome message to send when people click "Get started"
    'welcome:' => $welcome_message,

    // Set welcome message to send when people say something contains "Hello"
    '%hello%' => $welcome_message,

    // When user like cars. Show a generic template. A generic can contains up to three bubbles.
    'payload:UserClickYes' => array(
        // Show the cars list
        'generic' => $cars,

        // Continue the message by send a text
        'Cool, now start with more advanced features, type `help` to get help information.'
    ),

    'Get receipt' => $receipt,

    'help' => $help_text,

    'payload:UserClickText' => array(
        "This is the text message sent by bot.",
        "You can send up to three responses each time",
    ),

    'payload:UserClickImage' => array(
        array(
            'type' => 'image',
            'content' => 'https://img0.etsystatic.com/020/0/9066975/il_fullxfull.553914598_pts0.jpg'
        )
    ),

    'payload:UserClickCustomTemplate' => array(
        'generic' => $cars
    ),

    '%bye%' => "Nice chat. We hope you like this bot",

    'default:' => "Sorry, bot don't understand what you said, this is the default message feature appear when user text message or click on buttons which not defined. Type `help` to continue :)"
);

// Create an instance of FacebookMessengerBot class
$bot = new FacebookMessengerBot($answers);


// You can add answers later like so:
// Bot says: "Ding ding ding ding ding ding!" when people ask "What does the fox says?"
$bot->answers('What does the fox says?', 'Ding ding ding ding ding ding!');

//When people ask: "I am Heisenberg", bot say: "Hail Heisenberg"
$bot->answers('regex:/I am .*/i', function($answer){
    /** @var $answer FacebookMessageResponse */
    $received = $answer->getFacebookMessageReceived()->getText();
    $answer->response('Hail ' . substr($received, 5));
});

$bot->answers('Say my name', function ($answer) {
    /** @var $answer FacebookMessageResponse */
    $myinfo = $answer->getFacebookMessageReceived()->getUserInfo();
    if (!empty($myinfo->error)) {
        $answer->response('image:https://s-media-cache-ak0.pinimg.com/736x/f0/26/05/f0260599e1251c67eefca31c02a19a81.jpg');
        $answer->response(array(
            'type' => 'text',
            'content' => 'You need page_messaging permission to get user informations'
        ));
        return;
    }
    $answer->response(array(
        'type' => 'text',
        'content' => 'Your name is: ' . $myinfo->first_name . ' ' . $myinfo->last_name
    ));
});

// More example in documentation

// Run the bot
$bot->run();