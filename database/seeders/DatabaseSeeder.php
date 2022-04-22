<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithoutEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutEvents;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call([
        //     AboutUsSeeder::class,
        //     AccountSeeder::class,
        //     ActivityFeedSeeder::class,
        //     AuthorSeeder::class,

        //     BookSeeder::class,

        //     CommentablesSeeder::class,
        //     CommentSeeder::class,
        //     ContactOurSeeder::class,
        //     ContentSeeder::class,
        //     ConsultationSeeder::class,

        //     GenreSeeder::class,

        //     InformationSeeder::class,

        //     MenuableSeeder::class,
        //     MenunewsSeeder::class,
        //     MenuSeeder::class,

        //     PermissionSeeder::class,
        //     PhotoSeeder::class,
        //     PostSeeder::class,
        //     PublisherSeeder::class,

        //     RolePermission::class,
        //     RoleSeeder::class,

        //     SubMenuSeeder::class,

        //     TagSeeder::class,

        //     UserPermission::class,
        //     UserRoleSeeder::class,
        //     UserSeeder::class,

        //     VideoSeeder::class
        // ]);

        $this->call([
            AuthorSeeder::class,
            PostSeeder::class,
            PhotoSeeder::class,
            PublisherSeeder::class,
            GenreSeeder::class,
            BookSeeder::class,
            CommentSeeder::class,
            CommentablesSeeder::class,
            MenuSeeder::class,
            SubMenuSeeder::class,

            AboutUsSeeder::class,
            AccountSeeder::class,
            ActivityFeedSeeder::class,

            ContactOurSeeder::class,
            ContentSeeder::class,
            ConsultationSeeder::class,

            InformationSeeder::class,

            MenuableSeeder::class,
            MenunewsSeeder::class,

            PermissionSeeder::class,

            RoleSeeder::class,
            RolePermission::class,

            TagSeeder::class,

            UserSeeder::class,
            UserPermission::class,
            UserRoleSeeder::class,

            VideoSeeder::class,
            AuthorUpdateSeeder::class,

            CategoryAssetSeeder::class,
            VendorSeeder::class,
            EmployeeSeeder::class,
            AssetsSeeder::class
        ]);
    }
}
