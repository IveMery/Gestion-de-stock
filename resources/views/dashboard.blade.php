@extends('layouts.master')

@section('content')
    <h1>Dashboard</h1>

<a href="{{url('/register_product') }}">Registrar nuevo producto</a>
<a href="{{url('/sucursales') }}">Ver sucursales</a>
<table>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Sucursal</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Precio Venta</th>
        <th>Acciones</th>
    </tr>
   
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <a href="{{ url('/update_product') }}">Editar</a>
            <a href="{{ url('/delete_product') }}">Eliminar</a> 
        </td>
    </tr>
</table>
@stop