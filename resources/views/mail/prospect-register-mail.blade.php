<div>
    Bienvenue, {{ $user->nom }} {{ $user->prenom }}!<br>
    <p>Votre code de vérification unique est : <strong>{{ $uniqueCode }}</strong></p>
    <p>Veuillez utiliser ce code pour vérifier votre adresse email.</p>
    <p>Si vous n'avez pas crée ce compte, veuillez ignorer cet email.</p><br>
    Cordialement, <br>
    {{ config('app.name') }}<br>
</div>
