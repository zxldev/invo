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
     * @var string
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

    /**
     *
     * @var string
     */
    public $barcode;

    /**
     *
     * @var string
     */
    public $cip;

    /**
     *
     * @var string
     */
    public $introduction;

    /**
     *
     * @var string
     */
    public $picurl;

    /**
     *
     * @var string
     */
    public $intime;

    /**
     *
     * @var string
     */
    public $bookshellno;

    public function initialize()
    {
        $this->hasOne("id", "Borrow", "book_id");
        $this->hasMany("id", "Borrowhistory", "book_id");
        $this->hasMany("id", "PreBorrow", "book_id");
    }

}
