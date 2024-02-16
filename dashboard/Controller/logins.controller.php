<?php
require_once 'Model/logins.php';

class LoginsController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Logins();
    }

    public function Index()
    {
        require_once 'View/header.php';
        require_once 'View/logins.php';
        require_once 'View/footer.php';
    }

    public function Crud()
    {
        $alm = new Logins();

        if (isset($_REQUEST['uid'])) {
            $alm = $this->model->getting($_REQUEST['uid']);
        }

        require_once 'View/header.php';
        require_once 'View/logins-crud.php';
        require_once 'View/footer.php';
    }

    public function Guardar()
    {
        $alm = new Logins();

        $alm->uid = $_REQUEST['uid'];
        $alm->name = $_REQUEST['name'];
        $alm->username = $_REQUEST['username'];
        $alm->password = $_REQUEST['password'];
        $alm->idrol = $_REQUEST['idrol'];
        $alm->email = $_REQUEST['email'];
      

        // SI ID Support ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA Support, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->uid > 0
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);

        //EL CÓDIGO ANTERIOR ES EQUIVALENTE A UTILIZAR CONDICIONALES IF, TAL COMO SE MUESTRA EN EL COMENTARIO A CONTINUACIÓN:

        /*if ($alm->iduser > 0 ) {
            $this->model->Actualizar($alm);
        }
        else{
           $this->model->Registrar($alm); 
        }*/

        header('Location: ?c=Logins');
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['uid']);
        header('Location: ?c=Logins');
    }

    public function PassWD()
    {
        $alm = new Logins();

        if (isset($_REQUEST['uid'])) {
            $alm = $this->model->getting($_REQUEST['uid']);
        }

        require_once 'View/header.php';
        require_once 'View/logins-passwd.php';
        require_once 'View/footer.php';
    }

    public function PasswordChange()
    {
        $alm = new Logins();

        $alm->uid = $_REQUEST['uid'];
        $alm->password = $_REQUEST['password'];

        $this->model->PasswordChange($alm);

        header('Location: ?c=Logins');
    }

    
}
