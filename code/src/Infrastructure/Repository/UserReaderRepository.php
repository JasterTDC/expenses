<?php


namespace ComAI\Expenses\Infrastructure\Repository;

use ComAI\Expenses\Domain\Entity\User;
use ComAI\Expenses\Domain\Exception\UserEmptyException;
use ComAI\Expenses\Domain\Factory\UserFactoryInterface;
use ComAI\Expenses\Domain\Repository\UserReader;

/**
 * Class UserReaderRepository
 *
 * @package ComAI\Expenses\Infrastructure\Repository
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class UserReaderRepository implements UserReader
{
    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * @var UserFactoryInterface
     */
    protected $userFactory;

    /**
     * UserReaderRepository constructor.
     *
     * @param \PDO $pdo
     * @param UserFactoryInterface $userFactory
     */
    public function __construct(
        \PDO $pdo,
        UserFactoryInterface $userFactory
    ) {
        $this->pdo = $pdo;
        $this->userFactory = $userFactory;
    }

    /**
     * @param string $username
     *
     * @return User
     * @throws UserEmptyException
     */
    public function getByUsername(
        string $username
    ) : User {
        $sql = 'SELECT *
        FROM `expenses`.`users` AS u
        WHERE 
            u.username = :username
        ';

        $parameters = [
            'username'  => $username
        ];

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (empty($result)) {
                throw new UserEmptyException();
            }

            return $this->userFactory->createWithoutPasswordHash(
                $result['id'],
                $result['username'],
                $result['email'],
                $result['password']
            );
        } catch (\PDOException $e) {
            throw new UserEmptyException();
        } catch (\Exception $e) {
            throw new UserEmptyException();
        }
    }

    /**
     * @param string $email
     *
     * @return User
     * @throws UserEmptyException
     */
    public function getByEmail(
        string $email
    ) : User {
        $sql = 'SELECT *
        FROM `expenses`.`users` AS u
        WHERE 
            u.email = :email
        ';

        $parameters = [
            'email'     => $email
        ];

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (empty($result)) {
                throw new UserEmptyException();
            }

            return $this->userFactory->createWithoutPasswordHash(
                $result['id'],
                $result['username'],
                $result['email'],
                $result['password']
            );
        } catch (\PDOException $e) {
            throw new UserEmptyException();
        } catch (\Exception $e) {
            throw new UserEmptyException();
        }
    }
}
