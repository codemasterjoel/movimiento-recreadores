<style>
        @charset "UTF-8";
    .page_break {
        page-break-before: always;
    }
    @page
    {
        margin-left: 0.0cm;
        margin-right: 0.0cm;
        margin-top: 0.0cm;
        margin-bottom: 0.0cm;   
    }
</style>


<div>
    <div class="row">
        <div>
            <div class="watermark" style="position:absolute;top:0px;left:0px;text-align:center;z-index:-1000;">
                <img src="assets/img/card_from.png" style="width:204px;height:329px;"/>
            </div>
            <div style="position:absolute;top:100px;left:30px;width:500px;font-size:10px;font-weight: bold;">
                <p>
                    <span t-esc="upper(o.partner_card_id.name)">{{$lsb->nombre}}</span>
                </p>
            </div>
            <div style="position:absolute;top:110px;left:30px;width:500px;font-size:10px;font-weight: bold;">
                <p>
                    <span t-esc="upper(o.partner_card_id.apellido1)">{{$lsb->apellido}}</span>
                </p>
            </div>
            <div style="position:absolute;top:80px;left:30px;width:200px;font-size:10px;font-weight: bold;">
                <p>
                    <span t-field="o.partner_card_id.birtday">{{$lsb->letra}}{{$lsb->cedula}}</span>
                </p>
            </div>
            <div class="watermark" style="position:absolute;top:180px;left:75px;height:40%;width:30%;text-align:center;z-index:999;">
                <img class="foto" src="assets/img/marie.jpg" style="width:95px;height:98px;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover; background-size: cover;background-repeat: no-repeat;background-attachment: fixed; "></img>
            </div>
        </div>
    </div>
    <div class="page_break">
    <div class="row">
        <div class="watermark" style="position:absolute;top:0px;left:0px;text-align:center;z-index:-999;">
            <img src="assets/img/card_back.png" style="width:204px;height:329px"/>
        </div>
        <div class="watermark" style="position:absolute;top:240px;left:110px;height:40%;width:40%;z-index:1000;">
            {{-- <img class="qr-code" src="assets/img/descarga.png" style="width:80px;height:80px;"></img> --}}
            <img style="width:80px;height:80px;" src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(150)->generate('https://sistema.joelzerpa.emprende.ve/info/'.$lsb->id)) !!} ">
        </div>
        <div style="position:absolute;top:260px;left:30px;width:250px;font-size:10px;color:White;font-weight: bold;">
            <p>
                <span t-field="o.card_number">S-121121</span>
            </p>
        </div>
        <div style="position:absolute;top:280px;left:30px;width:px;font-size:10px;color:White;font-weight: bold;">
            <p>
                <span t-field="o.partner_card_id.serial_ciudadano">P-12121211</span>
            </p>
        </div>
    </div>
</div>