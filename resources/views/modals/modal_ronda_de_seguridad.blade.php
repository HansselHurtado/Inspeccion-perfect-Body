
<!-- modal de encuesta de seguridad del paciente-->
<div class="modal fade bd-example-modal-lg" id="Modal_ronda_de_seguridad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="formulario" method="POST" action="{{route('registro_de_preguntas')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h4 class="modal-title">RONDA DE SEGURIDAD DEL PACIENTE</h4>                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>       
                </div>                 
                <div class="form-group">
                    <label  class="col-lg-3 control-label"><strong> Nombre del paciente</strong></label>                   
                    <div class="col-lg-30">
                        <input required style="border-radius: 10px; height: 50px; width: 300px;"  type="text" class="form-control form-control-user " name="name_paciente" placeholder=" Escriba nombre del paciente">
                    </div>
                </div>           
                <div id="conte3">
                    <div class="modal-body">
                        <div id="table3">
                            <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th id="th13">#</th>
                                    <th id="elemento3">Pregunta</th>                                
                                    <th id="estados3">Respuesta</th>                      
                                </tr>
                                </thead>
                                <tbody id="contenido3"> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-lg-3 control-label"><strong> Observaciones</strong></label>
                    <div class="col-lg-10">                        
                        <textarea id="form18" class="md-textarea form-control" cols="8" rows="2"  name="observaciones"></textarea>
                    </div>
                </div>   
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>            
            </div>
        </form>
    </div>
</div>