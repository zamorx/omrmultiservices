<?php

require_once 'Model/config.php';

$dbhost = DB_HOST;
$dbuser = DB_USER;
$dbpass = DB_PASSWORD;
$dbname = DB_NAME;

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$connect->set_charset("utf8");
$query = "SELECT * FROM tblcores WHERE activecore = true ORDER by namecore asc";
$coreform = mysqli_query($connect, $query);

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$connect->set_charset("utf8");
$query = "SELECT * FROM tblorgs WHERE activeorg = true ORDER by nameorg asc";
$orgform = mysqli_query($connect, $query);

?>

<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="?c=Users">Clientes</a></li>
            <li class="breadcrumb-item active"><?php echo $alm->iduser != null ? $alm->fname  : 'Nuevo Registro'; ?></li>
        </ul>
    </div>
</div>
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display"> </h1>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4><?php echo $alm->iduser != null ? $alm->fname : 'Nuevo Registro'; ?></h4>
                    </div>
                    <div class="card-body">
                        <p>Complete el formulario con los datos solicitados.</p>
                        <form action="?c=Users&a=Guardar" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="iduser" value="<?php echo $alm->iduser; ?>" />
                            <div class="form-group">
                                <label>Nombre del cliente</label>
                                <input type="text-box" name="fname" value="<?php echo $alm->fname; ?>" class="form-control" placeholder="Escriba el nombre completo del cliente" data-validacion-tipo="requerido|min:8" />
                            </div>
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text-box" name="usraddress" value="<?php echo $alm->usraddress; ?>" class="form-control" placeholder="Escriba la dirección del cliente" data-validacion-tipo="requerido|min:8" />
                            </div>
                            <div class="form-group">
                                <label>Correo electrónico</label>
                                <input type="text-box" name="emuser" value="<?php echo $alm->emuser; ?>" class="form-control" placeholder="Escriba el correo electrónico" data-validacion-tipo="requerido|min:8" />
                            </div>
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text-box" name="phuser" value="<?php echo $alm->phuser; ?>" class="form-control" placeholder="Escriba el número de teléfono" data-validacion-tipo="requerido|min:8" />
                            </div>
                            <div class="form-group">
                                <label>Fecha de nacimiento</label>
                                <input type="date" name="usrbirthday" value="<?php echo $alm->usrbirthday; ?>" class="form-control" placeholder="Escriba el nombre completo del usuario" data-validacion-tipo="requerido|min:8" />
                            </div>
                            <div class="text-right">
                                <a class="btn btn-danger" href="?c=Users">Cancel</a>
                                <button class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $("#frm-alumno").submit(function() {
            return $(this).validate();
        });
    })
</script>