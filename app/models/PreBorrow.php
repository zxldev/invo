<?php

class PreBorrow extends \Phalcon\Mvc\Model
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
     * @var string
     */
    public $userid;

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
        $this->belongsTo("book_id", "Book", "id");
        $this->belongsTo("userid", "Users", "id");
    }

}
