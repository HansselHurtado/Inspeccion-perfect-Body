//funcion para poder mandar los select dinamicamente
var ip = '192.168.1.3:8000';

$(function() {

    $('#select-floor').on('change', onSelectFloorChange);
    $('#floor-select').on('change', FloorChange);//mostrar en la inspeccion todas las habitaciones

});

function onSelectFloorChange(){

    var floor_id = $(this).val();
    
    console.log(floor_id);
    
    //AJAX
    $.get('/api/pisos/'+floor_id+'/habitaciones', function (data) {
        
        if(data.length == 0){
            var html_select = '<option value="" selected disabled>Este Piso No tiene Habitacion</option>'
            $('#select-room').html(html_select);
            return 0;    
        }
        var html_select = '<option value="" selected disabled>Escoger una Habiatcion </option>'
        for(var i=0; i<data.length; i++)
            html_select += '<option value=" '+data[i].room_id+' ">'+data[i].name+'</option>';
        console.log(html_select);
        $('#select-room').html(html_select);
    });
}

function FloorChange(){

    var floor_id = $(this).val();
    
    if(floor_id == 0){
        window.location.href='http://'+ip+'/inspeccion?page=1';
    }

    $.get('/api/floor/'+floor_id+'/habitaciones', function (data) {

        console.log(data);
        var room_name 
        var floor_name = data[0].name;
        document.getElementById('tr').innerHTML= " ";

        console.log(floor_name);
        if(data[0].room.length == 0){
            document.getElementById('tr').innerHTML= " No hay Habitaciones Disponibles ";
        }

        for(var i=0; i<data[0].room.length; i++){  
            document.getElementById('tr').innerHTML+= 
            `<tr >
                <td>${data[0].room[i].name}</td>
                <td id="floor_name ">${floor_name}</td>
                <td style="text-align: center;" > 
                    ${data[0].room[i].estado_de_inspeccion == 1 ? `
                    <a href=http://${ip}/inspeccion/inspeccionar/${data[0].room[i].room_id} class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span  class="text">Inspeccionar</span>
                    </  a>
                </td>
            </tr>`:
                    `<a href=http://${ip}/inspeccion/inspeccionar/inspeccionada/${data[0].room[i].room_id} title="Esta Habitacion ya fue inpeccionada el dia de hoy" class="btn btn-success btn-rounded waves-effect">
                        <i class="fas fa-check" aria-hidden="true"></i> Inspeccionada
                    </a>
                </td>
            </tr>`}`
        }           
    });

}





