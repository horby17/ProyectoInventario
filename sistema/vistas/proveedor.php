<?php
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
if ($_SESSION['compras']==1)
{
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Proveedor <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="idpersona" id="idpersona">
                            <input type="hidden" name="tipo_persona" id="tipo_persona" value="Proveedor">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre del proveedor" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo Documento:</label>
                            <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required>
                              <option value="DNI">DNI</option>
                              <option value="RUC">RUC</option>
                              <option value="CEDULA">CEDULA</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Número Documento:</label>
                            <input type="text" class="form-control" name="num_documento" id="num_documento" maxlength="20" placeholder="Documento">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Dirección:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="70" placeholder="Dirección">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Teléfono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" maxlength="20" placeholder="Teléfono">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email">
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>
<script type="text/javascript" src="scripts/proveedor.js"></script>
<?php 
}
ob_end_flush();
?>
<!--<body> para el contenido
<head> para información sobre el documento
<div> división dentro del contenido
<a> para enlaces
<strong> para poner el texto en negrita
<br> para saltos de línea
<H1>…<H6> para títulos dentro del contenido
<img> para añadir imágenes al documento
<ol> para listas ordenadas, 
<ul> para listas desordenadas, 
<li> para elementos dentro de la lista
<p> para parágrafos
<span> para estilos de una parte del texto 
<link> especifica la relación entre el documento actual y un recurso externo.
<aside> representa una sección de una página que consiste en contenido que está indirectamente relacionado con el contenido principal del documento.
 <section>  representa una sección genérica de un documento.
 <a> </a> Es una etiqueta que nos ayuda a poder crear un enlace a una página web
<label> representa una etiqueta para un elemento en una interfaz de usuario
 <input> permite poner elementos en cualquier parte dentro de un documento, no solamente como descendientes de su formulario-->