




                        <?php
                        	use yii\helpers\Url;

                         ?>
                        <?php
                        		$this->registerCss("
                        			div.box-custom {
                        					width: 300px;
                        					height: 260px;
                        					border-radius: 10px 10px 10px 10px;
                        					-moz-border-radius: 10px 10px 10px 10px;
                        					-webkit-border-radius: 10px 10px 10px 10px;
                        					border: 2px solid #e3dfe3;
                        					overflow: hidden;

                        				}

                        				div.imagen{
                        					width:300px;
                        					height:200px;
                        					background-color: #fff;
                        					overflow: hidden;
                        				}


                        			div.titulo {
                        				width: 298px;
                        				height: 65px;
                        				margin: 0 0 0 0;
                        				background: #438eb9;
                        				border-radius: 0 0 10px 10px;
                        				-moz-border-radius: 0 0 10px 10px;
                        				-webkit-border-radius: 0 0 10px 10px;
                        				border: 1px dotted #e3dfe3;
                        				border-style: solid none none none;
                        				text-shadow: 0 -1px 0 rgba(0,0,0,.25);
                        				color: #FFF;
                        				text-align: center;
                        				overflow: hidden;
                        			}

                        			img.imagen{
                        	display: block;
                        	margin:30px auto;
                        	width:145px;
                        	height:145px;
                        	box-shadow: 4px 4px 4px rgba(0,0,0,0.2);
                        	-webkit-transition: all 0.5s ease-out;
                        	-moz-transition: all 0.5s ease;
                        	-ms-transition: all 0.5s ease;
                        	}




                        img.imagen:hover {
                        -webkit-transform: rotate(-7deg);
                        -moz-transform: rotate(-7deg);
                        -ms-transform: rotate(-7deg);
                        transform: rotate(-7deg);
                        }



                        		");
                         ?>
              <div class="container">




                        									<div >
                        										<h1 class="blue lighter smaller">
                        											<span class="blue bigger-125">
                        												<i class="ace-icon fa fa-leaf"></i>

                        											</span>
                        											Bienvenido al Sistema Integral de Bienes
                        										</h1>
                        									</div>

                        									<div class="space-20">

                        									</div>

                        									<div class="row">

                        									<div class="col-12">

                        									<div class="col-xs-4">
                        										<div class="box-custom">
                        											<div class="imagen">
                        													<a href="<?= Url::to(['adecuacion/default/index'])  ?>"> <img src="../web/images/mantenimiento.png" class="imagen" /> </a>
                        											</div>
                        											<div class="titulo">
                        												 	<h3>Adecuacion de Inventarios</h3>
                        											 </div>
                        										</div>

                        									</div>

                        									<div class="col-xs-4">
                        										<div class="box-custom">
                        											<div class="imagen">
                        													<a href="<?= Url::to(['procesos/default/index'])  ?>"> <img src="../web/images/cambio.png" class="imagen" /> </a>
                        											</div>
                        											<div class="titulo">
                        												 	<h3>Sistema Activo</h3>
                        											 </div>
                        										</div>

                        									</div>

                        									<div class="col-xs-4">
                        										<div class="box-custom">
                        											<div class="imagen">
                        														<img src="../web/images/proyecciones.png" class="imagen" />
                        											</div>
                        											<div class="titulo">
                        												 	<h3>Inventarios</h3>
                        											 </div>
                        										</div>

                        									</div>
                        								</div>
                                  </div>


                                  <div class="space-20"></div>



                                  <div class="row">

                                  <div class="col-12">

                                  <div class="col-xs-4">
                                    <div class="box-custom">
                                      <div class="imagen">
                                          <a href="<?= Url::to(['vehiculos/default/index'])  ?>"> <img src="../web/images/cambio.png" class="imagen" /> </a>
                                      </div>
                                      <div class="titulo">
                                          <h3>Parque Automotor</h3>
                                       </div>
                                    </div>

                                  </div>

                                  <div class="col-xs-4">
                                    <div class="box-custom">
                                      <div class="imagen">
                                          <a href="<?= Url::to(['inspecciones/default/index'])  ?>"> <img src="../web/images/reportes.png" class="imagen" /> </a>
                                      </div>
                                      <div class="titulo">
                                          <h3>Div. de Inspección</h3>
                                       </div>
                                    </div>

                                  </div>

                                  <div class="col-xs-4">
                                    <div class="box-custom">
                                      <div class="imagen">
                                          <a href="<?= Url::to(['proveduria/default/index'])  ?>"> <img src="../web/images/proyecciones.png" class="imagen" /> </a>
                                      </div>
                                      <div class="titulo">
                                          <h3>Proveduria</h3>
                                       </div>
                                    </div>

                                  </div>
                                </div>
                          </div>
                    </div>
