<div class="content" id="page-content-wrapper">
    <div class="container card bg-white">
      <div class="section">
        <h2 class="title text-center"></h2>
        <div class="team">
            <div class="row" style="align-content: center">
              <img src="{{asset('img/logocenso.png')}}" width="200" style="display: block; margin:auto">
            </div>
            <div class="row mx-20" style="align-content: center">
              <img src="{{asset('assets/img/marie.jpg')}}" class=" rounded-full" style="display: block; margin:auto">
            </div>
            <div class="row mt-4">
              <div class="col-3">
                  <h1 class="font-bold text-neutral-950">CÉDULA:</h1>
              </div>
              <div class="col-6">
                <h1 class="font-bold text-neutral-950">{{ $lsb->cedula }}</h1>
              </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 font-bold">
                    <h1 class="text-neutral-950">NOMBRE:</h1>
                </div>
                <div class="col-9 font-bold">
                  <h1 class="text-neutral-950">{{ $lsb->nombre}} {{ $lsb->apellido}}</h1>
                </div>
            </div>
            <div class="row mt-4 mb-4">
              <h1 class=" text-neutral-950">Este Persona se encuentra registrada en la Organización Frente Francisco de Miranda como miembro activo.</h1>
            </div>
        </div>
      </div>
    </div>
</div>