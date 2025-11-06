<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Icon } from '@iconify/vue'

interface Props {
  productImage?: string
  number?: string
  title?: string
  description?: string
  buttonText?: string
  buttonLink?: string
}

const props = withDefaults(defineProps<Props>(), {
  productImage: '/assets/chessbox_fluid_img03.webp',
  number: '03',
  title: 'Inspire 2 HFX',
  description: 'Hammerhead shark, Spanish mackerel, pencil catfish wrasse velvet-belly shark straptail eagle ray coho salmon sand lance whiptail gulper!',
  buttonText: 'DISCOVER',
  buttonLink: '*'
})
</script>

<template>
  <section class="text-zinc-500 text-lg font-roboto overflow-x-hidden">
    <div class="w-full">
      <div class="flex flex-col min-[791px]:flex-row min-[791px]:items-stretch bg-white overflow-hidden">
        <!-- Image Section -->
        <div class="min-[791px]:w-1/2 py-8 min-[791px]:py-16 flex items-center justify-center bg-gray-50">
          <div class="w-full">
            <img 
              :src="productImage" 
              alt="Product Image"
              class="w-full h-auto max-w-full min-[791px]:relative min-[1230px]:right-[-11%] min-[1600px]:right-[-17%]"
            />
          </div>
        </div>

        <!-- Content Section -->
        <div class="min-[791px]:w-1/2 p-9 min-[791px]:p-12 min-[1025px]:p-16 min-[1230px]:p-20 min-[1600px]:p-24 flex items-center">
          <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
                <div class="pb-6 font-bold">
                  <div class="text-indigo-900">
                    <i class="bg-indigo-900 inline-block w-8 h-0.5 mr-6"></i>{{ number }}
                  </div>
                  <h4 class="text-zinc-800 text-[2.13rem] leading-9 mt-5">
                    {{ title }}
                  </h4>
                </div>

                <div class="mb-10">
                  <p class="text-zinc-500 leading-relaxed">{{ description }}</p>
                </div>

                <Button
                  as-child
                  variant="ghost"
                  class="text-indigo-900 items-center font-bold justify-start inline-flex p-0 hover:bg-transparent group"
                >
                  <a :href="buttonLink" class="flex items-center no-underline">
                    <span
                      class="flex items-center justify-center w-12 h-12 min-w-[3.13rem] min-h-[3.13rem] mr-3.5 border-2 border-zinc-300 rounded-full transition-all duration-200 group-hover:bg-indigo-900 group-hover:border-indigo-900"
                    >
                      <Icon
                        icon="heroicons:arrow-right"
                        class="w-3 h-3 text-black group-hover:text-white transition-colors duration-200"
                      />
                    </span>
                    <span class="cursor-pointer">{{ buttonText }}</span>
                  </a>
                </Button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

