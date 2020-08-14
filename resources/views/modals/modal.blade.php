<!-- Modal elementos Inspeccionado-->
<div class="modal fade" id="ModalComponentInspeccionada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="formulario" method="POST" action="{{route('editarRegistroReporte')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h4 class="modal-title" id="componente2"></h4>                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>       
                </div>
                <div class="modal-header bg-blue">
                    <h6 class="modal-title" id="habitacion2"> 
                        <input style="display: none;" name="floor_id" value="{{$floors[0]->floor_id}}" type="text">
                        <label for=""> Habitacion:</label>
                        <input  style="display: none;" name="room_id" value="{{$rooms->room_id}}" type="text">
                        {{$rooms->name}}
                    </h6>      
                </div>
                <div id="conte2">
                    <div class="modal-body">
                        <div id="table2">
                            <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th id="th12">#</th>
                                    <th id="elemento2">Elemento</th>                                
                                    <th id="estados2">Tiene</th>                                
                                    <th id="observaciones2" style="text-align: center;" >Observaciones</th>                        
                                </tr>
                                </thead>
                                <tbody id="contenido2"> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <div id="guardar2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>            
            </div>
        </form>
    </div>
</div>

<!-- Modal elementons sin inspeccionar-->
<div class="modal fade" id="ModalComponent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="formulario" method="POST" action="{{ route('registroReporte')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h4 class="modal-title" id="componente"></h4>                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>       
                </div>
                <div class="modal-header bg-blue">
                    <h6 class="modal-title" id="habitacion"> 
                        <input style="display: none;" name="floor_id" value="{{$floors[0]->floor_id}}" type="text">

                        <input style="display: none;" name="room_id" value="{{$rooms->room_id}}" type="text">
                        {{$rooms->name}}
                    </h6>      
                </div>
                <div id="conte">
                    <div id="contenidoo" class="modal-body">
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
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <div id="guardar">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>            
            </div>
        </form>
    </div>
</div>


<!--Modal Reparar elementos-->
    
