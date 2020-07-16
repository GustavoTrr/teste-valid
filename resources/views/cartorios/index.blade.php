@extends('layouts.app')

@push('styles')
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css')}}">

  <style type="text/css">
  /*Aqui ficam todas as classes que estarão presentes em toda a aplicação*/
.profile-user-img {
	height:100px !important;
	object-fit: cover;
}
.navbar-nav>.user-menu .user-image {
	object-fit: cover;
}
.user-panel>.image>img {
    width: 100%;
    max-width: 45px;
    height: 45px !important;
	object-fit: cover;
}
.widget-user-2 .widget-user-image>img {
    width: 65px;
    height: 65px !important;
	object-fit: cover;
}
.navbar-nav>.user-menu>.dropdown-menu>li.user-header>img {
	
	object-fit: cover;
}
#sibac_luz_online{
    background-image: radial-gradient(circle, #6dff9a, #50b530, green);
    border-radius: 50%;
	color:transparent;
}
/*Para corrigir o tamanho do SweetAlert*/

    #preloader {
      position:fixed;
      top:0;
      left:0;
      right:0;
      bottom:0;
      background-color:#ffffffa3; /* cor do background que vai ocupar o body */
      z-index:1031; /* z-index para jogar para frente e sobrepor tudo o menu superior tem 1030*/
      opacity: 0.1;
    }

    div#div_input_xml {
      position: relative;
      overflow: hidden;
    }
    input#input_xml {
      position: absolute;
      font-size: 50px;
      opacity: 0;
      right: 0;
      top: 0;
    }
  </style>
    

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
            <div class="col-md-12 d-flex justify-content-left">
                <a href="{{route('cartorios.create')}}" class="btn btn-info mr-3"><i class="fas fa-plus"></i> Adicionar Cartório</a>
                <form id="form_xml" action="{{route('cartorios.importarxml')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div id="div_input_xml" class="file btn btn-info">
                    <i class="fas fa-upload"></i> Importar XML
                    <input id="input_xml" type="file" name="xml">
                  </div>
                  <div id="div_input_loader" class="file btn btn-info" style="display:none;">
                    <span class="spinner-border spinner-border-sm"></span>
                    Carregando..
                  </div>
                </form>
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
                                        <button type="button" title="desativar" data-id="{{$cartorio->id}}" class="btn btn-outline-danger desativar-cartorio"><i class="fas fa-thumbs-down"></i></button>
                                    @else
                                        <button type="button" title="ativar" data-id="{{$cartorio->id}}" class="btn btn-outline-success ativar-cartorio"><i class="fas fa-thumbs-up"></i></button>
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
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
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

      function ativarCartorio(idCartorio)
      {
        var url = 'cartorios/'+idCartorio+'/ativar'
        $.post(url)
        .done(function(data){
          if (data.status) {
            toastr.success(data.msg)
          } else {
            toastr.error(data.msg)
          }
          location.reload();
        })
        .fail(function() {
          alert( "error" );
        });
      }

      function desativarCartorio(idCartorio)
      {
        var url = 'cartorios/'+idCartorio+'/desativar'
        $.post(url)
        .done(function(data){
          if (data.status) {
            toastr.success(data.msg)
          } else {
            toastr.error(data.msg)
          }
          location.reload();
        })
        .fail(function() {
          alert( "error" );
        });
      }

      $(".ativar-cartorio").click(function(){
        ativarCartorio($(this).data('id'));
      });

      $(".desativar-cartorio").click(function(){
        desativarCartorio($(this).data('id'));
      });

      $("#input_xml").change(function(){
        $("#div_input_xml").hide(300);
        $("#div_input_loader").show(300);
        $("#form_xml").submit();
      });

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