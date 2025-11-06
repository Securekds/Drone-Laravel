<script setup lang="ts">
import { ref } from 'vue'
import { Button } from '@/components/ui/button'
import { Icon } from '@iconify/vue'
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  type CarouselApi,
} from '@/components/ui/carousel'
import { Card, CardContent } from '@/components/ui/card'

interface Testimonial {
  id: number
  text: string
  name: string
  position: string
  avatar: string
  alt: string
}

interface SectionData {
  subtitle: string
  titleLine1: string
  titleLine2: string
}

interface Props {
  sectionData?: SectionData
  testimonials?: Testimonial[]
}

const props = withDefaults(defineProps<Props>(), {
  sectionData: () => ({
    subtitle: "Testimonials",
    titleLine1: "What People",
    titleLine2: "Say About Us"
  }),
  testimonials: () => [
    {
      id: 1,
      text: "Who could look on these monuments without reflecting on the vanity of mortals in thus offering up testimonials of their respect for persons of whose very names posterity is ignorant?",
      name: "STEPHANY",
      position: "Sales Manager",
      avatar: "/assets/14.jpeg",
      alt: "Testimonial avatar"
    },
    {
      id: 2,
      text: "Who could look on these monuments without reflecting on the vanity of mortals in thus offering up testimonials of their respect for persons of whose very names posterity is ignorant? Whitebait woody sculpin humuhumunukunukuapua sillago, taimen scaly dragonfish lanternfish salmon.",
      name: "STEPHANY",
      position: "Sales Manager",
      avatar: "/assets/Steveb.jpg",
      alt: "Testimonial avatar"
    },
    {
      id: 3,
      text: "Who could look on these monuments without reflecting on the vanity of mortals in thus offering up testimonials of their respect for persons of whose very names posterity is ignorant?",
      name: "STEPHANY",
      position: "Sales Manager",
      avatar: "/assets/Steveb.jpg",
      alt: "Testimonial avatar"
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
  <section class="relative font-roboto w-full pt-[98px] pb-[100px] sm:pt-[148px] sm:pb-[130px] xl:pb-[129px] overflow-hidden">
    <div class="w-full mx-auto px-[19px] max-w-none lg:px-[25px] xl:px-[15px] xl:max-w-[1200px]">
      <div class="flex flex-wrap -ml-[15px] -mr-[15px]">
        <!-- Left Content Section -->
        <div class="w-full relative px-[15px] md:max-w-[33.3333%] md:flex-[0_0_33.3333%] xl:max-w-[25%] xl:flex-[0_0_25%]">
          <div class="relative pb-[24px] lg:pb-[22px]">
            <!-- Subtitle -->
            <div class="p-0 relative font-bold leading-[1.1] ![margin-top:0] text-[14px] tracking-[-0.03em] text-[oklch(37.754%0.15587_274.67)] lg:text-[16px]">
              <i class="h-[2px] relative w-[30px] mr-[25px] top-[-5px] inline-block bg-[oklch(37.754%0.15587_274.67)]"></i>
              {{ sectionData.subtitle }}
            </div>
            
            <!-- Title -->
            <h4 class="mb-0 pb-0 font-bold mt-[20px] -tracking-wide leading-[1.13] [word-spacing:0] text-[31px] text-[oklch(24.229%0.02848_284.07)] lg:text-[40px]">
              {{ sectionData.titleLine1 }}<br class="hidden lg:block" />
              {{ sectionData.titleLine2 }}
            </h4>
          </div>
          
          <!-- Navigation Buttons -->
          <div class="mt-[29px]">
            <button 
              @click="scrollPrev"
              class="z-[2] delay-0 h-[50px] w-[50px] pr-[6px] inline-flex leading-[0] ease-linear items-center rounded-full text-[0] cursor-pointer outline-none transition-all duration-[0.2s] justify-center text-[oklch(37.754%0.15587_274.67)] bg-white border border-[oklch(87.302%0_none)] hover:text-white hover:border-[oklch(37.754%0.15587_274.67)] hover:bg-[oklch(37.754%0.15587_274.67)] group"
            >
              <Icon icon="heroicons:arrow-left" class="h-[12px] w-[12px] text-[oklch(37.754%0.15587_274.67)] group-hover:text-white transition-colors duration-200" />
            </button>
            
            <button 
              @click="scrollNext"
              class="z-[2] pr-px delay-0 h-[50px] w-[50px] ml-[9px] inline-flex leading-[0] ease-linear items-center rounded-full text-[0] cursor-pointer outline-none transition-all duration-[0.2s] justify-center text-[oklch(37.754%0.15587_274.67)] bg-white border border-[oklch(87.302%0_none)] hover:text-white hover:border-[oklch(37.754%0.15587_274.67)] hover:bg-[oklch(37.754%0.15587_274.67)] group"
            >
              <Icon icon="heroicons:arrow-right" class="h-[12px] w-[12px] text-[oklch(37.754%0.15587_274.67)] group-hover:text-white transition-colors duration-200" />
            </button>
          </div>
        </div>
        
        <!-- Spacer -->
        <div class="w-full h-[70px] clear-both block sm:h-[60px] lg:hidden"></div>
        
        <!-- Slider Section -->
        <div class="w-full relative px-[15px] md:max-w-[66.6667%] md:flex-[0_0_66.6667%] xl:max-w-[75%] xl:flex-[0_0_75%]">
          <Carousel 
            :opts="{ loop: false, skipSnaps: false }"
            @init-api="onCarouselInit"
            class="relative w-full overflow-hidden"
          >
            <CarouselContent class="ml-0 h-[421.907px] sm:h-[325.594px] md:h-[517.594px] lg:h-[421.594px] xl:h-[303.156px] 2xl:h-[379.9px]">
              <CarouselItem 
                v-for="testimonial in testimonials" 
                :key="testimonial.id" 
                class="pl-0 basis-full h-full"
              >
                <Card class="border-0 shadow-none p-0 h-full">
                  <CardContent class="p-0 h-full flex flex-col">
                    <div class="pt-[22px] border-t-2 border-[oklch(37.754%0.15587_274.67)]">
                      <!-- Quote Icon -->
                      <div>
                        <Icon icon="material-symbols:format-quote" class="h-[14px] w-[19px] text-[oklch(37.754%0.15587_274.67)]" />
                      </div>
                      
                      <!-- Testimonial Text -->
                      <div class="italic mt-[17px] leading-[1.6] text-[20px] text-[oklch(37.754%0.15587_274.67)] xl:text-[22px]">
                        {{ testimonial.text }}
                      </div>
                      
                      <!-- Author Info -->
                      <div class="z-[1] relative p-[13px] mt-[44px] inline-flex items-center text-white bg-black before:z-[2] before:absolute before:top-[-12px] before:left-[35px] before:content-[''] before:border-[6px] before:border-transparent before:border-b-black">
                        <!-- Author Avatar -->
                        <div class="h-[56px] w-[56px]">
                          <span class="p-[2px] relative inline-block rounded-full overflow-hidden border border-white">
                            <img 
                              decoding="async" 
                              :src="testimonial.avatar" 
                              :alt="testimonial.alt" 
                              class="block h-auto w-full max-w-full shadow-none align-middle rounded-full border-none outline-none"
                            />
                          </span>
                        </div>
                        
                        <!-- Author Details -->
                        <div class="relative mt-[-4px] ml-[17px] pr-[16px] leading-[1.3] text-[15px]">
                          {{ testimonial.name }}
                          <strong class="block mt-px font-bold tracking-widest">
                            {{ testimonial.position }}
                          </strong>
                        </div>
                      </div>
                    </div>
                  </CardContent>
                </Card>
              </CarouselItem>
            </CarouselContent>
          </Carousel>
        </div>
      </div>
    </div>
  </section>
</template>


