<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class BookController extends ControllerBase
{

    public function initialize()
    {
        $this->tag->setTitle('关于我们');
        parent::initialize();
    }
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for book
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Book", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $book = Book::find($parameters);
        if (count($book) == 0) {
            $this->flash->notice("The search did not find any book");

            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $book,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a book
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $book = Book::findFirstByid($id);
            if (!$book) {
                $this->flash->error("图书不存在。");

                return $this->dispatcher->forward(array(
                    "controller" => "book",
                    "action" => "index"
                ));
            }

            $this->view->id = $book->id;

            $this->tag->setDefault("id", $book->id);
            $this->tag->setDefault("book_types_id", $book->book_types_id);
            $this->tag->setDefault("name", $book->name);
            $this->tag->setDefault("author", $book->author);
            $this->tag->setDefault("press", $book->press);
            $this->tag->setDefault("price", $book->price);
            $this->tag->setDefault("active", $book->active);
            $this->tag->setDefault("ext1", $book->ext1);
            $this->tag->setDefault("ext2", $book->ext2);
            $this->tag->setDefault("barcode", $book->barcode);
            
        }
    }

    /**
     * Creates a new book
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "index"
            ));
        }

        $book = new Book();

        $book->book_types_id = $this->request->getPost("book_types_id");
        $book->name = $this->request->getPost("name");
        $book->author = $this->request->getPost("author");
        $book->press = $this->request->getPost("press");
        $book->price = $this->request->getPost("price");
        $book->active = $this->request->getPost("active");
        $book->ext1 = $this->request->getPost("ext1");
        $book->ext2 = $this->request->getPost("ext2");
        $book->barcode = $this->request->getPost("barcode");

        if (!$book->save()) {
            foreach ($book->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "new"
            ));
        }

        $this->flash->success("图书添加成功。");

        return $this->dispatcher->forward(array(
            "controller" => "book",
            "action" => "index"
        ));

    }

    /**
     * Saves a book edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $book = Book::findFirstByid($id);
        if (!$book) {
            $this->flash->error("book does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "index"
            ));
        }

        $book->book_types_id = $this->request->getPost("book_types_id");
        $book->name = $this->request->getPost("name");
        $book->author = $this->request->getPost("author");
        $book->press = $this->request->getPost("press");
        $book->price = $this->request->getPost("price");
        $book->active = $this->request->getPost("active");
        $book->ext1 = $this->request->getPost("ext1");
        $book->ext2 = $this->request->getPost("ext2");
        $book->barcode = $this->request->getPost("barcode");

        if (!$book->save()) {

            foreach ($book->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "edit",
                "params" => array($book->id)
            ));
        }

        $this->flash->success("book was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "book",
            "action" => "index"
        ));

    }

    /**
     * Deletes a book
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $book = Book::findFirstByid($id);
        if (!$book) {
            $this->flash->error("book was not found");

            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "index"
            ));
        }

        if (!$book->delete()) {

            foreach ($book->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "search"
            ));
        }

        $this->flash->success("删除图书成功。");

        return $this->dispatcher->forward(array(
            "controller" => "book",
            "action" => "index"
        ));
    }

}
