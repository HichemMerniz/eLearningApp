<?php namespace Tests\Repositories;

use App\Models\Exames;
use App\Repositories\ExamesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ExamesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ExamesRepository
     */
    protected $examesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->examesRepo = \App::make(ExamesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_exames()
    {
        $exames = Exames::factory()->make()->toArray();

        $createdExames = $this->examesRepo->create($exames);

        $createdExames = $createdExames->toArray();
        $this->assertArrayHasKey('id', $createdExames);
        $this->assertNotNull($createdExames['id'], 'Created Exames must have id specified');
        $this->assertNotNull(Exames::find($createdExames['id']), 'Exames with given id must be in DB');
        $this->assertModelData($exames, $createdExames);
    }

    /**
     * @test read
     */
    public function test_read_exames()
    {
        $exames = Exames::factory()->create();

        $dbExames = $this->examesRepo->find($exames->id);

        $dbExames = $dbExames->toArray();
        $this->assertModelData($exames->toArray(), $dbExames);
    }

    /**
     * @test update
     */
    public function test_update_exames()
    {
        $exames = Exames::factory()->create();
        $fakeExames = Exames::factory()->make()->toArray();

        $updatedExames = $this->examesRepo->update($fakeExames, $exames->id);

        $this->assertModelData($fakeExames, $updatedExames->toArray());
        $dbExames = $this->examesRepo->find($exames->id);
        $this->assertModelData($fakeExames, $dbExames->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_exames()
    {
        $exames = Exames::factory()->create();

        $resp = $this->examesRepo->delete($exames->id);

        $this->assertTrue($resp);
        $this->assertNull(Exames::find($exames->id), 'Exames should not exist in DB');
    }
}
