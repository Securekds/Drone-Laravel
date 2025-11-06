<script setup lang="ts">
import { ref } from 'vue'
import { Icon } from '@iconify/vue'
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  type CarouselApi,
} from '@/components/ui/carousel'

interface GalleryImage {
  id: number
  src: string
  alt: string
  width?: number
  height?: number
  url?: string
  loading?: 'lazy' | 'eager'
}

interface GallerySlide {
  id: number
  images: GalleryImage[]
}

interface Props {
  slides?: GallerySlide[]
}

const props = withDefaults(defineProps<Props>(), {
  slides: () => [
    {
      id: 1,
      images: [
        {
          id: 1,
          src: '/assets/28.png',
          alt: '',
          width: 300,
          height: 203,
          url: '#',
          loading: 'eager'
        },
        {
          id: 2,
          src: '/assets/20.png',
          alt: '',
          width: 300,
          height: 203,
          url: '#',
          loading: 'eager'
        }
      ]
    },
    {
      id: 2,
      images: [
        {
          id: 3,
          src: '/assets/25.png',
          alt: '',
          width: 300,
          height: 203,
          url: '#',
          loading: 'eager'
        },
        {
          id: 4,
          src: '/assets/23.png',
          alt: '',
          width: 300,
          height: 203,
          url: '#',
          loading: 'lazy'
        }
      ]
    },
    {
      id: 3,
      images: [
        {
          id: 5,
          src: '/assets/26.png',
          alt: '',
          width: 300,
          height: 203,
          url: '#',
          loading: 'lazy'
        },
        {
          id: 6,
          src: '/assets/24.png',
          alt: '',
          width: 300,
          height: 203,
          url: '#',
          loading: 'lazy'
        }
      ]
    },
    {
      id: 4,
      images: [
        {
          id: 7,
          src: '/assets/19.png',
          alt: '',
          width: 300,
          height: 203,
          url: '#',
          loading: 'lazy'
        },
        {
          id: 8,
          src: '/assets/20.png',
          alt: '',
          width: 300,
          height: 203,
          url: '#',
          loading: 'eager'
        }
      ]
    },
    {
      id: 5,
      images: [
        {
          id: 9,
          src: '/assets/24.png',
          alt: '',
          width: 300,
          height: 203,
          url: '#',
          loading: 'lazy'
        },
        {
          id: 10,
          src: '/assets/29.png',
          alt: '',
          width: 300,
          height: 203,
          url: '#',
          loading: 'lazy'
        }
      ]
    }
  ]
})

const api = ref<CarouselApi>()
const current = ref(0)

const onCarouselInit = (carouselApi: CarouselApi) => {
  api.value = carouselApi
  
  carouselApi.on('select', () => {
    current.value = carouselApi.selectedScrollSnap()
  })
  
  current.value = carouselApi.selectedScrollSnap()
}

const scrollPrev = () => {
  api.value?.scrollPrev()
}

const scrollNext = () => {
  api.value?.scrollNext()
}
</script>

<template>
  <div class="relative font-roboto w-full mt-[98px] pt-[98px] pb-[87px] sm:mt-[148px] sm:pt-[148px] xl:pt-[137px] xl:pb-[120px] bg-[oklch(37.754%0.15587_274.67)]">
    <div class="w-full mx-auto px-[19px] max-w-none lg:px-[25px] xl:px-[15px] xl:max-w-[1200px]">
      <Carousel 
        :opts="{ loop: false, skipSnaps: false }"
        @init-api="onCarouselInit"
        class="relative w-full overflow-hidden"
      >
        <CarouselContent class="ml-0">
          <CarouselItem 
            v-for="slide in slides" 
            :key="slide.id" 
            class="pl-0 basis-[390px]"
          >
            <div class="w-full">
              <!-- Slide Images -->
              <a 
                v-for="image in slide.images" 
                :key="image.id"
                :href="image.url || '#'"
                class="block delay-0 shadow-none ease-linear no-underline outline-none duration-[0.2s] transition-[background-color] text-[oklch(37.754%0.15587_274.67)] bg-transparent xl:hover:bg-white/10 group"
              >
                <img 
                  :decoding="image.loading === 'lazy' ? 'async' : 'async'"
                  :loading="image.loading || 'eager'"
                  :width="image.width || 300"
                  :height="image.height || 203"
                  :src="image.src"
                  :alt="image.alt"
                  class="block h-auto w-full max-w-none shadow-none align-middle rounded-none border-none outline-none transition-transform duration-300 group-hover:scale-105"
                />
              </a>
            </div>
          </CarouselItem>
        </CarouselContent>

        <!-- Navigation Buttons -->
        <div class="text-center mt-[50px] 2xl:w-full 2xl:top-2/4 2xl:absolute 2xl:inset-x-0 2xl:mt-[-25px]">
          <!-- Previous Button -->
          <button 
            @click="scrollPrev"
            class="z-[1] delay-0 h-[50px] relative w-[50px] mr-[5px] pr-[6px] text-center ease-linear inline-flex items-center justify-center rounded-full cursor-pointer transition-all duration-[0.2s] text-white bg-transparent border border-white hover:text-[oklch(37.754%0.15587_274.67)] hover:bg-white 2xl:absolute 2xl:left-[70px] group"
          >
            <Icon icon="heroicons:arrow-left" class="h-[12px] w-[12px] text-white group-hover:text-[oklch(37.754%0.15587_274.67)] transition-colors duration-200" />
          </button>

          <!-- Next Button -->
          <button 
            @click="scrollNext"
            class="z-[1] pr-px delay-0 h-[50px] relative w-[50px] ml-[5px] text-center ease-linear inline-flex items-center justify-center rounded-full cursor-pointer transition-all duration-[0.2s] text-white bg-transparent border border-white hover:text-[oklch(37.754%0.15587_274.67)] hover:bg-white 2xl:absolute 2xl:right-[70px] group"
          >
            <Icon icon="heroicons:arrow-right" class="h-[12px] w-[12px] text-white group-hover:text-[oklch(37.754%0.15587_274.67)] transition-colors duration-200" />
          </button>
        </div>
      </Carousel>
    </div>
  </div>
</template>


