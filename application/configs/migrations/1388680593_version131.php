<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version131 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('status_history', 'status_history_order_id_orders_order_id', array(
             'name' => 'status_history_order_id_orders_order_id',
             'local' => 'order_id',
             'foreign' => 'order_id',
             'foreignTable' => 'orders',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('status_history', 'status_history_ticket_id_tickets_ticket_id', array(
             'name' => 'status_history_ticket_id_tickets_ticket_id',
             'local' => 'ticket_id',
             'foreign' => 'ticket_id',
             'foreignTable' => 'tickets',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->addIndex('status_history', 'status_history_order_id', array(
             'fields' => 
             array(
              0 => 'order_id',
             ),
             ));
        $this->addIndex('status_history', 'status_history_ticket_id', array(
             'fields' => 
             array(
              0 => 'ticket_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('status_history', 'status_history_order_id_orders_order_id');
        $this->dropForeignKey('status_history', 'status_history_ticket_id_tickets_ticket_id');
        $this->removeIndex('status_history', 'status_history_order_id', array(
             'fields' => 
             array(
              0 => 'order_id',
             ),
             ));
        $this->removeIndex('status_history', 'status_history_ticket_id', array(
             'fields' => 
             array(
              0 => 'ticket_id',
             ),
             ));
    }
}