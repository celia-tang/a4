<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags =[
	        ['exercise'],
	        ['homework'],
	        ['chores'],
	        ['other']
        ];

        $timestamp = Carbon\Carbon::now()->subDays(count($tags));

        foreach($tags as $tag) {

        	$timestampForThisTag = $timestamp->addDay()->toDateTimeString();
        	Tag::insert([
        		'created_at' => $timestampForThisTag,
        		'updated_at' => $timestampForThisTag,
        		'description' => $tag[0],
        		]);

        }
    }
}
