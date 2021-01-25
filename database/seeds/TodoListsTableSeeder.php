<?php

use Illuminate\Database\Seeder;

class TodoListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks=[
            [
                'user_for_name'=>'Jon',
                'user_for_email'=>'Jon@mail.com',
                'user_id'  => '1',
                'task_text' => 'Task 1',
                'task_name'=>'Task1',
                'task_done' => true,
            ],
            [
                'user_for_name'=>'Ivan',
                'user_for_email'=>'Ivan@mail.com',
                'user_id'  => '1',
                'task_text' => 'Task 2',
                'task_name'=>'Task2',
                'task_done' => false,
            ],
            [
                'user_for_name'=>'Anna',
                'user_for_email'=>'Anna@mail.com',
                'user_id'  => '1',
                'task_text' => 'Task 3',
                'task_name'=>'Task3',
                'task_done' => true,
            ],
            [
                'user_for_name'=>'Joanna',
                'user_for_email'=>'JAnna@mail.com',
                'user_id'  => '1',
                'task_text' => 'Task 3',
                'task_name'=>'Task3',
                'task_done' => false,
            ],
            [
                'user_for_name'=>'ZZZ',
                'user_for_email'=>'ZZZ@mail.com',
                'user_id'  => '1',
                'task_text' => 'Task ZZZ',
                'task_name'=>'TaskZZZ',
                'task_done' => false,
            ],
        ];

        var_dump($tasks);

        \DB::table('todo_lists')->insert($tasks);
    }
}
