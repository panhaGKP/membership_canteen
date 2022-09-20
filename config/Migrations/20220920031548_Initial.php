<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{

    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('bundles')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('price', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('duration', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('checkins')
            ->addColumn('customer_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('membership_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('customers')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('gender', 'char', [
                'default' => null,
                'limit' => 1,
                'null' => false,
            ])
            ->addColumn('date_of_birth', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('phone_number', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('profile_picture', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('deleted', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('memberships')
            ->addColumn('customer_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('bundle_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('start_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('end_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('is_active', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('deleted', 'tinyinteger', [
                'default' => '0',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {
        $this->table('bundles')->drop()->save();
        $this->table('checkins')->drop()->save();
        $this->table('customers')->drop()->save();
        $this->table('memberships')->drop()->save();
    }
}
