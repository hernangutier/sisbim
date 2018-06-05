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
            <a href="<?= Url::to(['personal/create'])  ?>">
                <i class="menu-icon fa fa-newspaper-o"></i>
                <span class="menu-text"> Registrar Personal </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="<?= Url::to(['personal/index'])  ?>">
                <i class="menu-icon fa fa-newspaper-o"></i>
                <span class="menu-text"> Archivo de Personal </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="<?= Url::to(['personal/index'])  ?>">
                <i class="menu-icon fa fa-newspaper-o"></i>
                <span class="menu-text"> Archivo de Personal </span>
            </a>

            <b class="arrow"></b>
        </li>





    </ul>

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
