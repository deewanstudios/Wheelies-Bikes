<?php
/**
 *
 */
class ContactModel extends MasterModel
{

    public function __construct()
    {

        parent::__construct();
        $this->m_page_id = 5;
        $this->m_section_id = 4;

    }

    public function ContextualContent()
    {
        try
        {
            $this->m_content_puller = $this->GetAllPageContents($this->m_page_id, $this->m_section_id);
            return $this->m_content_puller;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetBusinessInfo()
    {
        $this->m_content_puller = $this->GetInformation();
        return $this->m_content_puller;
    }

    /**
     * InsertContactFormDetails
     *
     * @param  mixed $firstname
     * @param  mixed $surname
     * @param  mixed $email
     * @param  mixed $telephone
     * @param  mixed $message
     *
     * @return void
     */
    public function insertContactFormDetails($firstname, $surname, $email, $telephone, $message)
    {

        $query = ("INSERT INTO contact(firstname, surname, email, telephone, message, time) VALUES(?, ?, ?, ?, ?,NOW())");
        $data = $this->connection->prepare($query);

        $data->bindParam(1, $firstname);

        $data->bindParam(2, $surname);

        $data->bindParam(3, $email);

        $data->bindParam(4, $telephone);

        $data->bindParam(5, $message);

        $data->execute();

        // echo "I have been called";

    }

}

/*
$insert  =  new ContactModel;

var_dump  (  $insert  ->  InsertContactFormDetails  (  )  );*/
