<script setup lang="ts">
import { Card } from '@/components/ui/card'
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselPrevious,
  CarouselNext,
} from '@/components/ui/carousel'

type Award = {
  id: number
  image: string
  year: string
  title: string
}

interface Props {
  sectionLabel?: string
  sectionTitle?: string
  awards?: Award[]
}

const props = withDefaults(defineProps<Props>(), {
  sectionLabel: 'Awards',
  sectionTitle: 'Our progress',
  awards: () => [
    {
      id: 1,
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/award_img_02-1.png',
      year: '2016',
      title: 'Disruption',
    },
    {
      id: 2,
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/award_img_03-1.png',
      year: '2017',
      title: 'Quadron 4000',
    },
    {
      id: 3,
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/award_img_04-1.png',
      year: '2019',
      title: '99d Award',
    },
    {
      id: 4,
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/award_img_03-1.png',
      year: '2019',
      title: 'Quadron 4000',
    },
    {
      id: 5,
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/award_img_01-1.png',
      year: '2016',
      title: 'Aloha creatic',
    },
    {
      id: 6,
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/award_img_02-1.png',
      year: '2016',
      title: 'Disruption',
    },
    {
      id: 7,
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/award_img_03-1.png',
      year: '2017',
      title: 'Quadron 4000',
    },
    {
      id: 8,
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/award_img_04-1.png',
      year: '2019',
      title: '99d Award',
    },
  ],
})
</script>

<template>
  <section class="w-full text-zinc-500 font-bold mt-24 mb-24 font-roboto">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <!-- Header -->
      <div class="pb-11 sm:pb-6">
        <div class="text-indigo-900 flex items-center">
          <i class="inline-block w-8 h-0.5 mr-6 bg-indigo-900"></i>
          {{ sectionLabel }}
        </div>
        <h3 class="text-zinc-800 text-[2.50rem] leading-none mt-5 font-bold">{{ sectionTitle }}</h3>
      </div>

      <!-- Carousel -->
      <div class="relative -mx-3.5">
        <Carousel
          :opts="{
            align: 'start',
            loop: true,
            slidesToScroll: 1,
          }"
          class="w-full"
        >
          <CarouselContent class="-ml-2 md:-ml-4">
            <CarouselItem
              v-for="award in awards"
              :key="award.id"
              class="pl-2 md:pl-4 basis-full sm:basis-1/2 md:basis-1/3 lg:basis-1/4"
            >
              <Card class="border-0 shadow-none p-0">
                <a href="https://quadrone.ninetheme.com/about-us" class="block">
                  <div class="cursor-pointer text-center px-4 sm:px-0">
                    <img
                      :src="award.image"
                      :alt="award.title"
                      class="w-full max-w-[14rem] sm:max-w-[12rem] md:max-w-[16rem] h-auto mx-auto border-[6px] sm:border-8 border-indigo-900 transition-transform duration-300 hover:scale-105"
                    />
                  </div>
                  <div class="cursor-pointer text-center mt-8 font-bold">
                    <div class="text-indigo-900 text-[1.125rem]">{{ award.year }}</div>
                    <h4 class="text-zinc-800 text-[1.25rem] sm:text-[1.63rem] leading-8 inline-block mt-1.5">
                      {{ award.title }}
                    </h4>
                  </div>
                </a>
              </Card>
            </CarouselItem>
          </CarouselContent>

          <!-- Navigation Buttons -->
          <CarouselPrevious
            class="absolute left-2 sm:left-0 min-[1340px]:-left-[4%] min-[1470px]:-left-[7%] min-[1600px]:-left-[9.38rem] top-[120px] -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 border-2 border-gray-300 rounded-full bg-white hover:bg-gray-50 hover:border-indigo-900 transition-all duration-200"
          />
          <CarouselNext
            class="absolute right-2 sm:right-0 min-[1340px]:-right-[4%] min-[1470px]:-right-[7%] min-[1600px]:-right-[9.38rem] top-[120px] -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 border-2 border-gray-300 rounded-full bg-white hover:bg-gray-50 hover:border-indigo-900 transition-all duration-200"
          />
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

