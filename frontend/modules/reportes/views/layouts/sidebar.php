<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
 ?>





<div id="sidebar" class="sidebar responsive" >
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">

                <?= Html::button('<i class="ace-icon fa 	fa-exchange "></i>',['value'=>Url::to(),'class'=>'btn btn-white btn-info btn-bold', 'id'=>'btn-folio'])  ?>

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
            <a href="<?= Url::home() ?>">
                <i class="menu-icon fa fa-home"></i>
                <span class="menu-text"> Inicio </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cogs"></i>
							<span class="menu-text">
							   Calcular Nominas
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

              <li class="">
										<a href="<?= Url::to(['au-constancias/create'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Generar Constancia Laboral
										</a>

										<b class="arrow"></b>
							</li>

              <li class="">
										<a href="<?= Url::to(['bancos/index'])  ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Bancos
										</a>

										<b class="arrow"></b>
							</li>



                  <li class="">
    										<a href="<?= Url::to(['cargos/index'])  ?>">
    											<i class="menu-icon fa fa-caret-right"></i>
    											Cargos y Tabuladores
    										</a>

    										<b class="arrow"></b>
    						   </li>

                   <li class="">
     										<a href="<?= Url::to(['escala-salariales/index'])  ?>">
     											<i class="menu-icon fa fa-caret-right"></i>
     											Escalas Salariales
     										</a>

     										<b class="arrow"></b>
     						   </li>

                   <li class="">
     										<a href="<?= Url::to(['ref-tipo-documentos/index'])  ?>">
     											<i class="menu-icon fa fa-caret-right"></i>
     											Tipos de Documentos
     										</a>

     										<b class="arrow"></b>
     						   </li>

                   <li class="">
     										<a href="<?= Url::to(['unidades-admin/index'])  ?>">
     											<i class="menu-icon fa fa-caret-right"></i>
     											Unidades Funcionales
     										</a>

     										<b class="arrow"></b>
     						   </li>

                   <li class="">
     										<a href="<?= Url::to(['nominas/index'])  ?>">
     											<i class="menu-icon fa fa-caret-right"></i>
     											Tipos de Nominas
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
