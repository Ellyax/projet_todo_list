@extends('template')

@section('titre')
    Modification d'une tâche

@endsection


@section('contenu')

    <br>
    <div class="col-sm-offset-2 col-sm-7">
        <div class="panel panel-info">
			<!-- génération de l'écran pour modifier une tâche -->
            <div class="panel-heading">Modification de votre tâche</div>
            <div class="panel-body">

                {!! Form::open(array('url' => '/edit/'.$id)) !!}

                <div class="form-group {!! $errors->has('tache') ? 'has-error' : '' !!}">


                    {!! Form::text('tache', null, array('class' => 'form-control','required' ,'placeholder' => 'Nom de la tâche','maxlength'=>'255')) !!}
                    {!! $errors->first('tache', '<small class="help-block">:message</small>') !!}
                </div>
				
                <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                    {!! Form::text('description', null, array('class' => 'form-control','required', 'placeholder' => 'Description de la tâche','maxlength'=>'255')) !!}
                    {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                </div>

                {!! Form::submit('Enregistrer ', array('class' => 'btn btn-info pull-right')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
