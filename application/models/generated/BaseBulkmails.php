<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Bulkmails', 'doctrine');

/**
 * BaseBulkmails
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $mail_id
 * @property timestamp $senddate
 * @property string $subject
 * @property string $body
 * 
 * @package    ShineISP
 * 
 * @author     Shine Software <info@shineisp.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBulkmails extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('bulkmails');
        $this->hasColumn('mail_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('senddate', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => true,
             'length' => '25',
             ));
        $this->hasColumn('subject', 'string', 250, array(
             'type' => 'string',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '250',
             ));
        $this->hasColumn('body', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}