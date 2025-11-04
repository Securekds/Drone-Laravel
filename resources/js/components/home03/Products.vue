<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card'
import { ref, onMounted, onUnmounted } from 'vue'
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  type CarouselApi,
} from '@/components/ui/carousel'

type Product = {
  id: number
  link: string
  image: string
  logo: string
  description: string
  logoWidthRem?: number
  logoFilter?: 'black' | 'white'
}

interface Props {
  sectionLabel?: string
  sectionTitle?: string
  products?: Product[]
}

const props = withDefaults(defineProps<Props>(), {
  sectionLabel: 'Products',
  sectionTitle: 'Discover newest <br class="hidden sm:inline" />technologies',
  products: () => [
    {
      id: 1,
      link: 'https://quadrone.ninetheme.com/about-us',
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/promobox04-img01.jpg',
      logo:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/promobox04-img01-logo.png',
      description:
        'Luderick whale catfish turbot river shark loach catfish-- thornyhead; spiny eel harelip sucker speckled trout bass northern Stargazer spiny basslet mola. South American darter brook lamprey marblefish blacktip reef shark.',
      logoWidthRem: 8,
      logoFilter: 'black',
    },
    {
      id: 2,
      link: 'https://quadrone.ninetheme.com/about-us',
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/promobox04-img01.jpg',
      logo:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/promobox04-img02-logo02.png',
      description:
        'Luderick whale catfish turbot river shark loach catfish-- thornyhead; spiny eel harelip sucker speckled trout bass northern Stargazer spiny basslet mola. South American darter brook lamprey marblefish blacktip reef shark.',
      logoWidthRem: 7,
      logoFilter: 'black',
    },
    {
      id: 3,
      link: 'https://quadrone.ninetheme.com/about-us',
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/promobox04-img01.jpg',
      logo:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/promobox04-img03-logo02.png',
      description:
        'Luderick whale catfish turbot river shark loach catfish-- thornyhead; spiny eel harelip sucker speckled trout bass northern Stargazer spiny basslet mola. South American darter brook lamprey marblefish blacktip reef shark.',
      logoWidthRem: 4,
      logoFilter: 'black',
    },
    {
      id: 4,
      link: 'https://quadrone.ninetheme.com/about-us',
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/promobox04-img01.jpg',
      logo:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/promobox04-img04-logo02.png',
      description:
        'Luderick whale catfish turbot river shark loach catfish-- thornyhead; spiny eel harelip sucker speckled trout bass northern Stargazer spiny basslet mola. South American darter brook lamprey marblefish blacktip reef shark.',
      logoWidthRem: 4,
      logoFilter: 'black',
    },
  ],
})

const getLogoClasses = (product: Product): string => {
  const base = 'transition duration-300 filter'
  const size = product.logoWidthRem
    ? `w-[${product.logoWidthRem}rem]`
    : 'w-16'
  const initial = product.logoFilter === 'black' ? 'brightness-0' : ''
  const hover = product.logoFilter === 'black' ? 'group-hover:invert' : ''
  return [base, size, initial, hover].join(' ')
}

// Mobile carousel auto-play
const mobileCarouselApi = ref<CarouselApi>()
let autoplayTimer: number | undefined

const onMobileCarouselInit = (api: CarouselApi) => {
  mobileCarouselApi.value = api
}

onMounted(() => {
  autoplayTimer = window.setInterval(() => {
    mobileCarouselApi.value?.scrollNext()
  }, 2500)
})

onUnmounted(() => {
  if (autoplayTimer) window.clearInterval(autoplayTimer)
})
</script>

<template>
  <section class="text-zinc-500 bg-stone-50 text-lg py-24 sm:py-24">
    <!-- Header -->
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
      <div class="pb-16 sm:pb-6 font-bold">
        <div class="text-indigo-900 flex items-center">
          <i class="inline-block w-8 h-0.5 mr-6 bg-indigo-900"></i>
          {{ sectionLabel }}
        </div>
        <h4 class="text-zinc-800 text-[2.50rem] leading-none mt-5" v-html="sectionTitle" />
      </div>
    </div>

    <!-- Mobile carousel -->
    <div class="block sm:hidden w-full mx-auto px-0 mt-8">
      <Carousel :opts="{ align: 'start', loop: true }" @init-api="onMobileCarouselInit" class="w-full">
        <CarouselContent>
          <CarouselItem v-for="product in products" :key="product.id" class="basis-full">
            <Card class="group relative w-full border-0 shadow-none rounded-none overflow-hidden p-0 gap-0 bg-transparent">
              <a :href="product.link" class="block relative h-[20rem] w-full max-w-[20rem] mx-auto">
                <div class="absolute inset-0 bg-center bg-cover transition-transform duration-300 group-hover:scale-105" :style="{ backgroundImage: `url('${product.image}')` }" />
                <!-- Closed panels on mobile to hide image initially -->
                <div class="absolute inset-x-0 top-0 h-1/2 bg-white"></div>
                <div class="absolute inset-x-0 bottom-0 h-1/2 bg-white"></div>
                <div class="absolute inset-0 z-20 flex flex-col items-center justify-center transition-colors duration-300 bg-transparent">
                  <img :src="product.logo" :class="getLogoClasses(product)" alt="" />
                </div>
              </a>
            </Card>
          </CarouselItem>
        </CarouselContent>
      </Carousel>
    </div>

    <!-- Products grid (tablet/desktop) -->
    <div class="hidden sm:block w-full mx-auto px-4 mt-12">
      <div class="border-l-2 border-gray-100 text-indigo-900">
        <div class="flex flex-wrap w-full">
          <Card
            v-for="(product, idx) in products"
            :key="product.id"
            class="group relative w-full sm:w-1/2 lg:w-1/4 border-0 shadow-none rounded-none overflow-hidden p-0 gap-0 bg-transparent"
          >
            <a :href="product.link" class="block relative h-[20rem] md:h-[24rem] xl:h-[40.63rem] border-r-2 border-gray-100">
              <!-- Background image layer -->
              <div
                class="absolute inset-0 bg-center bg-cover transition-transform duration-300 group-hover:scale-105"
                :style="{ backgroundImage: `url('${product.image}')` }"
              ></div>

              <!-- Top/Bottom white panels that reveal on hover -->
              <div class="absolute inset-x-0 top-0 h-1/2 bg-white origin-top transition-transform duration-500 group-hover:scale-y-0"></div>
              <div class="absolute inset-x-0 bottom-0 h-1/2 bg-white origin-bottom transition-transform duration-500 group-hover:scale-y-0"></div>

              <!-- Unified overlay: logo + description centered -->
              <div class="pointer-events-none absolute inset-0 z-20 flex flex-col items-center justify-center transition-colors duration-300 bg-transparent group-hover:bg-black/50">
                <img :src="product.logo" :class="getLogoClasses(product)" alt="" />
                <p class="hidden group-hover:block text-white text-center text-[17px] leading-relaxed px-8 mt-4">
                  {{ product.description }}
                </p>
              </div>
            </a>
          </Card>
        </div>
      </div>
    </div>
  </section>
</template>


