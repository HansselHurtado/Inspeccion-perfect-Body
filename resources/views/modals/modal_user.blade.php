<!-- modal para cambiar la contrasena-->
  <div class="modal fade bd-example-modal-lg" id="cambiar_contrasena" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titulo_user"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="formulario_editar_contrasena" method="POST" action="">
          @method('PUT')
          @csrf 
          <div id="perfil"></div>          		
            <td style="text-align: center;">
              <div id="eliminar_guardar"></div>                
            </td>
          </div> 
        </form>   
      </div>
    </div>

    <!-- Logout Modal eliminar usuario-->
    <div class="modal fade" id="verUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Seguro que deseas eliminar a <strong id="titulo_user_profile"></strong></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
             
                <form id="formulario_eliminar_user" method="POST" action="">
                  @method('DELETE')
                  @csrf        		
                  <td style="text-align: center;"> 
                    <button type="submit" class="btn btn-danger btn-icon-split">
                      <span  aria-hidden="true">                        
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Eliminar</span>
                    </button>
                  </td>
                </form>           
            </div>
          </div>
      </div>
    </div>
