<?php

namespace Tests\Feature;

use App\Project;
use App\User;
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
}
