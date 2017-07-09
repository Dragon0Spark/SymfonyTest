<?php
// src/OC/PlatformBundle/Entity/Advert.php

namespace AppBundle\Entity;

// N'oubliez pas ce use
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\AdvertRepository")
 */
class Advert
{
  /**
   * @ORM\ManyToMany(targetEntity="OC\PlatformBundle\Entity\Category", cascade={"persist"})
   */
  private $categories;

  // … vos autres attributs

  // Comme la propriété $categories doit être un ArrayCollection,
  // On doit la définir dans un constructeur :
  public function __construct()
  {
    $this->date = new \Datetime();
    $this->categories = new ArrayCollection();
  }

  // Notez le singulier, on ajoute une seule catégorie à la fois
  public function addCategory(Category $category)
  {
    // Ici, on utilise l'ArrayCollection vraiment comme un tableau
    $this->categories[] = $category;

    return $this;
  }

  public function removeCategory(Category $category)
  {
    // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
    $this->categories->removeElement($category);
  }

  // Notez le pluriel, on récupère une liste de catégories ici !
  public function getCategories()
  {
    return $this->categories;
  }


  // … vos autres getters/setters
}