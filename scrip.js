paypal.Buttons({
    // Set up the transaction
    createOrder: function(data, actions) {
        var monto = document.getElementById('monto-pagar').value;
        
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: monto
                }
            }]
        });
    },
    
    // Finalize the transaction
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            // Show a success message to the buyer
            var to = document.getElementById('correo').value;
            var monto = document.getElementById('monto-pagar').value;
            var nombre = document.getElementById('nombre').value;
            var subject = 'Transicion completa';
            
            var body = '¡ÉXITO! Tu pago ha sido realizado. <b>'+nombre+'</b> <br><br>' +
                'El monto realizado fue $' + monto + ' USD.<br><br>' +
                '<div style="background-color: #f2f2f2; padding: 10px;">' +
                '<strong>¡Felicidades!</strong> Has completado tu pago exitosamente.</div><br><br>' +
                'Saludos cordiales,<br>';
            
            $.ajax({
                url: 'completed.php',
                method: 'POST',
                data: {to: to, subject: subject, body: body},
                success: function(response) {
                    // ...
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error al enviar el correo electrónico.');
                }
            });
            
            
            Swal.fire('Pago completado con éxito', '¡Gracias por tu compra!', 'success');
            location.reload();
        });
    }
}).render('#paypal-button-container');
