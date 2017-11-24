<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="note")
 */

class Note{

    /**
     * @ORM\Column(type="integer") 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $complete;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dueDate;

    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($value){
        $this->title = $value;       
    }
    public function getContent(){
        return $this->content;
    }

    public function setContent($value){
        $this->content = $value;
    }

    public function getComplete(){
        return $this->complete;
    }

    public function setComplete($value = false){
        $this->complete = $value;
    }

    public function getDueDate(){
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $value = null){
        $this->dueDate = $value;
    }
}