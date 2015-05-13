<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class PreBorrowController extends ControllerBase
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
     * Searches for pre_borrow
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "PreBorrow", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $pre_borrow = PreBorrow::find($parameters);
        if (count($pre_borrow) == 0) {
            $this->flash->notice("The search did not find any pre_borrow");


        }

        $paginator = new Paginator(array(
            "data" => $pre_borrow,
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
     * Edits a pre_borrow
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $pre_borrow = PreBorrow::findFirstByid($id);
            if (!$pre_borrow) {
                $this->flash->error("pre_borrow was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "pre_borrow",
                    "action" => "index"
                ));
            }

            $this->view->id = $pre_borrow->id;

            $this->tag->setDefault("id", $pre_borrow->id);
            $this->tag->setDefault("book_id", $pre_borrow->book_id);
            $this->tag->setDefault("userid", $pre_borrow->userid);
            $this->tag->setDefault("ext1", $pre_borrow->ext1);
            $this->tag->setDefault("ext2", $pre_borrow->ext2);
            
        }
    }

    /**
     * Creates a new pre_borrow
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "pre_borrow",
                "action" => "index"
            ));
        }

        $pre_borrow = new PreBorrow();

        $pre_borrow->book_id = $this->request->getPost("book_id");
        $pre_borrow->userid = $this->request->getPost("userid");
        $pre_borrow->ext1 = $this->request->getPost("ext1");
        $pre_borrow->ext2 = $this->request->getPost("ext2");
        

        if (!$pre_borrow->save()) {
            foreach ($pre_borrow->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "pre_borrow",
                "action" => "new"
            ));
        }

        $this->flash->success("pre_borrow was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "pre_borrow",
            "action" => "index"
        ));

    }

    /**
     * Saves a pre_borrow edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "pre_borrow",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $pre_borrow = PreBorrow::findFirstByid($id);
        if (!$pre_borrow) {
            $this->flash->error("pre_borrow does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "pre_borrow",
                "action" => "index"
            ));
        }

        $pre_borrow->book_id = $this->request->getPost("book_id");
        $pre_borrow->userid = $this->request->getPost("userid");
        $pre_borrow->ext1 = $this->request->getPost("ext1");
        $pre_borrow->ext2 = $this->request->getPost("ext2");
        

        if (!$pre_borrow->save()) {

            foreach ($pre_borrow->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "pre_borrow",
                "action" => "edit",
                "params" => array($pre_borrow->id)
            ));
        }

        $this->flash->success("pre_borrow was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "pre_borrow",
            "action" => "index"
        ));

    }

    /**
     * Deletes a pre_borrow
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $pre_borrow = PreBorrow::findFirst("book_id =$id ");
        if (!$pre_borrow) {
            $this->flash->error("pre_borrow was not found");

            return $this->dispatcher->forward(array(
                "controller" => "pre_borrow",
                "action" => "index"
            ));
        }

        if (!$pre_borrow->delete()) {

            foreach ($pre_borrow->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "pre_borrow",
                "action" => "search"
            ));
        }

        $this->flash->success("pre_borrow was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "pre_borrow",
            "action" => "index"
        ));
    }

}
