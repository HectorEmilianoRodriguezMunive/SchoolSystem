<!DOCTYPE html>
<html>
<head>
    <title>Escuelita</title>
    @livewireStyles


  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  
  <!-- stylesheet -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link
    rel="stylesheet"
    href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
  />
  
</head>
<body class = "w-full h-full bg-gray-100">
    {{ $slot }}  

    @livewireScripts
   
</body>
</html>