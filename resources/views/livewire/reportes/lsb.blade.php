<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="width: 100%; border: 0px;">
        <tr>
            <td style="text-align: left; width: 33%"><img src="img/logo.svg" width="100"></td>
            <td style="text-align: right; width: 64%"><?php echo date('d/m/Y'); ?></td>
        </tr>
    </table>
    <table style="width: 100%; border: 0px;" align="center">
        <tr>
            <td align="center"><h1>Constancia de Registro</h1></td>
        </tr>
    </table>
    <table style="text-align: center; width: 100%">
        <tbody>
			<tr>
				<td style="text-align:justify">
					<br><br>
				</td>
			</tr>
			<tr>
				<td style="text-align:justify;">
					Quien Suscribe, Lic. Josue Lorca, Ministro del Poder Popular para el Ecosocialismo, en uso de las atribuciones que me confiere la Ley, hago constar que el ciudadano
					<b>{{isset($lsb->nombre) ? $lsb->nombre : ''}} {{$lsb->apellido}},</b> portador de la cédula de identidad número: <b>{{$lsb->letra}}{{$lsb->cedula}},</b> en fecha {{$lsb->created_at}}
				    se encuentra inscrito (a) en el sistema de registro de personal del Ministerio de Ecosocialismo, en el cargo de <b>{{$lsb->responsabilidad->nombre}}</b> adscrito a la Dirección de: 
					<br><br>
					Constancia que se expide por parte interesada, en la ciudad de Caracas, a los <?php echo date("d"); ?> días del mes de  de <?php echo date("Y"); ?>.
				</td>
			</tr>
			<tr>
				<td style="text-align: center; font-size:12pt"><br><br><br><br><br>
					______________________________________<br>
							Josué Lorca<br>
							<i>MINISTRO DE ECOSOCIALISMO</i>
					
				</td>
			</tr>
            <tr>
                <td style="text-align:right">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(150)->generate('https://intranet.sistemadeformacionfranciscodemiranda.org.ve/info/'.$lsb->id)) !!} "></td>
            </tr>
		</tbody>
	</table>
</body>
</html>