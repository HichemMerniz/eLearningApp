<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Uploads;

class UploadsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_uploads()
    {
        $uploads = Uploads::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/uploads', $uploads
        );

        $this->assertApiResponse($uploads);
    }

    /**
     * @test
     */
    public function test_read_uploads()
    {
        $uploads = Uploads::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/uploads/'.$uploads->id
        );

        $this->assertApiResponse($uploads->toArray());
    }

    /**
     * @test
     */
    public function test_update_uploads()
    {
        $uploads = Uploads::factory()->create();
        $editedUploads = Uploads::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/uploads/'.$uploads->id,
            $editedUploads
        );

        $this->assertApiResponse($editedUploads);
    }

    /**
     * @test
     */
    public function test_delete_uploads()
    {
        $uploads = Uploads::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/uploads/'.$uploads->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/uploads/'.$uploads->id
        );

        $this->response->assertStatus(404);
    }
}
