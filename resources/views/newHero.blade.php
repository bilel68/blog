@extends('templates.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($updatedHero) ? 'Update : ' . $updatedHero->name : 'Create New Hero' }}</div>
                  <div class="panel-body">
                      @if(isset($updatedHero))
                        {{ Form::open(['url' => 'hero/update']) }}
                        {{ Form::hidden('id', $updatedHero->id)}}
                      @else
                        {{ Form::open(['url' => 'hero/new']) }}
                      @endif
                    {{ Form::label('name', 'Nom du Héro') }}
                    {{ Form::text('name', isset($updatedHero) ? $updatedHero->name : '') }}
                    {{ Form::label('force', 'Force du héro') }}
                    {{ Form::text('force', isset($updatedHero) ? $updatedHero->force : '') }}
                    {{ Form::label('sex', 'Sexe du Héro') }}
                    {{ Form::select('sex', [0 => 'Féminin', 1 => 'Masculin', 2=> 'Autres'], isset($updatedHero) ? $updatedHero->sex : '') }}
                    {{ Form::label('nemesis', 'Nemesis du heros') }}
                    {{ Form::select('nemesis[]',$nemesisgroup, $nemesisId, isset($updatedHero) ? $updatedHero->nemesis_id : '3')}}
                    {{ Form::label('power', 'Pouvoirs')}}
                    {{ Form::select('powers[]',$superpowers, $superpowersId, ['multiple' => true])}}
                    {{ Form::submit('Créer') }}
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
