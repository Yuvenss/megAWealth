<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::create([
            'property_id' => Str::uuid(),
            'property_type' => 'Apartment',
            'property_address' => '1117 Relt Street, IL',
            'property_image' => 'property-pict/apartment4.jpg',
            'property_sales_type' => 'Sale',
            'property_price' => '324000'
        ]);
        Property::create([
            'property_id' => Str::uuid(),
            'property_type' => 'House',
            'property_address' => '2019 James Street, NY',
            'property_image' => 'property-pict/house1.jpeg',
            'property_sales_type' => 'Rent',
            'property_price' => '1300'
        ]);
        Property::create([
            'property_id' => Str::uuid(),
            'property_type' => 'Apartment',
            'property_address' => '1827 Fulron Street, TX',
            'property_image' => 'property-pict/apartment3.jpg',
            'property_sales_type' => 'Rent',
            'property_price' => '1200'
        ]);
        Property::create([
            'property_id' => Str::uuid(),
            'property_type' => 'House',
            'property_address' => '1342 Finderiation Road, IL',
            'property_image' => 'property-pict/house2.jpg',
            'property_sales_type' => 'Sale',
            'property_price' => '350000'
        ]);
        Property::create([
            'property_id' => Str::uuid(),
            'property_type' => 'Apartment',
            'property_address' => '9987 Fugle Street, CA',
            'property_image' => 'property-pict/apartment5.jpeg',
            'property_sales_type' => 'Sale',
            'property_price' => '120000'
        ]);
        Property::create([
            'property_id' => Str::uuid(),
            'property_type' => 'House',
            'property_address' => '8866 Angel Street, CA',
            'property_image' => 'property-pict/house5.jpg',
            'property_sales_type' => 'Rent',
            'property_price' => '1000'
        ]);
        Property::create([
            'property_id' => Str::uuid(),
            'property_type' => 'House',
            'property_address' => '1264 Hamilton Avenue, CA',
            'property_image' => 'property-pict/house3.jpg',
            'property_sales_type' => 'Sale',
            'property_price' => '210000'
        ]);
        Property::create([
            'property_id' => Str::uuid(),
            'property_type' => 'House',
            'property_address' => '2273 S. Main Street, TX',
            'property_image' => 'property-pict/house4.jpg',
            'property_sales_type' => 'Rent',
            'property_price' => '3000'
        ]);
        Property::create([
            'property_id' => Str::uuid(),
            'property_type' => 'Apartment',
            'property_address' => '1123 Deans Street, IL',
            'property_image' => 'property-pict/apartment1.jpg',
            'property_sales_type' => 'Sale',
            'property_price' => '100000'
        ]);
        Property::create([
            'property_id' => Str::uuid(),
            'property_type' => 'Apartment',
            'property_address' => '2271 Ella Street, CA',
            'property_image' => 'property-pict/apartment2.jpg',
            'property_sales_type' => 'Rent',
            'property_price' => '2500'
        ]);
    }
}
