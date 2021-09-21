$(document).ready(function() {
    $('#tabla_inventario').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encuentra el registro",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros",
            "infoFiltered": "(filtrando de un total de _MAX_ total registros)"
        },
    });
});
