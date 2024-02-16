<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="?c=Activities">Seguimiento de ordenes</a></li>
            <li class="breadcrumb-item active">AZ<?php echo $alm->orderid != null ? $alm->orderid  : 'Nuevo Registro'; ?></li>
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
                        <h4><?php echo $alm->orderid != null ? $alm->orderid : 'Nuevo Registro'; ?></h4>
                    </div>

                    <div class="card-body">
                        <p>Complete el formulario con los datos solicitados.</p>
                        <form id="tracking" action="?c=Activities&a=StatusChange" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="orderid" value="<?php echo $alm->orderid; ?>" />

                        <?php if($alm->statusid == 1 ) : ?>
                            <div class="form-group">
                                <label>Estado de orden</label>
                                <select id="statusid" name="statusid" value="<?php echo $alm->statusname; ?>" class="form-control">
                                    <option value="<?php echo $alm->statusid; ?>"><?php echo $alm->statusid != null ? $alm->statusname : 'Seleccione una opción'; ?></option>
                                    <option value="2">Procesado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha de Procesamiento</label>
                                <input type="date" name="processdate" class="form-control" placeholder="Fecha de procesamiento" data-validacion-tipo="requerido|date" />
                            </div>
                        <?php endif; ?>

                            
                        <?php if($alm->statusid == 2 ) : ?>
                            <div class="form-group">
                                <label>Estado de orden</label>
                                <select id="statusid" name="statusid" value="<?php echo $alm->statusname; ?>" class="form-control">
                                    <option value="<?php echo $alm->statusid; ?>"><?php echo $alm->statusid != null ? $alm->statusname : 'Seleccione una opción'; ?></option>
                                    <option value="3">Entregado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha de entregado</label>
                                <input type="date" name="closeddate" value="<?php echo $alm->closeddate; ?>" class="form-control" placeholder="Fecha de entregado" data-validacion-tipo="requerido|date" />
                            </div>
                            <input type="hidden" name="processdate" value="<?php echo $alm->processdate; ?>"/>
                        <?php endif; ?>
                           
                            
                            <div class="text-right">
                                <a class="btn btn-danger radius-5 px-4" href="?c=Activities">Cancel</a>
                                <button class="btn btn-primary radius-5 px-4">Guardar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>