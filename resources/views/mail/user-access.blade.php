<div>
    Bonjour {{$user->nom}} {{$user->prenom}}!<br>
    Toutes nos félicitations! Votre compte a été créé sur <strong>{{config('app.name')}}</strong> avec succès. <br>
    Vous pouvez vous connecter maintenant et commencer à utiliser le service.<br>
       Adresse mail est : <strong>{{$user->email}}</strong><br>
       Mot de passe est : <strong>{{$password}}</strong><br>
    Cordialement, <br>
    {{ config('app.name') }}<br>
</div>
