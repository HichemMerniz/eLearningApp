<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Exames;

class ExamesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_exames()
    {
        $exames = Exames::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/exames', $exames
        );

        $this->assertApiResponse($exames);
    }

    /**
     * @test
     */
    public function test_read_exames()
    {
        $exames = Exames::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/exames/'.$exames->id
        );

        $this->assertApiResponse($exames->toArray());
    }

    /**
     * @test
     */
    public function test_update_exames()
    {
        $exames = Exames::factory()->create();
        $editedExames = Exames::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/exames/'.$exames->id,
            $editedExames
        );

        $this->assertApiResponse($editedExames);
    }

    /**
     * @test
     */
    public function test_delete_exames()
    {
        $exames = Exames::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/exames/'.$exames->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/exames/'.$exames->id
        );

        $this->response->assertStatus(404);
    }
}
