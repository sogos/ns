<?php
/**
 * Created by PhpStorm.
 * User: tcordier
 * Date: 15/06/14
 * Time: 10:35
 */

namespace Numscale\Bundle\CoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfileController  extends Controller {

    /**
     * @Route("/profile/")
     * @Template()
     */
    public function indexAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        return array('user' => $user);
    }

} 