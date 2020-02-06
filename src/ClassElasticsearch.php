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

    /**
     * Short description for class
     *
     * @category CategoryName
     * @package  PackageName
     * @author   Tiago Rodrigo Marçal Murakami <trmurakami@gmail.com>
     * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
     * @link     https://github.com/trmurakami/Core-Elasticfind
     */

class  Elasticsearch
{
    /**
     * Retrieve 1 record in Elasticsearch
     *
     * @param string   $_id              Document ID.
     * @param string[] $fields           Fields to return, if null, return all.
     * @param string   $alternativeIndex Query alternative index, if filled.
     * 
     * @return array    $response          Retorno 
     */
    public static function get($_id, $fields = null, $alternativeIndex = "")
    {
        global $index;
        global $client;
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
}
        





?>