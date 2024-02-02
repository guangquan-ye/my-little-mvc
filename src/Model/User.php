<?php

namespace App\Model;

use PDO;

class User
{

    protected ?int $id = null;
    protected ?string $fullname = null;
    protected ?string $email = null;
    protected ?string $password = null;
    protected ?array $role = null;

    public function __construct(
        ?int $id = null,
        ?string $fullname = null,
        ?string $email = null,
        ?string $password = null,
        ?array $role = null
    ) {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
    public function getId(): ?int{
        return $this->id;
    }

    public function setId(?int $id): User{
        $this->id = $id;
        return $this;
    }

    public function getFullname(): ?string{
        return $this->fullname;
    }

    public function setFullname(?string $fullname): User{
        $this->fullname = $fullname;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): User{
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string{
        return $this->password;
    }

    public function setPassword(?string $password): User{
        $this->password = $password;
        return $this;
    }

    public function getRole(): ?array{
        return $this->role;
    }

    public function setRole(?array $role): User{
        $this->role = $role;
        return $this;
    }

    public function findOneById(int $id): array{
        $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', '');
        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $results;
    }

    public function findAll(): array{
        $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', '');
        $sql = "SELECT * FROM user";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, static::class);
        return $stmt->fetchAll();
    }

    public function create(): static{
        $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', '');
        $sql = "INSERT INTO user (fullname, email, password, role) VALUES (:fullname, :email, :password, :role)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':fullname', $this->getFullname(), \PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->getEmail(), \PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->getPassword(), \PDO::PARAM_STR);
        $stmt->bindValue(':role', json_encode($this->getRole()), \PDO::PARAM_STR);
        $stmt->execute();
        $this->setId((int)$pdo->lastInsertId());

        return $this;
    }



    public function update(){

        $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', '');
        $sql = "UPDATE user SET fullname = :fullname, email = :email, password = :password, role = :role, WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $this->id);
        $statement->bindValue(':fullname', $this->fullname);
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':password', $this->password);
        $statement->bindValue(':role', $this->role);
        $statement->execute();
        return $this;
    }
    public function updateProfile($email, $password, $fullname){

        // Creer cette fonction pour Job09
    }

    public function select(){

        $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', '');
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $this->getEmail(), \PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $results;
    }
}
