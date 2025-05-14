<div class = "w-full h-full flex justify-center items-center flex-col gap-5">
    <h1 class  = "text-2xl">Verifica tu correo electrónico</h1>

    <p>
        Se ha enviado un enlace de verificación a tu correo electrónico.
        Por favor, revisa tu bandeja de entrada.
    </p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class = "bg-blue-500 text-center px-2 py-2 rounded-sm cursor-pointer text-white">Reenviar correo</button>
    </form>

</div>





<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>