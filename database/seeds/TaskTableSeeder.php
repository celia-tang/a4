<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\Tag;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$tasks = [
    		['Finish A4 Assignment', 2, 0, '2017-08-09', 'homework'],
    		['Jumping Jacks', 4, 1, '2017-06-20', 'exercise'],
    		['Write Essay', 1, 0, '2018-02-02', 'homework'],
    		['Read a Book', 5, 1, '2017-05-29', 'other']
    	];

    	foreach($tasks as $task) {

    		$tag = $task[4];
    		$tag_id = Tag::where('description', '=', $tag)->pluck('id')->first();

    		$timestampForThisTask = Carbon\Carbon::now()->subDays(count($tasks));

    		Task::insert([
    			'created_at' => $timestampForThisTask,
    			'updated_at' => $timestampForThisTask,
    			'name' => $task[0],
    			'priority' => $task[1],
    			'completed' => $task[2],
    			'due_by' => $task[3],
    			'tag_id' => $tag_id,
    			]);
    	}
    }
}
