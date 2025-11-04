<script setup lang="ts">
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  type CarouselApi,
} from '@/components/ui/carousel'
import { Button } from '@/components/ui/button'
import { ref } from 'vue'

type Slide = {
  image: string
  title?: string
  heading?: string
  description?: string
  price?: string
  layout?: 'left' | 'right'
  textColor?: 'white' | 'default'
}

type StatItem = {
  id: number
  icon: string // image path for the icon (converted from SVG)
  label: string
  value: string
}

interface Props {
  slides?: Slide[]
  stats?: StatItem[]
  ctaHref?: string
}

const props = withDefaults(defineProps<Props>(), {
  ctaHref: 'https://quadrone.ninetheme.com/',
  slides: () => [
    {
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-01-1.jpg',
      layout: 'right',
      title: '',
      heading: '',
      description: '',
      price: '',
      textColor: 'default',
    },
    {
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03-1.jpg',
      title: 'Quadron Pro',
      heading: 'Professional Drone<br />Series X5',
      description:
        'Advanced professional drone with enhanced camera capabilities and extended flight time.',
      price: '$2,299 USD',
      layout: 'right',
      textColor: 'default',
    },
    {
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-02-2.jpg',
      title: 'Quadron Air',
      heading: 'The Ultraportable <br />Quadrone MGB 21',
      description:
        'The ultraportable Copter features high-end flight performance and functionality for limitless exploration.',
      price: '$1,499 USD',
      layout: 'left',
      textColor: 'white',
    },
  ],
  stats: () => [
    {
      id: 1,
      icon: '/assets/flight.png',
      label: 'Flight time',
      value: '16 min',
    },
    {
      id: 2,
      icon: '/assets/transmiiton.png',
      label: 'Effective Pixels',
      value: '12 mp',
    },
    {
      id: 3,
      icon: '/assets/effective.png',
      label: 'Transmission Distance',
      value: '1.2 ml (2 km)',
    },
    {
      id: 4,
      icon: '/assets/vps.png',
      label: 'VPS range',
      value: '30 m',
    },
  ],
})

const carouselApi = ref<CarouselApi>()

const onCarouselInit = (api: CarouselApi) => {
  carouselApi.value = api
}

const setActiveSlide = (index: number) => {
  carouselApi.value?.scrollTo(index)
}
</script>

<template>
  <section class="bg-white text-zinc-500 overflow-x-hidden">
    <!-- Hero Section (no background line structure) -->
    <div class="relative w-full">
      <!-- Carousel with slides as hero backgrounds -->
      <Carousel
        :opts="{ align: 'start', loop: false }"
        @init-api="onCarouselInit"
        class="w-full"
      >
        <CarouselContent>
          <CarouselItem
            v-for="(slide, index) in slides"
            :key="index"
            class="basis-full"
          >
            <!-- Background image and overlay content -->
            <div
              class="relative w-full cursor-grab"
              :class="[
                'h-[34.38rem] min-[1025px]:h-[43rem] min-[1230px]:h-[41.06rem]',
              ]"
              :style="{ backgroundImage: `url('${slide.image}')`, backgroundSize: 'cover', backgroundRepeat: 'no-repeat', backgroundPosition: '50% 0%' }"
            >
              <!-- Hero Content Overlay -->
              <div class="w-full h-full flex items-center">
                <div
                  class="container mx-auto px-5 min-[791px]:pl-14 min-[791px]:pr-14"
                >
                  <div
                    class="w-60 min-[791px]:w-80 min-[1025px]:w-96 min-[1230px]:w-[33.75rem]"
                    :class="[
                      slide.layout === 'left'
                        ? 'ml-0 flex justify-start'
                        : 'ml-0 min-[791px]:ml-[50%] flex justify-start',
                    ]"
                    :style="{ color: slide.textColor === 'white' ? 'white' : 'inherit' }"
                  >
                    <div class="w-full">
                      <!-- Title -->
                      <div
                        v-if="slide.title"
                        class="text-indigo-900 border-l-2 border-indigo-900 text-xl font-bold py-1 pl-3 min-[791px]:pl-5 min-[791px]:py-1"
                      >
                        {{ slide.title }}
                      </div>

                      <!-- Heading -->
                      <div
                        v-if="slide.heading"
                        class="font-bold mt-5 min-[791px]:mt-7"
                        :class="[
                          slide.textColor === 'white'
                            ? 'text-white'
                            : 'text-zinc-800',
                          'text-[1.8rem] leading-tight min-[420px]:text-4xl min-[1025px]:text-6xl'
                        ]"
                        v-html="slide.heading"
                      />

                      <!-- Description -->
                      <div
                        v-if="slide.description"
                        class="max-w-xs mt-3 min-[1025px]:max-w-[30.63rem] min-[1230px]:mt-5"
                        :class="slide.textColor === 'white' ? 'text-white' : 'text-zinc-500'"
                      >
                        {{ slide.description }}
                      </div>

                      <!-- Price -->
                      <div
                        v-if="slide.price"
                        class="font-bold mt-2"
                        :class="slide.textColor === 'white' ? 'text-white' : 'text-indigo-900'"
                      >
                        {{ slide.price }}
                      </div>

                      <!-- CTA Button -->
                      <Button
                        v-if="slide.title || slide.heading"
                        as-child
                        variant="ghost"
                        :class="[
                          slide.textColor === 'white' ? 'text-white' : 'text-indigo-900',
                          'content-center items-center font-bold justify-start inline-flex mt-5 min-[791px]:mt-5 min-[1025px]:mt-7 min-[1230px]:mt-10 p-0 hover:bg-transparent group'
                        ]"
                      >
                        <a :href="ctaHref">
                          <span
                            class="content-center items-center cursor-pointer justify-center pr-1 inline-flex w-12 h-12 min-w-[3.13rem] min-h-[3.13rem] mr-3.5 border-2 border-zinc-300 rounded-full transition-all duration-300 group-hover:bg-[#2e3192] group-hover:border-[#2e3192]"
                          >
                            <svg
                              class="w-2.5 h-2.5 sm:w-3 sm:h-3"
                              viewBox="0 0 291.49 492"
                              fill="currentColor"
                            >
                              <path
                                d="M382.678 226.804L163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z"
                              />
                            </svg>
                          </span>
                          <span class="cursor-pointer">ADD TO CART</span>
                        </a>
                      </Button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Mobile number list (bottom-left) -->
              <div class="absolute left-0 bottom-0 w-full flex justify-start pl-5 pb-3 min-[791px]:hidden z-20">
                <ul class="flex items-center gap-4 list-none p-0 m-0">
                  <li
                    v-for="(s, i) in slides"
                    :key="i"
                    class="text-zinc-500 cursor-pointer text-lg"
                    @click="setActiveSlide(i)"
                  >
                    <span
                      class="text-indigo-900 text-sm py-3.5 px-1 transition-all duration-300"
                      :class="{ 'border-b-2 border-indigo-900': carouselApi?.selectedScrollSnap() === i }"
                    >
                      {{ (i + 1).toString().padStart(2, '0') }}
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </CarouselItem>
        </CarouselContent>
      </Carousel>

      <!-- Footer Stats Section -->
<div class="relative w-full z-30">
  <div class="w-full flex flex-col md:flex-row md:items-center md:justify-center min-h-[10.625rem]">
    
    <!-- 30% number selector -->
    <div class="hidden md:flex w-full md:w-[30%] bg-white items-center justify-center">
      <ul class="flex items-center gap-4 list-none p-0 m-0">
        <li
          v-for="(s, i) in slides"
          :key="i"
          class="text-zinc-500 cursor-pointer text-lg"
          @click="setActiveSlide(i)"
        >
          <span
            class="text-indigo-900 text-sm py-3.5 px-1 transition-all duration-300"
            :class="{ 'border-b-2 border-indigo-900': carouselApi?.selectedScrollSnap() === i }"
          >
            {{ (i + 1).toString().padStart(2, '0') }}
          </span>
        </li>
      </ul>
    </div>

    <!-- 70% stats area -->
    <div class="w-full md:w-[70%] bg-gray-100 text-zinc-500 text-[1.125rem] py-8 px-6 md:py-8 md:px-8 flex items-start justify-start md:items-center md:justify-center">
      <ul
        class="flex flex-col md:flex-row md:flex-wrap md:justify-center md:items-center gap-6 list-none p-0 m-0"
      >
        <li
          v-for="item in stats"
          :key="item.id"
          class="flex items-center justify-start w-full md:w-auto"
        >
          <div class="text-indigo-900 w-12 mr-5 flex-shrink-0">
            <img :src="item.icon" :alt="item.label" class="inline w-12 h-12 object-contain" />
          </div>
          <div class="pt-1 flex-shrink-0">
            <span class="block text-gray-400 text-base text-left whitespace-nowrap">{{ item.label }}</span>
            <span class="block text-zinc-800 text-xl font-medium text-left whitespace-nowrap">{{ item.value }}</span>
          </div>
        </li>
      </ul>
    </div>

  </div>
</div>

    </div>
  </section>
</template>

<style scoped>
</style>


