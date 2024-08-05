<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function inicio()
    {
        return view('pages.inicio');
    }

    public function servicios()
    {
        $data = [
            'Sitios Web Personalizados' => [
                'description' => 'En Buyar, nos especializamos en la creación de sitios web de presentación completamente personalizados que capturan y reflejan la esencia única de tu negocio. Entendemos que cada empresa tiene su propia identidad, y es por eso que diseñamos páginas web que no solo se adaptan a tus gustos y necesidades específicas, sino que también realzan tu presencia online de una manera poderosa y efectiva. Nuestro equipo de diseñadores y desarrolladores trabaja en estrecha colaboración contigo para entender tu visión y objetivos. Desde la elección del esquema de colores, tipografía y diseño gráfico, hasta la integración de funcionalidades específicas que necesitas, nos aseguramos de que cada detalle esté alineado con la imagen que deseas proyectar. Además, nuestras soluciones están pensadas para ser totalmente responsivas, lo que garantiza que tu sitio web se vea y funcione perfectamente en cualquier dispositivo, ya sea un ordenador, una tablet o un smartphone. Esto es crucial en un mundo donde la mayoría de las visitas web provienen de dispositivos móviles. Si estás lanzando una nueva empresa, nuestro objetivo es ayudarte a hacer una entrada fuerte y memorable en el mercado digital. Y si estás renovando tu imagen, trabajamos para darle a tu negocio una nueva vida y vigor, asegurando que tu sitio web esté siempre a la vanguardia en términos de diseño y funcionalidad. En Buyar, no solo construimos sitios web, sino que creamos experiencias digitales que destacan y conectan con tu audiencia de una manera significativa. Estamos aquí para apoyarte en cada paso del camino, desde la concepción de la idea hasta el lanzamiento final y más allá, proporcionando soporte continuo y actualizaciones para que tu presencia online sea tan dinámica como tu negocio.',
                'carousel_images' => ['https://picsum.photos/400/400', 'https://picsum.photos/400/200', 'https://picsum.photos/400/300'],
            ],
            'Sitios de Gestión Personalizados' => [
                'description' => 'Nuestros sitios de gestión personalizados están diseñados para ofrecerte una interfaz intuitiva y adaptada a tus necesidades empresariales específicas. Entendemos que cada negocio tiene requisitos únicos, por lo que creamos soluciones a medida que abarcan todos los aspectos críticos de la administración. Desde la administración integral de clientes y empleados, hasta el manejo detallado del control de stock y la facturación, nuestras plataformas están equipadas con herramientas avanzadas para facilitarte cada tarea. También incluimos bandejas de correos eficientes, que te permiten gestionar la comunicación con clientes y proveedores de manera organizada y efectiva. Trabajamos estrechamente contigo para entender las necesidades particulares de tu negocio y diseñar una solución que se ajuste perfectamente a tus requerimientos. Nuestro objetivo es que puedas manejar todas las facetas de tu negocio con facilidad, optimizando tus procesos y mejorando la eficiencia operativa. Con Buyar, tu subdominio de gestión no solo será una plataforma funcional, sino una herramienta poderosa que potenciará tu éxito, ayudándote a mantener el control total de tus operaciones y a alcanzar tus metas empresariales de manera efectiva.',
                'carousel_images' => ['https://picsum.photos/400/400', 'https://picsum.photos/400/200', 'https://picsum.photos/400/300'],
            ],
            'Integración de Chatbox' => [
                'description' => 'En Buyar, ofrecemos la integración de chatbox con bots inteligentes que están diseñados para brindar a tus clientes respuestas rápidas a preguntas comunes. Esta avanzada herramienta no solo optimiza la experiencia del usuario al proporcionar asistencia instantánea, sino que también te permite liberar tiempo valioso para ti y tu equipo. Nuestros chatbots están equipados con capacidades de aprendizaje automático y procesamiento de lenguaje natural, lo que les permite entender y responder a una amplia variedad de consultas de manera eficiente. Esto asegura que tus clientes obtengan la información que necesitan de manera rápida y precisa, mejorando su satisfacción y reduciendo la necesidad de intervención humana. Al implementar esta solución, podrás ofrecer una atención al cliente personalizada y ágil, manteniendo una comunicación continua con tus usuarios sin esfuerzo adicional. Esto fortalece la relación con tus clientes, asegurando que se sientan atendidos y valorados en todo momento. Con Buyar, transformamos la forma en que interactúas con tus clientes, elevando el nivel de servicio que ofreces y contribuyendo al crecimiento y éxito continuo de tu negocio.',
                'carousel_images' => ['https://picsum.photos/400/400', 'https://picsum.photos/400/200', 'https://picsum.photos/400/300'],
            ],
        ];

        return view('pages.servicios', ['data' => $data]);
    }

    public function nosotros()
    {
        return view('pages.nosotros');
    }

    public function contacto()
    {
        return view('pages.contacto');
    }
}
