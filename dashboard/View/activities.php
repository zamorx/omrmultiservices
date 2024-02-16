<!-- Breadcrumb-->
        <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Ordenes</li>
          </ul>
        </div>
      </div>
      <section>
            <div class="container-fluid">
                <!-- Page Header-->
                <header>
                    <h1 class="h3 display">Ordenes de Trabajo</h1>
                    <div class="well well-sm text-right">
                        <a class="btn btn-primary" href="?c=Activities&a=Crud">Nueva Orden</a> 
                </div>
                </header>
                
                <div class="row">
                    <div class="col-lg-12">

                        <!-- BEGIN TABLA ORDENES ACTIVAS -->
                        
                        <div class="card">
                            <div class="card-header">
                                <h4>Detalle de orden</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="escalation" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nombre de Cliente</th>
                                                <th>Orden No.</th>
                                                <th>Servicio</th>
                                                <th>Fecha</th>
                                                <th>Status</th>
                                                <th>Acciones</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($this->model->Listar() as $r) : ?>
                                                <?php if($r->statusid <= 2 ) : ?>
                                                <tr>
                                                    <td> <a href="?c=Details&a=Index&iduser=<?php echo $r->iduser; ?>"> <?php echo $r->fname; ?></a></td>
                                                    <td><?php echo $r->orderid; ?></td>
                                                    <td><?php echo $r->servicename; ?></td>
                                                    <td>
                                                        <?php
                                                        $newDate = date("F d, Y", strtotime($r->servicedate));
                                                        echo $newDate;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <span class="text-<?php echo $r->statuscode; ?>" ><?php echo $r->statusname; ?></span>
                                                           
                                                    </td>
                                                    <td>
                                                        <i class="glyphicon glyphicon-edit"><a href="?c=Activities&a=Crud&orderid=<?php echo $r->orderid; ?>">Editar</a></i>
                                                    </td>
                                                    <td>
                                                        <a href="?c=Activities&a=Status&orderid=<?php echo $r->orderid; ?>" class="btn btn-outline-info btn-sm radius-30 px-4">
                                                            Status
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php if($userDetails->idrol == 1) : ?>
                                                            <i class="glyphicon glyphicon-remove"><a class="text-danger" href="?c=Activities&a=Eliminar&orderid=<?php echo $r->orderid; ?>"> Eliminar</a></i>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                         <!-- END TABLA ORDENES ACTIVAS -->

                         <!-- BEGIN TABLA ORDENES INACTIVAS -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Detalle de orden</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nombre de Cliente</th>
                                                <th>Orden No.</th>
                                                <th>Servicio</th>
                                                <th>Fecha de Entrega</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($this->model->Listar() as $r) : ?>
                                                <?php if($r->statusid == 3 ) : ?>
                                                <tr>
                                                    <td> <a href="?c=Details&a=Index&iduser=<?php echo $r->iduser; ?>"> <?php echo $r->fname; ?></a></td>
                                                    <td><?php echo $r->orderid; ?></td>
                                                    <td><?php echo $r->servicename; ?></td>
                                                    <td>
                                                        <?php
                                                        $newDate = date("F d, Y", strtotime($r->closeddate));
                                                        echo $newDate;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <span class="text-<?php echo $r->statuscode; ?>" ><?php echo $r->statusname; ?></span>
                                                           
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END TABLA ORDENES INACTIVAS -->
                        
                    </div>
                </div>   
            </div>
        </section>