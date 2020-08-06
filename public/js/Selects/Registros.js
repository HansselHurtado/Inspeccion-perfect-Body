var ip = '192.168.1.22:8000';

function RepararElemento(id_registro){
    document.getElementById('estado_actual').innerHTML=`
        <label for=""> Estado Actual: <strong id="estadoReparar"></strong></label>
        `;
    document.getElementById('evidencia_repara').innerHTML=`
        <label for=""> Evidencia: <strong id="no_hay"></strong></label>
        <div id="evidencias">                                     
        </div>
        `;
    document.getElementById('observaciones_reparacion').innerHTML=`
        <label for=""> Observaciones de Reparacion:</label>
        <input name="Observaciones" class="form-control form-control-user w-75" type="text" value="">  
        `;
    document.getElementById('evidencia_reparada').innerHTML=`
        <span class="float-left">Añadir evidencia de reparacion</span>
        <input class="form-control-file" type="file" name="evidencia_reparada">    
        `;
    $.ajax({
        url:`http://${ip}/api/inspeccion/registros/reparar/${id_registro}`,
        success:function(data){
            console.log(id_registro)
            console.log(data)
            document.getElementById('titulo').innerHTML= `
                <h5 class="modal-title">Reparar Elemento <strong>${data[0].nombreElemento}</strong></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>`;
            document.getElementById('estadoReparar').innerHTML= `${data[0].nombreEstado}
            
            <input style="display: none;" name="id_registro" value="${data[0].id_registro}" type="text">
            <input style="display: none;" name="floor_id" value="${data[0].floor_id}" type="text">
            <input style="display: none;" name="room_id" value="${data[0].room_id}" type="text">
            <input style="display: none;" name="component_prime_id" value="${data[0].component_prime_id}" type="text">
            <input style="display: none;" name="component_id" value="${data[0].component_id}" type="text">
            <input style="display: none;" name="state_id" value="${data[0].state_id}" type="text">        
            `;
            if(data[0].foto != null){
                document.getElementById('evidencias').innerHTML= `
                    <img style="height: 250px; width: 400px; background-color:#EFEFEF; margin: 15px; " class="card-img-top img-thumbnail d-block" src="/images/evidencias/${data[0].foto}" alt="">
                `;
            }else{
                document.getElementById('no_hay').innerHTML= `
                    <span>No hay Evidencia</span> 
                `;
            }            
        },
        error:function(error){
            console.log(error)
        }
    });
    document.getElementById('button_editar').innerHTML= "Reparar";

}


function ElementoReparado(id_registro, fecha){
    
    document.getElementById('estado_actual').innerHTML=" ";
    document.getElementById('evidencia_repara').innerHTML= " ";
    document.getElementById('evidencia_reparada').innerHTML=`
        <label class"float-left" for=""> Evidencia de reparacion: <strong id="reparacion_evidencia"></strong></label>
        <div id="evidencia_reparacion">                                     
        </div>
        `;  
        console.log(id_registro)
        console.log(fecha)

    $.ajax({
        url:`http://${ip}/api/inspeccion/registros/reparar/${id_registro}/bitacora`,
        success:function(data){
            console.log(data)
            document.getElementById('titulo').innerHTML= `
                <h5 class="modal-title"><strong>Elemento ${data[0].nombreElemento} Reparado</strong></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <input style="display: none;" name="id_registro" value="${data[0].id_registro}" type="text">
                <input style="display: none;" name="fecha" value="${fecha}" type="text">
                <input style="display: none;" name="floor_id" value="${data[0].floor_id}" type="text">
                <input style="display: none;" name="room_id" value="${data[0].room_id}" type="text">
                <input style="display: none;" name="component_prime_id" value="${data[0].component_prime_id}" type="text">
                <input style="display: none;" name="component_id" value="${data[0].component_id}" type="text">
                <input style="display: none;" name="state_id" value="${data[0].state_id}" type="text">
                `;
            if(data[0].observaciones != null){
                document.getElementById('observaciones_reparacion').innerHTML=`
                <label for="">  Observaciones de Reparacion:</label>
                <input name="Observaciones" class="form-control form-control-user w-75" type="text" value="${data[0].observaciones} "> 
                `;
            }else{
                document.getElementById('observaciones_reparacion').innerHTML=`
                <label for="">  Observaciones de Reparacion:</label>
                <input name="Observaciones" class="form-control form-control-user w-75" type="text" placeholder="No hay observaciones"> 
                `;
            }
            
            if(data[0].foto != null){
                document.getElementById('evidencia_reparacion').innerHTML=`
                    <img style="height: 250px; width: 400px; background-color:#EFEFEF; margin: 15px; " class="card-img-top img-thumbnail d-block" src="/images/evidencias_de_reparacion/${data[0].foto}" alt="">
                    <span class="float-left">Editar</span>
                    <input class="form-control-file" type="file" name="evidencia_reparada">
                `;
            }else{
                document.getElementById('reparacion_evidencia').innerHTML=`
                    No hay Evidencia de reparacion                    
                    <input class="form-control-file" type="file" name="evidencia_reparada">
                    <span class="float-left">Añadir</span>             
                `;
            }                
        },
        error:function(error){
            console.log(error)
        }
    });
    document.getElementById('button_editar').innerHTML= "Editar";
}

function Bitacora(id_registro, fecha){
    document.getElementById('textVitacora').innerHTML=`
        <textarea class="form-control"  name="bitacora" id="" cols="50" rows="10" required></textarea>
        `;
        console.log(id_registro)
    $.ajax({
        url:`http://${ip}/api/inspeccion/registros/reparar/${id_registro}`,
        success:function(data){
            console.log(id_registro)
            console.log(data)
            document.getElementById('elemento_vitacora').innerHTML= `${data[0].nombreElemento}
            <input style="display: none;" name="id_registro" value="${data[0].id_registro}" type="text"> 
            <input style="display: none;" name="fecha" value="${fecha}" type="text">
            <input style="display: none;" name="floor_id" value="${data[0].floor_id}" type="text">   
            <input style="display: none;" name="state_id" value="${data[0].state_id}" type="text">   
            `;            
        },
        error:function(error){
            console.log(error)
        }
    })
    document.getElementById('button').innerHTML= "Generar";

}



function BitacoraGenerada_elemento_reparado(id_elemento_reparado){
    console.log(id_elemento_reparado);
    document.getElementById('titulo_vitacora_Or_foto').innerHTML= "";
    document.getElementById('textVitacora_reparado').innerHTML= " ";
    document.getElementById('textVitacora_reparado').innerHTM =  `
                    <textarea  class="form-control" name="bitacora" id="" cols="50" rows="5" readonly>
                
                    </textarea>                 
                `;  
    $.ajax({
        url:`http://${ip}/api/inspeccion/registros/reparar/${id_elemento_reparado}/mostrar/bitacora`,
        success:function(data){
            console.log(data);
            if(data.length != 0){
                document.getElementById('titulo_vitacora_Or_foto').innerHTML= `
                    Bitacora Elemento <strong >${data[0].nombreElemento}</strong>
                    `;
            
                data.forEach(elemento => {
                    if(elemento.bitacora !=null){
                        document.getElementById('textVitacora_reparado').innerHTML += `
                            <textarea  class="form-control" name="bitacora" id="" cols="50" rows="5" readonly>
                            ${elemento.fecha} 
                            ,${elemento.nombreUsers} dice:
                            ${elemento.bitacora}
                            </textarea> 
                        `;
                    }
                });    
            }else{
                document.getElementById('textVitacora_reparado').innerHTML = `
                            <h4 class="modal-title"> ¡No se ha escrito ninguna vitacora!</h4>
                            `;
            }                        
        },
        error:function(error){
            console.log(error)
        }
    });    
}

function foto_elemento_reparado(id_registro){
    $.ajax({
        url:`http://${ip}/api/inspeccion/registros/reparar/${id_registro}/bitacora`,
        success:function(data){
            console.log(id_registro)
            console.log(data);
            document.getElementById('titulo_vitacora_Or_foto').innerHTML= `
                Foto de reparacion Elemento <strong >${data[0].nombreElemento}</strong>
                `;
            if(data[0].foto !=null){
                document.getElementById('textVitacora_reparado').innerHTML= `
                    <img style="height: 250px; width: 400px; background-color:#EFEFEF; margin: 15px; " class="card-img-top img-thumbnail d-block" src="/images/evidencias_de_reparacion/${data[0].foto}" alt=""> 
                    `;  
            }else{
                document.getElementById('textVitacora_reparado').innerHTML= `
                    <h4 class="modal-title"> ¡No hay foto de reparacion!</h4>
                `;
            } 
        },
        error:function(error){
            console.log(error)
        }

    });    
}