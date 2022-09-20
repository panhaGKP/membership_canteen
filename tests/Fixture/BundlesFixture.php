<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BundlesFixture
 */
class BundlesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'price' => 1,
                'duration' => 1,
                'deleted' => 1,
                'created' => '2022-09-15 02:53:45',
                'modified' => '2022-09-15 02:53:45',
            ],
        ];
        parent::init();
    }
}
