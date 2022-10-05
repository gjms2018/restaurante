<?php
date_default_timezone_set($_SESSION["zona_horaria"]);
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$fecha = date("d-m-Y");
$fechaa = date("m-Y");
?>
<input type="hidden" id="moneda" value="<?php echo Session::get('moneda'); ?>"/>
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h4 class="m-b-0 m-t-0">Informes</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>informe" class="link">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>informe" class="link">Informe de finanzas</a></li>
            <li class="breadcrumb-item active">Todos los ingresos</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-b-0"></div>
            <div class="card-body p-b-0">
                <div class="row floating-labels m-t-10">
                    <div class="form-group col-lg-3 m-b-40">
                        <div class="input-group">
                            <input type="text" class="form-control font-14 text-center" name="start" id="start" value="<?php echo '01-'.$fechaa; ?>" autocomplete="off"/>
                            <span class="input-group-text bg-gris">al</span>
                            <input type="text" class="form-control font-14 text-center" name="end" id="end" value="<?php echo $fecha; ?>" autocomplete="off"/>
                        </div>
                        <label>Rango de fechas</label>
                    </div>
                    <div class="form-group col-lg-4 offset-md-3 m-b-40">
                        <select class="selectpicker form-control" name="filtro_cajero" id="filtro_cajero" data-style="form-control btn-default" data-live-search="true" autocomplete="off" data-size="5">
                            <option value="%" active>Mostrar Todo</option>
                            <optgroup>
                                <?php foreach($this->Cajero as $key => $value): ?>
                                    <option value="<?php echo $value['id_usu']; ?>"><?php echo $value['nombres'].' '.$value['ape_paterno'].' '.$value['ape_materno']; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                        <span class="bar"></span>
                        <label for="filtro_cajero">Cajero</label>
                    </div>
                    <div class="form-group col-lg-2 m-b-40">
                        <select class="selectpicker form-control" name="filtro_estado" id="filtro_estado" data-style="form-control btn-default" data-live-search="true" autocomplete="off" data-size="5">
                            <option value="%" active>Mostrar Todo</option>
                            <optgroup>
                                <option value="a">APROBADO</option>
                                <option value="i">ANULADO</option>
                            </optgroup>
                        </select>
                        <span class="bar"></span>
                        <label for="filtro_estado">Estado</label>
                    </div>
                </div>
            </div>
            <div class="text-center m-b-20">
                <div class="row">
                    <div class="col-6">
                        <h2 class="font-medium text-warning m-b-0 font-30 ingresos-operaciones"></h2>
                        <h6 class="font-bold m-b-10">N° Operaciones</h6>                            
                    </div>
                    <div class="col-6">
                        <h2 class="font-medium text-warning m-b-0 font-30 ingresos-total"></h2>
                        <h6 class="font-bold m-b-10">Total de Ingresos</h6>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive b-t m-b-10">
                    <table id="table" class="table table-hover table-condensed stylish-table" width="100%">
                        <thead class="table-head">
                            <tr>
                                <th>Fecha</th>
                                <th>Caja</th>
                                <th>Cajero</th>
                                <th>Recibido de</th>
                                <th>Motivo</th>
                                <th class="text-right">Monto</th>
                                <th class="text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="tb-st"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>