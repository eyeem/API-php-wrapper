<?php

class Eyeem_Collection implements Iterator
{

  protected $_index = 0;

  protected $_items = null;

  protected $_objects = array();

  /* Iterator */

  public function rewind()
  {
    $this->_index = 0;
  }

  public function key()
  {
    return $this->_index;
  }

  public function current()
  {
    return $this->get($this->_index);
  }

  public function next()
  {
    $this->_index ++;
  }

  public function valid()
  {
    if (!isset($this->_items)) {
      $this->_items = $this->getItems();
    }
    return isset($this->_items[$this->_index]);
  }

  public function get($index)
  {
    if (!isset($this->_items)) {
      $this->_items = $this->getItems();
    }
    $item = $this->_items[$index];
    if (empty($this->_objects[$index])) {
      $this->_objects[$index] = $this->getRessourceObject($item);
    }
    return $this->_objects[$index];
  }

}