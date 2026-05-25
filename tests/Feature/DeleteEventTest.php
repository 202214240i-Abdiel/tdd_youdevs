<?php

namespace Tests\Feature;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_event_can_be_deleted(): void
    {
        // Arrange
        $event = Event::create([
            'name' => 'Conferencia de YouDevs',
            'featured' => 'meme.png',
            'date' => Carbon::parse('2024-12-24 20:00:00')->toDateTimeString(),
            'time' => '20:00:00',
            'location' => 'YouDevslandia',
        ]);

        // Act
        $response = $this->delete('/event/' . $event->id);

        // Assert
        $response->assertStatus(204); // Respuesta sin contenido
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }
}
