<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function inicio()
    {
        $data = [
            'header' => [
                'title' => 'Buyar',
                'description' => [
                    'line1' => 'Transformamos tu visión en una poderosa presencia online.',
                    'line2' => 'Webs de presentación únicas y sistemas de gestión a medida.',
                ],
                'background_image' => 'https://picsum.photos/900/900',
            ],
            'services' => [
                [
                    'title' => 'Sitios Web Personalizados',
                    'description' => 'En Buyar, diseñamos sitios web personalizados que reflejan tu negocio y necesidades, asegurando una presencia online impactante y ayudándote a destacar.',
                    'image' => 'https://picsum.photos/400/200',
                ],
                [
                    'title' => 'Sitios de Gestión Personalizados',
                    'description' => 'Nuestros sitios de gestión personalizados facilitan la administración de tu negocio, desde clientes hasta facturación. Con Buyar, tendrás una herramienta poderosa para el éxito.',
                    'image' => 'https://picsum.photos/400/300',
                ],
                [
                    'title' => 'Integración de Chatbot',
                    'description' => 'Ofrecemos chatbots con bots inteligentes para resolver dudas al instante, mejorando la experiencia del usuario y liberando tiempo para ti.',
                    'image' => 'https://picsum.photos/400/400',
                ],
            ],
            'why_buyar' => [
                'title' => '¿Por qué Buyar?',
                'description' => 'En un mundo digital en constante evolución, Buyar se destaca por ofrecer soluciones web innovadoras y personalizadas que impulsan el crecimiento de tu negocio.',
                'background_image' => 'https://picsum.photos/800/500',
            ],
        ];

        return view('pages.inicio', ['data' => $data]);
    }

    public function servicios()
    {
        $data = [
            'Sitios Web Personalizados' => [
                'description' => 'En Buyar, nos especializamos en crear sitios web personalizados que capturan la esencia de tu negocio. Cada empresa es única, y nuestras páginas web lo reflejan al adaptarse a tus necesidades y resaltar tu presencia online de forma efectiva. Trabajamos contigo desde el diseño gráfico hasta la integración de funciones específicas, asegurando que cada detalle esté alineado con tu visión.

                Nuestras soluciones son totalmente responsivas, garantizando un rendimiento óptimo en cualquier dispositivo. Ya sea que estés lanzando un nuevo negocio o renovando tu imagen, en Buyar creamos experiencias digitales que conectan y destacan. Te acompañamos en cada paso, desde la idea inicial hasta el lanzamiento y más allá, con soporte continuo para mantener tu sitio siempre a la vanguardia.',
                'carousel_images' => ['https://picsum.photos/400/400', 'https://picsum.photos/300/300', 'https://picsum.photos/400/300'],
            ],
            'Sitios de Gestión Personalizados' => [
                'description' => 'En Buyar, transformamos la gestión empresarial con soluciones personalizadas diseñadas para simplificar tu día a día. Sabemos que cada negocio tiene sus propios desafíos, por lo que creamos plataformas que se ajustan a tus necesidades específicas. Ya sea que necesites administrar clientes, empleados, stock o facturación, nuestras herramientas avanzadas te permiten hacerlo de manera eficiente y organizada.

                También incluimos bandejas de correos que optimizan la comunicación con clientes y proveedores. Nuestro objetivo es proporcionar una solución que te dé control total sobre tus operaciones, mejorando la productividad y facilitando el crecimiento de tu negocio. Con Buyar, no solo obtienes una plataforma de gestión; adquieres una herramienta estratégica para alcanzar tus objetivos empresariales con mayor efectividad.',
                'carousel_images' => ['https://picsum.photos/400/400', 'https://picsum.photos/300/300', 'https://picsum.photos/400/300'],
            ],
            'Integración de Chatbot' => [
                'description' => 'En Buyar, integramos chatbots inteligentes que brindan respuestas rápidas a las preguntas comunes de tus clientes, mejorando la experiencia del usuario y liberando tiempo para tu equipo. Equipados con aprendizaje automático y procesamiento de lenguaje natural, nuestros bots responden eficientemente, garantizando información precisa y rápida.

                Esta solución permite ofrecer atención personalizada y continua, fortaleciendo la relación con tus clientes sin esfuerzo adicional. Con Buyar, elevamos tu servicio al cliente y contribuimos al crecimiento de tu negocio.',
                'carousel_images' => ['https://picsum.photos/400/400', 'https://picsum.photos/300/300', 'https://picsum.photos/400/300'],
            ],
        ];

        return view('pages.servicios', ['data' => $data]);
    }

    public function nosotros()
    {
        $data = [
            '¿Quienes Somos?' => [
                'description' => 'Somos un equipo de programadores con experiencia en el desarrollo de soluciones digitales personalizadas. Nuestro objetivo es ayudar a las empresas a mejorar su presencia online y a optimizar sus procesos internos a través de herramientas tecnológicas efectivas.

                Creemos en la importancia de ofrecer soluciones que no solo respondan a las necesidades actuales de nuestros clientes, sino que también estén preparadas para crecer con ellos. Nuestra visión es ser un socio estratégico a largo plazo, proporcionando un servicio que combine innovación, calidad y compromiso.

                Nos dedicamos a entender profundamente cada proyecto, asegurándonos de que nuestras soluciones no solo cumplan con las expectativas, sino que las superen, contribuyendo al éxito y al crecimiento continuo de nuestros clientes.',
            ],
            '¿Que ofrecemos?' => [
                'description' => 'Ofrecemos soluciones web personalizadas que van más allá del desarrollo tradicional. Creamos sitios web a medida que capturan la esencia de tu negocio y desarrollamos plataformas de gestión eficaces para facilitar la administración interna.

                Nos enfocamos en entender tus necesidades específicas y proporcionarte herramientas que optimicen tu operación diaria. Además, ofrecemos soporte continuo y adaptaciones para asegurar que tu solución web evolucione con tu empresa.

                Con Buyar, obtienes un servicio integral que combina diseño web, gestión eficiente y atención continua.',
            ],
            /* 'Clientes' => [
                'description' => '',
            ], */
        ];

        return view('pages.nosotros', ['data' => $data]);
    }

    public function contacto()
    {
        $data = [
            'phone_numbers' => [
                '(+598) 92 812 477',
                '(+598) 99 876 005'
            ],
            'emails' => [
                'ivan.24.burgio@gmail.com',
                'yangivan19@gmail.com'
            ],
            'social_links' => [
                'twitter' => '#',
                'linkedin' => '#',
                'facebook' => '#',
                'instagram' => '#'
            ]
        ];

        return view('pages.contacto', ['data' => $data]);
    }

    public function login(Request $request)
    {
        // Datos de prueba para el usuario
        $usuarios = [
            [
                'email' => 'admin@admin.com',
                'password' => 'admin1234',
            ]
        ];

        // URL de redirección predefinida
        $redirectUrl = '/';

        if ($request->isMethod('post')) {
            $email = $request->input('email');
            $password = $request->input('password');

            // Verificación de credenciales
            foreach ($usuarios as $usuario) {
                if ($usuario['email'] === $email && $usuario['password'] === $password) {
                    // Guardar el inicio de sesión en la sesión
                    session(['user_logged_in' => true, 'user_email' => $email]);

                    // Redirige a la URL del usuario
                    return redirect($redirectUrl);
                }
            }

            // Si las credenciales no son válidas, devolver un error
            return redirect()->back()->withErrors(['msg' => 'Credenciales incorrectas']);
        }

        // Muestra el formulario de login
        return view('pages.login');
    }

    public function logout()
    {
        // Elimina los datos de la sesión
        session()->flush();

        // Redirige a la página de inicio de sesión o a otra página
        return redirect('/login');
    }
}
