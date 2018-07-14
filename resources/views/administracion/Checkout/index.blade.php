<html>
<head>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
    </script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('template/assets/images/favicon.png')}}">
    <title>MedicalDocs | Sistema de Gestion Documental para entornos clinicos</title>
    <!-- This page CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




</head>
<body>
<style type="text/css">
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
    .StripeElement {
        background-color: white;
        height: 40px;
        padding: 10px 12px;
        border-radius: 4px;
        border: 1px solid transparent;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }

</style>
<div class="container">
    <h2><strong>S.I.D.O.E.C.</strong></h2>
    <div class="jumbotron">
        <h4><strong>Nota Importante:</strong></h4>
        <p>Para poder empezar a usar el sistema debe tener registrarse tanto nivel corporativo como nivel de usuario
            , el costo mensual es de <strong>Bs. 350, incluyendo todos los modulos</strong>, una vez confirmado el pago sera
            redirigido al sitio de inicio de Inicio de Sesion, Se recargara mensualmente el monto correspondiente a su cuenta <sesion></sesion></p>
    </div>
    <h3>Proceso de Registro:</h3>
    <br>
    <script src="https://js.stripe.com/v3/"></script>
    <form action="{{route('checkout.store')}}" method="post" id="payment-form">
        @csrf
        <input type="hidden" name="stripe_token" id="stripe_token">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo Corporativo</label>
                    <input type="email" class="form-control" name="company_email" id="company_email" placeholder="Email Compañia" required >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de la Clinica</label>
                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Nombre de la Clinica" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del representante</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Apellido del representante</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellido" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email del Representante</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cedula de Identidad</label>
                    <input type="number" class="form-control" name="ci" id="ci" placeholder="Cedula de Identidad" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="birthday" id="birthday" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Direccion</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Domicilio">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefono</label>
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Telefono">
                </div>
                <div class="form-row">
                    <label for="card-element">
                        Tarjeta de Debito o Credito
                    </label>
                    <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>
                <br>
                <button class="btn btn-primary">Enviar Pago</button>
            </div>

        </div>
    </form>

    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe('pk_test_gN3ZiPSKMhhVYejCA5KemHIF');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                    $("#payment-form").submit();
                }
            });
        });
        function stripeTokenHandler(token){
            var stripeToken = token.id;
            $("#stripe_token").val(stripeToken);
        }
    </script>
</div>
</body>
</html>