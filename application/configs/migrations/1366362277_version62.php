<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version62 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->removeColumn('products_tranches_includes', 'category');
        $this->addColumn('products_tranches_includes', 'type', 'string', '150', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {
        $this->addColumn('products_tranches_includes', 'category', 'string', '150', array(
             'notnull' => '1',
             ));
        $this->removeColumn('products_tranches_includes', 'type');
    }
}