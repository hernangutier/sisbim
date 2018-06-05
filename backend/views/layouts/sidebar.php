<?php
    use yii\helpers\Url;
 ?>





<div id="sidebar" class="sidebar responsive" >
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
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
            <a href="<?= Url::to(['empresa/update','id'=>1])  ?>">
                <i class="menu-icon fa fa-user-o"></i>
                <span class="menu-text"> Datos de la Empresa </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="<?= Url::to(['unidades-admin/index'])  ?>">
                <i class="menu-icon fa fa-user-o"></i>
                <span class="menu-text"> Unidades Administrativas </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="<?= Url::to(['cargos/index'])  ?>">
                <i class="menu-icon fa fa-user-o"></i>
                <span class="menu-text"> Gestion de Cargos y Sueldos Base </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="<?= Url::to(['nominas/index'])  ?>">
                <i class="menu-icon fa fa-user-o"></i>
                <span class="menu-text"> Gestion de Nominas </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="<?= Url::to(['personal-profesiones/index'])  ?>">
                <i class="menu-icon fa fa-user-o"></i>
                <span class="menu-text"> Gestion de Profesiones </span>
            </a>

            <b class="arrow"></b>
        </li>




    </ul>

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
