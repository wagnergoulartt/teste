
<?php  

    $mid       = helperSession2GetValueOfArray('auth', 'id');
    $model     = new \App\Models\LoginModel();
    $mb        = $model->where('id', $mid)->first();

                                      
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
            <?= view('templates/header'); ?>
            <!-- =========== FIM HEADER ================= -->

        <div class="wrapper">
          <!-- Sidebar Holder -->
          

            <!-- =========== NAVBAR ================= -->
            <?= view('templates/navbar'); ?>
            <!-- =========== FIM NAVBAR ================= -->



          <div class=" content-area ">
            <div class="page-header">
              <h4 class="page-title">Funções de Grupo</h4>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Funções</li>
              </ol>
            </div>

   
            <div class="row">
                <div class="col-12">

                    <?php 
                             $gps     = new \App\Models\GruposModel();
                             $gp      = $gps->where('id', $grupos['grupo'])->first();
                    ?>


                         <form class="card" action="" method="post"  enctype="multipart/form-data">
                            <div class="card-header">
                              <h3 class="card-title"><strong><?= $view['action']['alias'] ?></strong> - Personalize as funções do seu Bot</h3>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-12 col-lg-12">

                                  <br><br>

                                  <p class="alert alert-primary">GRUPO: <?php echo $gp['nome']; ?> </p>


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

                                                 <div class="form-group">

                                                  <label for="">Preencha o campo de texto com a nova mensagem e clique em Salvar</label>
                                                  </br>
                                                  <label for="">Use <strong>{p1}</strong> para mencionar a pessoa que entrou no grupo e <strong>{p2}</strong> para mencionar o nome do grupo.</label>

                                                  <textarea id="mensagem" name="mensagem" rows="8" class="editor1"><?php if (isset($grupos['msg_bv'])) {echo preg_replace('/\s+/', ' ', trim($grupos['msg_bv']));} ?></textarea>
                                                </div>

                                                 <div class="form-group">

                                                  <label for="">Imagem</label>

                                                  <?php if (isset($grupos['img_bv'])) { ?>


                                                        <div style="padding: 15px 0">
                                                            <a target="_blank" href="<?= base_url("public/uploads/{$view['action']['name']}/{$grupos['img_bv']}") ?>">
                                                                <img style="max-width: 25%" src="<?= base_url("public/uploads/{$view['action']['name']}/{$grupos['img_bv']}") ?>">
                                                            </a>
                                                        </div>


                                                  <?php } ?>

                                                    <input id="imagem" class="form-control" type="file" name="imagem">
                                                    
                                                    <?php if (isset($grupos['msg_bv'])) { ?>
                                                      <input type="hidden" name='itemid' value="<?php echo $grupos['id']; ?>">
                                                    <?php } ?>

                                                  
                                                </div>



                             
                            
                                </div>
                                
                              </div>
                            </div>
                            <div class="card-footer text-right">
                              <div class="d-flex">
                                <button type="submit" class="btn btn-primary ml-auto">Salvar</button>
                              </div>
                            </div>
                          </form>



                                
       
        

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


<style>
    .ck.ck-balloon-panel.ck-powered-by-balloon[class*=position_border] {
        display: none !important;
    }
</style>

<script>
    ClassicEditor
        .create( document.querySelector( '#mensagem' ), {
            toolbar: []
        } )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>

  </body>
</html>