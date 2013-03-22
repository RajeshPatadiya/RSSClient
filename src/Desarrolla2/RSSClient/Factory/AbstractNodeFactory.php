<?php

/**
 * This file is part of the RSSClient proyect.
 * 
 * Copyright (c)
 * Daniel González Cerviño <daniel.gonzalez@freelancemadrid.es>  
 * 
 * This source file is subject to the MIT license that is bundled
 * with this package in the file LICENSE.
 */

namespace Desarrolla2\RSSClient\Factory;

use Desarrolla2\RSSClient\Handler\Sanitizer\SanitizerHandlerInterface;
use Desarrolla2\RSSClient\Exception\ParseException;

/**
 * 
 * Description of NodeFactory
 *
 * @author : Daniel González Cerviño <daniel.gonzalez@freelancemadrid.es>  
 * @file : NodeFactory.php , UTF-8
 * @date : Mar 22, 2013 , 2:01:17 PM
 */
abstract class AbstractNodeFactory {

    /**
     *
     * @var \Desarrolla2\RSSClient\Handler\Sanitizer\SanitizerHandlerInterface 
     */
    protected $sanitizer;

    public function __construct(SanitizerHandlerInterface $sanitizer) {
        $this->sanitizer = $sanitizer;
    }

    /**
     * 
     * @param type $text
     * @return type
     */
    protected function doClean($text) {
        return $this->sanitizer->doClean($text);
    }

    /**
     * 
     * @param \DOMElement $DOMnode
     * @param string $propertyName
     * @return string
     */
    protected function getNodeValue(\DOMElement $DOMnode, $propertyName) {
        try {
            $result = $DOMnode->getElementsByTagName($propertyName)->item(0);
            if ($result) {
                return $result->nodeValue;
            }
        } catch (\Exception $e) {
            throw new ParseException($e->getMessage());
        }
        return false;
    }

    /**
     * 
     * @param \DOMElement $DOMnode
     * @param string $propertyName
     * @return array
     */
    protected function getNodeValues(\DOMElement $DOMnode, $propertyName) {
        try {
            $results = $DOMnode->getElementsByTagName($propertyName);
            if ($results->length) {
                $values = array();
                foreach ($results as $result) {
                    $values = $result->nodeValue;
                }
                return $values;
            }
        } catch (\Exception $e) {
            throw new ParseException($e->getMessage());
        }
        return false;
    }

}