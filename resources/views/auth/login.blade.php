@extends('layouts.app')
<section class="bg-gray-100 dark:bg-gray-800 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg dark:bg-gray-700 dark:border-gray-600 p-6">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
            Mi Aplicación
        </a>
        
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Iniciar sesión en tu cuenta
        </h1>

        <form class="space-y-4 md:space-y-6" method="POST" action="#">
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electrónico</label>
                <input type="email" name="email" id="email" required
                       class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-400 dark:focus:border-gray-400">
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                <input type="password" name="password" id="password" required
                       class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-400 dark:focus:border-gray-400">
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox"
                               class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-gray-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-gray-400 dark:ring-offset-gray-800">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="remember" class="text-gray-500 dark:text-gray-300">Recuérdame</label>
                    </div>
                </div>
                <a href="#" class="text-sm font-medium text-gray-600 hover:underline dark:text-gray-300">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit"
                    class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500">
                Iniciar sesión
            </button>

            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                ¿No tienes una cuenta? <a href="#" class="font-medium text-gray-600 hover:underline dark:text-gray-300">Regístrate</a>
            </p>
        </form>
    </div>
</section>