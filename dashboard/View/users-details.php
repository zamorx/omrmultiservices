<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="?c=Users">Usuarios</a></li>
      <li class="breadcrumb-item active"><?php echo $alm->fname ?></li>
    </ul>
  </div>
</div>
<section>
  <div class="container-fluid">
    <!-- Page Header-->
    <header>
      <h1 class="h3 display">Detalle de Usuario</h1>
    </header>
    <div class="row">

  


      <div class="col-lg-4">
        <div class="card pt-4">
        <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                <!-- <img class="rounded-circle" src="assets/img/users/<?php echo $alm->iduser; ?>.jpg" alt="<?php echo $alm->fname; ?>" width="150"> -->
                                <img class="rounded-circle" src="assets/img/users/profile.jpg" alt="<?php echo $alm->fname; ?>" width="150">
                                    <div class="mt-3">
                                    <h2 class="mb-0"><?php echo $alm->fname; ?></h2>
                                        
                                        <span class="text-muted font-size-sm">
                                          <?php $origDate = "$alm->usrbirthday";
                                          $newDate = date("F d, Y", strtotime($origDate));
                                          echo $newDate;?></span><p></p>
                                        <a href="mailto:<?php echo $alm->emuser; ?>?Subject=Contacto"><button class="btn btn-primary radius-5 px-4">Email</button></a>
                                        <a target="blank" href="https://wa.me/+1<?php echo $alm->phuser; ?>"><button class="btn btn-outline-primary radius-5 px-4">Message</button></a>
                                    </div>
                                </div>

                            </div>
          
          <ul class="list-group list-group-flush no-print">
            <li class="list-group-item px-4">
            <span class="text-muted">
              <strong>Dirección: </strong><?php echo $alm->usraddress; ?>
              </span>
            </li>
            <li class="list-group-item p-4">
              <span class="text-muted d-block mb-2"></strong><strong>Email: </strong><?php echo $alm->emuser; ?></span>
              <span class="text-muted d-block mb-2"></strong><strong>Teléfono: </strong><?php echo $alm->phuser; ?></span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-8">
      <?php foreach ($this->model->userServices() as $r) : ?>
        <?php if ($alm->iduser == $r->iduser) : ?>
        <div class="card">
          <div class="card-header">
            <h4>Orden No. <?php echo $r->orderid; ?></h4>
            <!-- <div class="well well-sm text-right">
              <a class="btn btn-info" href="?c=Activities&a=Crud">Imprimir</a>
            </div> -->
            
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $r->servicename; ?></h5>
            <?php $origDate = "$r->servicedate";
            $newDate = date("F d, Y", strtotime($origDate));
            echo $newDate;?>
         </div>
          
        </div>
        <?php endif; ?>
        <?php endforeach; ?>

        
        <div class="text-right">
          <a class="btn btn-success no-print" href="?c=Users">Regresar</a>
        </div>
      </div>
    </div>
  </div>
</section>