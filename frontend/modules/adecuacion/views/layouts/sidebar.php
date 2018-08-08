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
										<a href="<?= Url::to(['bienes/index'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Bienes Muebles
										</a>

										<b class="arrow"></b>
							</li>

              <li class="">
										<a href="<?= Url::to(['fact-lineas/index'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
										  Bienes de Uso
										</a>

										<b class="arrow"></b>
							</li>


              <li class="">
                    <a href="<?= Url::to(['personal-profesiones/index'])  ?>">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Vehiculos
                    </a>

                    <b class="arrow"></b>
              </li>

              <li class="">
										<a href="<?= Url::to(['unidades-admin/index'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Unidades Administrativas
										</a>

										<b class="arrow"></b>
							</li>

              <li class="">
										<a href="<?= Url::to(['responsables/index'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Responsables
										</a>

										<b class="arrow"></b>
							</li>
              <li class="">
										<a href="<?= Url::to(['sdb-municipios/index'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Estados (SUDEBIP)
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
										<a href="<?=  Url::to('/sisbim/report/bienes_no_ubicados.php')  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
										Bienes por Ubicar
                    </a>

										<b class="arrow"></b>
									</li>

                <li class="">
    										<a href="<?= Url::to('/sisbim/report/bienes_propuestos.php')  ?>">
    											<i class="menu-icon fa fa-caret-right"></i>
    											Bienes a Desincorporar
    										</a>

    										<b class="arrow"></b>
    						</li>

                <li class="">
    										<a href="<?= Url::to('/sisbim/report/bienes_etiquetar.php')  ?>">
    											<i class="menu-icon fa fa-caret-right"></i>
    											Bienes a Etiquetar
    										</a>

    										<b class="arrow"></b>
    						</li>

                <li class="">
    										<a href="<?= Url::to('/sisbim/report/bienes_colectivo_general.php')  ?>">
    											<i class="menu-icon fa fa-caret-right"></i>
    											Bienes Uso Colectivo (General)
    										</a>

    										<b class="arrow"></b>
    						</li>


          </li>

          <li class="">
              <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-street-view"></i>
                <span class="menu-text">
                   Formulación
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
                </ul>


            </li>


    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
  </ul>
</ul>
</div>
