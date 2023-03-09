<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'Beko Cooker',
                "price" => "459",
                "description" => "Beko Cooker",
                "category" => "Cooker",
                "image" => "images/M6H2o5utk8MwhffX402WQ7xlhnrBGscO874o1Y0A.jpg"
            ],
            [
                'name' => 'HISENSE PureFlat RF540N4AF1 Fridge Freezer - Black Steel',
                "price" => "799",
                "description" => "No need to defrost with frost free technology",
                "category" => "Fridge",
                "image" => "images/N7opeONef94ySFqgyYEGBh6CW0EDrFoQboilpZTs.jpg"
            ],
            [
                'name' => 'SAMSUNG Series 5 ecobubble WW90TA046AE/EU 9 kg 1400 Spin Washing Machine - White',
                "price" => "569",
                "description" => "Quick wash time: 15 minutes for 2 kg",
                "category" => "Washing Machine",
                "image" => "images/rhFnApsAlY6NR0BkDud1XKDXtRBKck1k8Z848PJe.jpg"
            ],
            [
                'name' => 'SONY PlayStation 5 & God of War Ragnarök Bundle',
                "price" => "539",
                "description" => "825 GB SSD storage drive",
                "category" => "Console",
                "image" => "images/QyB9L05m68LhbXKbIpKLzAP64ukFmUq9fEIcX0Re.jpg"
            ],
            [
                'name' => 'OPPO Find X5 Pro - 256 GB, Ceramic White',
                "price" => "799",
                "description" => "6.7\" Quad HD AMOLED LTPO touchscreen",
                "category" => "Mobile",
                "image" => "images/IPfmD89MCiDPpKRbMvfC0NerlnIKXNmFtcDltunN.jpg"
            ],
            [
                'name' => 'SONY BRAVIA XR-55A84KU 55" Smart 4K Ultra HD HDR OLED TV with Google TV & Assistant',
                "price" => "1299",
                "description" => "HDR: Dolby Vision / HDR10 / Hybrid Log-Gamma (HLG)",
                "category" => "TV",
                "image" => "images/ZU93HmCYtsrD6uKvBM4YiKaYIFTI9SkW7K9VAMtm.jpg"
            ]




        ]);
    }
}
