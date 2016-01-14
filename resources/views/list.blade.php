@extends('template')

@section('titre')
Liste
@endsection
<style>
    .portfolio-item {
        margin-bottom: 20px;
        margin-left:auto;
        margin-right: auto;
        max-width: 400px;

    }
    .titre_tache{
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        background-color: #E7AF23;;
        margin-bottom: 0;
		padding-bottom: 2px;
		padding-top: 5px;
		padding-left: 10px;
		
		
		text-align: center;
    }
    .lien
	{
		text-align: center;
		text-decoration: none;
        color: black;
    }
    h1
    {
        text-align: center;
    }
    p
	{
		text-align: center;
        margin-top: 15px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        background: #C7C4C4;
    }
    .bordure
    {
        margin-left: auto;
        margin-right: auto;
        max-width: 1200px;
    }

</style>

@section('contenu')
    <h1>Ma liste de tâches</h1>
    <div class="row">
	<!-- affichage de l ensemble des tâches gràce à cette boucle -->
    @foreach($tasks as $task)
        <div class="bordure">
            <div class="col-md-4 portfolio-item">
			
			<h3 class="titre_tache">
				<a class="lien" style="text-align: center;" id="{{$task->id}}">{{$task->name}}</a>				
			</h3>
			
			<p>{{$task->descriptionTache}}

            @if ($lists->where('task_id',$task->id))
                <a style="color:#C68E02;">
					<!-- récupération du nombre de sous-tâches terminées -->
					{{$lists->where('Accompli',1)->where('task_id',$task->id)->where('user_id',Auth::user()->id)->count()}}
					<!-- récupération du nombre de sous-tâches totales -->
                    {{"/ ".$lists->where('task_id',$task->id)->where('user_id',Auth::user()->id)->count()}}
                </a>  
			@endif

                <br>
			    Créé le :  {{$task->created_at}}
				<br>
				<!-- création bouton modifier avec le lien vers la classe qui gère la modification de tâche -->
				<a type="button" style="margin-bottom: 10px;" class="btn btn-primary btn-sm" href="{{URL::to('/update/'.$task->id)}}">Modifier</a>
                <br>
				<!-- création bouton supprimer avec le lien vers la classe qui gère la suppression de tâche -->
				<a type="button" style="margin-bottom: 10px;" class="btn btn-danger btn-sm" href="{{URL::to('/Delete/'.$task->id)}}">Supprimer</a>
				<br>
				<!-- création du lien vers la liste des sous-tâches -->
                <a href="{{URL::to('/SeeSousTask/'.$task->id)}}">Voir vos sous-tâches</a>
             </p>
				<!-- création bouton ajout d'une sous-tâche  -->
                <a type="button" style="border-radius:5px;width:100%;margin-top: 1px;" class="btn btn-primary btn-sm" href="{{URL::to('/NewTask/'.$task->id)}}">Ajouter une sous-tâche à {{$task->name}}</a>
                <br>
            </div>
    @endforeach
        </div>

    </div>
@endsection