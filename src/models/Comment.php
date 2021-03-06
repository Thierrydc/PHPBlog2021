<?php

namespace App\src\models;

class Comment
{
    /**
     * Id of comment.
     *
     * @var int
     */
    private $id;

    /**
     * Author of comment.
     *
     * @var int
     */
    private $author;

    /**
     * Comment.
     *
     * @var string
     */
    private $comment;

    /**
     * Creation Date of comment.
     *
     * @var DateTime
     */
    private $createdAt;

    //! Méthodes magiques et de construction

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $dataforObj)
    {
        foreach ($dataforObj as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->{$method}($value);
            }
        }
    }

    /**
     * Get id of comment.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id of comment.
     *
     * @param int $id id of comment
     *
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Get author of comment.
     *
     * @return int
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set author of comment.
     *
     * @param int $author author of comment
     *
     * @return self
     */
    public function setAuthor(int $author)
    {
        $this->author = $author;
    }

    /**
     * Get comment.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set comment.
     *
     * @param string $comment comment
     *
     * @return self
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get creation Date of comment.
     *
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set creation Date of comment.
     *
     * @param date $createdAt creation Date of comment
     *
     * @return self
     */
    public function setCreatedAt(\datetime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
