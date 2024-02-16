<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Clientes </li>
        </ul>
    </div>
</div>
<section>
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">Clientes</h1>
            <div class="well well-sm text-right">
                <?php if($userDetails->idrol == 1) : ?>
                    <a class="btn btn-primary" href="?c=Users&a=Crud">Agregar Cliente</a>
                <?php  elseif($userDetails->idrol == 2) : ?>
                    <a class="btn btn-primary" href="?c=Users&a=Crud">Agregar Cliente</a>
                <?php endif; ?>
            </div>
        </header>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de clientes registrados</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="escalation" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre de Usuario</th>
                                        <th>Dirección</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th></th>
                                        <th></th>

                                        <!-- <th></th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->model->Listar() as $r) : ?>
                                        <tr>
                                            <td><a href="?c=Details&a=Index&iduser=<?php echo $r->iduser; ?>"><?php echo $r->fname; ?></a></td>
                                            
                                            <td><?php echo $r->usraddress; ?></td>
                                            <td><a href="mailto:<?php echo $r->emuser; ?>?Subject=Contacto"><?php echo $r->emuser; ?></a></td>
                                            <td><a target="blank" href="https://wa.me/+1<?php echo $r->phuser; ?>"><?php echo $r->phuser; ?></a>
                                            </td>
                                            <td>
                                                <?php $newDate = date("F d, Y", strtotime($r->usrbirthday)); echo $newDate;?>
                                            </td>
                                            <td>
                                                <?php if($userDetails->idrol == 1) : ?>
                                                    <i class="glyphicon glyphicon-edit"><a class="text-info" href="?c=Users&a=Crud&iduser=<?php echo $r->iduser; ?>"> Editar</a></i>
                                                <?php  elseif($userDetails->idrol == 2) : ?>
                                                    <i class="glyphicon glyphicon-edit"><a class="text-info" href="?c=Users&a=Crud&iduser=<?php echo $r->iduser; ?>"> Editar</a></i>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($userDetails->idrol == 1) : ?>
                                                    <i class="glyphicon glyphicon-remove"><a class="text-danger" href="?c=Users&a=Eliminar&iduser=<?php echo $r->iduser; ?>"> Eliminar</a></i>
                                                <?php endif; ?>
                                            </td>
                                            
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



