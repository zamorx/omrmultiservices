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
                        <form action="?c=Logins&a=PasswordChange" method="post" enctype="multipart/form-data" onsubmit="return checkPassword(this);">
                            <input type="hidden" name="uid" value="<?php echo $alm->uid; ?>" />
                            
                            <div class="form-group">
                                <label>Escriba su contraseña</label>
                                <input type="password" name="password" class="form-control" autocomplete="off"/>
                            </div>
                            <div class="form-group">
                                <label>Repita su contraseña</label>
                                <input type="password" name="passwordmatch" class="form-control" autocomplete="off"/>
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

<script>
function checkPassword(theForm) {
    if (theForm.password.value != theForm.passwordmatch.value)
    {
        alert('Las contrasenas no coinciden');
        return false;
    } else {
        return true;
    }
}
</script>