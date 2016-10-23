<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jsonxml extends CI_Controller {
    private $root = 'root';
    private $indentation = '    ';

    public function index(){
    	$this->load->helper('url');
    	$this->load->view('html/tools/jsonxml');
    }

    public function jsontoxml() {
        $val = $_POST['json'];
        if(empty($val)) {
            echo "";
        } else {
            try {
                $array = json_decode($val, false);
                $xml = $this->export($array);
                echo $xml;
            } catch(Exception $e) {
                echo "may be not a right json";
            }
        }
    }

    public function xmltojson() {
        $xml = $_POST['xml'];
        if(empty($xml)) {
            echo "";
        } else {
            try {
                $xmlNode = simplexml_load_string($xml);
                $arrayData = $this->xmlToArray($xmlNode);
                echo json_encode($arrayData, JSON_PRETTY_PRINT);
            } catch(Exception $e) {
                echo "may be not a right xml";
            }
        }
    }

    private function xmlToArray($xml, $options = array()) {
        $defaults = array(
            'namespaceSeparator' => ':',//you may want this to be something other than a colon
            'attributePrefix' => '@',   //to distinguish between attributes and nodes with the same name
            'alwaysArray' => array(),   //array of xml tag names which should always become arrays
            'autoArray' => true,        //only create arrays for tags which appear more than once
            'textContent' => '$',       //key used for the text content of elements
            'autoText' => true,         //skip textContent key if node has no attributes or child nodes
            'keySearch' => false,       //optional search and replace on tag and attribute names
            'keyReplace' => false       //replace values for above search values (as passed to str_replace())
        );
        $options = array_merge($defaults, $options);
        $namespaces = $xml->getDocNamespaces();
        $namespaces[''] = null; //add base (empty) namespace

        //get attributes from all namespaces
        $attributesArray = array();
        foreach ($namespaces as $prefix => $namespace) {
            foreach ($xml->attributes($namespace) as $attributeName => $attribute) {
                //replace characters in attribute name
                if ($options['keySearch']) $attributeName =
                        str_replace($options['keySearch'], $options['keyReplace'], $attributeName);
                $attributeKey = $options['attributePrefix']
                        . ($prefix ? $prefix . $options['namespaceSeparator'] : '')
                        . $attributeName;
                $attributesArray[$attributeKey] = (string)$attribute;
            }
        }

        //get child nodes from all namespaces
        $tagsArray = array();
        foreach ($namespaces as $prefix => $namespace) {
            foreach ($xml->children($namespace) as $childXml) {
                //recurse into child nodes
                $childArray = $this->xmlToArray($childXml, $options);
                list($childTagName, $childProperties) = each($childArray);

                //replace characters in tag name
                if ($options['keySearch']) $childTagName =
                        str_replace($options['keySearch'], $options['keyReplace'], $childTagName);
                //add namespace prefix, if any
                if ($prefix) $childTagName = $prefix . $options['namespaceSeparator'] . $childTagName;

                if (!isset($tagsArray[$childTagName])) {
                    //only entry with this key
                    //test if tags of this type should always be arrays, no matter the element count
                    $tagsArray[$childTagName] =
                            in_array($childTagName, $options['alwaysArray']) || !$options['autoArray']
                            ? array($childProperties) : $childProperties;
                } elseif (
                    is_array($tagsArray[$childTagName]) && array_keys($tagsArray[$childTagName])
                    === range(0, count($tagsArray[$childTagName]) - 1)
                ) {
                    //key already exists and is integer indexed array
                    $tagsArray[$childTagName][] = $childProperties;
                } else {
                    //key exists so convert to integer indexed array with previous value in position 0
                    $tagsArray[$childTagName] = array($tagsArray[$childTagName], $childProperties);
                }
            }
        }

        //get text content of node
        $textContentArray = array();
        $plainText = trim((string)$xml);
        if ($plainText !== '') $textContentArray[$options['textContent']] = $plainText;

        //stick it all together
        $propertiesArray = !$options['autoText'] || $attributesArray || $tagsArray || ($plainText === '')
                ? array_merge($attributesArray, $tagsArray, $textContentArray) : $plainText;

        //return node as array
        return array(
            $xml->getName() => $propertiesArray
        );
    }


    private function change($source) {
        $string="";
        foreach($source as $k=>$v){
            $string .="<".$k.">";
            //判断是否是数组，或者，对像
            if(is_array($v) || is_object($v)){
                //是数组或者对像就的递归调用
                $string .= $this->change($v);
            }else{
                //取得标签数据
                $string .=$v;
            }
            $string .="";
        }
        return $string;
    }



    // TODO: private $this->addtypes = false; // type="string|int|float|array|null|bool"
    public function export($data)
    {
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        $this->recurse($data, 0);
        echo PHP_EOL;
    }

    private function recurse($data, $level)
    {
        $indent = str_repeat($this->indentation, $level);
        foreach ($data as $key => $value) {
            echo PHP_EOL . $indent . '<' . $key;
            if ($value === null) {
                echo ' />';
            } else {
                echo '>';
                if (is_array($value)) {
                    if ($value) {
                        $temporary = $this->getArrayName($key);
                        foreach ($value as $entry) {
                            $this->recurse(array($temporary => $entry), $level + 1);
                        }
                        echo PHP_EOL . $indent;
                    }
                } else if (is_object($value)) {
                    if ($value) {
                        $this->recurse($value, $level + 1);
                        echo PHP_EOL . $indent;
                    }
                } else {
                    if (is_bool($value)) {
                        $value = $value ? 'true' : 'false';
                    }
                    echo $this->escape($value);
                }
                echo '</' . $key . '>';
            }
        }
    }
    private function escape($value)
    {
        // TODO:
        return $value;
    }
    private function getArrayName($parentName)
    {
        // TODO: special namding for tag names within arrays
        return $parentName;
    }

}
?>