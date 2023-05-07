<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SubSection;

class SubSectionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sub_section()
    {
        $subSection = SubSection::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sub_sections', $subSection
        );

        $this->assertApiResponse($subSection);
    }

    /**
     * @test
     */
    public function test_read_sub_section()
    {
        $subSection = SubSection::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/sub_sections/'.$subSection->id
        );

        $this->assertApiResponse($subSection->toArray());
    }

    /**
     * @test
     */
    public function test_update_sub_section()
    {
        $subSection = SubSection::factory()->create();
        $editedSubSection = SubSection::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sub_sections/'.$subSection->id,
            $editedSubSection
        );

        $this->assertApiResponse($editedSubSection);
    }

    /**
     * @test
     */
    public function test_delete_sub_section()
    {
        $subSection = SubSection::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sub_sections/'.$subSection->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sub_sections/'.$subSection->id
        );

        $this->response->assertStatus(404);
    }
}
