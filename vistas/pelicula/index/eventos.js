$(document).ready(function () {
    let pelicula = new Pelicula();
    let funcion = new Funcion();
    let sala = new Sala();
    let factura = new Factura();
    let total;
    let arrButacas = [];
    let idButacaReplace;
    let idPeliculaReplace;
    pelicula.cargarPeliculasIndex();
    $(document).on("click", ".btnMostrarPelicula", function () {
        idPeliculaReplace = $(this).attr("id").replace("pel", "");
        pelicula.mostrarPelicula(idPeliculaReplace);
        funcion.cargarFuncionesPelicula(idPeliculaReplace);
        //console.log(idPeliculaReplace)
    });

    $(document).on("click", ".btnMostrarSala", function () {
        sala.mostrarSala($(this).attr("id").replace("s", ""));
        funcion.mostrarButacasOcupadas($(this).parent().parent().attr("id").replace("fPel", ""));
        //console.log($(this).parent().parent().attr("id"));

    });
    $(document).on("click", ".tdButaca", function () {
        idButacaReplace = $(this).attr("id").replace("bt", "");
        //console.log(idButacaReplace);
        if ($(".tdButaca#" + $(this).attr("id") + ">img").attr("src") == "../../../assets/img/butacaOcupada.png") {
            alert("No disponible");
        } else {

            if ($(".tdButaca#" + $(this).attr("id") + ">img").attr("src") == "../../../assets/img/butacaSelec.png") {
                $(".tdButaca#" + $(this).attr("id") + ">img").attr("src", "../../../assets/img/butacaLibrepng.png");
                let indice = arrButacas.indexOf(idButacaReplace);
                arrButacas.splice(indice, 1);
            } else {

                $(".tdButaca#" + $(this).attr("id") + ">img").attr("src", "../../../assets/img/butacaSelec.png");
                arrButacas.push(idButacaReplace);

            }
        }
        if (arrButacas.length > 0) {
            $("#btnPrevFactura").attr("disabled", false);
        } else {
            $("#btnPrevFactura").attr("disabled", true);

        }

    });

    // if (factura.crearFactura()) {
    //     factura.imprimirFactura();
    //     $(".modal").modal("hide");


    // } else {

    //     $("#modalSala").modal("hide");
    //     $("#modalPrevFactura").modal("hide");

    // }


    // $("#tBodyPrevFactura").empty()
    // $("#tBodyMostrarSala").empty()

    $("#modalSala").on("hide.bs.modal", function () {
        arrButacas = [];
        $("#btnPrevFactura").attr("disabled", true);

    });

    $("#btnPrevFactura").on("click", function () {
        total = funcion.previsualizarFactura(arrButacas);


    });

    if (sessionStorage.getItem("nivel") == 2) {
        //Paypal
        paypal.Buttons({
            createOrder: function (data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: total
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function (details) {
                    console.log("Paypal pagado");
                    // This function shows a transaction success message to your buyer.
                    alert('Transaccion hecha por ' + details.payer.name.given_name);
                    factura.crearFactura()
                    factura.imprimirFactura();
                    $(".modal").modal("hide");
                });
            }
        }).render('#paypal-button-container');
    }





});