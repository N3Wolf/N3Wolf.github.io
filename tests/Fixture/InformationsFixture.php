<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InformationsFixture
 *
 */
class InformationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'title' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'argument' => ['type' => 'string', 'length' => 1023, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'reference_link' => ['type' => 'binary', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'trust_score' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'information_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'user_key_idx' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'information_key_idx' => ['type' => 'index', 'columns' => ['information_id'], 'length' => []],
            'title_idx' => ['type' => 'index', 'columns' => ['title'], 'length' => []],
            'trust_score_idx' => ['type' => 'index', 'columns' => ['trust_score'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'information_key' => ['type' => 'foreign', 'columns' => ['information_id'], 'references' => ['informations', 'id'], 'update' => 'cascade', 'delete' => 'noAction', 'length' => []],
            'user_key' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'cascade', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'user_id' => 1,
            'title' => 'Lorem ipsum dolor sit amet',
            'argument' => 'Lorem ipsum dolor sit amet',
            'reference_link' => 'Lorem ipsum dolor sit amet',
            'trust_score' => 1.5,
            'information_id' => 1,
            'created' => '2016-06-03 00:18:21',
            'modified' => '2016-06-03 00:18:21'
        ],
    ];
}
