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

	<h1>Sous-tâches</h1>
	
	<div class="row">
		<!-- affichage de l ensemble des sous-tâches gràce à cette boucle -->
		@foreach($lists->where('user_id',Auth::user()->id) as $list)
			<div class="bordure">
				<div class="col-md-4 portfolio-item">
				
					<h3 class="titre_tache">					
						<a class="lien" style="text-align: center;">{{$list->name}}</a>												
					</h3>
					
					<p>Date de fin: {{$list->DateCrea}}
						<br>
						
						<!-- vérification si la sous-tâche est accomplie, si Accompli==0 alors elle ne l'est pas -->
						@if($list->Accompli==0)
						<!-- création bouton pour marquer la sous-tâche comme accomplie avec le lien qui gère l'accomplissement de la sous-tâche -->
						<a type="button" style="margin-bottom: 10px;" class="btn btn-info btn-sm" href="{{URL::to('/SousTacheFin/'.$list->id)}}">Marquée comme accomplie</a>
						@else
						Sous-tâche déjà accomplie!
					
						<br>
						@endif						
						<br>
						<!-- création bouton modifier avec le lien vers la classe qui gère la modification de tâche -->
					    <a type="button" style="margin-bottom: 10px;" class="btn btn-primary btn-sm" href="{{URL::to('/vieweditSTache/'.$list->id)}}">Modifier</a>
					    <br>
						<!-- création bouton supprimer avec le lien vers la classe qui gère la suppression de tâche -->
						<a type="button" style="margin-bottom: 10px;" class="btn btn-danger btn-sm" href="{{URL::to('/deleteStache/'.$list->id)}}">Supprimer</a>						
					</p>
				</div>
		@endforeach
			</div>
	</div>
@endsection