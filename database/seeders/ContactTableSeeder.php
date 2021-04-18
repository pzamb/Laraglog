<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::truncate();

        for($i = 1; $i<=3; $i++){
            Contact::create([
                'name' => "Conan $i",
                'surname' => "Cors $i",
                'phone' => '609234344',
                'message' => 'Content PARA ESTE POST',
                'email' => 'pedro@gmail.com',
            ]);
        }
        
    }
}
