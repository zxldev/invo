<?php

class Borrowhistory extends \Phalcon\Mvc\Model
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
    public $book_id;


    /**
     *
     * @var integer
     */
    public $borrow_types_id;

    /**
     *
     * @var string
     */
    public $userid;

    /**
     *
     * @var string
     */
    public $borrowtime;

    /**
     *
     * @var string
     */
    public $returntime;

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



    public function initialize() {
    $this->belongsTo("book_id", "Book", "id");
    $this->belongsTo("userid", "Users", "id");
}

}
