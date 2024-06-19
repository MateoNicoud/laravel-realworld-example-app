<?php


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Exécuter les migrations
        $this->artisan('migrate');
    }
    public function test_articles()
    {
        $this->seed();

        $url = 'api/articles/xvs3zjl';

        $response = $this->get($url);

        $response->assertStatus(200);

        $expectedJson = '{"article":{"slug":"xvs3zjl","title":"XVs3zJL","description":"L5Ro54Luo0","body":"UX8tNbKA8O","tagList":["ouk"],"createdAt":"2024-06-13T09:43:02.000000Z","updatedAt":"2024-06-13T09:43:02.000000Z","favoritesCount":0,"favorited":false,"author":{"username":"Rose","bio":"Je voudrais devenir enseignante pour enfants","image":null,"following":false}}}';

        $response->assertExactJson(json_decode($expectedJson, true));
    }


}
