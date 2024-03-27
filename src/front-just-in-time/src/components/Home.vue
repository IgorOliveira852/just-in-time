<template>
    <section class="relative bg-white py-8 mt-40" id="home">
        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
            <div class="w-full md:w-2/5 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none  mr-20">
                    <div class="p-6">
                        <h2 class="text-3xl font-bold mb-4">A arte de transformar olhares</h2>
                        <p class="text-gray-600 mb-4">Um salão exclusivo em Fortaleza, especializado em cílios e sobrancelhas.</p>
                        <a href="#" target="_blank" class="inline-block px-6 py-3 text-white bg-red-400 rounded-full">Agendar um horário</a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 p-6 flex-col flex-grow flex-shrink relative">
                <div class="absolute inset-0 bg-[#ffdcdc] rounded-md ml-20 mb-4 mt-14"></div>
                <img :src="image" alt="Mulher sorrindo penteando outra mulher" class="relative right-12 rounded-md z-10 mb-8 w-full ml-20"/>
            </div>
        </div>
    </section>
</template>

<script>
import lashdesign from '@/assets/images/beauty-salon-71.png'

export default {
    name: "Start",
    data() {
        return {
            image: lashdesign
        }
    }
}
</script>

<style scoped>
#home {
    padding-left: 20%; /* Aumenta a borda à esquerda */
    padding-right: 20%; /* Aumenta a borda à direita */
}
#home img {
    width: 90%; /* Aumenta o tamanho da imagem */
    margin-left: -10%; /* Move a imagem mais para a esquerda */
}
</style>
