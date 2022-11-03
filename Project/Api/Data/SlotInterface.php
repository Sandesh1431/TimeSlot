<?php
namespace Codilar\Project\Api\Data;
  interface SlotInterface
  {
      /**
       * @return int
       */
      public function getId();

    /**
     * @return string
     */
    public function getDate();

    /**
     * @param date $date
     * @return $this
     */
    public function setDate($date);

    /**
     * @return string
     */
    public function getSlot();

    /**
     * @param int $slot
     * @return $this
     */
    public function setSlot($slot);
/**
     * @return string
     */
    public function getName();
   /**
     * @param string $name
     * @return $this
     */
    public function setName($name);
    
}