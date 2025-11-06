<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Icon } from '@iconify/vue'

interface InnovationCard {
  id: number
  number: string
  title: string
  description: string
  image: string
  link: string
}

interface BlueSection {
  badge: string
  title: string
  descriptions: string[]
  ctaText: string
  ctaLink: string
  droneImage: string
  backgroundPattern: string
}

interface WhiteSection {
  badge: string
  title: string
  ctaText: string
  ctaLink: string
}

interface Props {
  blueSection?: BlueSection
  whiteSection?: WhiteSection
  innovationCards?: InnovationCard[]
}

const props = withDefaults(defineProps<Props>(), {
  blueSection: () => ({
    badge: "Mobile App",
    title: "Innovations and Breakthroughs",
    descriptions: [
      "Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officiadese runt mollit anim id est laborum.",
      "Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt."
    ],
    ctaText: "MORE",
    ctaLink: "#",
    droneImage: "/assets/DoneBlue.png",
    backgroundPattern: "/assets/92.jpeg"
  }),
  whiteSection: () => ({
    badge: "Mobile App",
    title: "Innovations and Breakthroughs",
    ctaText: "GET STARTED",
    ctaLink: "#"
  }),
  innovationCards: () => [
    {
      id: 1,
      number: "01",
      title: "The ultraportable MaviCopter Air features",
      description: "Staghorn sculpin plownose chimaera sawfish temperate perch goatfish jackfish darter scaly dragonfish king of herring.",
      image: "/assets/Code1.jpg",
      link: "#"
    },
    {
      id: 2,
      number: "02",
      title: "Quadrone Announces Pricing and Availability of Multilink",
      description: "Staghorn sculpin plownose chimaera sawfish temperate perch goatfish jackfish darter scaly dragonfish king of herring.",
      image: "/assets/Code2.jpg",
      link: "#"
    },
    {
      id: 3,
      number: "03",
      title: "Air features is Ultraportable MaviCopter",
      description: "Staghorn sculpin plownose chimaera sawfish temperate perch goatfish jackfish darter scaly dragonfish king of herring.",
      image: "/assets/Code3.jpg",
      link: "#"
    }
  ]
})
</script>

<template>
  <section class="relative font-roboto">
    <!-- Blue Hero Section -->
    <div class="relative bg-[oklch(37.754%0.15587_274.67)] pb-[200px] sm:pb-[250px]">
      <!-- Background Pattern -->
      <div class="absolute bottom-0 left-0 w-full h-[424px] bg-[url(/assets/92.jpeg)] bg-repeat-x bg-left-bottom"></div>
      
      <div class="relative z-10 w-full mx-auto px-[19px] max-w-none lg:px-[25px] xl:px-[15px] xl:max-w-[1200px]">
        <div class="pt-[98px] pb-[100px] sm:pt-[139px] sm:pb-[138px]">
          <div class="flex flex-wrap items-center mx-[-15px]">
            <!-- Drone Image Column -->
            <div class="hidden xl:block w-full xl:w-1/2 px-[15px]">
              <img 
                decoding="async" 
                :src="blueSection.droneImage" 
                alt="Drone Image" 
                class="w-full h-auto max-w-full"
              />
            </div>
            
            <!-- Content Column -->
            <div class="w-full xl:w-1/2 px-[15px]">
              <div class="pb-[24px] lg:pb-[22px]">
                <!-- Badge -->
                <div class="relative font-bold text-[14px] lg:text-[16px] tracking-[-0.03em] text-white mb-[20px] font-roboto">
                  <i class="h-[2px] w-[30px] mr-[25px] inline-block bg-white relative top-[-5px]"></i>
                  {{ blueSection.badge }}
                </div>
                
                <!-- Title -->
                <h4 class="font-bold text-[31px] lg:text-[40px] leading-[1.13] tracking-tight text-white mb-[20px] font-roboto">
                  {{ blueSection.title }}<br class="hidden lg:block" />
                </h4>
              </div>
              
              <!-- Description -->
              <p 
                v-for="(desc, index) in blueSection.descriptions" 
                :key="index"
                class="text-white/90 mb-[15px] font-roboto"
              >
                {{ desc }}
              </p>
              
              <!-- CTA Button -->
              <Button 
                as-child 
                variant="ghost" 
                class="inline-flex items-center font-bold text-white hover:text-[oklch(37.754%0.15587_274.67)] mt-[36px] sm:mt-[46px] group transition-all duration-200 font-roboto p-0 hover:bg-transparent"
              >
                <a :href="blueSection.ctaLink" class="flex items-center no-underline">
                  <div class="flex items-center justify-center w-[50px] h-[50px] min-w-[50px] min-h-[50px] rounded-full border border-white/20 mr-[15px] group-hover:bg-white group-hover:border-white transition-all duration-200">
                    <Icon icon="heroicons:arrow-right" class="w-[12px] h-[12px] text-white group-hover:text-[oklch(37.754%0.15587_274.67)]" />
                  </div>
                  <span class="tracking-[0.14em] transition-all duration-200">
                    {{ blueSection.ctaText }}
                  </span>
                </a>
              </Button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- White Overlapping Section -->
    <div class="relative z-20 -mt-[200px] sm:-mt-[250px]">
      <div class="w-full mx-auto px-[19px] max-w-none lg:px-[25px] xl:px-[15px] xl:max-w-[1200px]">
        <Card class="bg-white shadow-[0_3px_46px_oklch(24.889%0.12402_271.75/0.08)] rounded-lg overflow-hidden border-0">
          <CardContent class="p-0">
            <!-- White Section Header -->
            <div class="px-[30px] py-[40px] lg:px-[60px] lg:py-[50px] xl:px-[100px] xl:py-[60px]">
              <div class="flex flex-wrap items-center justify-between">
                <!-- Header Content -->
                <div class="w-full lg:w-auto mb-[30px] lg:mb-0">
                  <div class="pb-[24px]">
                    <!-- Badge -->
                    <div class="relative font-bold text-[14px] lg:text-[16px] tracking-[-0.03em] text-[oklch(37.754%0.15587_274.67)] mb-[20px] font-roboto">
                      <i class="h-[2px] w-[30px] mr-[25px] inline-block bg-[oklch(37.754%0.15587_274.67)] relative top-[-5px]"></i>
                      {{ whiteSection.badge }}
                    </div>
                    
                    <!-- Title -->
                    <h4 class="font-bold text-[31px] lg:text-[40px] leading-[1.13] tracking-tight text-[oklch(24.229%0.02848_284.07)] font-roboto">
                      {{ whiteSection.title }}<br class="hidden lg:block" />
                    </h4>
                  </div>
                </div>

                <!-- GET STARTED Button -->
                <div class="w-full lg:w-auto">
                  <Button 
                    as-child 
                    variant="ghost" 
                    class="inline-flex items-center font-bold text-[oklch(37.754%0.15587_274.67)] group transition-all duration-200 font-roboto p-0 hover:bg-transparent"
                  >
                    <a :href="whiteSection.ctaLink" class="flex items-center no-underline">
                      <div class="flex items-center justify-center w-[50px] h-[50px] min-w-[50px] min-h-[50px] rounded-full border border-gray-300 mr-[15px] group-hover:bg-[oklch(37.754%0.15587_274.67)] group-hover:border-[oklch(37.754%0.15587_274.67)] transition-all duration-200">
                        <Icon icon="heroicons:arrow-right" class="w-[12px] h-[12px] text-[oklch(37.754%0.15587_274.67)] group-hover:text-white" />
                      </div>
                      <span class="tracking-[0.14em] transition-all duration-200">
                        {{ whiteSection.ctaText }}
                      </span>
                    </a>
                  </Button>
                  
                  <div class="h-[60px] lg:hidden"></div>
                </div>
              </div>

              <!-- 3 Cards Grid using Shadcn Card -->
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[30px] mt-[50px]">
                <Card
                  v-for="card in innovationCards"
                  :key="card.id"
                  class="group border-0 shadow-none p-0 gap-0"
                >
                  <CardContent class="p-0">
                    <div class="overflow-hidden rounded-lg mb-[30px]">
                      <a :href="card.link" class="block">
                        <img 
                          decoding="async" 
                          :src="card.image" 
                          :alt="card.title" 
                          class="w-full h-auto transition-transform duration-700 ease-in-out group-hover:scale-105"
                        />
                      </a>
                    </div>
                    <div class="font-bold text-[16px] text-[oklch(37.754%0.15587_274.67)] mb-[12px] font-roboto">
                      {{ card.number }}
                    </div>
                    <h4 class="font-bold text-[26px] leading-[1.2] tracking-[-0.03em] text-[oklch(24.229%0.02848_284.07)] mb-[24px] font-roboto">
                      <a :href="card.link" class="text-inherit hover:text-[oklch(37.754%0.15587_274.67)] transition-colors duration-200">
                        {{ card.title }}
                      </a>
                    </h4>
                    <p class="text-gray-600 mb-[20px] font-roboto">
                      {{ card.description }}
                    </p>
                    <a 
                      :href="card.link" 
                      class="inline-block font-bold text-[15px] tracking-[0.04em] text-[oklch(37.754%0.15587_274.67)] relative before:absolute before:bottom-0 before:left-0 before:w-0 before:h-[2px] before:bg-[oklch(37.754%0.15587_274.67)] before:transition-all before:duration-200 hover:before:w-full font-roboto"
                    >
                      MORE
                    </a>
                  </CardContent>
                </Card>
              </div>
            </div>
          </CardContent>
        </Card>
      </div>
    </div>
  </section>
</template>


