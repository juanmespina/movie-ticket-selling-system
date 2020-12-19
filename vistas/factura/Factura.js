class Factura {

    crearFactura() {
        let imprimir = false;
        let inf = new FormData();
        inf.append("accion", "crearFactura");
        inf.append("controlador", "Factura")

        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                alert(response);
                if ('Factura y Boletos creados con exito') {
                    imprimir = true;
                }
            },
            ajaxError: function (response) {
                console.log(" Error" + response);
            }, async: false


        });

        return imprimir;
    }
    imprimirFactura() {
        console.log("imprimiendo");
        let inf = new FormData();
        inf.append("accion", "imprimirFactura");
        inf.append("controlador", "Factura")
        inf.append("html", $("#divImprimirFactura").html());
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                //alert(response);
                switch (response) {
                    case 'Problema con los parametros':
                        alert("No se pudo imprimir boletos, contacta a soporte");
                        break;

                    default:
                        let factura = JSON.parse(response);
                        $("#tBodyPrevFactura").prepend("<tr><td>Factura </td><td>#" + factura.idFactura + "</td></tr>")
                        var opt = {
                            margin: 1,
                            filename: 'factura' + factura.cedula + factura.fechaFuncion + factura.idFactura + '.pdf',
                            image: { type: 'jpeg', quality: 1 },
                            html2canvas: { scale: 2 },
                            jsPDF: {
                                orientation: 'p',
                                unit: 'mm',
                                format: [200, 220],
                                putOnlyUsedFonts: true,
                                floatPrecision: 16 // or "smart", default is 16
                            }
                        };
                        const element = document.getElementById("divImprimirFactura");

                        html2pdf(element, opt);
                        break;
                }


            },
            ajaxError: function (response) {
                console.log(" Error" + response);
            }, async: false


        });

    }

    cargarCompras() {
        $("#tBodyCompras").empty();
        let inf = new FormData();
        inf.append("controlador", "Factura");
        inf.append("accion", "cargarCompras");
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                //alert(response);
                switch (response) {
                    case 'No hay compras realizadas':
                        alert(response);
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        //alert(response);
                        let compras = JSON.parse(response);
                        for (let i = 0; i < compras.length; i++) {
                            // console.log("Cargando pelis");
                            $("#tBodyCompras").append("<tr><td>" + compras[i].idFactura + "</td><td>" + compras[i].fFuncion + "</td><td>" + compras[i].fCompra + "</td><td>" + compras[i].titulo
                                + "</td><td>" + compras[i].totalBoletos + "</td><td>" + compras[i].precio + "</td><td>" + compras[i].total + "</td></tr>");

                        }
            
                        

                        break;
                }

            }

        });
    }

}


