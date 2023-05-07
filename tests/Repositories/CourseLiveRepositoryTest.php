<?php namespace Tests\Repositories;

use App\Models\CourseLive;
use App\Repositories\CourseLiveRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CourseLiveRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CourseLiveRepository
     */
    protected $courseLiveRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->courseLiveRepo = \App::make(CourseLiveRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_course_live()
    {
        $courseLive = CourseLive::factory()->make()->toArray();

        $createdCourseLive = $this->courseLiveRepo->create($courseLive);

        $createdCourseLive = $createdCourseLive->toArray();
        $this->assertArrayHasKey('id', $createdCourseLive);
        $this->assertNotNull($createdCourseLive['id'], 'Created CourseLive must have id specified');
        $this->assertNotNull(CourseLive::find($createdCourseLive['id']), 'CourseLive with given id must be in DB');
        $this->assertModelData($courseLive, $createdCourseLive);
    }

    /**
     * @test read
     */
    public function test_read_course_live()
    {
        $courseLive = CourseLive::factory()->create();

        $dbCourseLive = $this->courseLiveRepo->find($courseLive->id);

        $dbCourseLive = $dbCourseLive->toArray();
        $this->assertModelData($courseLive->toArray(), $dbCourseLive);
    }

    /**
     * @test update
     */
    public function test_update_course_live()
    {
        $courseLive = CourseLive::factory()->create();
        $fakeCourseLive = CourseLive::factory()->make()->toArray();

        $updatedCourseLive = $this->courseLiveRepo->update($fakeCourseLive, $courseLive->id);

        $this->assertModelData($fakeCourseLive, $updatedCourseLive->toArray());
        $dbCourseLive = $this->courseLiveRepo->find($courseLive->id);
        $this->assertModelData($fakeCourseLive, $dbCourseLive->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_course_live()
    {
        $courseLive = CourseLive::factory()->create();

        $resp = $this->courseLiveRepo->delete($courseLive->id);

        $this->assertTrue($resp);
        $this->assertNull(CourseLive::find($courseLive->id), 'CourseLive should not exist in DB');
    }
}
