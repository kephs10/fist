<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Security\Core\User\UserInterface;

/**
* @ApiResource()
* @ORM\Entity(repositoryClass="App\Repository\UserRepository")
*/
class User implements UserInterface
{
/**
* @ORM\Id()
* @ORM\GeneratedValue()
* @ORM\Column(type="integer")
*/
private $id;

/**
* @ORM\Column(type="string", length=180, unique=true)
*/
private $username;

/**
* @ORM\Column(type="json")
*/
private $roles = [];

/**
* @var string The hashed password
* @ORM\Column(type="string")
*/
private $password;

/**
* @ORM\Column(type="string", length=255)
*/
private $nomComplet="";

/**
* @ORM\Column(type="string", length=255)
*/
private $userName="";

/**
* @ORM\Column(type="string", length=255)
*/
private $motPasse="";

/**
* @ORM\Column(type="boolean")
*/
private $isActif=true;

/**
* @ORM\ManyToOne(targetEntity="App\Entity\role", inversedBy="users")
*/
private $role;

public function getId(): ?int
{
return $this->id;
}

/**
* A visual identifier that represents this user.
*
* @see UserInterface
*/
public function getUsername(): string
{
return (string) $this->username;
}

public function setUsername(string $username): self
{
$this->username = $username;

return $this;
}

/**
* @see UserInterface
*/
public function getRoles(): array
{
$roles = $this->roles;
// guarantee every user at least has ROLE_USER
$roles[] = 'ROLE_USER';

return json_decode($roles);
}

public function setRoles(array $roles): self
{
$this->roles = $roles;

return $this;
}

/**
* @see UserInterface
*/
public function getPassword(): string
{
return (string) $this->password;
}

public function setPassword(string $password): self
{
$this->password = $password;

return $this;
}

/**
* @see UserInterface
*/
public function getSalt()
{
// not needed when using the "bcrypt" algorithm in security.yaml
}

/**
* @see UserInterface
*/
public function eraseCredentials()
{
// If you store any temporary, sensitive data on the user, clear it here
// $this->plainPassword = null;
}

public function getNomComplet(): ?string
{
return $this->nomComplet;
}

public function setNomComplet(string $nomComplet): self
{
$this->nomComplet = $nomComplet;

return $this;
}

public function getMotPasse(): ?string
{
return $this->motPasse;
}

public function setMotPasse(string $motPasse): self
{
$this->motPasse = $motPasse;

return $this;
}

public function getIsActif(): ?bool
{
return $this->isActif;
}

public function setIsActif(bool $isActif): self
{
$this->isActif = $isActif;

return $this;
}

public function getRole(): ?role
{
return $this->role;
}

public function setRole(?role $role): self
{
$this->role = $role;

return $this;
}
}