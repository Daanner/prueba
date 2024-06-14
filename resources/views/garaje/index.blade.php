@extends('layouts.app')

@section('template_title')
    Garaje
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Garaje') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('garajes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Precio</th>
										<th>Vehiculos Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($garajes as $garaje)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $garaje->precio }}</td>
											<td>{{ $garaje->vehiculos_id }}</td>

                                            <td>
                                                <form action="{{ route('garajes.destroy',$garaje->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('garajes.show',$garaje->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('garajes.edit',$garaje->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $garajes->links() !!}
            </div>
        </div>
    </div>
@endsection
