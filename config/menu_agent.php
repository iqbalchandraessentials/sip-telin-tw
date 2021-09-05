<?php

// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'desc' => '',
            'icon' => 'media/svg/icons/Design/Layers.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Registration',
                    'page' => '/dashboard/registration'
                ],
                // [
                //     'title' => 'Activation Store',
                //     'page' => '/dashboard/activation-store'
                // ],
                // [
                //     'title' => 'Chart',
                //     'page' => '/dashboard/chart'
                // ],
                // [
                //     'title' => 'Map of Taiwan',
                //     'page' => '/dashboard/map'
                // ],
                // [
                //     'title' => 'Activation Trend',
                //     'page' => '/dashboard/activation-trend'
                // ],
                // [
                //     'title' => 'APForm Performance',
                //     'page' => '/dashboard/apform-performance/sla'
                // ],
            ]
        ],

        // Register
        [
            'title' => 'Registration',
            'desc' => '',
            'icon' => 'flaticon2-open-text-book',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Kartu AS',
                    'page' => '/register/ultima'
                ],
                // [
                //     'title' => 'Fascon (Kartu Nusantara)',
                //     'page' => '/register/fascon'
                // ],
                // [
                //     'title' => 'Activation Summary',
                //     'page' => '/register/summary'
                // ]
            ]
        ],
        // Reports
        // [
        //     'title' => 'Reports',
        //     'desc' => '',
        //     'icon' => 'flaticon2-paper',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Reports',
        //             'page' => '/reports/reports'
        //         ],
        //     ]
        // ],
    ]
];
