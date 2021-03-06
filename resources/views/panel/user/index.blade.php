@extends("panel.template")

@section("contenido")

    <div class="container">
        <div class="row nov">
            <div class="col-12">
                <h2 class="titulo text-center display-4">Lista de Merch</h2>

                <a href="{{ route("user.create") }}" class="btn btn-lg btn-primary">Cargar Nuevo</a>
            </div>
        </div>

        <div class="row mt-2 mb-5">

            <div class="col-12">
                <div class="table-responsive">
                    <table class="table mt-5 nov table-dark">
                        <thead class="thead-light text-center">
                        <tr>
                            <th>Nombre</th>
                            <th>Mail</th>
                            <th>User</th>
                            <th>Elegir</th>

                        </tr>
                        </thead>
                        <tbody class="text-center">

                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email }}</td>
                                <td> {{ $user->user }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                               href="{{ route("user.edit",$user->id) }}">Editar</a>
                                            <form action="{{ route("user.destroy",$user->id) }}" method="post">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class="dropdown-item">Borrar</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No hay usuarios cargados</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>

        </div>
    </div>


@endsection