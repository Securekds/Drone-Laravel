<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Icon } from '@iconify/vue'

interface Props {
  backgroundImage?: string
  productImage?: string
  number?: string
  title?: string
  description?: string
  buttonText?: string
  buttonLink?: string
}

const props = withDefaults(defineProps<Props>(), {
  backgroundImage: "url('/assets/sectionbg_wrapperi.jpg')",
  productImage: '/assets/chessbox_fluid_img02.png',
  number: '02',
  title: 'Quadron 2 Pro',
  description: 'European perch false moray fire bar danio greenling orangestriped triggerfish. gulper!',
  buttonText: 'DISCOVER',
  buttonLink: '*'
})
</script>

<template>
<section class="text-zinc-500 text-lg font-roboto overflow-x-hidden">
  <div class="w-full">
    <div class="flex flex-col min-[791px]:flex-row min-[791px]:items-stretch bg-indigo-900 overflow-hidden text-white">
      <!-- Content Section - 50% (Left Side) -->
      <div class="min-[791px]:w-1/2 min-[791px]:order-1 p-9 min-[791px]:p-12 min-[1025px]:p-16 min-[1230px]:p-20 min-[1600px]:p-24 flex items-center">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
          <!-- Header -->
          <div class="pb-6 font-bold">
            <div>
              <i class="bg-white inline-block w-8 h-0.5 mr-6"></i>{{ number }}
            </div>
            <h4 class="text-[2.13rem] leading-9 mt-5">
              {{ title }}
            </h4>
          </div>

          <!-- Description -->
          <div class="mb-10">
            <p class="leading-relaxed">{{ description }}</p>
          </div>

          <!-- Discover Button -->
          <Button
            as-child
            variant="ghost"
            class="text-white items-center font-bold justify-start inline-flex p-0 hover:bg-transparent group"
          >
            <a :href="buttonLink" class="flex items-center no-underline">
              <span
                class="flex items-center justify-center w-12 h-12 min-w-[3.13rem] min-h-[3.13rem] mr-3.5 border-2 border-white rounded-full transition-all duration-200 group-hover:bg-white group-hover:border-white"
              >
                <Icon
                  icon="heroicons:arrow-right"
                  class="w-3 h-3 text-white group-hover:text-indigo-900 transition-colors duration-200"
                />
              </span>
              <span class="cursor-pointer text-white">{{ buttonText }}</span>
            </a>
          </Button>
        </div>
      </div>

      <!-- Image Section with Background - 50% (Right Side) -->
      <div 
        class="min-[791px]:w-1/2 min-[791px]:order-2 py-8 min-[791px]:py-16 bg-cover bg-center flex items-center justify-center"
        :style="{ backgroundImage }"
      >
        <div class="w-full">
          <img 
            :src="productImage" 
            alt="Product Image"
            class="w-full h-auto max-w-full min-[791px]:relative min-[1230px]:left-[-11%] min-[1600px]:left-[-29%]"
          />
        </div>
      </div>
    </div>
  </div>
</section>
</template>
