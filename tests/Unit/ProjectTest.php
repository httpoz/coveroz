<?php

namespace Tests\Unit;

use App\Metric;
use App\Project;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProjectUserRelationship()
    {
        $project = factory(Project::class)->create();

        $user = User::first();

        $this->assertEquals($project->user->id, $user->id);
    }

    public function testHealthAttribute()
    {
        $project = factory(Project::class)->create();
        factory(Metric::class)->create(['project_id' => $project->id, 'coveredstatements' => 69, 'statements' => 184]);

        $this->assertEquals('37.5', $project->health);
        $this->assertEquals(asset('images/health/low.png'), $project->health_img);

    }
}
