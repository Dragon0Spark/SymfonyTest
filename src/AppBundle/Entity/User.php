<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    /**
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Friend", cascade={"persist"})
     *   
     */

    private $friends;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }



    /**
     * Add friend
     *
     * @param \AppBundle\Entity\Friend $friend
     *
     * @return User
     */
    public function addFriend(\AppBundle\Entity\Friend $friend)
    {
        $this->friends[] = $friend;

        return $this;
    }

    /**
     * Remove friend
     *
     * @param \AppBundle\Entity\Friend $friend
     */
    public function removeFriend(\AppBundle\Entity\Friend $friend)
    {
        $this->friends->removeElement($friend);
    }

    /**
     * Get friends
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFriends()
    {
        return $this->friends;
    }
}
