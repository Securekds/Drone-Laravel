
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

// Define props with TypeScript
interface HeroSlide {
  id: number
  subtitle: string
  title: string
  description: string
  backgroundImage: string
  ctaText: string
  ctaLink: string
  alignment: 'left' | 'center' | 'right'
  titleClass?: string
  droneImage?: {
    position: 'left' | 'right'
    opacity?: string
  }
}

interface SocialLink {
  name: string
  url: string
  icon: string
}

interface ContactData {
  address: string
  phone: string
  email: string
  videoLink: string
  videoThumbnail: string
}

interface HeroData {
  droneImage: string
}

interface Props {
  heroData?: HeroData
  contactData?: ContactData
  socialLinks?: SocialLink[]
}

// Define props with defaults
const props = withDefaults(defineProps<Props>(), {
  heroData: () => ({
    droneImage: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03-icon.png'
  }),
  contactData: () => ({
    address: '5961 Santa Fe Ave, Huntington<br>Park, CA 90255, USA',
    phone: '+1 800 341 41 41   +1 800 834 62 74',
    email: 'info@quadron.co',
    videoLink: '#',
    videoThumbnail: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/10/custom-layout04-img03.jpg'
  }),
  socialLinks: () => [
    { name: 'Facebook', url: '#', icon: 'mdi:facebook' },
    { name: 'Twitter', url: '#', icon: 'mdi:twitter' },
    { name: 'Instagram', url: '#', icon: 'mdi:instagram' },
  ]
})

// Reactive data
const currentSlide = ref(0)
const carouselApi = ref<CarouselApi>()

const heroSlides = ref<HeroSlide[]>([
  {
    id: 1,
    subtitle: 'Quadrone Air',
    title: 'The Ultraportable<br>Drone for the Best Video',
    description: 'The ultraportable Mavic Air features high-end flight performance and functionality for limitless exploration.',
    backgroundImage: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-01.jpg',
    ctaText: 'DISCOVER',
    ctaLink: '#',
    alignment: 'left',
    droneImage: {
      position: 'left'
    }
  },
  {
    id: 2,
    subtitle: 'Quadrone Air',
    title: 'Awesome Quadron for <br>the Practice Inspection',
    description: '',
    backgroundImage: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-02.jpg',
    ctaText: 'DISCOVER',
    ctaLink: '#',
    alignment: 'center',
    titleClass: 'center-slide-title'  
  },
  {
    id: 3,
    subtitle: 'Quadrone Air',
    title: 'The Best Video <br>Camera for Copters',
    description: 'The ultraportable Mavic Air features high-end flight performance and functionality for limitless exploration.',
    backgroundImage: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03.jpg',
    ctaText: 'DISCOVER',
    ctaLink: '#',
    alignment: 'right',
    droneImage: {
      position: 'right',
      opacity: 'opacity-20'
    }
  }
])

// Carousel API initialization
const onCarouselInit = (api: CarouselApi) => {
  carouselApi.value = api
  
  if (!api) return

  // Track slide changes
  api.on('select', () => {
    currentSlide.value = api.selectedScrollSnap()
  })

  // Set initial slide
  currentSlide.value = api.selectedScrollSnap()
}

// Methods - ONLY MANUAL CONTROLS
const prevSlide = (): void => {
  carouselApi.value?.scrollPrev()
}

const nextSlide = (): void => {
  carouselApi.value?.scrollNext()
}

const goToSlide = (index: number): void => {
  carouselApi.value?.scrollTo(index)
}
</script>



<template>
  <section class="bg-white overflow-x-hidden">
    <!-- Hero Section -->
    <div class="relative min-h-[800px] xl:min-h-[871px] h-[800px] xl:h-[871px] mb-0 overflow-x-hidden font-roboto">
      <Carousel 
        :opts="{ loop: true, skipSnaps: false }"
        @init-api="onCarouselInit"
        class="relative h-[850px] xl:h-[871px] w-full overflow-hidden"
      >
        <CarouselContent class="h-full ml-0">
          <CarouselItem 
            v-for="(slide, index) in heroSlides" 
            :key="slide.id" 
            class="h-full pl-0 basis-full"
          >
            <div class="relative h-[850px] xl:h-[871px] w-full">
              <!-- Background Image -->
              <div class="absolute inset-0 w-full h-full z-10">
                <img 
                  :src="slide.backgroundImage" 
                  alt="Drone Background" 
                  class="w-full h-full object-cover md:h-[500px] lg:h-full max-h-[750px] lg:max-h-none object-center"
                />
              </div>
              
              <!-- Hero Content -->
              <div class="relative z-20 h-full flex items-center w-full max-w-full overflow-hidden">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
                  <div class="max-w-6xl w-full">
                    <!-- Text Content -->
                    <div 
                      :class="[
                        'relative z-10 mt-[-16rem] md:mt-0 text-white',
                        slide.alignment === 'center' 
                          ? 'text-center' 
                          : slide.alignment === 'right' 
                            ? 'text-left ml-auto max-w-[330px] lg:max-w-[540px]' 
                            : ''
                      ]"
                    >
                      <!-- Background Drone Image -->
                      <div 
                        v-if="slide.droneImage"
                        :class="[
                          'absolute z-0 hidden sm:block',
                          slide.alignment === 'left' 
                            ? '-top-8 -right-4' 
                            : slide.alignment === 'right' 
                              ? '-top-8 -left-4' 
                              : '-top-8 left-1/2 -translate-x-1/2',
                          slide.droneImage.opacity || ''
                        ]"
                      >
                        <img 
                          :src="heroData.droneImage" 
                          alt="Quadrone Air Drone" 
                          class="max-w-[140px] sm:max-w-[200px]"
                        />
                      </div>
                      <div class="font-bold text-[18px] leading-[1.1] tracking-[-0.02em] mb-[14px]">{{ slide.subtitle }}</div>
                      
                      <h1 
                        :class="[
                          'font-bold leading-[1.48] tracking-[-0.02em] mb-4',
                          slide.alignment === 'center' 
                            ? 'text-[30px] sm:text-[50px] lg:text-[60px] xl:text-[98px] xl:leading-[1.1]'
                            : 'text-[25px] md:text-[29px] md:leading-[39px] lg:text-[35px] lg:leading-[45px] xl:text-[60px] xl:leading-[65px]'
                        ]"
                        v-html="slide.title"
                      ></h1>
                      
                      <p 
                        v-if="slide.description"
                        :class="[
                          'text-[12px] leading-[1.8] tracking-[-0.01em] mb-8',
                          slide.alignment === 'left' ? 'max-w-[215px] md:text-[14px] md:max-w-[310px] lg:text-[15px] xl:text-[17px] xl:max-w-[495px]' : 'md:text-[14px] lg:text-[15px] xl:text-[17px]'
                        ]"
                      >
                        {{ slide.description }}
                      </p>
                      
                      <!-- Button -->
                      <Button 
                        as-child 
                        variant="ghost" 
                        :class="[
                          'group inline-flex items-center text-white p-0 hover:bg-transparent mt-0 lg:mt-[29px]',
                          slide.alignment === 'center' ? 'mx-auto' : slide.alignment === 'right' ? 'ml-auto' : ''
                        ]"
                      >
                        <a :href="slide.ctaLink" class="flex items-center no-underline">
                          <div class="flex items-center justify-center w-[50px] h-[50px] min-w-[50px] min-h-[50px] rounded-full border border-white/70 mr-[15px] group-hover:bg-[#2e3192] group-hover:border-[#2e3192] transition-all duration-200">
                            <svg class="w-[12px] h-[12px] text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                          </div>
                          <span class="text-[15px] font-bold tracking-[0.14em] relative top-[1px] group-hover:text-white">{{ slide.ctaText }}</span>
                        </a>
                      </Button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </CarouselItem>
    </CarouselContent>

        <!-- MOBILE SLIDER SECTION -->
        <div class="absolute bottom-[calc(200px+120px)] sm:bottom-[calc(242px+130px)] left-0 right-0 z-40 lg:hidden pb-4">
          <div class="container mx-auto px-4">
            <div class="flex items-center justify-center gap-4 sm:gap-6">
              <!-- Slider Dots -->
              <div class="flex gap-3 sm:gap-4">
                <Button
                  v-for="(slide, index) in heroSlides" 
                  :key="slide.id" 
                  variant="ghost"
                  class="flex flex-col items-center gap-2 h-9 justify-center px-1 py-0 cursor-pointer"
                  @click="goToSlide(index)"
                >
                  <span 
                    class="text-[14px] font-medium transition-colors duration-300 font-roboto"
                    :class="currentSlide === index ? 'text-white' : 'text-white/60'"
                  >
                    {{ (index + 1).toString().padStart(2, '0') }}
                  </span>
                  <span 
                    class="w-full h-[3px] bg-white transition-all duration-300"
                    :class="currentSlide === index ? 'w-full' : 'w-0'"
                  ></span>
                </Button>
              </div>
              
              <!-- Slider Controls -->
              <div class="flex gap-2 sm:gap-3 items-center h-9">
                <Button 
                  variant="ghost" 
                  size="icon"
                  class="rounded-full w-8 h-8 sm:w-9 sm:h-9 hover:bg-white/10"
                  @click="prevSlide"
                >
                  <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                  </svg>
                </Button>
                
                <Button 
                  variant="ghost" 
                  size="icon"
                  class="rounded-full w-8 h-8 sm:w-9 sm:h-9 hover:bg-white/10"
                  @click="nextSlide"
                >
                  <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </Button>
              </div>
            </div>
          </div>
        </div>

        <!-- MOBILE INFO BAR -->
        <div class="absolute bottom-0 left-0 right-0 z-30 bg-[#1b2337] lg:hidden overflow-hidden">
          <div class="max-w-full mx-auto flex flex-col items-center justify-center h-full p-0 gap-4 sm:gap-6 mt-0">
            <!-- Video Container -->
            <div class="w-full h-[200px] sm:h-[242px] relative overflow-hidden">
              <Button as-child variant="ghost" class="w-full h-full p-0 block">
                <a :href="contactData.videoLink" class="group relative block w-full h-full">
                  <!-- Play Button Overlay -->
                  <div class="absolute inset-0 flex items-center justify-center bg-black/30 transition-colors duration-300 group-hover:bg-black/20">
                    <div class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-full bg-blue-500/80 border border-blue-500/80 flex items-center justify-center transition-all duration-300 group-hover:scale-110 group-hover:bg-blue-500/90">
                      <div class="w-0 h-0 border-t-[8px] border-b-[8px] border-l-[12px] sm:border-t-[10px] sm:border-b-[10px] sm:border-l-[16px] border-t-transparent border-b-transparent border-l-white ml-1"></div>
                    </div>
                  </div>
                  
                  <!-- Thumbnail Image -->
                  <img 
                    :src="contactData.videoThumbnail" 
                    alt="Watch our video" 
                    class="w-full h-full object-cover"
                  />
                </a>
              </Button>
            </div>

            <!-- Contact Information -->
            <div class="contact-info-mobile flex flex-wrap items-start justify-start text-left gap-4 w-full p-4 mt-0">
              <address class="font-normal m-0">
                <span class="block text-white text-[12px] leading-[1.5] font-roboto" v-html="contactData.address"></span>
              </address>
              
              <address class="font-normal m-0">
                <span class="block text-white text-[12px] leading-[1.5] font-roboto" v-html="contactData.phone"></span>
                <Button as-child variant="link" class="email-link-mobile font-roboto p-0 h-auto text-[12px] leading-[1.5] text-white">
                  <a :href="`mailto:${contactData.email}`">
                    {{ contactData.email }}
                  </a>
                </Button>
              </address>
            </div>
          </div>
        </div>

        <!-- DESKTOP INFO BAR -->
        <div class="absolute bottom-0 left-0 right-0 z-30 py-6 hidden lg:block lg:h-[122px] lg:py-[1.7rem]">
          <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col items-center justify-center lg:flex lg:flex-row lg:justify-between lg:items-center gap-4 lg:gap-6">
            <!-- Background for contact info and video only -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#1b2337] via-[#1b2337] to-transparent pointer-events-none z-0" style="width: calc(100% - 200px);"></div>
            
            <!-- Contact Information -->
            <div class="contact-info hidden lg:flex lg:min-w-0 lg:max-w-full lg:gap-8 xl:gap-12 lg:text-left lg:items-start lg:order-1 lg:flex-1 relative z-10">
              <address class="font-normal m-0">
                <span class="block text-white text-[12px] leading-[1.5] lg:text-[14px] font-roboto" v-html="contactData.address"></span>
              </address>
              
              <address class="font-normal m-0">
                <span class="block text-white text-[12px] leading-[1.5] lg:text-[14px] font-roboto" v-html="contactData.phone"></span>
                <Button as-child variant="link" class="info-text email-link font-roboto p-0 h-auto text-[12px] leading-[1.5] lg:text-[14px] text-white">
                  <a :href="`mailto:${contactData.email}`">
                    {{ contactData.email }}
                  </a>
                </Button>
              </address>
            </div>

            <!-- Video Thumbnail -->
            <div class="video-thumbnail hidden lg:block lg:w-[240px] xl:w-[260px] lg:max-w-full lg:flex-shrink-0 lg:order-2 relative z-10">
              <Button as-child variant="ghost" class="w-full p-0 h-auto hover:bg-transparent">
                <a :href="contactData.videoLink" class="group relative block w-full">
                  <!-- Play Button Overlay -->
                  <div class="absolute inset-0 flex items-center justify-center bg-black/30">
                    <div class="w-[50px] h-[50px] lg:w-[60px] lg:h-[60px] rounded-full bg-blue-500/80 border border-blue-500/80 flex items-center justify-center">
                      <div class="w-0 h-0 border-t-[8px] border-b-[8px] border-l-[12px] lg:border-t-[10px] lg:border-b-[10px] lg:border-l-[16px] border-t-transparent border-b-transparent border-l-white ml-1"></div>
                    </div>
                  </div>
                  
                  <!-- Thumbnail Image -->
                  <img 
                    :src="contactData.videoThumbnail" 
                    alt="Watch our video" 
                    class="w-full h-[110px] lg:h-[122px] object-cover"
                  />
                </a>
              </Button>
            </div>

            <!-- Desktop Slider Controls -->
            <div class="slider-desktop-controls hidden lg:flex lg:items-center lg:gap-4 xl:gap-5 lg:order-3">
              <!-- Slider dots and navigation buttons -->
              <div class="flex items-center gap-3 xl:gap-4">
                <div class="flex gap-3 xl:gap-4">
                  <Button
                    v-for="(slide, index) in heroSlides" 
                    :key="slide.id" 
                    variant="ghost"
                    class="flex flex-col items-center gap-2 h-9 justify-center px-1 py-0 hover:bg-transparent"
                    @click="goToSlide(index)"
                  >
                    <span 
                      class="text-[14px] font-medium transition-colors duration-300 font-roboto"
                      :class="currentSlide === index ? 'text-white' : 'text-white/60'"
                    >
                      {{ (index + 1).toString().padStart(2, '0') }}
                    </span>
                    <span 
                      class="w-full h-[3px] bg-white transition-all duration-300"
                      :class="currentSlide === index ? 'w-full' : 'w-0'"
                    ></span>
                  </Button>
                </div>
                
                <div class="flex gap-2 xl:gap-3 items-center h-9">
                  <Button 
                    variant="ghost" 
                    size="icon"
                    class="rounded-full w-8 h-8 xl:w-9 xl:h-9 hover:bg-transparent"
                    @click="prevSlide"
                  >
                    <svg class="w-4 h-4 xl:w-5 xl:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                  </Button>
                  
                  <Button 
                    variant="ghost" 
                    size="icon"
                    class="rounded-full w-8 h-8 xl:w-9 xl:h-9 hover:bg-transparent"
                    @click="nextSlide"
                  >
                    <svg class="w-4 h-4 xl:w-5 xl:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                  </Button>
                </div>
              </div>

              <!-- Social Icons - Column layout aligned to the right -->
              <div class="hidden lg:flex flex-col gap-2 items-center -mt-[130px] relative z-50">
                <Button
                  v-for="social in socialLinks" 
                  :key="social.name"
                  as-child
                  variant="ghost"
                  size="icon"
                  class="w-10 h-10 xl:w-12 xl:h-12 border border-white/20 hover:bg-transparent"
                  style="border-radius: 50px;"
                >
                  <a :href="social.url">
                    <Icon :icon="social.icon" class="w-4 h-4 xl:w-5 xl:h-5 text-white" />
                  </a>
                </Button>
              </div>
            </div>
          </div>
        </div>
  </Carousel>
    </div>
  </section>
</template>