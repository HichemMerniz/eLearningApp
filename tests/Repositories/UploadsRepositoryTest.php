<?php namespace Tests\Repositories;

use App\Models\Uploads;
use App\Repositories\UploadsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UploadsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UploadsRepository
     */
    protected $uploadsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->uploadsRepo = \App::make(UploadsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_uploads()
    {
        $uploads = Uploads::factory()->make()->toArray();

        $createdUploads = $this->uploadsRepo->create($uploads);

        $createdUploads = $createdUploads->toArray();
        $this->assertArrayHasKey('id', $createdUploads);
        $this->assertNotNull($createdUploads['id'], 'Created Uploads must have id specified');
        $this->assertNotNull(Uploads::find($createdUploads['id']), 'Uploads with given id must be in DB');
        $this->assertModelData($uploads, $createdUploads);
    }

    /**
     * @test read
     */
    public function test_read_uploads()
    {
        $uploads = Uploads::factory()->create();

        $dbUploads = $this->uploadsRepo->find($uploads->id);

        $dbUploads = $dbUploads->toArray();
        $this->assertModelData($uploads->toArray(), $dbUploads);
    }

    /**
     * @test update
     */
    public function test_update_uploads()
    {
        $uploads = Uploads::factory()->create();
        $fakeUploads = Uploads::factory()->make()->toArray();

        $updatedUploads = $this->uploadsRepo->update($fakeUploads, $uploads->id);

        $this->assertModelData($fakeUploads, $updatedUploads->toArray());
        $dbUploads = $this->uploadsRepo->find($uploads->id);
        $this->assertModelData($fakeUploads, $dbUploads->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_uploads()
    {
        $uploads = Uploads::factory()->create();

        $resp = $this->uploadsRepo->delete($uploads->id);

        $this->assertTrue($resp);
        $this->assertNull(Uploads::find($uploads->id), 'Uploads should not exist in DB');
    }
}
