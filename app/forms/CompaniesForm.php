<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class CompaniesForm extends Form
{

    /**
     * Initialize the companies form
     */
    public function initialize($entity = null, $options = array())
    {

        if (!isset($options['edit'])) {
            $element = new Text("id");
            $element->setAttribute('class','form-control');
            $this->add($element->setLabel("Id"));
        } else {
            $this->add(new Hidden("id"));
        }

        $name = new Text("name");
        $name->setAttribute('class','form-control');
        $name->setLabel("Name");
        $name->setFilters(array('striptags', 'string'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Name is required'
            ))
        ));
        $this->add($name);

        $telephone = new Text("telephone");
        $telephone->setAttribute('class','form-control');
        $telephone->setLabel("Telephone");
        $telephone->setFilters(array('striptags', 'string'));
        $telephone->addValidators(array(
            new PresenceOf(array(
                'message' => 'Telephone is required'
            ))
        ));
        $this->add($telephone);

        $address = new Text("address");
        $address->setLabel("address");
        $address->setAttribute('class','form-control');
        $address->setFilters(array('striptags', 'string'));
        $address->addValidators(array(
            new PresenceOf(array(
                'message' => 'Address is required'
            ))
        ));
        $this->add($address);

        $city = new Text("city");
        $city->setLabel("city");
        $city->setAttribute('class','form-control');
        $city->setFilters(array('striptags', 'string'));
        $city->addValidators(array(
            new PresenceOf(array(
                'message' => 'City is required'
            ))
        ));
        $this->add($city);
    }

}