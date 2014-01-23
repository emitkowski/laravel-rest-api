<?php

class AdminTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('admin')->truncate();

        $now = date('Y-m-d H:i:s');

        $admins = array(
            array(
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'test@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => $now,
                'updated_at' => $now,
            )
        );

        // Uncomment the below to run the seeder
        DB::table('admin')->insert($admins);
    }

}
