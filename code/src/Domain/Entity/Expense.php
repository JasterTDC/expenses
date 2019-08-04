<?php


namespace ComAI\Expenses\Domain\Entity;

/**
 * Class Expense
 *
 * @package ComAI\Expenses\Domain\Entity
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class Expense
{

    /**
     * @var int|null
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $modifiedAt;

    /**
     * Expense constructor.
     *
     * @param int|null $id
     * @param string $name
     * @param float $price
     * @param \DateTime $date
     * @param \DateTime $createdAt
     * @param \DateTime $modifiedAt
     */
    public function __construct(
        ?int $id,
        string $name,
        float $price,
        \DateTime $date,
        \DateTime $createdAt,
        \DateTime $modifiedAt
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->date = $date;
        $this->createdAt = $createdAt;
        $this->modifiedAt = $modifiedAt;
    }

    /**
     * @return int|null
     */
    public function id(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function price(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return \DateTime
     */
    public function date(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return \DateTime
     */
    public function createdAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function modifiedAt(): \DateTime
    {
        return $this->modifiedAt;
    }

    /**
     * @param \DateTime $modifiedAt
     */
    public function setModifiedAt(\DateTime $modifiedAt): void
    {
        $this->modifiedAt = $modifiedAt;
    }
}
