Descripción

Es una aplicación que ofrece cursos o, mejor dicho, un path para aprender programación, basado en videos de Youtube (Próximamente se implementarán enlaces a webs como freecodecamp.com o a la documentación de las tecnologías implicadas)

Los usuarios sin autenticar pueden navegar los capítulos de los cursos, pero no registrar su progreso
Los usuarios autenticados pueden apuntarse a un curso y su progreeso se registra y muestra en su dashboard
Los administradiores pueden hacer un CRUD completo de Usuarios (registrados o no) y cursos, con la única limitación de que un usuario administrador no puede hacer un actualizar o eliminar información de otro usuario administrador

✔️ Nivel 1

Dissenya el model complet de la base de dades del teu projecte (MER). És important tenir clar quines són les entitats de les quals emmagatzemarem informació, així com dels seus atributs i relacions. Pots usar l'eina de la teva preferència. (MySQL Workbench, Diagrams.net, Creately...). 

Crea un nou projecte amb Laravel. Soluciona els errors que puguin aparèixer.

Definir les rutes que tindrà el nostre projecte web. El domini ha de tenir el CRUD complet per gestionar equips i partits.

Defineix les migracions i els models de dades d'equips i partits.

Crea els controladors i els mètodes que consideris necessaris per gestionar equips i partits.

Estableix les vistes utilitzant Blade i Tailwind.css (es tindrà en compte el maquetat). Associar-les amb les rutes o els controladors corresponents.

Crea els formularis necessaris per poder fer els CRUDs d'equips i partits. Hauràs de validar que la informació introduïda per l'usuari/ària sigui correcta tant a la vista com al controlador.

Has de fer servir un repositori GitHub seguint la seqüència gitflow i utilitzant pull-request.

✔️ Nivel 2

Implementa el sistema d'autenticació amb la paqueteria de Breeze i habilita l'enviament de correu electrònic per recuperar contrasenya i de registre d'usuari/ària.

 Important

Les rutes que breeze fa servir per al login/registre es troben al fitxer routes/auth.php i quant a les rutes que no requereixen autenticació a routes/web.php. Ves amb compte per això, ja que podria sobreescriure aquestes rutes i podries perdre part de la teva feina. El millor és realitzar un backup preferentment a GitHub previ a la instal·lació del paquet o instal·lar-lo des del principi en el teu projecte.


Crea un sistema que adapti la vista de l'error 404 a nivell de projecte. Pots utilitzar la funció Resposta i la redirecció de Laravel.

✔️ Nivel 3

Ara tractarem de donar una mica més de vida a la nostra aplicació afegint algun efecte dinàmic. Per això, necessitarem instal·lar la llibreria LiveWire.

Pensa en algun ús pràctic que podries donar a aquesta llibreria dins la teva aplicació i llavors, aplica-ho.

Posa la funcionalitat que hagis creat als comentaris de l’entrega.

Donat el que hem vist al tema 9 d’aquest Sprint, implementa la capa de Servei en la teva aplicació.

💻 Tecnologías Utilizadas
PHP: Lenguaje de programación utilizado para desarrollar la aplicación.
Tailwind CSS: Framework CSS utilizado para el diseño responsivo de las vistas.
MySQL: Base de datos para almacenar usuarios y tareas.
Laravel: Framework utilizado para el proyecto

🔑 Requisitos
PHP 7.4+
Laravel Framework 11.43.1
MySQL o MariaDB.
Tailwind CSS (para estilos en la interfaz).
Composer (Para gestionar dependencias de PHP instaladas en el proyecto).
Dependecia instalada: livewire/livewire": "^3.5"

☕ Instalación
Clona este repositorio en tu máquina local.
git clone https://github.com/tu_usuario/nombre_del_repositorio.git

Accede a la carpeta del proyecto.
cd nombre_del_repositorio

Ejecuta las migraciones: 

``php artisan migrate``

(Debes crear una base de datos en Mysql / Mariadb llamada 'kognos' o modificar el archivo .env del proyecto para que la aplicación se comunique correctamente con tu base de datos)

Puebla la base de datos mediante los seeders implementados en la aplicación:

``php artisan db:seed``


Se creará un curso llamado Desarrollo web con PHP y Laravel y un usuario de nombre ``socketserious``, email ``socketserious@gmail.com ``y contrasña ``12345678`` que tandrá rol de administrador

Recuerda, en la raíz del proyecto, ejecutar el comando composer install para que los paquetes utilizados en el proyecto, y listandos en el archivo composer.json, sean instalados.

⏩ Ejecución

Ejecuta ``php artisan serve``y accede, por defecto, a ``127.0.0.1:8000``