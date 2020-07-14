@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@section('content')

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
                <table id="dt_cartorios" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>RAZÃO</th>
                            <th>ENDEREÇO</th>
                            <th>TELEFONE</th>
                            <th>EMAIL</th>
                            <th>ATIVO</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartorios as $cartorio)
                        <tr>
                            <td>{{$cartorio->nome}}</td>
                            <td>{{$cartorio->razao}}</td>
                            <td>{{$cartorio->endereco}}, {{$cartorio->bairro}} - {{$cartorio->cidade}} - {{$cartorio->uf}}</td>
                            <td>{{$cartorio->telefone}}</td>
                            <td>{{$cartorio->email}}</td>
                            <td>{{($cartorio->ativo == 1) ? 'SIM' : 'NÃO'}}</td>
                            {{-- <td><button class="btn btn-info">oiee</button></td> --}}
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="{{route('cartorios.show',$cartorio->id)}}" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('cartorios.edit',$cartorio->id)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                    @if ($cartorio->ativo == 1)
                                        <button type="button" class="btn btn-outline-danger"><i class="fas fa-thumbs-down"></i></button>
                                    @else
                                        <button type="button" class="btn btn-outline-success"><i class="fas fa-thumbs-up"></i></button>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dt_cartorios').DataTable();
        } );
    </script>
@endpush