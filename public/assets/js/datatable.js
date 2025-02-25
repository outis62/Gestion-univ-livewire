$(function (e) {
    //Data-table1
    $("#data-table1").DataTable({
        language: {
            sEmptyTable: "Aucune donnée disponible dans le tableau",
            sInfo: "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            sInfoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
            sInfoFiltered: "(filtré à partir de _MAX_ éléments au total)",
            sInfoThousands: ",",
            sLengthMenu: "Afficher _MENU_ éléments",
            sLoadingRecords: "Chargement...",
            sProcessing: "Traitement...",
            sSearch: "Rechercher :",
            sZeroRecords: "Aucun élément correspondant trouvé",
            oPaginate: {
                sFirst: "Premier",
                sLast: "Dernier",
                sNext: "Suivant",
                sPrevious: "Précédent",
            },
            oAria: {
                sSortAscending:
                    ": activer pour trier la colonne par ordre croissant",
                sSortDescending:
                    ": activer pour trier la colonne par ordre décroissant",
            },
            select: {
                rows: {
                    _: "%d lignes sélectionnées",
                    0: "Aucune ligne sélectionnée",
                    1: "1 ligne sélectionnée",
                },
            },
        },
    });

    //Data-table2
    // var table = $('#data-table2').DataTable();
    // $('button').click( function() {
    // 	var data = table.$('input, select').serialize();
    // 	alert(
    // 		"The following data would have been submitted to the server: \n\n"+
    // 		data.substr( 0, 120 )+'...'
    // 	);
    // 	return false;
    // });

    //Data-table3
    $("#data-table3").DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return "Details for " + data[0] + " " + data[1];
                    },
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: "table",
                }),
            },
        },
    });

    //Export Data-table
    var table = $("#exportexample").DataTable({
        lengthChange: false,
        buttons: ["copy", "excel", "pdf", "colvis"],
    });
    table
        .buttons()
        .container()
        .appendTo("#exportexample_wrapper .col-md-6:eq(0)");
});
