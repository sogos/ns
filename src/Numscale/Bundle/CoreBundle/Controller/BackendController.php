<?php
/**
 * Created by PhpStorm.
 * User: tcordier
 * Date: 15/06/14
 * Time: 08:19
 */

namespace Numscale\Bundle\CoreBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackendController extends Controller
{
    /**
     * @Route("/admin2/")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
