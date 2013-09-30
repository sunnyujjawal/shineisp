<?php

/**
 * ProductsTranchesIncludes
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ProductsTranchesIncludes extends BaseProductsTranchesIncludes
{
    /**
     * Save the include of billing tranches
     * 
     * 
     * @param integer $trancheid
     * @param integer $includeid
     * @param string $category
     */
    public static function saveAll($trancheid, $includeid, $type) {
        $includes   = new ProductsTranchesIncludes ();
        $includes->tranche_id   = $trancheid;
        $includes->include_id   = $includeid;
        $includes->type         = $type;
        $includes->save ();
    }
    
    /**
     * Get all include for a tranche id
     * 
     * @param integer $trancheid
     */    
    public static function getIncludeForTrancheId( $trancheid ) {
        $includes = Doctrine_Query::create ()
                        ->select ()
                        ->from ( 'ProductsTranchesIncludes i' )
                        ->where ( 'i.tranche_id = ?', $trancheid )
                        ->execute ( array (), Doctrine_Core::HYDRATE_ARRAY );
        
        $data   = array();
        foreach( $includes as $include ) {
            if( $include['type'] == 'domains' ) {
                if( ! array_key_exists('domains', $data ) ) {
                    $data['domains']    = array();
                }
                
                $tlds   = DomainsTlds::getbyID( $include['include_id']);
                $name    = $tlds['DomainsTldsData'][0]['name'];
                
                $data['domains'][]  = $name;
            }
        }
        
        return $data;
    }
    
    /**
     * Check if a specific tld is included (free) in a product plan
     * 
     */    
    public static function isDomainIncludedinTrancheId( $trancheid, $tld ) {
        $includes = Doctrine_Query::create ()
                        ->select ()
                        ->from ( 'ProductsTranchesIncludes i' )
                        ->where ( 'i.tranche_id = ?', $trancheid )
                        ->addWhere ( 'i.type = "domains"' )
                        ->addWhere ( 'i.include_id = ?', $tld )
                        ->execute ();
        
        if($includes->count()){
        	return $includes;
        }
        
        return false;
    }
}