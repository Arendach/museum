<?php

namespace Tests\Feature\Admin;

use App\Models\Quote;
use Tests\TestCase;

class QuotesTest extends TestCase
{
    public function testGetQuote(): void
    {
        $quote = Quote::factory()->create();

        $this->get(route('api.admin.quote', [$quote->id]))
            ->assertStatus(200)
            ->assertJsonFragment(['title' => $quote->title])
            ->assertJsonFragment(['title_ru' => $quote->title_ru])
            ->assertJsonFragment(['title_en' => $quote->title_en])
            ->assertJsonFragment(['name' => $quote->people->name]);
    }

    public function testGetQuotes(): void
    {
        $quote = Quote::orderByDesc('id')->first();

        $this->get(route('api.admin.quotes'))
            ->assertStatus(200)
            ->assertJsonFragment(['title' => $quote->title])
            ->assertJsonFragment(['title_ru' => $quote->title_ru])
            ->assertJsonFragment(['title_en' => $quote->title_en])
            ->assertJsonFragment(['name' => $quote->people->name]);
    }

    public function testUpdate(): void
    {
        $quote = Quote::first();
        $newQuote = Quote::factory()->make();

        $this->put(route('api.admin.quote.update', [$quote->id]), [
            'title'     => $newQuote->title,
            'title_ru'  => $newQuote->title_ru,
            'title_en'  => $newQuote->title_en,
            'people_id' => $newQuote->people->id,
        ])
            ->assertStatus(200)
            ->assertJson(['success' => true]);

        $this->assertDatabaseHas('quotes', [
            'id'        => $quote->id,
            'title'     => $newQuote->title,
            'title_ru'  => $newQuote->title_ru,
            'title_en'  => $newQuote->title_en,
            'people_id' => $newQuote->people->id
        ]);
    }

    public function testDelete(): void
    {
        $quote = Quote::factory()->create();

        $this->delete(route('api.admin.quote.delete', [$quote->id]))
            ->assertStatus(200)
            ->assertJson(['success' => true]);

        $this->assertDatabaseMissing('quotes', ['id' => $quote->id]);
    }
}
