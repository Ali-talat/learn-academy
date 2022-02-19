<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SideContent;

class SideContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SideContent::create([
            'name'=>'banner',
            'content'=>json_encode([
                "titel"=>"EVERY student YEARNS TO LEARN",
                "subtitel"=>"Making Your Childs  Better",
                "desc"=>"Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales his void unto last session for bite. Set have great you'll male grass yielding yielding man"
            ]),
            
        ]);
        SideContent::create([
            'name'=>'feature',
            'content'=>json_encode([
                "titel"=>"Awesome Feature",
                "desc"=>"Set have great you male grass yielding an yielding first their you're have called the abundantly fruit were man",
                "titel2"=>"Better Future",
                "desc2"=>"Set have great you male grasses yielding yielding first their to called deep abundantly Set have great you male",
                "titel3"=>"Qualified Trainers",
                "desc3"=>"Set have great you male grasses yielding yielding first their to called deep abundantly Set have great you male",
                "titel4"=>"Job Oppurtunity",
                "desc4"=>"Set have great you male grasses yielding yielding first their to called deep abundantly Set have great you male",

            ]),
            
        ]);
        SideContent::create([
            'name'=>'Special Courses',
            'content'=>json_encode([
                "titel"=>"POPULAR COURSES",
                "subtitel"=>"Special Courses",
            ]),
            
        ]);
        SideContent::create([
            'name'=>'TESTIMONIALS',
            'content'=>json_encode([
                "titel"=>"TESTIMONIALS",
                "subtitel"=>"Happy Students",
            ]),
            
        ]);
    }
}
