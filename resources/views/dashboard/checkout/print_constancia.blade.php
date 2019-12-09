<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Examenes</title>
    <style>
    .clearfix:after {
    content: "";
    display: table;
    clear: both;
}

body {
    position: relative;
    width: 100%;  
    height: 100%; 
    margin: 0 auto; 
    color: #001028;
    background: #FFFFFF; 
    font-family: Arial, sans-serif; 
    /* font-size: 12px;  */
    font-family: Arial;
}

main {
    position: relative;
}


header {
    padding: 10px 0;
    margin-bottom: 30px;
}

.titulo{
    text-align: center;
    color: #000000;
    font-size: 20px;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin-top:-550px;
    letter-spacing: 1px;
}

.interes {
    text-align: left;
    margin-bottom: 10px;
    margin-left: 20px;
    margin-top:-490px;
    font-size: 14px;
    padding-top: 15px;
    letter-spacing: 1px;
    color: #000000;
}

.contenido {
    text-align: left;
    font-size: 14px;
    margin-left: 20px;
    margin-top: 20px;
    letter-spacing: 1px;
    line-height: 25px;
    color: #000000;
}

/* #notices .notice {
    color: #5D6975;
    font-size: 1.2em;
} */

footer {
    color: #5D6975;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #C1CED9;
    padding: 8px 0;
    text-align: center;
}

.imgfondo{
    /* padding-top: 8px; */
    padding-left: 50px;
    margin-top: 150px;
    margin-left:10px;
    position: relative;
    opacity: 0.1;
    background-position: center;
    vertical-align: top;
    width: 80%;
}

.encabezado{
    width: 100%;
  /* margin-top: 10px; */
    height: 100px;
}

.logo {
    margin-top: -35px;
    height: 120px;
    width: 590px;
    margin-bottom: -8px;
    margin-left: 40px;
}

.hh{
    border-bottom: 1px solid #00ad88;
}

.doctor{
    text-align: center;
    color: #000000;
    font-size: 14px;
    margin-top: 100px;
    line-height: 2px;
    letter-spacing: 1px;
}

.fecha{
    text-align: left;
    color: #000000;
    font-size: 14px;
    margin-left: 20px;
    letter-spacing: 1px;
    margin-top: 20px;
}

.att{
    text-align: left;
    margin-left: 20px;
    font-size: 14px;
    color: #000000;
    letter-spacing: 1px;
    margin-top: 40px;
}


</style>
</head>
<body>
    <header class="clearfix">
        {{-- <img src="assets/images/Encabezado_Factura.svg" class="encabezado"> --}}
        <div class="hh">
        <img src="assets\images\Encabezado_Factura.svg" class="logo">   
        </div>
    </header>
    <main>
        <img src="assets/images/Isotipo_S&F.svg" class="imgfondo">

            <div style="text-align:center;">
                <p class="titulo">CONSTANCIA DE ATENCION MEDICA</p>
            </div>

            <div class="content">
                <div class="interes"> 
                    <h2>A quien pueda interesar.</h2> 
                </div>
                <div class="contenido">
                    <h3>Quien suscribe, médico tratante, certifica que examinó a: indique el nombre del paciente CI: 
                        indique la cédula del paciente quien presenta: indique el diagnósticos.  
                        Se le indicó tratamiento y reposo por (x) días a partir de la presente fecha (día/mes/año) 
                        debiendo volver a control el día (día/mes/año). 
                    </h3>
                </div>
                <div class="fecha">
                    <h3>Constancia que se expide a petición de la persona interesada en Santo Domingo, día mes año.</h3>
                </div>
                <div class="att">
                    <h3>Atentamente.-</h3>
                </div>
                <div class="doctor">
                    <h3>Dr. Nombre del Doctor</h3><br>
                    <h3>Especialidad Médica</h3>
                </div>
                {{-- <div class="especialidad">
                    <h3>Especialidad Médica</h3>
                </div> --}}
            </div>
    {{-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
    </div> --}}
    </main>
    <footer>
        Dr. Nombre del Doctor, Especialidad Médica, CI: XXXX, M.S.A.S: YYYY, Email: xyz@xyz.com
    </footer>   
    </body>
</html>