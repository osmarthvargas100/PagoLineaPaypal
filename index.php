<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago en Linea</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <!-- SweetAlert -->
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="estilos/estilospaypal.css">
    
</head>
<body>
  <!-- SCRIPT PAYPAL -->
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    
    <div class="container">
    
    <div class="card-body">
        
        <div class="breadcrumb">
        <div class="active">Payment Method</div>
        </div>
        
        <div class="payment">
        
        <div class="creditcard">
            <div class="thecard">
            <div class="top-card">
                <div class="circle"></div>
                <div class="card-title">
                Paypal
                </div>
            </div>
            <div class="card-info">
                <div class="card-number">
                1234 5678 9012 3456
                </div>
                <div class="exp-date">
                01 / 2018
                </div>
                <div class="card-holder">
                Pago en Linea
                </div>
            </div>
            </div>
        </div>
        
        <div class="form">
            <form  action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <label for="cardholder">Nombre</label>
            <input type="text" id="nombre" placeholder="Nombre del titular">
            <label for="cardholder">Correo</label>
            <input type="text" id="correo" placeholder="xxxx@ejemplo.com">
            <label for="cardholder">Monto a Pagar</label>
            <input type="number" id="monto-pagar" placeholder="$">
            
            
            <div id="paypal-button-container">
                <!-- <button>Proceed</button> -->

            </div>

      
            
            </form>
        </div>
        
        </div>
        
    </div>
    
    </div>
</body>
    <script src="scrip.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>