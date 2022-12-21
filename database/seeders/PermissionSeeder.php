<?php

namespace Database\Seeders;

use App\Models\ModulePermission;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        ModulePermission::truncate();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();
        $view = "View";
        $create = "Create";
        $edit = "Edit";
        $delete = "Delete";
        $trash = "Trash";
        $destroy = "Destroy";

        $stDashboard = 1;
        $stSlide = 2;
        $stService = 3;
        $stBooking = 4;
        $stVideo = 5;
        $stNotification = 6;
        $stMemberRequestAddMoney = 7;

        $stBlogSlide = 8;
        $stBlog = 9;
        $stCategoryBlog = 10;

        $stTotalAllReport = 11;
        $stUser = 12;
        $stGarage = 13;
        $stMember = 14;

        $stAbout = 15;
        $stPrivacy = 16;
        $stTermCondition = 17;
        $stContact = 18;

        $stTypeAccessories = 19;
        $stAccessories = 20;


        $stTermConditionMember = 21;
        $stTermConditionGarage = 22;
        $stPrivacyMember = 23;
        $stPrivacyGarage = 24;
        $stMenu = 25;
        $stPaymentMethod = 26;

        $gpBlogManagement = 101;
        $gpReportManagement = 102;
        $gpUserManagement = 103;
        $gpPageManagement = 104;
        $gpCarAccessories = 105;
        $gpTermCondition = 106;
        $gpPrivacy = 107;
        $gpSetting = 108;

        //dashboard
        $dashboard = ModulePermission::create([
            'name' => 'Dashboard',
            'parent_id' => $stDashboard,
            'sort_no' => $stDashboard,
        ]);
        Permission::create([
            'display_name' => $view,
            'name' => 'dashboard-view',
            'guard_name' => 'web',
            'module_id' => $dashboard->id,
        ]);

        //slide
        $slide = ModulePermission::create([
            'name' => 'Slide',
            'parent_id' => $stSlide,
            'sort_no' => $stSlide,

        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'slide-view',
                'guard_name' => 'web',
                'module_id' => $slide->id,
            ],
            [
                'display_name' => $create,
                'name' => 'slide-create',
                'guard_name' => 'web',
                'module_id' => $slide->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'slide-update',
                'guard_name' => 'web',
                'module_id' => $slide->id,
            ],
            [
                'display_name' => $delete,
                'name' => 'slide-delete',
                'guard_name' => 'web',
                'module_id' => $slide->id,
            ],
        ]);
        //endSlide

        //service
        $service = ModulePermission::create([
            'name' => 'Service',
            'parent_id' => $stService,
            'sort_no' => $stService,

        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'service-view',
                'guard_name' => 'web',
                'module_id' => $service->id,
            ],
            [
                'display_name' => $create,
                'name' => 'service-create',
                'guard_name' => 'web',
                'module_id' => $service->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'service-update',
                'guard_name' => 'web',
                'module_id' => $service->id,
            ],
            [
                'display_name' => $delete,
                'name' => 'service-delete',
                'guard_name' => 'web',
                'module_id' => $service->id,
            ],
        ]);
        //endService

        //booking
        $booking = ModulePermission::create([
            'name' => 'Booking',
            'parent_id' => $stBooking,
            'sort_no' => $stBooking,

        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'booking-view',
                'guard_name' => 'web',
                'module_id' => $booking->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'booking-update',
                'guard_name' => 'web',
                'module_id' => $booking->id,
            ],
        ]);
        //endBooking

        //video
        $video = ModulePermission::create([
            'name' => 'Video',
            'parent_id' => $stVideo,
            'sort_no' => $stVideo,

        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'video-view',
                'guard_name' => 'web',
                'module_id' => $video->id,
            ],
            [
                'display_name' => $create,
                'name' => 'video-create',
                'guard_name' => 'web',
                'module_id' => $video->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'video-update',
                'guard_name' => 'web',
                'module_id' => $video->id,
            ],
            [
                'display_name' => $delete,
                'name' => 'video-delete',
                'guard_name' => 'web',
                'module_id' => $video->id,
            ],
        ]);
        //endVideo

        // Blog Management
        //blogSlide
        $blogSlide = ModulePermission::create([
            'name' => 'Blog Slide',
            'parent_id' => $gpBlogManagement,
            'parent_name' => 'Blog Management',
            'sort_no' => $stBlogSlide,

        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'blog-slide-view',
                'guard_name' => 'web',
                'module_id' => $blogSlide->id,
            ],
            [
                'display_name' => $create,
                'name' => 'blog-slide-create',
                'guard_name' => 'web',
                'module_id' => $blogSlide->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'blog-slide-update',
                'guard_name' => 'web',
                'module_id' => $blogSlide->id,
            ],
            [
                'display_name' => $delete,
                'name' => 'blog-slide-delete',
                'guard_name' => 'web',
                'module_id' => $blogSlide->id,
            ],
        ]);
        //endBlogSlide
        // blog
        $blog = ModulePermission::create([
            'name' => 'Blog',
            'parent_id' => $gpBlogManagement,
            'parent_name' => 'Blog Management',
            'sort_no' => $stBlog,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'blog-view',
                'guard_name' => 'web',
                'module_id' => $blog->id,
            ],
            [
                'display_name' => $create,
                'name' => 'blog-create',
                'guard_name' => 'web',
                'module_id' => $blog->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'blog-update',
                'guard_name' => 'web',
                'module_id' => $blog->id,
            ],
            [
                'display_name' => $delete,
                'name' => 'blog-delete',
                'guard_name' => 'web',
                'module_id' => $blog->id,
            ],
        ]);
        //endBlog

        // categoryBlog
        $categoryBlog = ModulePermission::create([
            'name' => 'Category Blog',
            'parent_id' => $gpBlogManagement,
            'parent_name' => 'Blog Management',
            'sort_no' => $stCategoryBlog,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'category-blog-view',
                'guard_name' => 'web',
                'module_id' => $categoryBlog->id,
            ],
            [
                'display_name' => $create,
                'name' => 'category-blog-create',
                'guard_name' => 'web',
                'module_id' => $categoryBlog->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'category-blog-update',
                'guard_name' => 'web',
                'module_id' => $categoryBlog->id,
            ],
        ]);
        // endCategoryBlog

        //notification
        $notification = ModulePermission::create([
            'name' => 'Promotion Alter',
            'parent_id' => $stNotification,
            'sort_no' => $stNotification,

        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'notification-view',
                'guard_name' => 'web',
                'module_id' => $notification->id,
            ],
            [
                'display_name' => $create,
                'name' => 'notification-create',
                'guard_name' => 'web',
                'module_id' => $notification->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'notification-update',
                'guard_name' => 'web',
                'module_id' => $notification->id,
            ],
            [
                'display_name' => $delete,
                'name' => 'notification-delete',
                'guard_name' => 'web',
                'module_id' => $notification->id,
            ],
        ]);
        //endNotification

        //memberRequestAddMoney
        $memberRequestAddMoney = ModulePermission::create([
            'name' => 'Member Request Money',
            'parent_id' => $stMemberRequestAddMoney,
            'sort_no' => $stMemberRequestAddMoney,

        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'member-request-add-money-view',
                'guard_name' => 'web',
                'module_id' => $memberRequestAddMoney->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'member-request-add-money-update',
                'guard_name' => 'web',
                'module_id' => $memberRequestAddMoney->id,
            ],
        ]);
        //endNotification

        // Report Management
        // totalAllResult
        $totalAllResult = ModulePermission::create([
            'name' => 'Total All Result',
            'parent_id' => $gpReportManagement,
            'parent_name' => 'Report Management',
            'sort_no' => $stTotalAllReport,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'total-all-result-view',
                'guard_name' => 'web',
                'module_id' => $totalAllResult->id,
            ],
            [
                'display_name' => $create,
                'name' => 'total-all-result-create',
                'guard_name' => 'web',
                'module_id' => $totalAllResult->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'total-all-result-update',
                'guard_name' => 'web',
                'module_id' => $totalAllResult->id,
            ]
        ]);

        // User Management
        // user
        $user = ModulePermission::create([
            'name' => 'User',
            'parent_id' => $gpUserManagement,
            'parent_name' => 'User Management',
            'sort_no' => $stUser,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'user-view',
                'guard_name' => 'web',
                'module_id' => $user->id,
            ],
            [
                'display_name' => $create,
                'name' => 'user-create',
                'guard_name' => 'web',
                'module_id' => $user->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'user-update',
                'guard_name' => 'web',
                'module_id' => $user->id,
            ]
        ]);
        // garage
        $garage = ModulePermission::create([
            'name' => 'Garage',
            'parent_id' => $gpUserManagement,
            'parent_name' => 'User Management',
            'sort_no' => $stGarage,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'garage-view',
                'guard_name' => 'web',
                'module_id' => $garage->id,
            ],
            [
                'display_name' => $create,
                'name' => 'garage-create',
                'guard_name' => 'web',
                'module_id' => $garage->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'garage-update',
                'guard_name' => 'web',
                'module_id' => $garage->id,
            ]
        ]);

        // member
        $member = ModulePermission::create([
            'name' => 'Member',
            'parent_id' => $gpUserManagement,
            'parent_name' => 'User Management',
            'sort_no' => $stMember,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'member-view',
                'guard_name' => 'web',
                'module_id' => $member->id,
            ],
            [
                'display_name' => $create,
                'name' => 'member-create',
                'guard_name' => 'web',
                'module_id' => $member->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'member-update',
                'guard_name' => 'web',
                'module_id' => $member->id,
            ]
        ]);

        // Page management
        // about
        $about = ModulePermission::create([
            'name' => 'About',
            'parent_id' => $gpPageManagement,
            'parent_name' => 'Page Management',
            'sort_no' => $stAbout,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'about-view',
                'guard_name' => 'web',
                'module_id' => $about->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'about-update',
                'guard_name' => 'web',
                'module_id' => $about->id,
            ],
        ]);
        // contact
        $contact = ModulePermission::create([
            'name' => 'Contact',
            'parent_id' => $gpPageManagement,
            'parent_name' => 'Page Management',
            'sort_no' => $stContact,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'contact-view',
                'guard_name' => 'web',
                'module_id' => $contact->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'contact-update',
                'guard_name' => 'web',
                'module_id' => $contact->id,
            ],
        ]);

        //endPageManagement

        // Car Accessories
        // type Accessories
        $typeAccessories = ModulePermission::create([
            'name' => 'Type Accessories',
            'parent_id' => $gpCarAccessories,
            'parent_name' => 'Car Accessories',
            'sort_no' => $stTypeAccessories,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'type-accessories-view',
                'guard_name' => 'web',
                'module_id' => $typeAccessories->id,
            ],
            [
                'display_name' => $create,
                'name' => 'type-accessories-create',
                'guard_name' => 'web',
                'module_id' => $typeAccessories->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'type-accessories-update',
                'guard_name' => 'web',
                'module_id' => $typeAccessories->id,
            ]
        ]);
        // Accessories
        $accessories = ModulePermission::create([
            'name' => 'Accessories',
            'parent_id' => $gpCarAccessories,
            'parent_name' => 'Car Accessories',
            'sort_no' => $stAccessories,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'accessories-view',
                'guard_name' => 'web',
                'module_id' => $accessories->id,
            ],
            [
                'display_name' => $create,
                'name' => 'accessories-create',
                'guard_name' => 'web',
                'module_id' => $accessories->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'accessories-update',
                'guard_name' => 'web',
                'module_id' => $accessories->id,
            ],
            [
                'display_name' => $delete,
                'name' => 'accessories-delete',
                'guard_name' => 'web',
                'module_id' => $accessories->id,
            ],
        ]);
        //endCarAccessories

        // TermCondition management
        // member
        $termConditionMember = ModulePermission::create([
            'name' => 'Member',
            'parent_id' => $gpTermCondition,
            'parent_name' => 'Term & Condition',
            'sort_no' => $stTermConditionMember,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'term-condition-member-view',
                'guard_name' => 'web',
                'module_id' => $termConditionMember->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'term-condition-member-update',
                'guard_name' => 'web',
                'module_id' => $termConditionMember->id,
            ],
        ]);
        // garage
        $termConditionGarage = ModulePermission::create([
            'name' => 'Garage',
            'parent_id' => $gpTermCondition,
            'parent_name' => 'Term & Condition',
            'sort_no' => $stTermConditionGarage,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'term-condition-garage-view',
                'guard_name' => 'web',
                'module_id' => $termConditionGarage->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'term-condition-garage-update',
                'guard_name' => 'web',
                'module_id' => $termConditionGarage->id,
            ],
        ]);

        // Privacy management
        // member
        $privacyMember = ModulePermission::create([
            'name' => 'Member',
            'parent_id' => $gpPrivacy,
            'parent_name' => 'Privacy',
            'sort_no' => $stPrivacyMember,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'privacy-member-view',
                'guard_name' => 'web',
                'module_id' => $privacyMember->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'privacy-member-update',
                'guard_name' => 'web',
                'module_id' => $privacyMember->id,
            ],
        ]);
        // garage
        $privacyGarage = ModulePermission::create([
            'name' => 'Garage',
            'parent_id' => $gpPrivacy,
            'parent_name' => 'Privacy',
            'sort_no' => $stPrivacyGarage,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'privacy-garage-view',
                'guard_name' => 'web',
                'module_id' => $privacyGarage->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'privacy-garage-update',
                'guard_name' => 'web',
                'module_id' => $privacyGarage->id,
            ],
        ]);

        // Setting
        // Menu
        $menu = ModulePermission::create([
            'name' => 'Menu',
            'parent_id' => $gpSetting,
            'parent_name' => 'Setting',
            'sort_no' => $stMenu,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'menu-view',
                'guard_name' => 'web',
                'module_id' => $menu->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'menu-update',
                'guard_name' => 'web',
                'module_id' => $menu->id,
            ]
        ]);
        //payment
        $paymentMethod = ModulePermission::create([
            'name' => 'Payment Method',
            'sort_no' => $stPaymentMethod,
            'parent_id' => $gpSetting,
            'parent_name' => 'Setting',

        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'payment-method-view',
                'guard_name' => 'web',
                'module_id' => $paymentMethod->id,
            ],
            [
                'display_name' => $create,
                'name' => 'payment-method-create',
                'guard_name' => 'web',
                'module_id' => $paymentMethod->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'payment-method-update',
                'guard_name' => 'web',
                'module_id' => $paymentMethod->id,
            ],
            [
                'display_name' => $delete,
                'name' => 'payment-method-delete',
                'guard_name' => 'web',
                'module_id' => $paymentMethod->id,
            ],
        ]);
        //endPayment
    }
}
