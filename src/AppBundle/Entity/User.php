<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @ORM\Column(type="string", unique=true)
     */
    private $userName;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Getters/Setters for username
     */
    public function getUsername()
    {
        return $this->userName;
    }

    public function setUsername($userName)
    {
        $this->userName = $userName;
    }

    /**
     * Getters/Setters for email
     */
     public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Getters/Setters for password
     */
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
}

