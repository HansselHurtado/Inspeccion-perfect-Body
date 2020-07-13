
var ip = '192.168.1.14:8000';
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
          
            /*document.getElementById('conte').innerHTML= `<div id="contenidoo" class="modal-body">
            <div id="table">
                <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th id="th1">#</th>
                        <th id="elemento">Elemento</th>                                
                        <th id="estados">Tiene</th>                                
                        <th id="observaciones" style="text-align: center;" >Observaciones</th>                        
                    </tr>
                    </thead>
                    <tbody id="contenido"> 
                        
                    </tbody>
                </table>
            </div>
            </div>`;*/
            
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