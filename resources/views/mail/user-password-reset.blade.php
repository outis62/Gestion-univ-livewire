<div>
    Bonjour {{$user->nom}} {{$user->prenom}}!<br>
    Le mot de passe de votre compte de la plateform <strong>{{config('app.name')}}</strong> a été réinitialise avec succès. <br>
    Vous pouvez vous connecter maintenant à partir de :<br>
    Adresse mail est : <strong>{{$user->email}}</strong><br>
    Mot de passe est : <strong>{{$password}}</strong><br>
    Cordialement, <br>
    {{ config('app.name') }}<br>
</div>
