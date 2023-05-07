<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Section;

class SectionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_section()
    {
        $section = Section::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sections', $section
        );

        $this->assertApiResponse($section);
    }

    /**
     * @test
     */
    public function test_read_section()
    {
        $section = Section::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/sections/'.$section->id
        );

        $this->assertApiResponse($section->toArray());
    }

    /**
     * @test
     */
    public function test_update_section()
    {
        $section = Section::factory()->create();
        $editedSection = Section::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sections/'.$section->id,
            $editedSection
        );

        $this->assertApiResponse($editedSection);
    }

    /**
     * @test
     */
    public function test_delete_section()
    {
        $section = Section::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sections/'.$section->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sections/'.$section->id
        );

        $this->response->assertStatus(404);
    }
}
