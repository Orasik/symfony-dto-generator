<?php

namespace WsSys\DtoGeneratorBundle\Generator;

use WsSys\DtoGeneratorBundle\Exception\InvalidArgumentException;
use WsSys\DtoGeneratorBundle\Generator\Reader\XsdReader;

/**
 * Generate the Dtos from Xsd
 */
class XsdToDtoGenerator
{
    /**
     * Source file location
     * 
     * @var string 
     */
    protected $source;
    
    /**
     * Destination file location
     * 
     * @var string 
     */
    protected $destination;
    
    /**
     * Namespace of the DTO Object(s)
     * 
     * @var string 
     */
    protected $destinationNS;
    
    /**
     * Sets the source
     * 
     * @param string $source
     * 
     * @return XsdToDtoGenerator
     */
    public function setSource($source) 
    {
        $this->source = $source;
        return $this;
    }
    
    /**
     * Gets the source
     * 
     * @return string
     */
    public function getSource() 
    {
        return $this->source;
    }

    /**
     * Sets the destination 
     * 
     * @param string $destination
     * 
     * @return XsdToDtoGenerator
     */
    public function setDestination($destination) 
    {
        $this->destination = $destination;
        return $this;
    }
    
    /**
     * Gets the destination
     * 
     * @return string
     */
    public function getDestination() 
    {
        return $this->destination;
    }
    
    /**
     * Sets the destination Namespace
     * 
     * @param string $destinationNS
     * 
     * @return XsdToDtoGenerator
     */
    public function setDestinationNS($destinationNS) 
    {
        $this->destinationNS = $destinationNS;
        return $this;
    }

    /**
     * Gets the Destination Namespace
     * 
     * @return string
     */
    public function getDestinationNS() 
    {
        return $this->destinationNS;
    }

    /**
     * Generates the DTOs
     * 
     * @throws InvalidArgumentException
     */
    public function generate()
    {
        $source = $this->getSource();
        if (!$source) {
            throw new InvalidArgumentException('Source');
        }
        
        $destination = $this->getDestination();
        if (!is_dir($destination)) {
            throw new InvalidArgumentException('Destination');
        }
        
        $destinationNS = $this->getDestinationNS();
        if (!$destinationNS) {
            throw new InvalidArgumentException('DestinationNS');
        }
        
        $reader = new XsdReader();
        $reader->read($source);
        
        $firstElement = $reader->getFirstElement();
        print_r($firstElement); exit;
        
    }
}