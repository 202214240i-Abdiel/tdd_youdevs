<?php

namespace Tests\Feature;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReadEventTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_can_display_list_of_events(): void
    {
        // Arrange
        Event::create([
            'name' => 'Evento 1',
            'featured' => 'meme.png',
            'date' => Carbon::parse('2024-12-24 21:00:00')->toDateTimeString(),
            'time' => '12:00:00',
            'location' => 'EL SANTIAGO BERNABEU',
        ]);

        Event::create([
            'name' => 'Evento 2',
            'featured' => 'meme.png',
            'date' => Carbon::parse('2024-12-25 21:00:00')->toDateTimeString(),
            'time' => '12:00:00',
            'location' => 'EL SANTIAGO BERNABEU',
        ]);

        // Act
        $response = $this->get('/events');

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Evento 1');
        $response->assertSee('Evento 2');
    }
}
