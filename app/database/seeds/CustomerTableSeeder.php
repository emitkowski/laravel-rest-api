<?php

class CustomerTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('customer')->truncate();

        $now = date('Y-m-d H:i:s');

        $customers = array(
            array(
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'johndoe@gmail.com',
                'address' => '1234 1st Ave.',
                'address2' => 'Apt 3',
                'city' => 'Denver',
                'state' => 'CO',
                'zip' => '80111',
                'phone' => '555-555-5555',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            array(
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'email' => 'janedoe@gmail.com',
                'address' => '1234 1st Ave.',
                'address2' => '',
                'city' => 'Denver',
                'state' => 'CO',
                'zip' => '80111',
                'phone' => '555-555-5555',
                'created_at' => $now,
                'updated_at' => $now,
            )
        );

        // Uncomment the below to run the seeder
        DB::table('customer')->insert($customers);
    }

}
