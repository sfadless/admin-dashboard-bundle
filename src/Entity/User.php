<?php

namespace SfadlessCMF\AdminDashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Entity()
 * @ORM\Table(name="cmf__users")
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="username", unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="password")
     */
    private $password;

    /**
     * @var array
     *
     * @ORM\Column(type="json_array", name="roles")
     */
    private $roles;

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string|null
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return null
     */
    public function eraseCredentials()
    {
        return null;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param array $roles
     * @return User
     */
    public function setRoles(array $roles): User
    {
        $this->roles = $roles;
        return $this;
    }

    public function hasRole(string $role): bool
    {
        return in_array($role, $this->roles);
    }

    public function __construct()
    {
        $this->roles = [];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}