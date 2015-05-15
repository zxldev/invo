<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class BorrowController extends ControllerBase
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
     * Searches for borrow
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Borrow", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $borrow = Borrow::find($parameters);
        if (count($borrow) == 0) {
            $this->flash->notice("The search did not find any borrow");

            return $this->dispatcher->forward(array(
                "controller" => "borrow",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $borrow,
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
     * Edits a borrow
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $borrow = Borrow::findFirstByid($id);
            if (!$borrow) {
                $this->flash->error("borrow was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "borrow",
                    "action" => "index"
                ));
            }

            $this->view->id = $borrow->id;

            $this->tag->setDefault("id", $borrow->id);
            $this->tag->setDefault("book_id", $borrow->book_id);
            $this->tag->setDefault("borrow_types_id", $borrow->borrow_types_id);
            $this->tag->setDefault("userid", $borrow->userid);
            $this->tag->setDefault("borrowtime", $borrow->borrowtime);
            $this->tag->setDefault("returntime", $borrow->returntime);
            $this->tag->setDefault("ext1", $borrow->ext1);
            $this->tag->setDefault("ext2", $borrow->ext2);
            
        }
    }

    /**
     * Creates a new borrow
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "search"
            ));
        }

        $borrow = new Borrow();

        $borrow->book_id = $this->request->getPost("book_id");
        $borrow->borrow_types_id = $this->request->getPost("borrow_types_id");
        $borrow->userid = $this->request->getPost("userid");
        $borrow->borrowtime = date('Y-m-d H:i:s');
        $borrow->ext1 = $this->request->getPost("ext1");
        $borrow->ext2 = $this->request->getPost("ext2");

        if (!$borrow->save()) {
            foreach ($borrow->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "search"
            ));
        }

        $this->flash->success("借书成功！");

        return $this->dispatcher->forward(array(
            "controller" => "book",
            "action" => "search"
        ));

    }

    /**
     * Saves a borrow edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "borrow",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $borrow = Borrow::findFirstByid($id);
        if (!$borrow) {
            $this->flash->error("borrow does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "borrow",
                "action" => "index"
            ));
        }

        $borrow->book_id = $this->request->getPost("book_id");
        $borrow->borrow_types_id = $this->request->getPost("borrow_types_id");
        $borrow->userid = $this->request->getPost("userid");
        $borrow->borrowtime = $this->request->getPost("borrowtime");
        $borrow->returntime = $this->request->getPost("returntime");
        $borrow->ext1 = $this->request->getPost("ext1");
        $borrow->ext2 = $this->request->getPost("ext2");
        

        if (!$borrow->save()) {

            foreach ($borrow->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "borrow",
                "action" => "edit",
                "params" => array($borrow->id)
            ));
        }

        $this->flash->success("borrow was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "borrow",
            "action" => "index"
        ));

    }

    /**
     * Deletes a borrow
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $borrow = Borrow::findFirstByBookId($id);
        if (!$borrow) {
            $this->flash->error("没有找到图书！");

            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "search"
            ));

        }

        if (!$borrow->delete()) {

            foreach ($borrow->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "search"
            ));

        }

        $this->flash->success("还书成功！");
        return $this->dispatcher->forward(array(
            "controller" => "book",
            "action" => "search"
        ));

    }


    public function deletebarcodeAction($barcode)
    {
        $book =     Book::findFirstByBarcode($barcode);
        $borrow = Borrow::findFirstByBookId($book->id);
        if (!$book) {
            $this->flash->error("没有找到图书！");

            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "search"
            ));

        }
        if (!$borrow) {
            $this->flash->error("图书没有被借出！");

            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "search"
            ));

        }
        if (!$borrow->delete()) {

            foreach ($borrow->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward(array(
                "controller" => "book",
                "action" => "search"
            ));

        }
        $bookname = $book->name;

        $this->flash->success('《'.$bookname.'》还书成功！');
        return $this->dispatcher->forward(array(
            "controller" => "book",
            "action" => "search"
        ));

    }

}
