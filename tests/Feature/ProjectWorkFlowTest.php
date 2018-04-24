<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use HttpOz\Hook\Models\Hook;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectWorkFlowTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListProjects()
    {
        $user = factory(User::class)->create();
        factory(Project::class, 5)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->json('GET', '/projects');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }

    public function testCreateProject()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->json('POST', '/projects', ['title' => 'Project Coverage']);

        $project = $user->projects()->first();

        $response->assertStatus(200);
        $this->assertEquals(1, $user->projects()->count());
        $this->assertEquals(Hook::first()->id, $project->hook_id);
    }
}
