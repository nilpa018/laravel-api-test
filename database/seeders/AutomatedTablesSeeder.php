<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AutomatedTablesSeeder extends Seeder
{
    public function run(): void
    {
        // Insérer les rôles dans la table "roles"
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'user'],
        ]);

        // Insérer les utilisateurs dans la table "users"
        DB::table('users')->insert([
           [ 'id' => 1,
            'name' => 'administrateur',
            'email' => 'administrateur@example.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('12345678'),
            'remember_token' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL,
            'role_id' => 1,
            ],
            [ 'id' => 2,
            'name' => 'utilisateur',
            'email' => 'utilisateur@example.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('12345678'),
            'remember_token' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL,
            'role_id' => 2,
            ],
        ]);

        DB::table('agreements')->insert([
            'id' => 1,
            'bill_of_sale' => '1',
            'lease' => '0',
            'inventory' => '0',
            'guarantee' => '0',
        ]);

        DB::table('contracts')->insert([
            'id' => 1,
            'to_build' => '1',
            'to_sale' => '0',
            'to_rent' => '0',
        ]);

        DB::table('properties_details')->insert([
            'id' => 1,
            'balcony' => '0',
            'by_the_sea' => '1',
            'good_condition' => '0',
            'country_side' => '0',
            'equipped' => '1',
            'floor' => '1',
            'furnished_flat' => '0',
            'lift' => '0',
            'new' => '1',
            'stairs' => '0',
        ]);

        DB::table('properties_types')->insert([
            'id' => 1,
            'apartment_flat' => '1',
            'building' => '0',
            'building_site' => '0',
            'castle' => '0',
            'co_ownership' => '1',
            'property' => '0',
            'simple_house' => '0',
            'land' => '0',
            'on_map' => '1',
            'stable' => '0',
            'statutory_open_land' => '0',
        ]);

        DB::table('products')->insert([
            'id' => 1,
            'address' => '1635, Ocean Drive',
            'locality' => 'Miami, FL',
            'country' => 'USA',
            'property_description' => 'The most popular property in Florida',
            'owner' => 'Monica Stewart',
            'representative' => 'realor',
            'price' => '690 000',
            'payment' => 'Only in bank office accompanied by owner',
            'user_id' => 1,
            'contract_id' => 1,
            'properties_details_id' => 1,
            'properties_types_id' => 1,
            'agreements_id' => 1,
        ]);
    }
}
