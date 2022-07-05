<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Project;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response()
    {
        $project = Project::create([
            'name' => 'test name',
            'external' => false,
            'external_url' => null,
            'image' => 'testimage.jpg',
            'description' => 'test_description',
            'category' => 'testcat1,testcat2'
        ]);

        $response = $this->get('/');

        $response->assertSee(ucwords($project->name));

        $response->assertStatus(200);
    }
}
