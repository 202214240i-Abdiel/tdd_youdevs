<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateEventTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_an_event_can_be_created(): void
    {
        // Arrange
        $eventDate = Carbon::parse('2024-12-24 21:00:00')->toDateTimeString();

        $eventData = [
            'name' => 'Conferencia de YouDevs',
            'featured' => 'meme.png',
            'date' => $eventDate,
            'time' => '12:00:00',
            'location' => 'EL SANTIAGO BERNABEU',
        ];

        // Act
        $response = $this->post('/events', $eventData);

        // Assert
        $response->assertStatus(302); // Redirect
        $this->assertDatabaseHas('events', $eventData);
    }
}
