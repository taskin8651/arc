<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'service_create',
            ],
            [
                'id'    => 20,
                'title' => 'service_edit',
            ],
            [
                'id'    => 21,
                'title' => 'service_show',
            ],
            [
                'id'    => 22,
                'title' => 'service_delete',
            ],
            [
                'id'    => 23,
                'title' => 'service_access',
            ],
            [
                'id'    => 24,
                'title' => 'project_create',
            ],
            [
                'id'    => 25,
                'title' => 'project_edit',
            ],
            [
                'id'    => 26,
                'title' => 'project_show',
            ],
            [
                'id'    => 27,
                'title' => 'project_delete',
            ],
            [
                'id'    => 28,
                'title' => 'project_access',
            ],
            [
                'id'    => 29,
                'title' => 'project_category_create',
            ],
            [
                'id'    => 30,
                'title' => 'project_category_edit',
            ],
            [
                'id'    => 31,
                'title' => 'project_category_show',
            ],
            [
                'id'    => 32,
                'title' => 'project_category_delete',
            ],
            [
                'id'    => 33,
                'title' => 'project_category_access',
            ],
            [
                'id'    => 34,
                'title' => 'testimonial_create',
            ],
            [
                'id'    => 35,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 36,
                'title' => 'testimonial_show',
            ],
            [
                'id'    => 37,
                'title' => 'testimonial_delete',
            ],
            [
                'id'    => 38,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 39,
                'title' => 'blog_post_create',
            ],
            [
                'id'    => 40,
                'title' => 'blog_post_edit',
            ],
            [
                'id'    => 41,
                'title' => 'blog_post_show',
            ],
            [
                'id'    => 42,
                'title' => 'blog_post_delete',
            ],
            [
                'id'    => 43,
                'title' => 'blog_post_access',
            ],
            [
                'id'    => 44,
                'title' => 'team_member_create',
            ],
            [
                'id'    => 45,
                'title' => 'team_member_edit',
            ],
            [
                'id'    => 46,
                'title' => 'team_member_show',
            ],
            [
                'id'    => 47,
                'title' => 'team_member_delete',
            ],
            [
                'id'    => 48,
                'title' => 'team_member_access',
            ],
            [
                'id'    => 49,
                'title' => 'contact_enquiry_create',
            ],
            [
                'id'    => 50,
                'title' => 'contact_enquiry_edit',
            ],
            [
                'id'    => 51,
                'title' => 'contact_enquiry_show',
            ],
            [
                'id'    => 52,
                'title' => 'contact_enquiry_delete',
            ],
            [
                'id'    => 53,
                'title' => 'contact_enquiry_access',
            ],
            [
                'id'    => 54,
                'title' => 'newsletter_subscriber_create',
            ],
            [
                'id'    => 55,
                'title' => 'newsletter_subscriber_edit',
            ],
            [
                'id'    => 56,
                'title' => 'newsletter_subscriber_show',
            ],
            [
                'id'    => 57,
                'title' => 'newsletter_subscriber_delete',
            ],
            [
                'id'    => 58,
                'title' => 'newsletter_subscriber_access',
            ],
            [
                'id'    => 59,
                'title' => 'site_setting_create',
            ],
            [
                'id'    => 60,
                'title' => 'site_setting_edit',
            ],
            [
                'id'    => 61,
                'title' => 'site_setting_show',
            ],
            [
                'id'    => 62,
                'title' => 'site_setting_delete',
            ],
            [
                'id'    => 63,
                'title' => 'site_setting_access',
            ],
            [
                'id'    => 64,
                'title' => 'gallery_create',
            ],
            [
                'id'    => 65,
                'title' => 'gallery_edit',
            ],
            [
                'id'    => 66,
                'title' => 'gallery_show',
            ],
            [
                'id'    => 67,
                'title' => 'gallery_delete',
            ],
            [
                'id'    => 68,
                'title' => 'gallery_access',
            ],
            [
                'id'    => 69,
                'title' => 'blog_category_create',
            ],
            [
                'id'    => 70,
                'title' => 'blog_category_edit',
            ],
            [
                'id'    => 71,
                'title' => 'blog_category_show',
            ],
            [
                'id'    => 72,
                'title' => 'blog_category_delete',
            ],
            [
                'id'    => 73,
                'title' => 'blog_category_access',
            ],
            [
                'id'    => 74,
                'title' => 'faq_create',
            ],
            [
                'id'    => 75,
                'title' => 'faq_edit',
            ],
            [
                'id'    => 76,
                'title' => 'faq_show',
            ],
            [
                'id'    => 77,
                'title' => 'faq_delete',
            ],
            [
                'id'    => 78,
                'title' => 'faq_access',
            ],
            [
                'id'    => 79,
                'title' => 'blog_access',
            ],
            [
                'id'    => 80,
                'title' => 'our_project_access',
            ],
            [
                'id'    => 81,
                'title' => 'website_setup_access',
            ],
            [
                'id'    => 82,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
