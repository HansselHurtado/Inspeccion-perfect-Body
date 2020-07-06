
function Component(room_id, component_prime_id ){

    document.getElementById('contenido').innerHTML = "";

    console.log(room_id, component_prime_id)//retornar en la consola el id de la habitacion y componente

    $.ajax({
        url:`http://192.168.1.12:8000/api/habitaciones/${room_id}/inspeccionar/${component_prime_id}`,
        success:function(data){
            console.log(data)  
            document.getElementById('componente').innerHTML= 'Componente: ' + data[0].name;
            
            document.getElementById('estados').innerHTML= "";
            
            document.getElementById('th1').innerHTML= "#";               
            document.getElementById('elemento').innerHTML= "Elemento"; 
            document.getElementById('estados').innerHTML= "Estados"; 
            document.getElementById('observaciones').innerHTML= "Observaciones";  

            if(data[0].component.length != 0){

                if(data[0].name === "Mantenimiento" || data[0].name === "Aseo"){
                    document.getElementById('estados').innerHTML= 'Estado';
                }else{
                    document.getElementById('estados').innerHTML= 'Tiene';
                }                  

                var i=1;
                data[0].component.forEach(elemento => {
                    document.getElementById('contenido').innerHTML += `
                        <tr id="column${elemento.component_id}">
                            <td>${i}</td>              
                            <td>${elemento.name}</td>
                            <td class="d-flex flex-column " id="tiene${elemento.component_id}">                        
                    `
                    data[0].state.forEach(estado => {
                        document.getElementById(`tiene${elemento.component_id}`).innerHTML += `
                                <div class="radio">
                                    <label><input type="radio" name="${i}" value="${estado.state_id}" > ${estado.name}</label>
                                </div>                                              
                        `
                    });
                    
                    document.getElementById(`column${elemento.component_id}`).innerHTML += `
                            </td>
                                <td  style="text-align: center;" class=" mx-auto col-xs-12">
                                    <input type="text" class="form-control form-control-user " name="observaciones" id="">
                                </td> 
                    `    
                    document.getElementById('contenido').innerHTML += `                          
                        </tr>
                    `      
                    i++;           
                });
            }else{

                document.getElementById('th1').innerHTML= "";               
                document.getElementById('elemento').innerHTML= ""; 
                document.getElementById('estados').innerHTML= ""; 
                document.getElementById('observaciones').innerHTML= "";                              
                document.getElementById('contenido').innerHTML= "No Hay Ningun Elemento Asociado a este Componente";
            }
        },            
        error:function(error){
            console.log(error)
        }
    })
}