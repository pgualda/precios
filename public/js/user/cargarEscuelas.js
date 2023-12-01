export async function getOpcionesEscuela() {
    //FUncion asincrona que espera un fetch 
    const response = await fetch(
        'api/escuelas',
        {
            method: 'GET',
            headers: {
                'Content-Type' : 'application/json'
            }
        }
    );
    const data = await response.json(); // Extracting data as a JSON Object from the response
//    console.log(data);
    let opcion= [];
    let index = 0;
    let selectEscuela = document.getElementById('escuela_id');
    if (selectEscuela) {
       for (index in data){
           let option = new Option(data[index].nombre, data[index].id);
           selectEscuela.appendChild(option);
           opcion.push(option);
       }
    }   
}
