<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi primera vista</title>
</head>
<body>
    <h1>Hola mundo Laravel    </h1>
<ul>
   
   {{-- @foreach ($posts as $post)
       <li>
           {{$post}}
       </li>
   @endforeach --}}
  
   @isset($posts2)
       isset
   @endisset

   @empty($Posts2)
       empty
   @endempty
   @forelse ($posts as $post)
   <li>
        @if ($loop->first)
        Primero:            
        
        @elseif ($loop->last)
        Ultimo:            
        @else
        Medio:
        @endif
        {{$post}}
   </li>
   @empty
      <li>vacio</li> 
   @endforelse
</ul>

</body>
</html>