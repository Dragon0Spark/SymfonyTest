<?php
// src/AppBundle/Entity/User.php
namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
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
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
	
	/**
    * @ORM\OneToMany(targetEntity="...\Entity\Friend", inversedBy="user")
    */
	protected $friends;
     
    /**
     * Add friends
     *
     * @param ...\Friend $friends
     * @return user
     */
    public function addFriend(\...\Entity\Friend $friends)
    {
        $this->friends[] = $friends;
     
        return $this;
    }
     
    /**
     * Remove friends
     *
     * @param ...\Entity\Friend $friends
     */
    public function removeFriend(\...Entity\Friend $friends)
    {
        $this->friends->removeElement($friends);
    }
     
    /**
     * Get friends
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getFriends()
    {
        return $this->friends;
    } 
}