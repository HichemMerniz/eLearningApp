<?php namespace Tests\Repositories;

use App\Models\Courses;
use App\Repositories\CoursesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CoursesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CoursesRepository
     */
    protected $coursesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coursesRepo = \App::make(CoursesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_courses()
    {
        $courses = Courses::factory()->make()->toArray();

        $createdCourses = $this->coursesRepo->create($courses);

        $createdCourses = $createdCourses->toArray();
        $this->assertArrayHasKey('id', $createdCourses);
        $this->assertNotNull($createdCourses['id'], 'Created Courses must have id specified');
        $this->assertNotNull(Courses::find($createdCourses['id']), 'Courses with given id must be in DB');
        $this->assertModelData($courses, $createdCourses);
    }

    /**
     * @test read
     */
    public function test_read_courses()
    {
        $courses = Courses::factory()->create();

        $dbCourses = $this->coursesRepo->find($courses->id);

        $dbCourses = $dbCourses->toArray();
        $this->assertModelData($courses->toArray(), $dbCourses);
    }

    /**
     * @test update
     */
    public function test_update_courses()
    {
        $courses = Courses::factory()->create();
        $fakeCourses = Courses::factory()->make()->toArray();

        $updatedCourses = $this->coursesRepo->update($fakeCourses, $courses->id);

        $this->assertModelData($fakeCourses, $updatedCourses->toArray());
        $dbCourses = $this->coursesRepo->find($courses->id);
        $this->assertModelData($fakeCourses, $dbCourses->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_courses()
    {
        $courses = Courses::factory()->create();

        $resp = $this->coursesRepo->delete($courses->id);

        $this->assertTrue($resp);
        $this->assertNull(Courses::find($courses->id), 'Courses should not exist in DB');
    }
}
