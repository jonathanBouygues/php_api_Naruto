<?php

class Character implements JsonSerializable {
  private $_id;
  private $_firstName;
  private $_lastName;
  private $_idVillage;
  private $_skill;

  public function __construct(string $id,string $firstName,string $lastName,string $idVillage, string $skill) {
    $this->_id = $id;
    $this->_firstName = $firstName;
    $this->_lastName = $lastName;
    $this->_idVillage = $idVillage;
    $this->_skill = $skill;
  }

  public function getID(): string {return $this->_id;}
  public function getFirstName(): string { return $this->_firstName; }
  public function getLastName(): string { return $this->_lastName; }
  public function getIdVillage(): string { return $this->_idVillage; }
  public function getSkill(): string { return $this->_skill; }

  public function jsonSerialize() {

    return 
        [
            'id'   => $this->getId(),
            'firstName' => $this->getFirstName(),
            'lastName'  => $this->getLastName(),
            'idVillage' => $this->getIdVillage(),
            'skill' => $this->getSkill()
        ];
  }

  public function searchCharacters(string $dataSearch) {

    if ((strtolower($this->getFirstName()) === $dataSearch) || (strtolower($this->getLastName()) === $dataSearch) ||(strtolower($this->getSkill()) === $dataSearch)) {
      return true; 
    }
  }
}
