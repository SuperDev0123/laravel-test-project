<?php

use App\Models\Team;

return [

    /*
    |--------------------------------------------------------------------------
    | Spark Path
    |--------------------------------------------------------------------------
    |
    | This configuration option determines the URI at which the Spark billing
    | portal is available. You are free to change this URI to a value that
    | you prefer. You shall link to this location from your application.
    |
    */

    'path' => 'billing',

    /*
    |--------------------------------------------------------------------------
    | Spark Middleware
    |--------------------------------------------------------------------------
    |
    | These are the middleware that requests to the Spark billing portal must
    | pass through before being accepted. Typically, the default list that
    | is defined below should be suitable for most Laravel applications.
    |
    */

    'middleware' => ['web', 'auth'],

    /*
    |--------------------------------------------------------------------------
    | Branding
    |--------------------------------------------------------------------------
    |
    | These configuration values allow you to customize the branding of the
    | billing portal, including the primary color and the logo that will
    | be displayed within the billing portal. This logo value must be
    | the absolute path to an SVG logo within the local filesystem.
    |
    */

    // 'brand' =>  [
    //     'logo' => realpath(__DIR__.'/../public/svg/billing-logo.svg'),
    //     'color' => 'bg-gray-800',
    // ],

    /*
    |--------------------------------------------------------------------------
    | Proration Behavior
    |--------------------------------------------------------------------------
    |
    | This value determines if charges are prorated when making adjustments
    | to a plan such as incrementing or decrementing the quantity of the
    | plan. This also determines proration behavior if changing plans.
    |
    */

    'prorates' => true,

    /*
    |--------------------------------------------------------------------------
    | Spark Date Format
    |--------------------------------------------------------------------------
    |
    | This date format will be utilized by Spark to format dates in various
    | locations within the billing portal, such as while showing invoice
    | dates. You should customize the format based on your own locale.
    |
    */

    'date_format' => 'F j, Y',

    /*
    |--------------------------------------------------------------------------
    | Spark Billables
    |--------------------------------------------------------------------------
    |
    | Below you may define billable entities supported by your Spark driven
    | application. You are free to have multiple billable entities which
    | can each define multiple subscription plans available for users.
    |
    | In addition to defining your billable entity, you may also define its
    | plans and the plan's features, including a short description of it
    | as well as a "bullet point" listing of its distinctive features.
    |
    */

    'billables' => [

        'team' => [
            'model' => Team::class,

            'default_interval' => 'monthly',
            'trial_days' => 5,

            'plans' => [
                [
                    'name' => 'Monthly Subscription',
                    'short_description' => ' Save time, increase PR coverage, and enhance your brand visibility effortlessly.',
                    'monthly_id' => env('SPARK_STANDARD_MONTHLY_PLAN', 'price_1NJlF6EfttOSCL1XOATr9tfG'),
                    'yearly_id' => env('SPARK_STANDARD_YEARLY_PLAN', 'price_1N0tcJEfttOSCL1X3nX1r2Gm'),
                    'yearly_incentive' => 'Save 20%',

                    'features' => [
                        'Dashboard: AI-powered HARO, Terkel, Qwoted and Sourcebottle query filtering: Save time by automatically sorting through queries and receiving only the most relevant ones for your brand.',
                        'Personalized recommendations: Get tailored suggestions based on your profile and preferences to maximize PR opportunities.',
                        'Professionally crafted email drafts: Enjoy well-formatted and compelling email_responses generated by our AI, ensuring higher chances of journalist engagement.',
                    ],
                    'archived' => false,
                ],
                [
                    'name' => 'Self Service',
                    'short_description' => ' Save time, increase PR coverage, and enhance your brand visibility effortlessly.',
                    'monthly_id' => env('SPARK_STANDARD_MONTHLY_PLAN', 'price_1N1XhLEfttOSCL1XZEBeRs18'),
                    'yearly_id' => env('SPARK_STANDARD_YEARLY_PLAN', 'price_1N1XhLEfttOSCL1XviAcJhpo'),
                    'yearly_incentive' => 'Save 20%',
                    'trial_days' => 5,
                    'features' => [
                        'AI-powered HARO, Terkel, Qwoted and Sourcebottle query filtering: Save time by automatically sorting through queries and receiving only the most relevant ones for your brand.',
                        'Personalized recommendations: Get tailored suggestions based on your profile and preferences to maximize PR opportunities.',
                        'Professionally crafted email drafts: Enjoy well-formatted and compelling email_responses generated by our AI, ensuring higher chances of journalist engagement.',
                    ],
                    'archived' => true,
                ],
                [
                    'name' => 'Full Managed Service',
                    'short_description' => 'Our experienced PR team handles all queries on your behalf. Sit back and watch your coverage increase effortlessly.',
                    'monthly_id' => env('SPARK_FULL_MANAGED_MONTHLY_PLAN', 'price_1N8sdOEfttOSCL1XPfVOBJFP'),
                    'yearly_id' => env('SPARK_FULL_MANAGED_YEARLY_PLAN', 'price_1N8sdxEfttOSCL1XWw1FnxS7'),
                    'yearly_incentive' => 'Save 20%', // Remove yearly incentive if not applicable
                    'trial_days' => 0, // Set trial_days to 0 if there's no trial period for this plan
                    'features' => [
                        'Dedicated PR expert: Our experienced PR team will handle all queries on your behalf, ensuring optimal results.',
                        'Maximize PR opportunities: Focus on your business while we use our expertise to enhance your brand visibility and increase PR coverage.',
                        'Easy and hassle-free: No need to worry about responding to queries or sorting through recommendations. Leave it all to us.',
                    ],
                    'archived' => false,
                ],
            ],
        ],

    ],
];
