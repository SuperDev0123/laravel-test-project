<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\TeamMemberManager;
use Livewire\Livewire;
use Tests\TestCase;

class LeaveTeamTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_leave_teams(): void
    {
        $user = User::factory()->withPersonalTeam()->create();

        $user->current_team->users()->attach(
            $otherUser = User::factory()->create(), ['role' => 'admin']
        );

        $this->actingAs($otherUser);

        $component = Livewire::test(TeamMemberManager::class, ['team' => $user->current_team])
                        ->call('leaveTeam');

        $this->assertCount(0, $user->current_team->fresh()->users);
    }

    public function test_team_owners_cant_leave_their_own_team(): void
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $component = Livewire::test(TeamMemberManager::class, ['team' => $user->current_team])
                        ->call('leaveTeam')
                        ->assertHasErrors(['team']);

        $this->assertNotNull($user->current_team->fresh());
    }
}
