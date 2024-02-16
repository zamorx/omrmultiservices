<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="?c=Activities">Ordenes de Trabajo</a></li>
            <li class="breadcrumb-item active"><?php echo $alm->orderid != null ? $alm->fname  : 'Nuevo Registro'; ?></li>
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
                        <h4><?php echo $alm->orderid != null ? $alm->fname : 'Nuevo Registro'; ?></h4>
                    </div>
                    <div class="card-body">
                        <p>Complete el formulario con los datos solicitados.</p>
                        <form id="activities" action="?c=Activities&a=Guardar" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="orderid" value="<?php echo $alm->orderid; ?>" />
                            <div class="form-group">
                                <label>Nombre de usuario</label>
                                <select id="iduser" name="iduser" value="<?php echo $alm->fname; ?>" class="form-control">
                                    <option value="<?php echo $alm->iduser; ?>"><?php echo $alm->orderid != null ? $alm->fname : 'Nombre de Cliente'; ?></option>
                                    <?php foreach ($this->model->ListUsers() as $r) : ?>
                                        <option value="<?php echo $r->iduser?>"><?php echo $r->fname; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" name="servicedate" value="<?php echo $alm->$servicedate; ?>" class="form-control" placeholder="Seleccione fecha de actividad" data-validacion-tipo="requerido|date" />
                            </div>
                            <div class="form-group">
                                <label>Servicio</label>
                                <select id="serviceid" name="serviceid" value="<?php echo $alm->servicename; ?>" class="form-control">
                                    <option value="<?php echo $alm->serviceid; ?>"><?php echo $alm->orderid != null ? $alm->servicename : 'Nombre de Servicio'; ?></option>
                                    <?php foreach ($this->model->ListServices() as $r) : ?>
                                        <option value="<?php echo $r->serviceid?>"><?php echo $r->servicename; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="text-right">
                                <a class="btn btn-danger" href="?c=Activities">Cancel</a>
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
        $("#activities").submit(function() {
            return $(this).validate();
        });
    })
</script>