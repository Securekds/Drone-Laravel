<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { Button } from '@/components/ui/button'
import { Icon } from '@iconify/vue'
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  type CarouselApi,
} from '@/components/ui/carousel'

interface CaseSlide {
  id: number
  image: string
  badge: string
  title: string
  description: string
  videoLink?: string
  videoText?: string
  allProjectsLink?: string
  allProjectsText?: string
  detailsLink?: string
  detailsText?: string
}

interface SectionData {
  badge: string
  title: string
}

interface Props {
  sectionData?: SectionData
  slides?: CaseSlide[]
}

const props = withDefaults(defineProps<Props>(), {
  sectionData: () => ({
    badge: "Cases",
    title: "Vision Based Protection"
  }),
  slides: () => [
    {
      id: 1,
      image: "/assets/8.jpeg",
      badge: "Cases",
      title: "Vision Based Protection",
      description: "Tommy ruff Mozambique tilapia pirarucu yellowfin surgeonfish scorpionfish yellow-and-black triplefin trunkfish cod icefish yellowtail kingfish ayu.",
      videoLink: "#",
      videoText: "WATCH THE VIDEO",
      allProjectsLink: "#",
      allProjectsText: "ALL PROJECTS",
      detailsLink: "#",
      detailsText: "DETAILS"
    },
    {
      id: 2,
      image: "/assets/16.jpeg",
      badge: "Cases",
      title: "Vision Based Protection",
      description: "Tommy ruff Mozambique tilapia pirarucu yellowfin surgeonfish scorpionfish yellow-and-black triplefin trunkfish cod icefish yellowtail kingfish ayu.",
      videoLink: "#",
      videoText: "WATCH THE VIDEO",
      allProjectsLink: "#",
      allProjectsText: "ALL PROJECTS",
      detailsLink: "#",
      detailsText: "DETAILS"
    },

  ]
})

const api = ref<CarouselApi>()
const current = ref(0)

const onCarouselInit = (carouselApi: CarouselApi) => {
  api.value = carouselApi
  
  carouselApi.on('select', () => {
    current.value = carouselApi.selectedScrollSnap()
  })
  
  // Set initial slide
  current.value = carouselApi.selectedScrollSnap()
}

const scrollPrev = () => {
  api.value?.scrollPrev()
}

const scrollNext = () => {
  api.value?.scrollNext()
}

const goToSlide = (index: number) => {
  api.value?.scrollTo(index)
}
</script>

<template>
  <section class="relative font-roboto w-full overflow-hidden">
    <div class="w-full mx-auto px-[19px] max-w-none lg:px-[25px] xl:px-[15px] xl:max-w-[1200px]">
      <div class="relative">
        <Carousel 
          :opts="{ loop: true, skipSnaps: false }"
          @init-api="onCarouselInit"
          class="relative w-full overflow-hidden"
        >
          <div class="relative h-[524.531px] sm:h-[629.922px] md:h-[673.922px] lg:h-[782.266px] xl:h-[658.594px]">
            <CarouselContent class="ml-0 h-full">
              <CarouselItem 
                v-for="slide in slides" 
                :key="slide.id" 
                class="pl-0 basis-full h-full"
              >
                <div class="relative w-full h-full">
                  <!-- Image Container - Only the image changes -->
                  <picture class="relative overflow-hidden w-full h-full block">
                    <div class="relative w-full h-full">
                      <img 
                        :src="slide.image" 
                        :alt="sectionData.title"
                        class="block w-full h-full object-cover"
                      />
                    </div>
                  </picture>
                </div>
              </CarouselItem>
            </CarouselContent>

            <!-- Fixed Overlay Content - Video Button -->
            <div class="absolute z-[7] top-0 left-0 w-full h-[211.891px] sm:h-[333.922px] md:h-[404.922px] lg:h-[540.266px] xl:h-[649px] flex flex-col items-center justify-center pointer-events-none">
              <div class="pointer-events-auto">
                <Button 
                  as-child
                  variant="ghost"
                  class="z-[2] delay-0 shadow-none inline-flex ease-linear items-center no-underline outline-none transition-all duration-[0.2s] tracking-[0.04em] text-white bg-transparent hover:text-[oklch(37.754%0.15587_274.67)] hover:bg-transparent p-0 xl:absolute xl:left-[51px] xl:top-[45.5%] group"
                >
                  <a 
                    :href="slides[0]?.videoLink || '#'" 
                    tabindex="0"
                    class="flex items-center no-underline"
                  >
                    <i class="delay-0 h-[62px] w-[62px] relative text-center ease-linear inline-block leading-none rounded-full transition-all duration-[0.2s] text-[15px] border border-white before:top-2/4 before:absolute before:left-2/4 before:ml-[-4px] before:mt-[-7px] before:content-[''] before:border-[7px] before:border-transparent before:border-l-[11px] before:border-l-white group-hover:bg-[oklch(37.754%0.15587_274.67)] group-hover:border-[oklch(37.754%0.15587_274.67)]"></i>
                    <span class="ml-[25px]">{{ slides[0]?.videoText || 'WATCH THE VIDEO' }}</span>
                  </a>
                </Button>
              </div>

              <!-- ALL PROJECTS Button -->
              <div class="pointer-events-auto">
                <Button 
                  as-child
                  variant="ghost"
                  class="hidden lg:inline-flex absolute z-[2] delay-0 font-bold mt-[45px] shadow-none ease-linear items-center leading-none no-underline bottom-[30px] left-[20px] border-none cursor-pointer transition-all outline-none duration-[0.2s] text-[15px] text-white bg-transparent hover:text-[oklch(37.754%0.15587_274.67)] p-0 xl:left-[77%] xl:bottom-[14.5%] group"
                >
                  <a 
                    :href="slides[0]?.allProjectsLink || '#'"
                    tabindex="0"
                    class="flex items-center no-underline"
                  >
                    <i class="flex delay-0 h-[50px] w-[50px] pr-[3px] mr-[15px] font-normal ease-linear items-center min-h-[50px] min-w-[50px] rounded-full transition-all duration-[0.2s] border border-[oklch(87.61%0_none)] group-hover:bg-[oklch(37.754%0.15587_274.67)] group-hover:border-[oklch(37.754%0.15587_274.67)] justify-center">
                      <Icon icon="heroicons:arrow-right" class="h-[12px] w-[12px] text-white" />
                    </i>
                    <span class="relative top-px delay-0 ease-linear duration-[0.2s] tracking-[0.14em] transition-[letter-spacing]">
                      {{ slides[0]?.allProjectsText || 'ALL PROJECTS' }}
                    </span>
                  </a>
                </Button>
              </div>
            </div>

            <!-- Fixed Content Overlay - Bottom Left -->
            <div class="flex px-0 z-[7] pt-[57px] pb-[20px] items-start bg-white sm:px-[30px] sm:pt-[57px] sm:pb-[20px] xl:absolute xl:left-0 xl:bottom-0 xl:w-[67.3%]">
              <!-- First Div: Badge, Title, and Navigation Controls -->
              <div class="min-w-[175px]">
                <div class="relative pb-[24px]">
                  <div class="p-0 relative font-bold leading-[1.1] ![margin-top:0] text-[14px] tracking-[-0.03em] text-[oklch(37.754%0.15587_274.67)] lg:text-[16px]">
                    <i class="h-[2px] relative w-[30px] mr-[15px] top-[-5px] inline-block bg-[oklch(37.754%0.15587_274.67)]"></i>
                    {{ sectionData.badge }}
                  </div>
                  <h4 class="mb-0 pb-0 font-bold mt-[18px] leading-tight [word-spacing:0] text-[25px] tracking-[-0.02em] text-[oklch(24.229%0.02848_284.07)] lg:mt-[21px] lg:text-[26px]">
                    Vision Based<br />
                    Protection
                  </h4>
                </div>

                <!-- Navigation Controls under title -->
                <div class="flex items-center space-x-2 mt-[20px]">
                  <button
                    @click="scrollPrev"
                    class="delay-0 h-[50px] w-[50px] text-center ease-linear inline-flex items-center justify-center rounded-full cursor-pointer transition-all duration-300 text-[oklch(37.754%0.15587_274.67)] border border-[oklch(87.61%0_none)] hover:text-white hover:border-[oklch(37.754%0.15587_274.67)] hover:bg-[oklch(37.754%0.15587_274.67)] hover:scale-105 active:scale-95 group"
                  >
                    <Icon icon="heroicons:arrow-left" class="w-5 h-5 text-[oklch(37.754%0.15587_274.67)] group-hover:text-white transition-colors duration-300" />
                  </button>
                  
                  <!-- Slide Indicators -->
                  <div class="flex items-center space-x-2">
                    <button 
                      v-for="(slide, index) in slides" 
                      :key="slide.id"
                      @click="goToSlide(index)"
                      :class="[
                        'w-3 h-3 rounded-full transition-all duration-300',
                        current === index 
                          ? 'bg-[oklch(37.754%0.15587_274.67)] scale-125' 
                          : 'bg-gray-300 hover:bg-gray-400'
                      ]"
                    ></button>
                  </div>
                  
                  <button
                    @click="scrollNext"
                    class="delay-0 h-[50px] w-[50px] text-center ease-linear inline-flex items-center justify-center rounded-full cursor-pointer transition-all duration-300 text-[oklch(37.754%0.15587_274.67)] border border-[oklch(87.61%0_none)] hover:text-white hover:border-[oklch(37.754%0.15587_274.67)] hover:bg-[oklch(37.754%0.15587_274.67)] hover:scale-105 active:scale-95 group"
                  >
                    <Icon icon="heroicons:arrow-right" class="w-5 h-5 text-[oklch(37.754%0.15587_274.67)] group-hover:text-white transition-colors duration-300" />
                  </button>
                </div>
              </div>

              <!-- Second Div: Description and Details Link -->
              <div class="m-0 leading-[27px] sm:mr-0 sm:mb-0 sm:ml-[54px] sm:mt-[45px] xl:mr-0 xl:mb-0 xl:mt-[45px] xl:ml-[124px]">
                {{ slides[0]?.description || '' }}
                <p class="p-0 mx-0 mt-[23px] mb-[15px] empty:hidden">
                  <a 
                    :href="slides[0]?.detailsLink || '#'"
                    tabindex="0"
                    class="relative font-bold shadow-none inline-block no-underline outline-none text-[15px] tracking-[0.13em] text-[oklch(37.754%0.15587_274.67)] bg-transparent before:w-0 before:z-10 before:block before:m-auto before:h-[2px] before:delay-0 before:absolute before:inset-x-0 before:ease-linear before:content-[''] before:bottom-[4px] before:duration-[0.2s] before:transition-[width] before:bg-[oklch(37.754%0.15587_274.67)] hover:before:w-full"
                  >
                    {{ slides[0]?.detailsText || 'DETAILS' }}
                  </a>
                </p>
              </div>
            </div>
          </div>

        </Carousel>
      </div>
    </div>
  </section>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800&display=swap');

.font-roboto {
  font-family: 'Roboto', sans-serif;
}
</style>

