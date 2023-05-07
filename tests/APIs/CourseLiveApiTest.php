<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CourseLive;

class CourseLiveApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_course_live()
    {
        $courseLive = CourseLive::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/course_lives', $courseLive
        );

        $this->assertApiResponse($courseLive);
    }

    /**
     * @test
     */
    public function test_read_course_live()
    {
        $courseLive = CourseLive::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/course_lives/'.$courseLive->id
        );

        $this->assertApiResponse($courseLive->toArray());
    }

    /**
     * @test
     */
    public function test_update_course_live()
    {
        $courseLive = CourseLive::factory()->create();
        $editedCourseLive = CourseLive::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/course_lives/'.$courseLive->id,
            $editedCourseLive
        );

        $this->assertApiResponse($editedCourseLive);
    }

    /**
     * @test
     */
    public function test_delete_course_live()
    {
        $courseLive = CourseLive::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/course_lives/'.$courseLive->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/course_lives/'.$courseLive->id
        );

        $this->response->assertStatus(404);
    }
}
