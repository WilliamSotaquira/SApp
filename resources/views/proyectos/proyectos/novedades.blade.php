<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-novedades-{{$proyectos->idproyecto    }}">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden='true'>x</span>

                </button>
                <h4 class="modal-title"><strong>Eventos del Proyectos</strong></h4>
            </div>
            <div class="body">


                <!-- Main content -->
                <section class="content">

                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <ul class="timeline">
                                <!-- timeline time label -->
                                <li class="time-label">
                                    <span class="direct-chat-timestamp  bg-teal">
                                        Inicio del proyecto ({{$proyectos->created_at}})
                                    </span>
                                </li>
                                <!-- /.timeline-label -->
                                @foreach($eventos as $eve)




                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-comments bg-navy"></i>

                                    <div class="timeline-item">
                                        <span class="direct-chat-timestamp pull-right"><i class="fa fa-clock-o"></i> &nbsp {{$eve->creacionevento}}</span>

                                        <h3 class="timeline-header"><a href="#">Evento </a><span id="tipoEvento">
                                                @switch ($eve->tipoEvento)
                                                @case (1)
                                                Cotización
                                                @break
                                                @case (2)
                                                Firma de contrato
                                                @break
                                                @case (3)
                                                Firma de planos
                                                @break
                                                @case (4)
                                                Rectificación
                                                @break
                                                @case (5)
                                                Despiece
                                                @break
                                                @case (6)
                                                Producción
                                                @break
                                                @case (7)
                                                Ensamble
                                                @break
                                                @case (8)
                                                Instalación
                                                @break
                                                @case (9)
                                                Cierre
                                                @break
                                                @case (10)
                                                Completado
                                                @break
                                                @case (11)
                                                En espera
                                                @break
                                                @case (12)
                                                Aplazado
                                                @break
                                                @case (13)
                                                Cancelado
                                                @break
                                                @default:
                                                Sin información / Información Errada
                                                @break;
                                                @endswitch
                                            </span></h3>

                                        <div class="timeline-body">
                                            {{$eve->descripcion}}
                                        </div>
                                        <!-- <div class="timeline-footer">
                                            <a class="btn btn-warning btn-flat btn-xs">Ver más</a>
                                        </div> -->
                                    </div>
                                </li>
                                <!-- END timeline item -->

                                @endforeach

                   


                            </ul>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->



                </section>







            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {

        var estado = $("#tipoEvento").val();

        switch (estado) {
            case '1':
                $('#estadoProyecto').val('Cotización');
                break;
            case '2':
                $('#estadoProyecto').val('Firma de contrato');
                break;
            case '3':
                $('#estadoProyecto').val('Firma de planos');
                break;
            case '4':
                $('#estadoProyecto').val('Rectificación');
                break;
            case '5':
                $('#estadoProyecto').val('Despiece');
                break;
            case '6':
                $('#estadoProyecto').val('Producción');
                break;
            case '7':
                $('#estadoProyecto').val('Ensamble');
                break;
            case '8':
                $('#estadoProyecto').val('Instalación');
                break;
            case '9':
                $('#estadoProyecto').val('Cierre');
                break;
            case '10':
                $('#estadoProyecto').val('Completado');
                break;
            case '11':
                $('#estadoProyecto').val('En espera');
                break;
            case '12':
                $('#estadoProyecto').val('Aplazado');
                break;
            case '13':
                $('#estadoProyecto').val('Cancelado');
                break;
            default:
                $('#estadoProyecto').val('Sin información / Información Errada');
                break;
        }
    });
</script>