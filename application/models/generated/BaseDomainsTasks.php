<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('DomainsTasks', 'doctrine');

/**
 * BaseDomainsTasks
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $task_id
 * @property timestamp $startdate
 * @property timestamp $enddate
 * @property string $action
 * @property string $domain
 * @property string $log
 * @property integer $domain_id
 * @property integer $registrars_id
 * @property integer $times
 * @property integer $status_id
 * @property Domains $Domains
 * @property Statuses $Statuses
 * @property Registrars $Registrars
 * 
 * @package    ShineISP
 * 
 * @author     Shine Software <info@shineisp.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDomainsTasks extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('domains_tasks');
        $this->hasColumn('task_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('startdate', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => true,
             'length' => '25',
             ));
        $this->hasColumn('enddate', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => false,
             'length' => '25',
             ));
        $this->hasColumn('action', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '100',
             ));
        $this->hasColumn('domain', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '',
             ));
        $this->hasColumn('log', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '',
             ));
        $this->hasColumn('domain_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('registrars_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('times', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => false,
             'default' => '0',
             'length' => '4',
             ));
        $this->hasColumn('status_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Domains', array(
             'local' => 'domain_id',
             'foreign' => 'domain_id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Statuses', array(
             'local' => 'status_id',
             'foreign' => 'status_id'));

        $this->hasOne('Registrars', array(
             'local' => 'registrars_id',
             'foreign' => 'registrars_id',
             'onDelete' => 'CASCADE'));
    }
}