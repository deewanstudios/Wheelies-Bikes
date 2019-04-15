<?
/**
 * NavigationModel class
 * This is the class that holds all the methods for retrieving data from the
 * database for the website linksS page
 *
 * @author Adedayo Adedapo for  Deewanstudios Limited
 */
class NavigationModel extends MasterModel
{

    protected $m_link_getter;
    protected $m_slider_images_getter;
    protected $m_page_visibility = true;
    protected $m_page_id;
    protected $m_image_purpose;

    public function GetLinks()
    {

        try
        {
            $this->m_link_getter = $this->GetAllPages($this->m_page_visibility);
            return $this->m_link_getter;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function GetSliderImages()
    {

        try
        {
            $this->m_page_id       = 1;
            $this->m_image_purpose = "slider";
            $this->m_order_by      = "ASC";

            $this->m_slider_images_getter = $this->GetAllImagesByPurpose($this->m_image_purpose, $this->m_page_id, $this->m_order_by);
            return $this->m_slider_images_getter;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function GetSliderText()
    {
        try
        {
            $this->m_page_id        = 11;
            $this->m_content_puller = $this->GetAllContentsById($this->m_page_id);
            return $this->m_content_puller;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    

    public function getCategoryMegaMenu()
    {
        try {

            $this->m_link_getter = $this->getBikesCategoryMegaMenu();
            return $this->m_link_getter;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    

    public function getBrandMegaMenu()
    {
        try {

            $this->m_link_getter = $this->getBrandsCategoryMegaMenu();
            return $this->m_link_getter;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function getGenderMegaMenu()
    {
        try {

            $this->m_link_getter = $this->getGenderCategoryMegaMenu();
            return $this->m_link_getter;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }



    public function getBikesMegaMenus()
    {
        try {

            $this->m_link_getter = $this->getBrandsMegaMenu();
            return $this->m_link_getter;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

}
