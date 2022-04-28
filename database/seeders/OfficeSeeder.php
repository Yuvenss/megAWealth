<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::create([
            'office_id' => Str::uuid(),
            'office_name' => 'Memphis',
            'office_address' => '2584 Madison Ave',
            'office_contact_name' => 'Natalee Sheryl',
            'office_phone_num' => '+1234456789',
            'office_image' => 'office-pict/office1.jpg'
        ]);
        Office::create([
            'office_id' => Str::uuid(),
            'office_name' => 'San Antonio',
            'office_address' => '1111 El Monte Blvd',
            'office_contact_name' => 'Ellen Permelia',
            'office_phone_num' => '+19283746',
            'office_image' => 'office-pict/office2.jpg'
        ]);
        Office::create([
            'office_id' => Str::uuid(),
            'office_name' => 'Washington',
            'office_address' => '9899 North Capital St NE',
            'office_contact_name' => 'Georgane Hatty',
            'office_phone_num' => '+18374629',
            'office_image' => 'office-pict/office3.jfif'
        ]);
        Office::create([
            'office_id' => Str::uuid(),
            'office_name' => 'Colombus',
            'office_address' => '1556 King Ave',
            'office_contact_name' => 'Anastasia Peyton',
            'office_phone_num' => '+24374629',
            'office_image' => 'office-pict/office4.jpg'
        ]);
        Office::create([
            'office_id' => Str::uuid(),
            'office_name' => 'New York',
            'office_address' => '1674 Broadway',
            'office_contact_name' => 'Peter Bossman',
            'office_phone_num' => '+6234629',
            'office_image' => 'office-pict/office5.jpg'
        ]);
        Office::create([
            'office_id' => Str::uuid(),
            'office_name' => 'Moscow',
            'office_address' => '1783 Lenina St',
            'office_contact_name' => 'Chatarina Krasnogorova',
            'office_phone_num' => '+17462989',
            'office_image' => 'office-pict/office6.jpg'
        ]);
    }
}
