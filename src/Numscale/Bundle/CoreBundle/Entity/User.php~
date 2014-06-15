<?php
/**
 * Created by PhpStorm.
 * User: tcordier
 * Date: 13/06/14
 * Time: 23:14
 */

namespace Numscale\Bundle\CoreBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
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
     * @ORM\ManyToOne(targetEntity="Numscale\Bundle\CoreBundle\Entity\Company", cascade={"all"}, fetch="EAGER", inversedBy="users")
     * @Assert\Valid(traverse=true)
     */
    protected $company;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set company
     *
     * @param \Numscale\Bundle\CoreBundle\Entity\Company $company
     * @return User
     */
    public function setCompany(\Numscale\Bundle\CoreBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Numscale\Bundle\CoreBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }
}
