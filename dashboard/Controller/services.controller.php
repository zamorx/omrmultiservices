<?php
require_once 'Model/services.php';

class ServicesController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Services();
    }

    public function Index()
    {
        require_once 'View/header.php';
        require_once 'View/services.php';
        require_once 'View/services-footer.php';
    }

    public function Crud()
    {
        $alm = new Services();

        if (isset($_REQUEST['serviceid'])) {
            $alm = $this->model->getting($_REQUEST['serviceid']);
        }

        require_once 'View/header.php';
        require_once 'View/services-crud.php';
        require_once 'View/footer.php';
    }

    public function Guardar()
    {
        $alm = new Services();

        $alm->serviceid = $_REQUEST['serviceid'];
        $alm->servicename = $_REQUEST['servicename'];

        // SI ID Support ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA Support, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->serviceid > 0
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);

        //EL CÓDIGO ANTERIOR ES EQUIVALENTE A UTILIZAR CONDICIONALES IF, TAL COMO SE MUESTRA EN EL COMENTARIO A CONTINUACIÓN:

        /*if ($alm->serviceid > 0 ) {
            $this->model->Actualizar($alm);
        }
        else{
           $this->model->Registrar($alm); 
        }*/

        header('Location: ?c=Services');
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['serviceid']);
        header('Location: ?c=Services');
    }
}
