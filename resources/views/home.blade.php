@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6 col-6">
                <div id="alert"></div>
                <div class="card shadow">
                    <div class="card-header">
                        <div class="col-xs-1" style="float: right;">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModal" onclick="limpiarModal()">
                                Nueo Usuario
                            </button>
                        </div>
                        <h5>Tabla Usuarios</h5>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-sm" id="tablausuario">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Identificacion</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Crear-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="formulario">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                <div class="form-group">
                                    <label for="identificaion">Identificaci&ograve;n</label>
                                    <input type="text" name="identificacion" id="identificacion" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                <div class="form-group">
                                    <label for="nombres">Nombres</label>
                                    <input type="text" name="nombres" id="nombres" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" name="apellidos" id="apellidos" class="form-control">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                <div class="form-group">
                                    <label for="rol">Rol</label>
                                    <select class="form-control" name="rol" id="rol">
                                        {{-- <option value="#">Seleccionar</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                <div class="form-group">
                                    <label for="clave">Clave</label>
                                    <input type="password" name="clave" id="clave" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                <div class="form-group">
                                    <label for="confirmar_clave">Confirmar Clave</label>
                                    <input type="password" name="confirmar_clave" id="confirmar_clave" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6 col-6">
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <input type="text" name="usuario" id="usuario" class="form-control">
                                </div>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Crear-->
    <div class="modal fade" id="exampleModalupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="formularios">
                        @csrf
                        {{-- @method('PUT') --}}
                        <input type="hidden" name="id" id="id">
                        <div id="personales">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="identificaion">Identificaci&ograve;n</label>
                                        <input type="text" name="identificacion_update" id="identificacion_update"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="nombres">Nombres</label>
                                        <input type="text" name="nombres_update" id="nombres_update" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" name="apellidos_update" id="apellidos_update"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="cuenta">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="rol">Rol</label>
                                        <select class="form-control" name="rol_update" id="rol_update">
                                            {{-- <option value="#">Seleccionar</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="clave">Clave</label>
                                        <input type="password" name="clave_update" id="clave_update" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="confirmar_clave">Confirmar Clave</label>
                                        <input type="password" name="confirmar_clave_update" id="confirmar_clave_update"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="usuario">Usuario</label>
                                        <input type="text" name="usuario_update" id="usuario_update" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Modal Crear-->
    <div class="modal fade" id="exampleModalupdates" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="formularioss">
                        @csrf
                        {{-- @method('PUT') --}}
                        <input type="hidden" name="ids" id="ids">
                        <div id="cuenta">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="rol">Rol</label>
                                        <select class="form-control" name="rol_updates" id="rol_updates">
                                            {{-- <option value="#">Seleccionar</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="clave">Clave</label>
                                        <input type="password" name="clave_updates" id="clave_updates" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="confirmar_clave">Confirmar Clave</label>
                                        <input type="password" name="confirmar_clave_updates" id="confirmar_clave_updates"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="usuario">Usuario</label>
                                        <input type="text" name="usuario_updates" id="usuario_updates" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src={{ asset('js/usuario.js') }}></script>
@endsection
