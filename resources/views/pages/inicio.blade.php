@extends('pages-layout')

@section('content')
    <header class="bg-slate-600 h-screen relative">
        <img src="tu-imagen.jpg" alt="Imagen de fondo" class="w-full h-auto">
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="text-left text-white p-20 md:p-40 w-full">
                <h1 class="text-6xl font-bold mb-8">Buyar</h1>
                <div class="mt-20">
                    <p class="text-xl mt-2">Transformamos tu visión en una poderosa presencia online.</p>
                    <p class="text-xl mt-4">Webs de presentación únicas y sistemas de gestión a medida.</p>
                </div>
            </div>
        </div>
    </header>

    <div class="bg-white flex flex-col md:flex-row items-start justify-between w-full p-10">
        <div class="bg-slate-400 p-8 m-4">
            <h3 class="text-xl font-bold mb-12 w-full text-center">Sitios Web Personalizados</h3>
            <p class="text-lg">
                En Buyar, creamos sitios web de presentación personalizados que reflejan la esencia de tu negocio. Diseñamos
                páginas únicas a tu gusto y necesidades, asegurando que tu presencia online sea tan impactante como tu
                visión. Ya sea que estés lanzando una nueva empresa o renovando tu imagen, estamos aquí para ayudarte a
                destacar.
            </p>
        </div>

        <div class="bg-slate-400 p-8 m-4">
            <h3 class="text-xl font-bold mb-12 w-full text-center">Sitios de Gestión Personalizados</h3>
            <p class="text-lg">
                Nuestros sitios de gestión personalizados ofrecen una interfaz cómoda y adaptada a tus necesidades
                específicas. Desde la administración de clientes y empleados hasta el control de stock, facturación y
                bandejas de mails, creamos soluciones a medida que te permiten manejar tu negocio de manera eficiente y
                eficaz. Con Buyar, tu subdominio de gestión será una herramienta poderosa para el éxito.
            </p>
        </div>

        <div class="bg-slate-400 p-8 m-4">
            <h3 class="text-xl font-bold mb-12 w-full text-center">Integración de Chatbox</h3>
            <p class="text-lg">
                Ofrecemos la integración de chatbox con bots inteligentes para que tus clientes puedan resolver dudas
                sencillas al instante. Esta herramienta no solo mejora la experiencia del usuario, sino que también libera
                tiempo para ti y tu equipo. Con Buyar, podrás ofrecer atención personalizada y rápida, fortaleciendo la
                relación con tus clientes sin esfuerzo adicional.
            </p>
        </div>
    </div>
@endsection
