<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'name'  => 'Admin',
                'email' => 'admin',
                'password' => bcrypt('123'),
            ],
            [
                'name'  => 'Автор не известен',
                'email' => 'author_unknown@g.g',
                'password' => bcrypt(Str::random(16)),
            ],
            [
                'name'  => 'Автор',
                'email' => 'authorl@g.g',
                'password' => bcrypt('1231123'),
            ],
        ];

        var_dump($data);

        \DB::table('users')->insert($data);
    }
}
