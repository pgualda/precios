// async function getResponse() {
//         const response = await fetch(
//             'api/escuela',
//             {
//                 method: 'GET',
//                 headers: {
//                     'Content-Type' : 'application/json'
//                 }
//             }
//         );
//         const data = await response.json(); // Extracting data as a JSON Object from the response
//         let respuesta = [];
//         let obj = {};
//         let index = 0;
//         for (index in data) {
//             obj[data[index].id] = data[index].color;
//         }
//         index++;
//         //Una nueva tupla que dice 'Todos' para tarer todo, ya que no se deselecciona
//         obj[index] = 'Todos';
//         respuesta = obj;
//         console.log(respuesta);
//         return respuesta;
// }

document.addEventListener('DOMContentLoaded', function () {


    let tabla = document.getElementById("authadmin");

    let table = new Tabulator(tabla, {
        height: "87%", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
        //data: competidores,
        ajaxURL: ('/api/users'), //assign data to table
        layout: "fitColumns", //fit columns to width of table (optional)
        responsiveLayout: "collapse",
        placeholder: "No hay usuarios para autorizar.",
        autoResize: true,
        columns: [ //Define Table Columns
            { formatter: "responsiveCollapse", title: "Acción", width: 120, minWidth: 100, hozAlign: "center", headerHozAlign: "center", resizable: false, headerSort: false },
            { title: "Nombre", field: "name", hozAlign: "center", headerHozAlign: "center", widthGrow: 1, minWidth: 100, responsive: 1, headerFilter: "input" },
            { title: "Escuela", field: "escuelaname", hozAlign: "center", headerHozAlign: "center", width: 1, minWidth: 300, responsive: 2, headerFilter: "input" },
            { title: "Rol", field: "rolname", hozAlign: "center", headerHozAlign: "center", widthGrow: 1, minWidth: 100, responsive: 2, headerFilter: "input" },
            { title: "Email", field: "email", hozAlign: "center", headerHozAlign: "center", widthGrow: 1, minWidth: 50, responsive: 2, headerFilter: "input" }
        ],
        pagination: "local",
        paginationSize: 10,
        paginationSizeSelector: [5, 10, 100, true],
        movableColumns: true,
        paginationButtonCount: 5,
        paginationCounter: "rows",
        downloadConfig: {
            columnHeaders: true, //do not include column headers in downloaded table
            columnGroups: false, //do not include column groups in column headers for downloaded table
            rowGroups: false, //do not include row groups in downloaded table
            columnCalcs: false, //do not include column calcs in downloaded table
            dataTree: true, //do not include data tree in downloaded table
        },
        locale: 'es-ar',
        langs: {
            "es-ar": {
                "columns": {
                    "name": "Nombre",
                    "escuela_id": "Escuela",
                    "rolname": "Rol",
                    "email": "Email"
                },
                "data": {
                    "loading": "Cargando datos", //data loader text
                    "error": "Error", //data error text
                },
                "groups": { //copy for the auto generated item count in group header
                    "item": "item", //the singular  for item
                    "items": "items", //the plural for items
                },
                "pagination": {
                    "page_size": "", //label for the page size select element
                    "page_title": "", //tooltip text for the numeric page button, appears in front of the page number (eg. "Show Page" will result in a tool tip of "Show Page 1" on the page 1 button)
                    "first": "<<", //text for the first page button
                    "first_title": "<<", //tooltip text for the first page button
                    "last": ">>",
                    "last_title": ">>", //tooltip text for the last page button
                    "prev": "<",
                    "prev_title": "<",
                    "next": ">",
                    "next_title": ">",
                    "all": "Todos",
                    "counter": {
                        "showing": "Viendo",
                        "of": "de",
                        "rows": "",
                        "pages": "páginas",
                    }
                }
            }
        },
    });

    //trigger download of data.csv file
    document.getElementById("download-csv").addEventListener("click", function () {
        table.download("csv", "data.csv");
    });


    //trigger download of data.xlsx file
    document.getElementById("download-xlsx").addEventListener("click", function () {
        table.download("xlsx", "data.xlsx", { sheetName: "Reporte" });
    });

    //trigger download of data.pdf file
    document.getElementById("download-pdf").addEventListener("click", function () {
        table.download("pdf", "data.pdf", {
            orientation: "landscape", //set page orientation to portrait
            title: "Reporte", //add title to report
        });
    });

    table.on("rowClick", function (e, row) {
        let datos = row.getData();
        Swal.fire({
            icon: '',
            title: `Autoriza usuario ${datos.name}`,
            html: `<a href="/users/confirmdatos/${datos.id}/${datos.rolid}" class="btn btn-success" >Confirma</a>
                   <a href="/users/confirmdatos/${datos.id}/0" class="btn btn-danger" >Rechaza</button>`,
            showConfirmButton: true,
            confirmButtonText: 'Cerrar'
        })

    });
})
