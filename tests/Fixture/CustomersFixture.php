<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustomersFixture
 */
class CustomersFixture extends TestFixture
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
                'gender' => '',
                'date_of_birth' => '2022-09-15',
                'phone_number' => 'Lorem ipsum dolor sit amet',
                'profile_picture' => 'Lorem ipsum dolor sit amet',
                'deleted' => 1,
                'created' => '2022-09-15 02:54:16',
                'modified' => '2022-09-15 02:54:16',
            ],
        ];
        parent::init();
    }
}
