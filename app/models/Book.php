<?php

class Book extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $book_types_id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $author;

    /**
     *
     * @var string
     */
    public $press;

    /**
     *
     * @var double
     */
    public $price;

    /**
     *
     * @var string
     */
    public $active;

    /**
     *
     * @var string
     */
    public $ext1;

    /**
     *
     * @var string
     */
    public $ext2;

    public function initialize() {
        $this->hasOne("id", "Borrow", "book_id");
    }

}
