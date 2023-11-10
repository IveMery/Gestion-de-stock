@extends('layouts.master')

@section('content')
    <h1>Dashboard</h1>

<a href="{{url('/register') }}">Registrar nuevo producto</a>
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
            <a href="{{ url('/update') }}">Editar</a>
            <a href="{{ url('/delete') }}">Eliminar</a> 
        </td>
    </tr>
</table>
@stop