@extends('layouts.master')

@section('content')
    <div class="container p-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrar Nueva Venta</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('ventas.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="venta_fecha">Fecha de Venta:</label>
                                <input type="datetime-local" id="venta_fecha" name="venta_fecha" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="venta_total">Total de Venta:</label>
                                <input type="hidden" id="venta_total" name="venta_total" class="form-control">
                            </div>


                            <div class="form-group">
                                <label for="cliente_id">Cliente:</label>
                                <select id="cliente_id" name="cliente_id" class="form-control" required>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->cliente_id }}">{{ $cliente->cliente_nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="producto_id">Producto:</label>
                                <select id="producto_id" name="producto_id" class="form-control" required>
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->producto_id }}"
                                            data-precio="{{ $producto->producto_precio }}">{{ $producto->producto_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>



                            <button type="submit" class="btn btn-primary mt-3">Registrar Venta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#producto_id').change(function() {
                var precioProducto = $(this).find(':selected').data('precio');
                console.log(precioProducto);
                $('#venta_total').val(precioProducto);
            });
        });
    </script>
@endsection
