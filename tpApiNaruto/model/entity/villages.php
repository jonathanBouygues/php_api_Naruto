<?php

class Village implements JsonSerializable {
  private $_id;
  private $_name;
  private $_elementCountry;
  private $_listNinja;

  public function __construct(string $id,string $name,string $elementCountry, array $listNinja) {
    $this->_id = $id;
    $this->_name = $name;
    $this->_elementCountry = $elementCountry;
    $this->_listNinja = $listNinja;
  }

  public function getID(): string {return $this->_id;}
  public function getName(): string {return $this->_name;}
  public function getElementCountry(): string {return $this->_elementCountry;}
  public function getlistNinja(): array {return $this->_listNinja;}

  public function jsonSerialize() {

    return 
        [
            'id'   => $this->getId(),
            'name' => $this->getName(),
            'elementCountry'   => $this->getElementCountry(),
            'listNinja' => $this->getListNinja()
        ];
  }

}