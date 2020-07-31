var ip = '192.168.1.22:8000';

function EliminarHabitacion(room_id, room_name){

    console.log(room_id)
    console.log(room_name)
    document.getElementById('habitacion').innerHTML= room_name;

    var formulario = document.getElementById('formulario');
    formulario.setAttribute('action', 'http://'+ip+'/Ver-Habitaciones/eliminar/'+room_id)
}

function EliminarPiso(floor_id, floor_name){

    console.log(floor_id)
    console.log(floor_name)
    document.getElementById('piso').innerHTML= floor_name;

    var formulario = document.getElementById('formulario');
    formulario.setAttribute('action', 'http://'+ip+'/Ver-Piso/eliminar/'+floor_id)
}

function EliminarUser(user_id, user_name){

    console.log(user_id)
    console.log(user_name)
    
    document.getElementById('usuario_name').innerHTML= user_name;

    var formulario = document.getElementById('formulario');
    formulario.setAttribute('action', 'http://'+ip+'/ver-usuarios/eliminar/'+user_id)
    
}
