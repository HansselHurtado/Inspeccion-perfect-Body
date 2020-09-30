var ip = '192.168.1.22:8000';

function EliminarHabitacion(room_id, room_name){

    console.log(room_id)
    console.log(room_name)
    document.getElementById('habitacion').innerHTML= room_name;

    var formulario = document.getElementById('formulario');
    formulario.setAttribute('action', ips+'/Ver-Habitaciones/eliminar/'+room_id)
}

function EliminarPiso(floor_id, floor_name){

    console.log(floor_id)
    console.log(floor_name)
    document.getElementById('piso').innerHTML= floor_name;

    var formulario = document.getElementById('formulario');
    formulario.setAttribute('action', ips+'/Ver-Piso/eliminar/'+floor_id)
}

function EliminarUser(user_id, user_name, user_apellido){

    console.log(user_id)
    console.log(user_name)
    
    document.getElementById('titulo_user_profile').innerHTML=` ${user_name} ${user_apellido}`;
    var formulario = document.getElementById('formulario_eliminar_user');
    formulario.setAttribute('action', ips+'/ver-usuarios/eliminar/'+user_id)
    
}
