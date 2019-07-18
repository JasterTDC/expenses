<?php


namespace ComAI\Expenses\Infrastructure\Repository;

use ComAI\Expenses\Domain\Entity\User;
use ComAI\Expenses\Domain\Exception\UserPersistenceException;
use ComAI\Expenses\Domain\Repository\UserWriter;

/**
 * Class UserWriterRepository
 *
 * @package ComAI\Expenses\Infrastructure\Repository
 */
class UserWriterRepository implements UserWriter
{

    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * UserWriterRepository constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param User $user
     *
     * @return User
     * @throws UserPersistenceException
     */
    public function persist(User $user) : User
    {
        if (empty($user->id())) {
            return $this->insertUser($user);
        }

        return $user;
    }

    /**
     * @param User $user
     *
     * @return User
     * @throws UserPersistenceException
     */
    protected function insertUser(User $user) : User
    {
        $sql = 'INSERT INTO `expenses`.`users`(`username`, `password`, `email`)
        VALUES (:username, :password, :email)
        ';

        $parameters = [
            ':username'  => $user->username()->username(),
            ':password'  => $user->password()->password(),
            ':email'     => $user->email()->email()
        ];

        try {
            $statement = $this->pdo->prepare($sql);
            $result = $statement->execute($parameters);

            $user->setId((int) $this->pdo->lastInsertId());

            return $user;
        } catch (\PDOException $exception) {
            throw new UserPersistenceException();
        }
    }
}
