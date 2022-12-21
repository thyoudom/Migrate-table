<?php

return [
    [
        'path' => 'admin/dashboard',
        'active' => 'admin/dashboard',
        'permission' => 'dashboard-view',
        'name' => [
            'en' => 'Dashboard',
            'km' => 'ផ្ទាំងគ្រប់គ្រង',
        ],
        'icon' => 'home',
    ],
    // Slide
    [
        'path' => 'admin/slide/list/1',
        'active' => 'admin/slide*',
        'permission' => 'slide-view',
        'name' => [
            'en' => 'Slide',
            'km' => 'ស្លាយ',
        ],
        'icon' => 'airplay',
    ],

    // user
    [
        'active' => 'admin/user/*,admin/member/*,admin/garage/*',
        'permission' => 'user-view',
        'permission' => ['user-view', 'garage-view', 'member-view'],
        'name' => [
            'en' => 'User Management',
            'km' => 'អ្នកប្រើប្រាស់',
        ],
        'icon' => 'users',
        'children' => [
            [
                'path' => 'admin/user/list/1',
                'active' => 'admin/user/*',
                'permission' => 'user-view',
                'name' => [
                    'en' => 'User',
                    'km' => 'អ្នកប្រើប្រាស់',
                ],
            ],
        ]
    ],
    // page children about and contact
    [
        'active' => 'admin/page/*,admin/contact/*',
        'permission' => ['about-view', 'privacy-view', 'term-condition-view', 'contact-view'],
        'name' => [
            'en' => 'Page Management',
            'km' => 'ទំព័រ',
        ],
        'icon' => 'book-open',
        'children' => [
            [
                'path' => 'admin/page/about',
                'active' => 'admin/page/about',
                'permission' => 'about-view',
                'name' => [
                    'en' => 'About',
                    'km' => 'អំពី',
                ],
            ],
            [
                'path' => 'admin/contact/contact',
                'active' => 'admin/contact/contact',
                'permission' => 'contact-view',
                'name' => [
                    'en' => 'Contact',
                    'km' => 'ទំនាក់ទំនង',
                ],
            ],
        ],
    ],
];
