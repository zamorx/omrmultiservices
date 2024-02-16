<?php
require_once 'Model/activities.php';

class ActivitiesController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Activities();
    }

    public function Index()
    {
        require_once 'View/header.php';
        require_once 'View/activities.php';
        require_once 'View/services-footer.php';
    }

    public function Crud()
    {
        $alm = new Activities();

        if (isset($_REQUEST['orderid'])) {
            $alm = $this->model->getting($_REQUEST['orderid']);
        }

        require_once 'View/header.php';
        require_once 'View/activities-crud.php';
        require_once 'View/footer.php';
    }

    public function Guardar()
    {
        $alm = new Activities();

        $alm->orderid = $_REQUEST['orderid'];
        $alm->iduser = $_REQUEST['iduser'];
        $alm->serviceid = $_REQUEST['serviceid'];
        $alm->servicedate = $_REQUEST['servicedate'];

        // SI ID Support ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA Support, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->orderid > 0
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);

        //EL CÓDIGO ANTERIOR ES EQUIVALENTE A UTILIZAR CONDICIONALES IF, TAL COMO SE MUESTRA EN EL COMENTARIO A CONTINUACIÓN:

        /*if ($alm->orderid > 0 ) {
            $this->model->Actualizar($alm);
        }
        else{
           $this->model->Registrar($alm); 
        }*/

        header('Location: ?c=Activities');
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['orderid']);
        header('Location: ?c=Activities');
    }

    public function Status()
    {
        $alm = new Activities();

        if (isset($_REQUEST['orderid'])) {
            $alm = $this->model->getting($_REQUEST['orderid']);
        }

        require_once 'View/header.php';
        require_once 'View/activities-status.php';
        require_once 'View/footer.php';
    }

    public function StatusChange()
    {
        $alm = new Activities();

        $alm->orderid = $_REQUEST['orderid'];
        $alm->statusid = $_REQUEST['statusid'];
        $alm->processdate = $_REQUEST['processdate'];
        $alm->closeddate = $_REQUEST['closeddate'];

        $this->model->StatusChange($alm);

        header('Location: ?c=Activities');
    }
}
