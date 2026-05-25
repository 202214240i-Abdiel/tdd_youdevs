<?php

namespace Tests\Feature;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateEventTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected Event $event;

    protected function setUp(): void
    {
        parent::setUp();

        $this->event = Event::create([
            'name' => 'Evento a ser actualizado',
            'featured' => 'evento3.png',
            'date' => Carbon::parse('2024-12-24 21:00:00')->toDateTimeString(),
            'time' => '21:00:00',
            'location' => 'ubicacion sin actualizar',
        ]);
    }

    public function test_an_event_can_be_updated(): void
    {
        // Arrange
        $updatedData = [
            'name' => 'Evento actualizado',
        ];

        // Act
        $response = $this->put('/events/' . $this->event->id, $updatedData);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('events', [
            'id' => $this->event->id,
            'name' => 'Evento actualizado',
        ]);
    }
}
