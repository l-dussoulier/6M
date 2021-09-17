<h3>Wesh</h3>

<h5>{{$currentCommande->id}}</h5>
<span>{{\App\Models\Statut::findOrFail($currentCommande->statut_id)->libelle}}</span>

<form action="test">
    @csrf
    <select name="statut" id="statut">
        @foreach(\App\Models\Statut::all() as $statut)
            <option value="{{ $statut->id }}">{{ $statut->libelle }}</option>

        @endforeach
    </select>
</form>
