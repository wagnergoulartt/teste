
<?php  
    $db     = \Config\Database::connect();
    $mid    = helperSession2GetValueOfArray('authAdmin', 'id');
    $model  = new \App\Models\LoginAdminModel();
    $mb     = $model->where('id', $mid)->first();
                                      
?>
<!doctype html>
<html lang="pt-br" dir="ltr">
  <head>        
        <!-- =========== METAS ================= -->
            <?= view('templates/metas'); ?>
        <!-- =========== FIM METAS ================= -->
  </head>
  <body class="" >
    <div class="page">
      <div class="page-main">

        

            <!-- =========== HEADER ================= -->
            <?= view('templates/headeradmin'); ?>
            <!-- =========== FIM HEADER ================= -->

        <div class="wrapper">
          <!-- Sidebar Holder -->
          

            <!-- =========== NAVBAR ================= -->
            <?= view('templates/navbaradmin'); ?>
            <!-- =========== FIM NAVBAR ================= -->




<div class=" content-area overflow-hidden">
                        <div class="page-header">
                            <h4 class="page-title">GRUPO</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Grupo</li>
                            </ol>

                        </div>

                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">Grupo
                                    </div>
                                </div>


                                <div class="card-body">
                                    <div class="table-responsive">


                                                <?php if (session()->getFlashdata('success')) { ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <h4>
                                                            Atenção!
                                                        </h4>
                                                        <p><?= session()->getFlashdata('success') ?></p>
                                                    </div>
                                                <?php } ?>
                                                
                                                <?php if (session()->getFlashdata('error')) { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <h4>
                                                            Atenção!
                                                        </h4>
                                                        <p><?= session()->getFlashdata('error') ?></p>
                                                    </div>
                                                <?php } ?>

                                
                               
                      <form method="post">

                                    <div class="row">

                                    <div class="col-lg-12 col-xl-12 text-xwork-lighter">

                                         <div class="form-group">
                                                <label for="tipo">
                                                    Tipo
                                                </label>                                               

                                                    <select class="form-control" id="tipo" name="tipo">
    <?php 
        if ($view['action']['alias'] ==  "Editar") {
            $cat_model   = new App\Models\CategoriasModel();
            $cat         = $cat_model->where('id', $view['record']['tipo'])->first();
    ?>
            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['titulo']; ?></option>
    <?php 
        } 
    ?>
    <?php
        $busca = $db->query('SELECT * FROM categorias ORDER BY titulo ASC;');
        foreach ($busca->getResultArray() as $item) {
            // Verifica se o item já está selecionado
            if (!isset($cat) || $cat['id'] != $item['id']) {
    ?>
                <option value="<?php echo $item['id']; ?>"><?php echo $item['titulo']; ?></option>
    <?php 
            } 
        } 
    ?>
</select>
                                                
                                            </div>

                                    </div>



                                    <div class="col-lg-12 col-xl-12 text-xwork-lighter">

                                        <div class="form-group">
                                            <?php
                                            echo form_label('Nome', 'nome');
                                            echo form_input(array(
                                                'id'        => 'nome',
                                                'class'     => 'form-control',
                                                'name'      => 'nome',
                                                'value'     => (set_value('nome') ? set_value('nome') : (isset($view['record']['nome']) ? $view['record']['nome'] : null))
                                            ));
                                            ?>
                                           
                                        </div>

                                    </div>

                                    <div class="col-lg-12 col-xl-12 text-xwork-lighter">

<div class="form-group ">
    <?php
    echo form_label('ID Grupo', 'id_grupo');
    echo form_input(array(
        'id'        => 'id_grupo',
        'class'     => 'form-control',
        'name'      => 'id_grupo',
        'value'     => (set_value('id_grupo') ? set_value('id_grupo') : (isset($view['record']['id_grupo']) ? $view['record']['id_grupo'] : null))
    ));
    ?>

</div>

                                    </div>

<div class="form-group">
    <?php
    // Verifica se o valor do campo oculto já está definido, se não, define como 'desativado'
    $banlink_value = (isset($view['record']['banlink']) ? $view['record']['banlink'] : 'desativado');
    
    echo form_hidden('banlink', $banlink_value); // Adiciona o campo oculto com o valor 'desativado'
    ?>
</div>

</div>





                                    <div class="col-md-12 col-xl-12">
                                        
                                        <button type="submit" class="btn btn-block btn-lg btn-primary">
                                            <i class="fa fa-fw fa-retweet mr-1"></i> SALVAR
                                        </button>
                                        <input type=hidden name='editar_config' value='true'>
                                    </div>


                                </div>
                            </form>



                                    
                                </div>
                                </div>
                                <!-- table-wrapper -->
                            </div>
                            <!-- section-wrapper -->

                            </div>
                        </div>

                        
                        
                    </div>
        </div>
      </div>

      <!--footer-->
            <?= view('templates/footer'); ?>
      <!-- End Footer-->
    </div>
    
    <!-- Back to top -->
    <a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>

    <!-- Dashboard Core -->
    <script src="<?= $src; ?>js/vendors/jquery-3.2.1.min.js"></script>
    <script src="<?= $src; ?>js/vendors/bootstrap.bundle.min.js"></script>
    <script src="<?= $src; ?>js/vendors/jquery.sparkline.min.js"></script>
    <script src="<?= $src; ?>js/vendors/selectize.min.js"></script>
    <script src="<?= $src; ?>js/vendors/jquery.tablesorter.min.js"></script>
    <script src="<?= $src; ?>js/vendors/circle-progress.min.js"></script>
    <script src="<?= $src; ?>plugins/rating/jquery.rating-stars.js"></script>

    <!-- Fullside-menu Js-->
    <script src="<?= $src; ?>plugins/fullside-menu/jquery.slimscroll.min.js"></script>
    <script src="<?= $src; ?>plugins/fullside-menu/waves.min.js"></script>


    <!-- Custom scroll bar Js-->
    <script src="<?= $src; ?>plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>


    <!-- Custom Js-->
    <script src="<?= $src; ?>js/custom.js"></script>

  </body>
</html>