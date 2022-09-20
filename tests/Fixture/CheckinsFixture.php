<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CheckinsFixture
 */
class CheckinsFixture extends TestFixture
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
                'membership_id' => 1,
                'created' => '2022-09-18 16:27:11',
                'modified' => '2022-09-18 16:27:11',
            ],
        ];
        parent::init();
    }
}
