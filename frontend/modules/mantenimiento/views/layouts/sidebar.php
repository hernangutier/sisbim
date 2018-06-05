<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\bootstrap\Modal;
 ?>



 <?php
     //----------- Rgistramos los scripts de apertura de formularios
     $this->registerJs("
       //------------- Familiares --------------------
       jQuery(document).ready(function($){
        $(document).ready(function () {
          $('.cambio').click(function (){

              $('#modal .header').text('Seleccione la Nomina a Trabajar');
              $('#modal').modal('show')
              .find('.modal-body')
              .load($(this).data('url'));

          })
      })
    });

    ");
  ?>
<?php
 //----------- Formulario Modal Unico Universal ----
       Modal::begin([
           'id' => 'modal',
           'header' => '<h3 class="header blue lighter smaller">
                      <i class="ace-icon fa fa-users smaller-90"></i>
                       Cambio de Nomina Activa
                    </h3>',


           'footer' => '<a href="#" class="btn btn-white btn-default btn-round" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Cancelar
                      </a>',


       ]);

       echo "<div class='well'></div>";

       Modal::end();
 ?>



<div id="sidebar" class="sidebar responsive" >
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">



            <button class="btn btn-success cambio" data-rel="tooltip" data-url="<?= Url::toRoute(['default/changed']) ?>" title="Cambiar de Nomina" >
                <i class="ace-icon fa 	fa-exchange "></i>

            </button>
            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>
            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>
            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>
        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
        </div>
    </div>

    <ul class="nav nav-list">

        <li class="active">
            <a href="<?= Url::toRoute(['default/index']) ?>">
                <i class="menu-icon fa fa-home"></i>
                <span class="menu-text"> Inicio </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
							   Referencias
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

              <li class="">
										<a href="<?= Url::to(['fact-clientes/index'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Clientes
										</a>

										<b class="arrow"></b>
							</li>

              <li class="">
										<a href="<?= Url::to(['fact-productos/index'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Productos
										</a>

										<b class="arrow"></b>
							</li>



                  <li class="">
    										<a href="<?= Url::to(['fact-zonas/index'])  ?>">
    											<i class="menu-icon fa fa-caret-right"></i>
    											Zonas
    										</a>

    										<b class="arrow"></b>
    						   </li>

                   <li class="">
     										<a href="<?= Url::to(['fact-vendedores/index'])  ?>">
     											<i class="menu-icon fa fa-caret-right"></i>
     											Vendedores
     										</a>

     										<b class="arrow"></b>
     						   </li>

                   <li class="">
     										<a href="<?= Url::to(['fact-lineas/index'])  ?>">
     											<i class="menu-icon fa fa-caret-right"></i>
     											Lineas
     										</a>

     										<b class="arrow"></b>
     						   </li>

                   <li class="">
     										<a href="<?= Url::to(['fact-marcas/index'])  ?>">
     											<i class="menu-icon fa fa-caret-right"></i>
     											Marcas
     										</a>

     										<b class="arrow"></b>
     						   </li>

                   <li class="">
     										<a href="<?= Url::to(['fact-medidas/index'])  ?>">
     											<i class="menu-icon fa fa-caret-right"></i>
     											Medidas
     										</a>

     										<b class="arrow"></b>
     						   </li>


        </li>




        </ul>

        <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-street-view"></i>
							<span class="menu-text">
							   Integrantes
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

              <li class="">
										<a href="<?= Url::to(['personal/create'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Crear Integrante
										</a>

										<b class="arrow"></b>
									</li>

                <li class="">
    										<a href="<?= Url::to(['personal/index'])  ?>">
    											<i class="menu-icon fa fa-caret-right"></i>
    											Integrantes
    										</a>

    										<b class="arrow"></b>
    									</li>


          </li>

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
