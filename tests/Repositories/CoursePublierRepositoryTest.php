<?php namespace Tests\Repositories;

use App\Models\CoursePublier;
use App\Repositories\CoursePublierRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CoursePublierRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CoursePublierRepository
     */
    protected $coursePublierRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coursePublierRepo = \App::make(CoursePublierRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_course_publier()
    {
        $coursePublier = CoursePublier::factory()->make()->toArray();

        $createdCoursePublier = $this->coursePublierRepo->create($coursePublier);

        $createdCoursePublier = $createdCoursePublier->toArray();
        $this->assertArrayHasKey('id', $createdCoursePublier);
        $this->assertNotNull($createdCoursePublier['id'], 'Created CoursePublier must have id specified');
        $this->assertNotNull(CoursePublier::find($createdCoursePublier['id']), 'CoursePublier with given id must be in DB');
        $this->assertModelData($coursePublier, $createdCoursePublier);
    }

    /**
     * @test read
     */
    public function test_read_course_publier()
    {
        $coursePublier = CoursePublier::factory()->create();

        $dbCoursePublier = $this->coursePublierRepo->find($coursePublier->id);

        $dbCoursePublier = $dbCoursePublier->toArray();
        $this->assertModelData($coursePublier->toArray(), $dbCoursePublier);
    }

    /**
     * @test update
     */
    public function test_update_course_publier()
    {
        $coursePublier = CoursePublier::factory()->create();
        $fakeCoursePublier = CoursePublier::factory()->make()->toArray();

        $updatedCoursePublier = $this->coursePublierRepo->update($fakeCoursePublier, $coursePublier->id);

        $this->assertModelData($fakeCoursePublier, $updatedCoursePublier->toArray());
        $dbCoursePublier = $this->coursePublierRepo->find($coursePublier->id);
        $this->assertModelData($fakeCoursePublier, $dbCoursePublier->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_course_publier()
    {
        $coursePublier = CoursePublier::factory()->create();

        $resp = $this->coursePublierRepo->delete($coursePublier->id);

        $this->assertTrue($resp);
        $this->assertNull(CoursePublier::find($coursePublier->id), 'CoursePublier should not exist in DB');
    }
}
