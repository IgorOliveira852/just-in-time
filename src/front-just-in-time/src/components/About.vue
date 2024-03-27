<template>
    <section class="relative bg-white py-8 mt-20" id="about">
        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
            <div class="w-full md:w-1/2 p-6 flex-col flex-grow flex-shrink relative order-2 md:order-1">
                <div class="absolute inset-0 bg-[#ffdcdc] rounded-md ml-20 mb-4 mr-12 mt-14"></div>
                <img :src="image" alt="Mulher sorrindo penteando outra mulher" class="relative right-12 rounded-md z-10 mb-8 w-2/3 ml-40 mt-20"/>
            </div>
            <div class="w-full md:w-1/2 p-6 flex flex-col flex-grow flex-shrink order-1 md:order-2">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <div class="p-6">
                        <h2 class="text-3xl font-bold mb-4">Sobre nós</h2>
                        <p class="text-gray-600 mb-4">Beauty Salon é um novo conceito de salão: um espaço aconchegante, alternativo, com uma postura ética, onde se utilizam produtos que respeitam sua saúde e a natureza.


                            Um salão super slow beauty, com atendimento individualizado, ambiente muito calmo e com muito papo-cabeça.


                            Imagem aqui não é tratada com futilidade. Se sentir bem faz parte da autoestima, e a imagem de cada um de nós transmite uma mensagem. Essa mensagem deve estar de acordo com o que somos, deve nos representar..</p>
<!--                        <a href="#" target="_blank" class="inline-block px-6 py-3 text-white bg-red-500 rounded-full">Saiba mais</a>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import aboutImage from '@/assets/images/lashdesign.png'

export default {
    name: "About",
    data() {
        return {
            image: aboutImage
        }
    }
}
</script>

<style scoped>
#about {
    padding-left: 20%; /* Aumenta a borda à esquerda */
    padding-right: 20%; /* Aumenta a borda à direita */
}
</style>
