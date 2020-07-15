@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h5 class="card-title">Cadastro e Atualização</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <a href="{{route('cartorios.create')}}" class="btn btn-info"><i class="fas fa-plus"></i> Adicionar Cartório</a>
                <button class="btn btn-info"><i class="fas fa-upload"></i> Importar XML</button>
            </div>
            <!-- /.col -->
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
        <div class="card-footer">
          <!-- /.row -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Listagem</h5>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <div id="div_export_buttons"></div>
                <table id="dt_cartorios" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>RAZÃO</th>
                            <th>DOCUMENTO</th>
                            <th>CEP</th>
                            <th>ENDEREÇO</th>
                            <th>TELEFONE</th>
                            <th>EMAIL</th>
                            <th>TABELIÃO</th>
                            <th>ATIVO</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartorios as $cartorio)
                        <tr>
                            <td>{{$cartorio->nome}}</td>
                            <td>{{$cartorio->razao}}</td>
                            <td>{{$cartorio->documento}}</td>
                            <td>{{$cartorio->cep}}</td>
                            <td>{{$cartorio->endereco}}, {{$cartorio->bairro}} - {{$cartorio->cidade}} - {{$cartorio->uf}}</td>
                            <td>{{$cartorio->telefone}}</td>
                            <td>{{$cartorio->email}}</td>
                            <td>{{$cartorio->tabeliao}}</td>
                            <td>{{($cartorio->ativo == 1) ? 'SIM' : 'NÃO'}}</td>
                            {{-- <td><button class="btn btn-info">oiee</button></td> --}}
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="{{route('cartorios.show',$cartorio->id)}}" title="visualizar" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('cartorios.edit',$cartorio->id)}}" title="editar" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                    @if ($cartorio->ativo == 1)
                                        <button type="button" title="desativar" class="btn btn-outline-danger"><i class="fas fa-thumbs-down"></i></button>
                                    @else
                                        <button type="button" title="ativar" class="btn btn-outline-success"><i class="fas fa-thumbs-up"></i></button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
        <div class="card-footer">
          <!-- /.row -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

    
@endsection

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#dt_cartorios').DataTable({
                language: {
                    "sEmptyTable":   "Não foi encontrado nenhum registo",
                    "sLoadingRecords": "A carregar...",
                    "sProcessing":   "A processar...",
                    "sLengthMenu":   "Mostrar _MENU_ registos",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
                    "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Procurar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    },
                    "oAria": {
                        "sSortAscending":  ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    buttons: {colvis: "| Colunas visíveis", excel: "Exportar para Excel"}
                },
                lengthChange: false,
                buttons: [ 'excel', 'colvis' ],
                "columnDefs": [
            {
                "targets": [ 2 ],
                "visible": false,
            },
            {
                "targets": [ 3 ],
                "visible": false,
            },
            {
                "targets": [ 7 ],
                "visible": false
            }
        ]
            } ).buttons().container()
                .appendTo( '#div_export_buttons' );
        } );
    </script>
@endpush