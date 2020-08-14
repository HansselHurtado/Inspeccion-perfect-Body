var ip = '192.168.1.22:8000';

function ver_usuario(id_user){
    console.log(id_user)    
    $.ajax({
        url:`http://${ip}/api/ver-usuario/ver/${id_user}`,
            success:function(data){
                console.log(data);
                document.getElementById('titulo_user').innerHTML= `                  
                    Perfil de <strong>${data[0].name} ${data[0].apellido}</strong>                    
                    `;                
                document.getElementById('perfil').innerHTML= `
                    <div class="mb-4 d-flex justify-content-center align-items-center">
                        <i class='fas fa-user' style='font-size:48px;color:red'></i>
                    </div>                        
                    <table class="table  " id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th><strong>Nombre Completo:</strong></th>
                        <th>
                            <div class="form-group"> 
                                ${data[0].name} ${data[0].apellido}
                            </div>
                        </th>
                        <th><strong>Correo electronico:</strong></th>
                        <th>
                            <div class="form-group">
                                ${data[0].email}
                            </div>
                        </th>                        
                    </tr>
                    <tr>
                        <th><strong>Nombre de usuario:</strong></th>
                        <th>
                            <div  class="form-group">
                                ${data[0].username}
                            </div>
                        </th>
                        <th><strong>Role:</strong></th>
                        <th>
                            <div class="form-group"> 
                                ${data[0].role}
                            </div>
                        </th>
                    </tr>                    
                    <tr>
                        <th><strong>Cambiar Contraseña:</strong></th>
                        <th>
                            <div class="form-group"> 
                                <input style="display: none;" name="user_id" value="${id_user}" type="text">
                                <input style="border-radius: 20px; height: 50px;" type="password" class="form-control" id="password" name="password"  autocomplete="new-password" placeholder="Contraseña">
                            </div>
                        </th>
                        <th><strong>Confirmar Contraseña:</strong></th>
                        <th>
                            <div class="form-group"> 
                                <input style="border-radius: 20px; height: 50px;" type="password" class="form-control "  name="confirme_password"  autocomplete="new-password" placeholder="Confirme Contraseña">
                            </div>
                        </th>
                    </tr>                      
                </table>                
                    `;
                document.getElementById('eliminar_guardar').innerHTML=`
                <div class="modal-footer">          
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>                        
                </div>               
                    `;       
                var formulario = document.getElementById('formulario_editar_contrasena');
                formulario.setAttribute('action', 'http://'+ip+'/ver-usuarios/cambiar-contrasena');
            },            
            error:function(error){
                console.log(error)
            }
    }); 
}