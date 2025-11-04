<script setup lang="ts">
import { ref } from 'vue'
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  type CarouselApi,
} from '@/components/ui/carousel'

type Slide = { id: number; image: string; link?: string }

interface Props {
  sectionLabel?: string
  sectionTitle?: string
  sectionDescription?: string
  leftBackgroundImage?: string
  leftSlides?: Slide[]
  rightSlides?: Slide[]
}

const props = withDefaults(defineProps<Props>(), {
  sectionLabel: 'Cases',
  sectionTitle: 'Every client is a new strategy',
  sectionDescription:
    'Dhufish crestfish yellowtail clownfish Shingle Fish velvet-belly shark mouthbrooder, Old World rivuline.',
  leftBackgroundImage:
    "url('https://quadrone.ninetheme.com/wp-content/uploads/2019/11/custom-layout04.jpg')",
  leftSlides: () => [
    {
      id: 1,
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/10/custom-layout04-img01.jpg',
    },
   
    {
      id: 2,
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/10/custom-layout04-img03.jpg',
    },
  ],
  rightSlides: () => [
    {
      id: 1,
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/10/custom-layout04-img02.jpg',
      link: 'https://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
    },
    {
      id: 2,
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/10/custom-layout04-img01.jpg',
      link: 'https://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
    },
   
  ],
})

const currentSlide = ref(0)
const leftApi = ref<CarouselApi>()
const rightApi = ref<CarouselApi>()

const onLeftInit = (api: CarouselApi) => {
  leftApi.value = api
}
const onRightInit = (api: CarouselApi) => {
  rightApi.value = api
}

const goToSlide = (index: number) => {
  currentSlide.value = index
  leftApi.value?.scrollTo(index)
  rightApi.value?.scrollTo(index)
}
</script>

<template>
  <section class="w-full">
    <div class="w-full grid grid-cols-1 md:grid-cols-2 min-h-[36rem]">
      <!-- Left Column -->
      <div
        class="flex flex-col p-6 sm:p-8 text-white"
        :style="{ backgroundImage: leftBackgroundImage, backgroundSize: 'cover', backgroundPosition: 'center' }"
      >
        <!-- Text Content at Top -->
        <div class="max-w-xl mx-auto md:mx-0">
          <div class="pb-6 font-bold">
            <div class="flex items-center text-white">
              <i class="inline-block w-8 h-0.5 mr-6 bg-white"></i>
              <span>{{ sectionLabel }}</span>
            </div>
            <h4 class="text-3xl sm:text-4xl font-bold leading-tight mt-5">
              {{ sectionTitle }}
            </h4>
          </div>
          <p class="text-base sm:text-lg leading-relaxed opacity-90">
            {{ sectionDescription }}
          </p>
        </div>

        <!-- Spacer -->
        <div class="flex-1"></div>

        <!-- Left slider (mobile/desktop) -->
        <div class="flex flex-col items-center gap-4">
          <Carousel
            :opts="{ align: 'start', loop: false }"
            @init-api="onLeftInit"
            class="w-full max-w-xl"
          >
            <CarouselContent>
              <CarouselItem v-for="(slide, idx) in leftSlides" :key="slide.id" class="basis-full">
                <img :src="slide.image" alt="" class="w-full h-[16rem] sm:h-[18rem] object-cover rounded-md" />
              </CarouselItem>
            </CarouselContent>
          </Carousel>

          <!-- Mobile dots -->
          <div class="flex md:hidden items-center justify-center gap-3">
            <button
              v-for="(s, i) in leftSlides"
              :key="i"
              class="w-2.5 h-2.5 rounded-full"
              :class="currentSlide === i ? 'bg-white' : 'bg-white/50'"
              @click="goToSlide(i)"
            />
          </div>
        </div>
      </div>

      <!-- Right Column -->
      <div class="bg-white p-6 sm:p-8 hidden md:flex md:flex-col">
        <!-- Spacer to align with left text -->
        <div class="flex items-center justify-center md:justify-start">
          <!-- Numeric navigation (desktop) -->
          <ul class="hidden md:flex items-center gap-6 list-none p-0 m-0">
            <li
              v-for="(s, i) in rightSlides"
              :key="i"
              class="cursor-pointer text-sm"
              @click="goToSlide(i)"
            >
              <span
                class="py-3.5 px-1 transition-colors duration-200"
                :class="currentSlide === i ? 'text-indigo-900 border-b-2 border-indigo-900' : 'text-gray-400'"
              >
                {{ (i + 1).toString().padStart(2, '0') }}
              </span>
            </li>
          </ul>
        </div>

        <!-- Spacer -->
        <div class="flex-1"></div>

        <!-- Right slider -->
        <div class="flex justify-center md:justify-start">
          <Carousel
            :opts="{ align: 'start', loop: false }"
            @init-api="onRightInit"
            class="w-full max-w-xl"
          >
            <CarouselContent>
              <CarouselItem v-for="(slide, idx) in rightSlides" :key="slide.id" class="basis-full">
                <a :href="slide.link || '#'">
                  <img :src="slide.image" alt="" class="w-full h-[16rem] sm:h-[18rem] object-cover rounded-md" />
                </a>
              </CarouselItem>
            </CarouselContent>
          </Carousel>
        </div>
      </div>
    </div>
  </section>
</template>


