<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestModels extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_Get_Project_Name()
    {
        $project= new \App\Models\Project;
        $project->project_name('Educ');
        $this->assertEquals($this->project_name,'educ');
    }
}
