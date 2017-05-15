<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Task;
use App\Tag;

class TaskController extends Controller
{
  
  
	public function add(Request $request){

		if ($_GET) {
			$this->validate($request, [
				'name' => 'required',
				'deadline' => 'date_format:Y-m-d|after:tomorrow'
				]);
		}

		$tasks = new Task();

		$name = $request->input('name');
		$priority = $request->input('priority');
		$deadline = $request->input('deadline');
		$tag = $request->input('tag');

		$tags = Tag::where('description', '=', $tag)->first();

		$tasks->name = $name;
		$tasks->priority = $priority;
		$tasks->completed = 0;
		$tasks->due_by = $deadline;
		$tasks->tag()->associate($tags);

		$tasks->save();

		$tasks = Task::all();
		$tags = Tag::all();

		return view('tasks.form')->with([
			'entries' => $tasks,
			'tags' => $tags,
			'complete' => 0
		]);
	}

	public function upname(){
		$tasks = Task::orderBy('name')->get();
		$tags = Tag::all();

		return view('tasks.form')->with([
			'entries' => $tasks,
			'tags' => $tags,
			'complete' => 0
		]);
	}

	public function uppriority(){
		$tasks = Task::orderBy('priority')->get();
		$tags = Tag::all();
		
		return view('tasks.form')->with([
			'entries' => $tasks,
			'tags' => $tags,
			'complete' => 0
		]);
	}

	public function updue(){
		$tasks = Task::orderBy('due_by')->get();
		$tags = Tag::all();
		
		return view('tasks.form')->with([
			'entries' => $tasks,
			'tags' => $tags,
			'complete' => 0
		]);
	}

	public function incomplete(){
		$tasks = Task::where('completed', '=', 0)->get();
		$tags = Tag::all();
		
		return view('tasks.form')->with([
			'entries' => $tasks,
			'tags' => $tags,
			'complete' => 1
		]);
	}

	public function completed(){
		$tasks = Task::where('completed', '=', 1)->get();
		$tags = Tag::all();
		
		return view('tasks.form')->with([
			'entries' => $tasks,
			'tags' => $tags,
			'complete' => 2
		]);
	}

	public function delete($t){
		$tasks = Task::where('id', '=', $t)->first();
		$tasks->delete();
		$tasks = Task::all();
		$tags = Tag::all();
		
		return view('tasks.form')->with([
			'entries' => $tasks,
			'tags' => $tags,
			'complete' => 0
		]);
	}

	public function switch($t){

		$task = Task::where('id', '=', $t)->first();

		if ($task->completed == 0){
			$task->completed = 1;
			$task->save();
		} else {
			$task->completed = 0;
			$task->save();
		}

		$tasks = Task::all();
		$tags = Tag::all();

		return view('tasks.form')->with([
			'entries' => $tasks,
			'tags' => $tags,
			'complete' => 0
		]);

	}

	public function tag($t){

		$id = Task::where('id', '=', $t)->first();
		$tasks = Task::where('tag_id', '=', $id->tag_id)->get();
		$tags = Tag::all();

		return view('tasks.form')->with([
			'entries' => $tasks,
			'tags' => $tags,
			'complete' => 0
		]);
	}

	public function show() {
		$tasks = Task::all();
		$tags = Tag::all();

		return view('tasks.form')->with([
			'entries' => $tasks,
			'tags' => $tags,
			'complete' => 0
		]);
	}

 //    public function search(Request $request) {

 //    	if ($_GET) {
 //    		$this->validate($request, [
 //        		'word' => 'required|alpha|max:15',
 //    		]);
 //    	}

	//     $wordS = $request->input('word');
	//     $word = strtolower($request->input('word'));
	//     $bonus = $request->input('bonus');
	//     $bingo = $request->input('bingo');

	//     $points = ['eaotinrslu', 'dg','cmbp','hfwyv', 'k', ' ', ' ', 'jx', ' ', 'qz'];
	// 	$count = 0;

	// 	for ($j = 0; $j < strlen($word); $j++) {

	// 		for ($i = 0; $i < 10; $i++) {
	// 			if (strrchr($points[$i], $word[$j]) != false) {
	// 				$count = $count + 1 + $i;
	// 			}
	// 		}
	// 	} 

	// 	//check for multiplier
	// 	if ($bonus == "triple") {
	// 		$count  = $count * 3;
	// 	} else if ($bonus == "double") {
	// 		$count  = $count * 2;
	// 	} 

	// 	//check for bingo
	// 	if ($bingo == "true") {
	// 		$count + 50;
	// 	} 

	//     return view('tasks.form')->with([
 //        'points' => $count,
 //        'word' => $wordS
 //    	]);
	// }
}