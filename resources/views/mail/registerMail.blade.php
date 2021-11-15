You got a registering mail from FormaTy.<br><br>

Name: {{$name}}<br>
Email: {{$email}}<br>

<a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{route('register.create',['token' => $token, 'name' => $name, 'email' =>$email])}}">Compléter l'inscription</a>
