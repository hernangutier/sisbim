<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
 ?>





<div id="sidebar" class="sidebar responsive" >
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">



            <button class="btn btn-success" >
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
							<i class="menu-icon fa fa-cogs"></i>
							<span class="menu-text">
							   Referencias
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

              <li class="">
										<a href="<?= Url::to(['archivo/index'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Archivo de Inmuebles
										</a>

										<b class="arrow"></b>
							</li>

              <li class="">
										<a href="<?= Url::to(['archivo-doc-tipos/index'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Tipos de Documentos
										</a>

										<b class="arrow"></b>
							</li>

              <li class="">
										<a href="<?= Url::to(['archivo-ubicaciones/index'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Archivo Ubicaciones
										</a>

										<b class="arrow"></b>
							</li>

              <li class="">
                    <a href="<?= Url::to(['div-inspecciones/index'])  ?>">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Registro de Inspecciones
                    </a>

                    <b class="arrow"></b>
              </li>









</li>




        </ul>

        <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks "></i>
							<span class="menu-text">
							   Reportes
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

              <li class="">
										<a href="#">
											<i class="menu-icon fa fa-caret-right"></i>
										Listado de Inpecciones
                    </a>

										<b class="arrow"></b>
									</li>

                <li class="">
    										<a href="#">
    											<i class="menu-icon fa fa-caret-right"></i>
    											Listado de Archivo de Bienes Inmuebles
    										</a>

    										<b class="arrow"></b>
    						</li>

                <li class="">
    										<a href="#">
    											<i class="menu-icon fa fa-caret-right"></i>
    											Imprimir BM1
    										</a>

    										<b class="arrow"></b>
    						</li>





          </li>




    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
  </ul>
</ul>
</div>
