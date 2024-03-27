<template>
    <div class="border-b border-gray-300 mb-8 flex fixed z-10 bg-[#ffdcdc] top-0 left-0 w-full" id="header">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
<!--            <h1 class="text-2xl font-bold">Nome do Site</h1>-->
            <img :src="logo" alt="Logo" class="h-8 w-auto"/>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="text-gray-700 hover:text-black">Início</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-black">Sobre</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-black">Serviços</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-black">Depoimentos</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-black">Contato</a></li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
import logo from '@/assets/images/logo-com-nome.png'
export default {
    name: "Header",
    data() {
        return {
            logo: logo
        }
    }
}
</script>

<style>
#header {
    padding-left: 20%; /* Aumenta a borda à esquerda */
    padding-right: 20%; /* Aumenta a borda à direita */
}
</style>