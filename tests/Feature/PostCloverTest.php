<?php

namespace Tests\Feature;

use App\Project;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostCloverTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */

    public function testFileIsRequiredInPostingMetric()
    {
        $project = factory(Project::class)->create();
        $reponse = $this->json('POST', "/hooks/{$project->hook_id}/metric");

        $reponse
            ->assertStatus(422)
            ->assertJsonValidationErrors(['report']);
    }
}
