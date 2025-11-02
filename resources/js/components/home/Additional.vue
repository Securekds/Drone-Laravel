
<script setup lang="ts">
import { Card } from '@/components/ui/card'

interface AdditionalService {
  id: number
  title: string
  description: string
  image: string
  link: string
}

interface SectionData {
  subtitle: string
  title: string
}

interface Props {
  services?: AdditionalService[]
  sectionData?: SectionData
}

const props = withDefaults(defineProps<Props>(), {
  services: () => [
    {
      id: 1,
      title: "Entertainment",
      description: "Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver.",
      image: "https://quadrone.ninetheme.com/wp-content/uploads/2019/11/index02-img10.jpg",
      link: "#entertainment"
    },
    {
      id: 2,
      title: "Broadcasts",
      description: "Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver.",
      image: "https://quadrone.ninetheme.com/wp-content/uploads/2019/11/index02-img11.jpg",
      link: "#broadcasts"
    },
    {
      id: 3,
      title: "Science",
      description: "Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver.",
      image: "https://quadrone.ninetheme.com/wp-content/uploads/2019/11/index02-img12.jpg",
      link: "#science"
    }
  ],
  sectionData: () => ({
    subtitle: "Additional Services",
    title: "Special Things"
  })
})
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800&display=swap');

.font-roboto {
  font-family: 'Roboto', sans-serif;
}
</style>


<template>
  <section class="py-20 font-roboto relative w-full mx-auto">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <!-- Section Header -->
      <div class="relative pb-[61px] box-border text-center">
        <div class="p-0 relative font-bold box-border leading-[1.1] ![margin-top:0] text-[14px] tracking-[-0.03em] text-[oklch(37.754%0.15587_274.67)] lg:text-[16px]">
          {{ sectionData.subtitle }}
        </div>
        <h4 class="mb-0 pb-0 font-bold mt-[20px] box-border -tracking-wide leading-[1.13] [word-spacing:0] text-[31px] text-[oklch(24.229%0.02848_284.07)] lg:text-[40px]">
          {{ sectionData.title }}
        </h4>
      </div>
      
      <!-- Cards Grid -->
      <div class="flex flex-wrap lg:flex-nowrap -ml-[15px] -mr-[15px] mt-0 box-border gap-2 sm:gap-3">
        <Card
          v-for="(service, index) in services"
          :key="service.id"
          class="w-full relative px-[15px] box-border sm:max-w-[50%] sm:flex-[0_0_50%] lg:max-w-[33.3333%] lg:flex-[0_0_33.3333%] border-0 shadow-none p-0 gap-0 group !bg-transparent !flex-col"
        >
          <a 
            :href="service.link" 
            class="block relative mb-[30px] box-border shadow-none no-underline overflow-hidden bg-transparent lg:mb-0 w-full"
          >
            <!-- Image Container -->
            <div class="relative w-full h-[480px] sm:h-[480px] lg:h-[480px] xl:h-[550px] overflow-hidden flex-shrink-0">
              <img 
                :src="service.image" 
                :alt="service.title"
                class="w-full h-full object-cover transition-transform duration-[700ms] ease-in-out scale-100 group-hover:scale-105"
                decoding="async"
                loading="lazy"
              />
            </div>
            
            <!-- Service Overlay -->
            <div class="absolute bottom-0 left-0 right-0 w-full z-[2] box-border transition-all duration-200 ease-linear">
              <!-- Service Number -->
              <div class="pt-0 pb-[30px] px-[25px] box-border font-normal leading-[1.2] text-[40px] text-white xl:px-[39px]">
                {{ String(index + 1).padStart(2, '0') }}
              </div>
              
              <!-- Service Content -->
              <div class="pt-[20px] pb-[16px] px-[25px] box-border transition-all duration-[800ms] ease-linear text-white bg-[oklch(27.358%0.03774_264.55)] group-hover:bg-[#2e3192] xl:pt-[35px] xl:pb-[18px] xl:px-[40px]">
                <h4 class="m-0 pt-0 px-0 font-bold pb-[17px] box-border leading-[1.2] [word-spacing:0] text-[20px] tracking-[-0.03em] text-white">
                  {{ service.title }}
                </h4>
                
                <!-- Service Details (Hidden by default, shown on hover) -->
                <div class="w-full box-border opacity-0 max-h-0 overflow-hidden transition-all duration-700 ease-in-out group-hover:opacity-100 group-hover:max-h-[200px]">
                  <p class="p-0 mt-0 mx-0 mb-[15px] box-border text-white">
                    {{ service.description }}
                  </p>
                  <span class="relative mt-[10px] box-border inline-block cursor-pointer text-white">
                    MORE
                    <span class="absolute bottom-[3px] left-0 right-0 h-[2px] bg-white w-0 group-hover:w-full transition-all duration-200 ease-linear"></span>
                  </span>
                </div>
              </div>
            </div>
          </a>
        </Card>
      </div>
    </div>
  </section>
</template>