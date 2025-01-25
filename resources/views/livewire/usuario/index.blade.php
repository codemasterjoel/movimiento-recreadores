<div class="main-content mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div>
                        <h5 class="mb-2 font-bold ">REGISTRO DE USUARIOS</h5>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <input wire:model.live="search" type="text" placeholder="Filtrar por Cedula" class="w-30 px-4 py-2 border rounded-lg ">
                        <button wire:click="crear()" class="btn font-bold bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; NUEVO USUARIO</button>
                    </div>
                </div>
                @if($modal)
                    @include('livewire.usuario.crear')   
                @endif
                
                @if ($usuarios->count())
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-dark font-weight-bolder">#</th>
                                        <th class="text-center text-uppercase text-secondary text-dark font-weight-bolder">nombre</th>
                                        <th class="text-center text-uppercase text-secondary text-dark font-weight-bolder">nivel</th>
                                        <th class="text-center text-uppercase text-secondary text-dark font-weight-bolder">estado</th>
                                        <th class="text-center text-uppercase text-secondary text-dark font-weight-bolder">acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $indice =0; ?>
                                    @foreach ($usuarios as $usuario)
                                    <?php $indice += 1; ?>
                                    <tr><td class="ps-4"><p class=" font-weight-bold mb-0"><?php echo $indice; ?></p></td>
                                        <td class="text-center text-uppercase"><p class=" font-weight-bold mb-0">{{$usuario->name ? $usuario->name : ''}}</p></td>
                                        <td class="text-center text-uppercase"><p class=" font-weight-bold mb-0">{{$usuario->nivel->nombre}}</p></td>
                                        <td class="text-center text-uppercase"><p class=" font-weight-bold mb-0">{{$usuario->estado->nombre}}</p></td>
                                        <td class="text-center"><a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar usuario">
                                            <a wire:click="editar('{{$usuario->id}}')" class=" text-success px-2 py-1 mb-0" type="button"><span class="material-symbols-outlined">person_edit</span></a>
                                            {{-- <button wire:click="editar({{$usuario->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button> --}}
                                            <a wire:click="borrar('{{$usuario->id}}')" class=" text-danger font-bold py-2 px-4"><span class="material-symbols-outlined">person_cancel</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{$usuarios->links()}}
                    </div>
                @else
                    <div class="card-dody px-4 pt-2 py-8 pb-2">
                        <strong class="px-4 mt-8">No existen Resultados</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>