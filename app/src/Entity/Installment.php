<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @package App\Entity
 */
class Installment
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $additionalInfo;

    /**
     * @ORM\Column(type="integer")
     */
    private $policy_id;

    /**
     * @return mixed
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * @param mixed $additionalInfo
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPolicyId()
    {
        return $this->policy_id;
    }

    /**
     * @param mixed $policy_id
     */
    public function setPolicyId($policy_id): void
    {
        $this->policy_id = $policy_id;
    }
}