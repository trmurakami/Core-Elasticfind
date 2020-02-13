<?php
    /**
     * Elasticsearch Class 
     *
     * Class for interact with Elasticsearch.
     * 
     * PHP Version 7
     *
     * @category   Classes
     * @package    Elasticfind
     * @subpackage Elasticfind_Core
     * @author     Tiago Rodrigo Marçal Murakami <trmurakami@gmail.com>
     * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
     * @link       https://github.com/trmurakami/Core-Elasticfind
     * @since      1.0.0 
     */

    namespace Elasticfind;

    /* Load libraries for PHP composer */
    require __DIR__.'/../vendor/autoload.php';

    /**
     * Class to interact with Elasticsearch
     *
     * @category Elasticsearch
     * @package  Elasticfind
     * @author   Tiago Rodrigo Marçal Murakami <trmurakami@gmail.com>
     * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
     * @link     https://github.com/trmurakami/Core-Elasticfind
     */

class  Elasticsearch
{
    
    /**
     * Get $index and $client variables
     */
    public function __construct() 
    {
        global $index;
        global $client;
    }

    /**
     * Retrieve 1 record in Elasticsearch
     *
     * @param string   $_id              Document ID.
     * @param string[] $fields           Fields to return, if null, return all.
     * @param string   $alternativeIndex Query alternative index, if filled.
     * 
     * @return string[]        
     */
    public static function get($_id, $fields = null, $alternativeIndex = "")
    {
        $params = [];

        if (strlen($alternativeIndex) > 0) {
            $params["index"] = $alternativeIndex;
        } else {
            $params["index"] = $index;
        }

        $params["id"] = $_id;
        $params["_source"] = $fields;

        $response = $client->get($params);
        return $response;
    }

    /**
     * Search in Elasticsearch
     *
     * @param string[] $fields           Fields to return, if null, return all.
     * @param int      $size             Amount of responses needed.
     * @param string[] $body             Arquivo JSON com os parâmetros das consultas no Elasticsearch
     * @param string   $alternativeIndex Query alternative index, if filled.
     * 
     * @return string[]
     */
    public static function search($fields, $size, $body, $alternativeIndex = "")
    {
        $params = [];

        if (strlen($alternativeIndex) > 0 ) {
            $params["index"] = $alternativeIndex;
        } else {
            $params["index"] = $index;
        }

        $params["_source"] = $fields;
        $params["size"] = $size;
        $params["body"] = $body;

        $response = $client->search($params);
        return $response;
    }    
}
        





?>