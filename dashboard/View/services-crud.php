<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="?c=Services">Nucleos</a></li>
            <li class="breadcrumb-item active"><?php echo $alm->serviceid != null ? $alm->servicename  : 'Nuevo Registro'; ?></li>
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
                        <h4><?php echo $alm->serviceid != null ? $alm->servicename : 'Nuevo Registro'; ?></h4>
                    </div>
                    <div class="card-body">
                        <p>Complete el formulario con los datos solicitados.</p>
                        <form action="?c=Services&a=Guardar" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="serviceid" value="<?php echo $alm->serviceid; ?>" />
                            <div class="form-group">
                                <label>Nombre de Servicio</label>
                                <input type="text-box" name="servicename" value="<?php echo $alm->servicename; ?>" class="form-control" placeholder="Escriba el nombre del servicio" data-validacion-tipo="requerido|min:8" />
                            </div>
                            <div class="text-right">
                                <a class="btn btn-danger" href="?c=Services">Cancel</a>
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