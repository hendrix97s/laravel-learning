<?php

namespace Tests\Feature;

use App\Models\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CardTest extends TestCase
{
    
    public function test_card_index()
    {
      $this->withExceptionHandling();
      $response = $this->get(route('card.index'));
      $response->assertStatus(200);
    }

    public function test_card_store()
    {
      $this->withExceptionHandling();
      $payload = [
        'name'        => 'new card',
        'description' => 'card description',
        'code'        => 'uuid code'
      ];

      $response = $this->post(route('card.store'), $payload);
      $response->assertStatus(200);
    }

    public function test_card_update()
    {
      $this->withDeprecationHandling();
      $card = Card::factory()->create([
        'name'        => 'new card',
        'description' => 'card description',
        'code'        => 'uuid code'
      ]);

      $params = ['card_id' => $card->id];
      $payload = ['name' => 'card updated'];
      $response = $this->put(route('card.update', $params), $payload);
      $response->assertStatus(200);
    }

    public function test_card_show()
    {
      $this->withDeprecationHandling();
      $card = Card::factory()->create([
        'name'        => 'new card',
        'description' => 'card description',
        'code'        => 'uuid code'
      ]);

      $params = ['card_id' => $card->id];
      $response = $this->get(route('card.show', $params));
      $response->assertStatus(200);
    }

    public function test_card_destroy()
    {
      $this->withDeprecationHandling();
      $card = Card::factory()->create([
        'name'        => 'new card',
        'description' => 'card description',
        'code'        => 'uuid code'
      ]);

      $params = ['card_id' => $card->id];
      $response = $this->delete(route('card.destroy', $params));
      $response->assertStatus(200);
    }
}
