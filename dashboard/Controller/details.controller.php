<?php
require_once 'Model/details.php';

class DetailsController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Details();
    }

    public function Index()
    {
        $alm = new Details();

        if (isset($_REQUEST['iduser'])) {
            $alm = $this->model->getting($_REQUEST['iduser']);
        }

        require_once 'View/header.php';
        require_once 'View/users-details.php';
        require_once 'View/footer.php';
    }
}
