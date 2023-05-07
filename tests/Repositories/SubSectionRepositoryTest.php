<?php namespace Tests\Repositories;

use App\Models\SubSection;
use App\Repositories\SubSectionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SubSectionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubSectionRepository
     */
    protected $subSectionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->subSectionRepo = \App::make(SubSectionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sub_section()
    {
        $subSection = SubSection::factory()->make()->toArray();

        $createdSubSection = $this->subSectionRepo->create($subSection);

        $createdSubSection = $createdSubSection->toArray();
        $this->assertArrayHasKey('id', $createdSubSection);
        $this->assertNotNull($createdSubSection['id'], 'Created SubSection must have id specified');
        $this->assertNotNull(SubSection::find($createdSubSection['id']), 'SubSection with given id must be in DB');
        $this->assertModelData($subSection, $createdSubSection);
    }

    /**
     * @test read
     */
    public function test_read_sub_section()
    {
        $subSection = SubSection::factory()->create();

        $dbSubSection = $this->subSectionRepo->find($subSection->id);

        $dbSubSection = $dbSubSection->toArray();
        $this->assertModelData($subSection->toArray(), $dbSubSection);
    }

    /**
     * @test update
     */
    public function test_update_sub_section()
    {
        $subSection = SubSection::factory()->create();
        $fakeSubSection = SubSection::factory()->make()->toArray();

        $updatedSubSection = $this->subSectionRepo->update($fakeSubSection, $subSection->id);

        $this->assertModelData($fakeSubSection, $updatedSubSection->toArray());
        $dbSubSection = $this->subSectionRepo->find($subSection->id);
        $this->assertModelData($fakeSubSection, $dbSubSection->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sub_section()
    {
        $subSection = SubSection::factory()->create();

        $resp = $this->subSectionRepo->delete($subSection->id);

        $this->assertTrue($resp);
        $this->assertNull(SubSection::find($subSection->id), 'SubSection should not exist in DB');
    }
}
