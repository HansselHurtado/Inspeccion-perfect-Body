var ip = '192.168.1.22:8000';

function RepararElemento(id_registro){

    $.ajax({
        url:`http://${ip}/api/inspeccion/registros/reparar/${id_registro}`,
        success:function(data){
            console.log(id_registro)
            document.getElementById('elemento').innerHTML= `${data[0].nombreElemento}`;
            document.getElementById('estado').innerHTML= `${data[0].nombreEstado}
            
            <input style="display: none;" name="id_registro" value="${data[0].id_registro}" type="text">
            <input style="display: none;" name="floor_id" value="${data[0].floor_id}" type="text">
            <input style="display: none;" name="room_id" value="${data[0].room_id}" type="text">
            <input style="display: none;" name="component_prime_id" value="${data[0].component_prime_id}" type="text">
            <input style="display: none;" name="component_id" value="${data[0].component_id}" type="text">
            <input style="display: none;" name="state_id" value="${data[0].state_id}" type="text">
         
            `;
            
            
        },
        error:function(error){
            console.log(error)
        }
    })
}