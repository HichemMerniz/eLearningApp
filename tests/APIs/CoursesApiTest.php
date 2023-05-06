<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Courses;

class CoursesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_courses()
    {
        $courses = Courses::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/courses', $courses
        );

        $this->assertApiResponse($courses);
    }

    /**
     * @test
     */
    public function test_read_courses()
    {
        $courses = Courses::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/courses/'.$courses->id
        );

        $this->assertApiResponse($courses->toArray());
    }

    /**
     * @test
     */
    public function test_update_courses()
    {
        $courses = Courses::factory()->create();
        $editedCourses = Courses::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/courses/'.$courses->id,
            $editedCourses
        );

        $this->assertApiResponse($editedCourses);
    }

    /**
     * @test
     */
    public function test_delete_courses()
    {
        $courses = Courses::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/courses/'.$courses->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/courses/'.$courses->id
        );

        $this->response->assertStatus(404);
    }
}
