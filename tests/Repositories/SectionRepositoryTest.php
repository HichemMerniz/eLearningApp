<?php namespace Tests\Repositories;

use App\Models\Section;
use App\Repositories\SectionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SectionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SectionRepository
     */
    protected $sectionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sectionRepo = \App::make(SectionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_section()
    {
        $section = Section::factory()->make()->toArray();

        $createdSection = $this->sectionRepo->create($section);

        $createdSection = $createdSection->toArray();
        $this->assertArrayHasKey('id', $createdSection);
        $this->assertNotNull($createdSection['id'], 'Created Section must have id specified');
        $this->assertNotNull(Section::find($createdSection['id']), 'Section with given id must be in DB');
        $this->assertModelData($section, $createdSection);
    }

    /**
     * @test read
     */
    public function test_read_section()
    {
        $section = Section::factory()->create();

        $dbSection = $this->sectionRepo->find($section->id);

        $dbSection = $dbSection->toArray();
        $this->assertModelData($section->toArray(), $dbSection);
    }

    /**
     * @test update
     */
    public function test_update_section()
    {
        $section = Section::factory()->create();
        $fakeSection = Section::factory()->make()->toArray();

        $updatedSection = $this->sectionRepo->update($fakeSection, $section->id);

        $this->assertModelData($fakeSection, $updatedSection->toArray());
        $dbSection = $this->sectionRepo->find($section->id);
        $this->assertModelData($fakeSection, $dbSection->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_section()
    {
        $section = Section::factory()->create();

        $resp = $this->sectionRepo->delete($section->id);

        $this->assertTrue($resp);
        $this->assertNull(Section::find($section->id), 'Section should not exist in DB');
    }
}
