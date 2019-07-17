<?php


namespace ComAI\Expenses\Infrastructure\Repository;

use ComAI\Expenses\Domain\Entity\User;
use ComAI\Expenses\Domain\Exception\UserPersistenceException;

/**
 * Class UserWriterRepository
 *
 * @package ComAI\Expenses\Infrastructure\Repository
 */
class UserWriterRepository
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
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function persist(User $user) : bool
    {
    }

    /**
     * @param User $user
     *
     * @return User
     * @throws UserPersistenceException
     */
    protected function insertUser(User $user) : User
    {
        $sql = 'INSERT INTO expenses.users(id, username, password, email)
        VALUES (:username, :password, :email)
        ';

        $parameters = [
            'username'  => $user->username(),
            'password'  => $user->password(),
            'email'     => $user->email()
        ];

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);

            $user->setId((int) $this->pdo->lastInsertId());

            return $user;
        } catch (\PDOException $exception) {
            throw new UserPersistenceException();
        }
    }
}
