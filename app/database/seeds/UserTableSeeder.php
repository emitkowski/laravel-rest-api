<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('user')->truncate();

        $now = date('Y-m-d H:i:s');

        $users = array(
            array(
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('password'),
                'first_name' => 'John',
                'last_name' => 'Doe',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            array(
                'email' => 'janedoe@gmail.com',
                'password' => Hash::make('password'),
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            array(
                'email' => 'emitkowski@gmail.com',
                'password' => Hash::make('password'),
                'first_name' => 'Eric',
                'last_name' => 'Mitkowski',
                'created_at' => $now,
                'updated_at' => $now,
            )
        );

        // Uncomment the below to run the seeder
        DB::table('user')->insert($users);
    }

}
