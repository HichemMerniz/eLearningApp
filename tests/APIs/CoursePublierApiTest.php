<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CoursePublier;

class CoursePublierApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_course_publier()
    {
        $coursePublier = CoursePublier::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/course_publiers', $coursePublier
        );

        $this->assertApiResponse($coursePublier);
    }

    /**
     * @test
     */
    public function test_read_course_publier()
    {
        $coursePublier = CoursePublier::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/course_publiers/'.$coursePublier->id
        );

        $this->assertApiResponse($coursePublier->toArray());
    }

    /**
     * @test
     */
    public function test_update_course_publier()
    {
        $coursePublier = CoursePublier::factory()->create();
        $editedCoursePublier = CoursePublier::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/course_publiers/'.$coursePublier->id,
            $editedCoursePublier
        );

        $this->assertApiResponse($editedCoursePublier);
    }

    /**
     * @test
     */
    public function test_delete_course_publier()
    {
        $coursePublier = CoursePublier::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/course_publiers/'.$coursePublier->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/course_publiers/'.$coursePublier->id
        );

        $this->response->assertStatus(404);
    }
}
