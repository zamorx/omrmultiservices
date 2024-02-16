<?php

require_once 'Model/config.php';

$dbhost = DB_HOST;
$dbuser = DB_USER;
$dbpass = DB_PASSWORD;
$dbname = DB_NAME;

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$connect->set_charset("utf8");
$query = "SELECT * FROM tblroles WHERE activerol = true ORDER by namerol asc";
$coreform = mysqli_query($connect, $query);

?>

<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="?c=Users">Logins</a></li>
            <li class="breadcrumb-item active"><?php echo $alm->uid != null ? $alm->name  : 'Nuevo Registro'; ?></li>
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
                        <h4><?php echo $alm->uid != null ? $alm->name : 'Nuevo Registro'; ?></h4>
                    </div>
                    <div class="card-body">
                        <p>Complete el formulario con los datos solicitados.</p>
                        <form action="?c=Logins&a=Guardar" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="uid" value="<?php echo $alm->uid; ?>" />
                            <div class="form-group">
                                <label>Nombre completo</label>
                                <input type="text-box" name="name" value="<?php echo $alm->name; ?>" class="form-control" placeholder="Escriba su nombre completo" data-validacion-tipo="requerido|min:8" />
                            </div>
                            <div class="form-group">
                                <label>Nombre de usuario</label>
                                <input type="text-box" name="username" value="<?php echo $alm->username; ?>" class="form-control" placeholder="Escriba su nombre de usuario" data-validacion-tipo="requerido|min:8" />
                            </div>
                            <!-- CONDICION PARA OCULTAR CAMPO DE PASSWORD -->
                            <?php if($alm->uid > 0) : ?>
        
                            <?php  else : ?>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" value="<?php echo $alm->password; ?>" class="form-control" placeholder="Escriba su nombre de usuario" data-validacion-tipo="requerido|min:8" />
                            </div>
                            <?php endif; ?>
                            <!-- FIN DE LA CONDICION -->
                            <div class="form-group">
                                <label>Rol de acceso</label>
                                <select id="idrol" name="idrol" value="<?php echo $alm->idrol; ?>" class="form-control">
                                <option value="<?php echo $alm->idrol; ?>"><?php echo $alm->uid != null ? $alm->namerol : 'Seleccione un rol'; ?></option>
                                    <?php while ($row1 = mysqli_fetch_array($coreform)) :; ?>
                                        <option value="<?php echo $row1[0] ?>"><?php echo $row1[1] ?></option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Correo electronico</label>
                                <input type="text-box" name="email" value="<?php echo $alm->email; ?>" class="form-control" placeholder="Escriba su correo electronico" data-validacion-tipo="requerido|min:8" />
                            </div>
                           
                            <div class="text-right">
                                <a class="btn btn-danger" href="?c=Logins">Cancel</a>
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