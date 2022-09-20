<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BundlesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BundlesTable Test Case
 */
class BundlesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BundlesTable
     */
    protected $Bundles;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Bundles',
        'app.Memberships',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Bundles') ? [] : ['className' => BundlesTable::class];
        $this->Bundles = $this->getTableLocator()->get('Bundles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Bundles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BundlesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
