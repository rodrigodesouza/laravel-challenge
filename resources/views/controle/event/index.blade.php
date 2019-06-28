@extends('bredicoloradmin::layouts.controle')

@section('content')
    <!-- begin breadcrumb -->
    @component('bredicoloradmin::components.migalha')
        <li class="breadcrumb-item"><a href="{{ route('controle.event.index') }}">Events</a></li>
    @endcomponent
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Events</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                @can('controle.event.create')
                <a href="{{ route('controle.event.create') }}" class="btn btn-xs btn-circle2 btn-success"><i class="fa fa-plus"></i> Novo Registro</a>
                @endcan
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Events</h4>
        </div>
        <div class="panel-body">
            <table class="table table-striped m-b-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Start</th>
                        <th>End</th>
                        <th width="1%">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @if($events->count() > 0)
                        @foreach($events as $event)
                        <tr>
                            <td>{{ $event->title}}</td>
                            <td>{{ $event->description}}</td>
                            <td>{{ $event->start}}</td>
                            <td>{{ $event->end}}</td>
                            <td class="with-btn" nowrap="">
                                @can('controle.event.edit')
                                    <a href="{{ route('controle.event.edit', $event->id) }}" class="btn btn-sm btn-primary width-60 m-r-2">Editar</a>
                                @endcan
                                @can('controle.event.destroy')
                                    <a href="javascript:void(0)" data-url="{{ route('controle.event.destroy', $event->id) }}" class="btn btn-sm btn-white width-60 atencao">Delete</a>
                                @endcan
                        </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="5">
                            Nenhum registro foi encontrado.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- end panel -->
@stop