<!-- Breadcrumb-->
<div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Servicios       </li>
          </ul>
        </div>
      </div>

      <!--
      <section>
            <div class="container-fluid">
                 Page Header 
                <header>
                    <h1 class="h3 display">Servicios</h1>
                    <div class="well well-sm text-right">
                    <a class="btn btn-primary" href="?c=Services&a=Crud">Agregar Servicio</a>
                </div>
                </header>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Lista de servicios registrados</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="escalation" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nombre de Servicio</th>
                                                <th>Acciones</th>
                                                <th></th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($this->model->Listar() as $r) : ?>
                                                <tr>
                                                    <td><?php echo $r->servicename; ?></td>
                                                    <td>
                                                        <i class="glyphicon glyphicon-edit"><a href="?c=Services&a=Crud&serviceid=<?php echo $r->serviceid; ?>"> Editar</a></i>
                                                    </td>
                                                    <td>
                                                        <?php if($userDetails->idrol == 1) : ?>
                                                            <i class="glyphicon glyphicon-remove"><a class="text-danger" href="?c=Services&a=Eliminar&serviceid=<?php echo $r->serviceid; ?>"> Eliminar</a></i>
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

                -->                                        



        <section>
    <div class="container-fluid">
         
        <header>
            <h1 class="h3 display">Servicios</h1>
            <div class="well well-sm text-right">
                
            <a class="btn btn-primary" href="?c=Services&a=Crud">Agregar Servicio</a>
                
            </div>
        </header>

        <section class="mt-30px mb-30px">
            <div class="row">
                <?php foreach ($this->model->Listar() as $r) : ?>
                    
                    <div class="col-lg-3 col-md-12">
                        <div class="card radius-15">
                            <div class="card-body text-center">
                                <div class="p-4 border radius-15">
                                    <h4 class="text-uppercase mb-0"><?php echo $r->servicename; ?></h4>
                                        <br><img src="assets/img/services/<?php echo $r->serviceid; ?>.jpg" width="180" height="180" class="rounded-circle shadow" alt="">
                                    
                                        <!--<p class="mb-3"><?php echo $r->namerol; ?></p>-->
                                        <div class="list-inline contacts-social mt-3 mb-3">
                                            <a href="?c=Services&a=Crud&serviceid=<?php echo $r->serviceid; ?>" class="list-inline-item bg-twitter text-black border-0">Editar</a>
                                            <?php if($userDetails->idrol == 1) : ?>
                                                <a href="?c=Services&a=Eliminar&serviceid=<?php echo $r->serviceid; ?>" class="text-danger list-inline-item bg-twitter text-black border-0">Eliminar</a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="d-grid"> <a href="#" class="btn btn-outline-primary radius-5 px-4">Contratar Servicio</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                <?php endforeach; ?>
            </div>
        </section>
        </section>
                                            