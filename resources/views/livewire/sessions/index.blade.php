<div class="main-content mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div>
                        <h5 class="mb-2 font-bold text-dark">SESIONES ABIERTAS</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">Usuario</th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">IP</th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">Ultima Actividad</th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sessions as $session)
                            <tr>
                                <td class="text-center text-uppercase"><p class="font-weight-bold mb-0">{{ $session->user->name }}</p></td>
                                <td class="text-center text-uppercase"><p class="font-weight-bold mb-0">{{ $session->ip_address }}</p></td>
                                <td class="text-center text-uppercase"><p class="font-weight-bold mb-0">{{ \Carbon\Carbon::createFromTimeStamp($session->last_activity)->diffForhumans() }}</p></td>
                                <td class="text-center">
                                    <!-- <a href="/delete-session/{{$session->id}}" type="button" name="button" class="btn btn-danger delete-session" data-id="{{ $session->id }}">?️</button> -->
                                    <!-- <a wire:click="cerrar('{{$session->id}}')" class="text-danger font-bold py-2 px-4"><span class="material-symbols-outlined">person_cancel</span></a> -->
                                    <a wire:click="cerrar('{{$session->id}}')" rel="tooltip" title="Generar Ficha" type="button" class="text-danger font-bold p-2">Cerrar Sesión</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
<script type="text/javascript">
$(".delete-session").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: "/delete-session",
        type: 'POST',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            location.reload();
        }
    });
});
</script>
@endsection