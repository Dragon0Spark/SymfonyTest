<?php
// src/AppBundle/Entity/Friend.php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="friendRepository")
 */
class friend
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="...\User" , inversedBy="friend")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $friendOf;
     
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="...\User" , inversedBy="friend")
     * @ORM\JoinColumn(name="friend_id", referencedColumnName="id")
     */
    private $friendDe;
}