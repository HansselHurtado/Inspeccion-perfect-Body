
var ip = '192.168.1.22:8000';
function Component(room_id, component_prime_id ){

    document.getElementById('contenido').innerHTML = "";

    console.log(room_id, component_prime_id)//retornar en la consola el id de la habitacion y componente

    $.ajax({
        url:`http://${ip}/api/habitaciones/${room_id}/inspeccionar/${component_prime_id}`,
        success:function(data){
            console.log(data)  
            document.getElementById('componente').innerHTML= ` Componente: ${data[0].name}
                <input style="display: none;" name="component_prime_id" value="${data[0].component_prime_id}" type="text">
                `;
            
            document.getElementById('estados').innerHTML= "";
            
            document.getElementById('th1').innerHTML= "#";               
            document.getElementById('elemento').innerHTML= "Elemento"; 
            document.getElementById('estados').innerHTML= "Estados"; 
            document.getElementById('observaciones').innerHTML= "Observaciones";  
            document.getElementById('guardar').innerHTML=`<button  type="submit" class="btn btn-primary">Guardar</button>`;
            
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
                            <td>
                                ${elemento.name}
                            </td>
                            <td class="d-flex flex-column " id="tiene${elemento.component_id}">                        
                    `
                    data[0].state.forEach(estado => {
                        document.getElementById(`tiene${elemento.component_id}`).innerHTML += `
                                
                                <input style="display: none;" name="component_id${i}" value="${elemento.component_id}" type="text">

                                <div class="radio">
                                    <label><input required type="radio" name="state${i}" value="${estado.state_id}" > ${estado.name}</label>
                                </div>                                              
                        `
                    });
                    
                    document.getElementById(`column${elemento.component_id}`).innerHTML += `
                            </td>
                                <td  style="text-align: center;" class=" mx-auto col-xs-12">
                                    <input type="text" class="form-control form-control-user " name="observaciones${i}" id="">                                   
                                    <div class="btn btn-sm float-left">
                                        <span class="float-left">Añadir evidencia</span>
                                        <input class="form-control-file" type="file" name="foto${i}">
                                    </div>                           
                                </td> 
                                <input style="display: none;" name="variable" value="${i}" type="text">
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
                document.getElementById('guardar').innerHTML= ""; 
               // document.getElementById('table').innerHTML= "";                              
                document.getElementById('contenido').innerHTML= "No Hay Ningun Elemento Asociado a esta Habitacion";
            }
        },            
        error:function(error){
            console.log(error)
        }
    })
}

function RoomInspection(room_id, component_prime_id ){
    console.log(room_id, component_prime_id);
    document.getElementById('contenido2').innerHTML = "";
    $.ajax({
        url:`http://${ip}/api/habitacionesInspeccionadas/${room_id}/inspeccionar/${component_prime_id}`,
        success:function(data){
            console.log(data)  
            if(data.registros.length != 0){
                document.getElementById('componente2').innerHTML= ` Componente: ${data.registros[0].NombreComponente}`;                
                document.getElementById('estados2').innerHTML= "";                
                document.getElementById('th12').innerHTML= "#";               
                document.getElementById('elemento2').innerHTML= "Elemento"; 
                document.getElementById('estados2').innerHTML= "Estados"; 
                document.getElementById('observaciones2').innerHTML= "Observaciones";  
                document.getElementById('guardar2').innerHTML=`<button  type="submit" class="btn btn-primary">Guardar</button>`;
                
                console.log(data.registros.length);
                if(data.registros[0].NombreComponente === "Mantenimiento" || data.registros[0].NombreComponente === "Aseo"){
                    document.getElementById('estados2').innerHTML= 'Estado';
                }else{
                    document.getElementById('estados2').innerHTML= 'Tiene';
                }            

                for(i=0; i<data.registros.length; i++){
                    document.getElementById('contenido2').innerHTML += `                   
                        
                        <tr id="column${data.registros[i].component_id}">
                            <td>${i+1}</td>                                        
                            <td>
                                ${data.registros[i].nombreElemento}
                            </td>
                            <td class="d-flex flex-column " id="tiene2${data.registros[i].component_id}"> 
                            <input style="display: none;" name="component_id${i+1}" value="${data.registros[i].component_id}" type="text">                       
                    `
                    data.estados.forEach(estado => {
                        if(data.registros[i].nombreEstado == estado.name){
                            document.getElementById(`tiene2${data.registros[i].component_id}`).innerHTML += `
                             
                            <div class="radio">
                                <label><input required type="radio" name="state${i+1}" value="${data.registros[i].state_id}"  checked > ${estado.name}</label>
                            </div>                                              
                            `
                        }else{
                            document.getElementById(`tiene2${data.registros[i].component_id}`).innerHTML += `
                            <div class="radio">
                                <label><input required type="radio" name="state${i+1}" value="${estado.state_id}" > ${estado.name}</label>
                            </div>                                              
                            `
                        }                       
                    });
                    if(data.registros[i].observaciones == null){
                        document.getElementById(`column${data.registros[i].component_id}`).innerHTML += `
                            </td>
                                <td  style="text-align: center;" class=" mx-auto col-xs-12">
                                    <input type="text" class="form-control form-control-user " name="observaciones${i+1}" value="" id="">
                                    ${data.registros[i].foto == null ? `
                                        <div class="btn btn-sm float-left">
                                            <span class="float-left">Añadir evidencia</span>
                                            <input class="form-control-file" type="file" name="foto${i+1}">
                                        </div>
                                </td>`: 
                                        `<div class="btn btn-sm float-left">
                                            <span class="float-left">Ya hay evidencia</span>
                                            <input class="form-control-file" type="file" name="foto${i+1}">
                                        </div>
                                </td>`
                                    }`   
                    }else{
                        document.getElementById(`column${data.registros[i].component_id}`).innerHTML += `
                            </td>
                                <td  style="text-align: center;" class=" mx-auto col-xs-12">
                                    <input type="text" class="form-control form-control-user " name="observaciones${i+1}" value="${data.registros[i].observaciones}" id="">
                                    ${data.registros[i].foto == null ? `
                                    <div class="btn btn-sm float-left">
                                        <span class="float-left">Añadir evidencia</span>
                                        <input class="form-control-file" type="file" name="foto${i+1}">
                                    </div>
                            </td>`:
                                    `<div class="btn btn-sm float-left">
                                        <span class="float-left">Ya hay evidencia</span>
                                        <input class="form-control-file" type="file" name="foto${i+1}">
                                    </div>
                            </td>`
                                    }` 
                    }                
                     
                    document.getElementById('contenido2').innerHTML += `                          
                        </tr>
                        <input style="display: none;" name="variable" value="${i+1}" type="text">
                        <input style="display: none;" name="id_registro${i+1}" value="${data.registros[i].id_registro}" type="text">
                    ` 
                }                     
               
            }else{
                document.getElementById('componente2').innerHTML= " ";
                document.getElementById('th12').innerHTML= "";               
                document.getElementById('elemento2').innerHTML= ""; 
                document.getElementById('estados2').innerHTML= ""; 
                document.getElementById('observaciones2').innerHTML= "";   
                document.getElementById('guardar2').innerHTML= ""; 
               // document.getElementById('table').innerHTML= "";                              
                document.getElementById('contenido2').innerHTML=  ` <h3> No hay elementos asociados a este componente</h3> ` ;
            }
        }, 
        error:function(error){
            console.log(error)
        }
    })
}

function preguntas(room_id){
    console.log(room_id)
    document.getElementById('contenido3').innerHTML = "";

    $.ajax({
        url:`http://${ip}/api/inspeccion/registros/preguntas`,
        success:function(data){
            console.log(data);
            if(data.preguntas.length != 0){
                for(i=0; i<data.preguntas.length; i++){
                    document.getElementById('contenido3').innerHTML += `                   
                        
                        <tr id="column${data.preguntas[i].id_pregunta}">
                            <td>${i+1}</td>                                        
                            <td>
                                ${data.preguntas[i].pregunta}
                            </td>
                            <td class="d-flex flex-column " id="tiene3${data.preguntas[i].id_pregunta}"> 
                            <input style="display: none;" name="pregunta${i+1}" value="${data.preguntas[i].id_pregunta}" type="text">                       
                            <input style="display: none;" name="data_length" value="${data.preguntas.length}" type="text">                       
                            <input style="display: none;" name="room_id" value="${room_id}" type="text">                       
                   
                    `;
                    data.respuesta.forEach(respuestas => {
                        document.getElementById(`tiene3${data.preguntas[i].id_pregunta}`).innerHTML += `                             
                            <div class="radio">
                                <label><input required type="radio" name="respuesta${i+1}" value="${respuestas.id_respuesta}"> ${respuestas.respuesta}</label>
                            </div> 
                        `;                                     
                    });              
                }
            }else{
                document.getElementById('contenido3').innerHTML=  ` <h3> No hay preguntas</h3> ` ;
            }    
            

        },
        error:function(error){
            console.log(error)
        }
    });


}