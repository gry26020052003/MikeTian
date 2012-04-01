<?php
class forms_ContactForm 
{
	public function __construct()
	{
	}
	public function build()
	{
		$form = new Zend_Form;
		$form->setAction('updating')
   			  ->setMethod('post');
	     
        $firstName = new Zend_Form_Element_Text('firstName');
        $firstName->setLabel('First name')
                  ->setRequired(true)
                  ->addValidator('NotEmpty');

        $lastName = new Zend_Form_Element_Text('lastName');
        $lastName->setLabel('Last name')
                 ->setRequired(true)
                 ->addValidator('NotEmpty');
             

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Update');
        
        $form->addElements(array($firstName, 
        $lastName,  $submit));
		return $form; 
	}
}