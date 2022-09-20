<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MembershipsFixture
 */
class MembershipsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'customer_id' => 1,
                'bundle_id' => 1,
                'start_date' => '2022-09-15',
                'end_date' => '2022-09-15',
                'is_active' => 1,
                'deleted' => 1,
                'created' => '2022-09-15 02:54:28',
                'modified' => '2022-09-15 02:54:28',
            ],
        ];
        parent::init();
    }
}
