<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{
public function createAction()
    {
        $friend  = new Friend();
        $request = $this->getRequest();
        $form    = $this->createForm(new FriendType(), $friend);
        $form->bindRequest($request);
 
        if ($form->isValid())
        {
            // On récupére l'utilisateur courant et on le lie à la friend
            $userManager = $this->get('fos_user.user_manager');
            $userCourant = $this->container->get('security.context')->getToken()->getUser();
            $user = $userCourant;
            $user->addFriend($friend);
 
            // On persiste et envoie le tout à la base de données.
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($friend);
            $userManager->updateUser($user, false);
            $em->flush();
 
            return $this->redirect($this->generateUrl('friend_show', array('id' => $friend->getId())));
        }
 
        return $this->render('KynarethFriendBundle:Friend:new.html.twig', array(
            'friend' => $friend,
            'form'   => $form->createView()
        ));
}
}