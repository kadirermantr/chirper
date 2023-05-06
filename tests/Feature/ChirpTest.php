<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChirpTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function test_chirp_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/chirps');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function chirp_can_be_created(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/chirps', [
                'message' => 'Test Chirp',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/chirps');

        $this->assertDatabaseHas('chirps', [
            'user_id' => $user->id,
            'message' => 'Test Chirp',
        ]);
    }

    /**
     * @test
     */
    public function chirp_can_be_updated(): void
    {
        $user = User::factory()->create();

        $chirp = $user->chirps()->create([
            'message' => 'Test Chirp',
        ]);

        $response = $this
            ->actingAs($user)
            ->patch("/chirps/$chirp->id", [
                'message' => 'Updated Chirp',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/chirps');

        $this->assertDatabaseHas('chirps', [
            'id' => $chirp->id,
            'message' => 'Updated Chirp',
        ]);
    }

    /**
     * @test
     */
    public function chirp_can_be_deleted(): void
    {
        $user = User::factory()->create();

        $chirp = $user->chirps()->create([
            'message' => 'Test Chirp',
        ]);

        $response = $this
            ->actingAs($user)
            ->delete("/chirps/$chirp->id");

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/chirps');

        $this->assertDatabaseMissing('chirps', [
            'id' => $chirp->id,
        ]);
    }
}
