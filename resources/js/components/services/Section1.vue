<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Icon } from '@iconify/vue'

type Service = {
  id: number
  icon: string
  title: string
  description: string
  detailsLink?: string
}

interface Props {
  services?: Service[]
  highlightText?: string
  descriptionText?: string
}

const props = withDefaults(defineProps<Props>(), {
  services: () => [
    {
      id: 1,
      icon: '/images/services/delivery.svg',
      title: 'Delivery',
      description:
        'Triplefin blenny gibberfish ridgehead stonecat Australian grayling. Glass knifefish Bombay duck Molly Quillfish',
      detailsLink: 'https://quadrone.ninetheme.com/service-details/',
    },
    {
      id: 2,
      icon: '/images/services/news-media.svg',
      title: 'News & Media',
      description:
        'Glass knifefish Bombay duck Molly Miller Quillfish stargazer collared dogfish silver hake. Temperate bass trout filefish medaka',
      detailsLink: 'https://quadrone.ninetheme.com/service-details/',
    },
    {
      id: 3,
      icon: '/images/services/public-safety.svg',
      title: 'Public Safety',
      description:
        'Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver. Garibaldi giant danio',
      detailsLink: 'https://quadrone.ninetheme.com/service-details/',
    },
    {
      id: 4,
      icon: '/images/services/film.svg',
      title: 'Film & Production',
      description:
        'Quillfish stargazer collared dogfish silver hake." Temperate bass trout filefish medaka trout-perch herringdevil ray sleeper',
      detailsLink: 'https://quadrone.ninetheme.com/service-details/',
    },
    {
      id: 5,
      icon: '/images/services/inspection.svg',
      title: 'Inspection',
      description:
        'Bass trout filefish medaka trout-perch herringdevil ray sleeper dusky grouper sand diver. Garibaldi giant danio ziege',
      detailsLink: 'https://quadrone.ninetheme.com/service-details/',
    },
    {
      id: 6,
      icon: '/images/services/construction.svg',
      title: 'Construction',
      description:
        'Grouper sand diver. Garibaldi giant danio ziege Siamese fighting fish collared dusky grouper sand dogfish.',
      detailsLink: 'https://quadrone.ninetheme.com/service-details/',
    },
  ],
  highlightText:
    'We provide expert inspection services for your organizations mission critical assets using drone technology.',
  descriptionText:
    'Triplefin blenny gibberfish ridgehead stonecat Australian grayling. Glass knifefish Bombay duck Molly Miller Quillfish stargazer collared dogfish silver hake. Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver. Garibaldi giant danio ziege Siamese fighting fish collared dogfish.',
})
</script>

<template>
  <section class="text-zinc-500 text-lg pb-24 pt-32 sm:pt-36 md:pt-48 md:pb-36 font-roboto">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <div class="-mt-16 md:-mt-20">
        <div class="flex flex-wrap -m-3.5">
          <!-- Service Cards -->
         <Card
  v-for="service in services"
  :key="service.id"
  class="group relative w-full sm:w-1/2 md:w-1/3 border-0 shadow-none p-0 gap-0 bg-transparent px-4 mt-16 md:mt-20"
>
  <CardContent class="relative flex p-0">
    <!-- Vertical Line -->
    <div class="absolute left-0 top-0 h-[100px] w-px bg-[#c2c2c2]"></div>

    <!-- Content Wrapper -->
    <div class="ml-6 sm:ml-8 md:ml-10">
      <!-- Icon -->
      <div class="-mt-1 mb-6">
        <img :src="service.icon" :alt="service.title" class="w-12 h-12" />
      </div>

      <!-- Title -->
      <h4 class="text-zinc-800 text-xl font-bold pb-5 mt-6">{{ service.title }}</h4>

      <!-- Description -->
      <p class="leading-relaxed">{{ service.description }}</p>

      <!-- Details Link -->
      <Button
        as-child
        variant="ghost"
        class="text-indigo-900 items-center font-bold justify-start inline-flex mt-8 sm:mt-12 p-0 hover:bg-transparent group"
      >
        <a :href="service.detailsLink || '#'" class="flex items-center no-underline">
          <span
            class="flex items-center justify-center w-12 h-12 min-w-[3.13rem] min-h-[3.13rem] mr-3.5 border-2 border-zinc-300 rounded-full transition-all duration-200 group-hover:bg-[#2e3192] group-hover:border-[#2e3192]"
          >
            <Icon
              icon="heroicons:arrow-right"
              class="w-3 h-3 text-indigo-900 group-hover:text-white transition-colors duration-200"
            />
          </span>
          <span class="cursor-pointer">DETAILS</span>
        </a>
      </Button>
    </div>
  </CardContent>
</Card>


<!-- Highlight Text Section -->
<div class="w-full sm:w-1/2 md:w-[41.6667%] px-4 mt-16 md:mt-20 pl-6 sm:pl-10 md:pl-14">
  <div class="text-[1.38rem] leading-7 text-indigo-900 font-bold">
    {{ highlightText }}
  </div>
</div>

<!-- Description Text Section -->
<div class="w-full sm:w-1/2 md:w-1/2 px-4 mt-16 md:mt-20 ml-auto pl-6 sm:pl-10 md:pl-14">
  <p class="leading-relaxed">{{ descriptionText }}</p>
</div>

        </div>
      </div>
    </div>
  </section>
</template>


