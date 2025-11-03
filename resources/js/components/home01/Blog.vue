<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Card, CardContent } from '@/components/ui/card'
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselPrevious,
  CarouselNext,
  type CarouselApi,
} from '@/components/ui/carousel'
import { ref } from 'vue'

type BlogPost = {
  id: number
  link: string
  image: string
  date: string
  title: string
}

interface Props {
  subheading?: string
  heading?: string
  ctaText?: string
  ctaHref?: string
  blogPosts?: BlogPost[]
}

const props = withDefaults(defineProps<Props>(), {
  subheading: 'Blog',
  heading: 'News & Insights',
  ctaText: 'MORE ARTICLES',
  ctaHref: 'https://quadrone.ninetheme.com/contact',
  blogPosts: () => [
    {
      id: 1,
      link: 'https://quadrone.ninetheme.com/quadron-forum-data-review-in-2018/',
      image: '/assets/slider-01.jpg',
      date: "27 Nov' 19",
      title: 'We launch a new Precision Agriculture ptoject',
    },
    {
      id: 2,
      link: 'https://quadrone.ninetheme.com/we-launch-a-new-precision-agriculture-project/',
      image: '/assets/slider-02.jpg',
      date: "27 Nov' 19",
      title: 'Quadrone Announces Pricing And Availability of Multilink',
    },
    {
      id: 3,
      link: 'https://quadrone.ninetheme.com/quadrone-announces-pricing-and-availability-of-multilink/',
      image: '/assets/slider-03.jpg',
      date: "27 Nov' 19",
      title: 'Artificial Intelligence applied to Precision Agriculture',
    },
    {
      id: 4,
      link: 'https://quadrone.ninetheme.com/artificial-intelligence-applied-to-precision-agriculture/',
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03-323x471.jpg',
      date: "27 Nov' 19",
      title: 'Artificial Intelligence applied to Precision Agriculture',
    },
  ],
})

const carouselApi = ref<CarouselApi>()

const onCarouselInit = (api: CarouselApi) => {
  carouselApi.value = api
}
</script>

<template>
  <section
    class="bg-gray-100 text-zinc-500 font-black text-lg leading-7 overflow-x-hidden pb-8"
    style="background-position: 50% 0%"
  >
    <!-- Section Wrapper -->
    <div class="relative w-full">
      <!-- Content Container -->
      <div
        class="container mx-auto px-5 min-[791px]:pl-0 min-[791px]:pr-6 min-[1230px]:pl-0 min-[1230px]:pr-8 relative z-10"
      >
        <!-- Mobile-only vertical Gray line -->
        <div
          class="absolute top-0 bottom-0 left-4 sm:left-6 lg:left-8 w-[1px] bg-gray-300 sm:hidden"
        ></div>
        <div
          class="absolute inset-0 bg-[url('https://quadrone.ninetheme.com/wp-content/plugins/quadron-elementor-addons/assets/front/img/sectionbg_vertical_line.png')] bg-repeat-y bg-left-top -z-10 pointer-events-none"
        ></div>

        <!-- Header Section -->
        <div class="pb-10 min-[791px]:pb-6 pr-28 relative">
          <div class="text-indigo-900 font-black">
            <i class="bg-indigo-900 inline-block w-8 h-0.5 mr-6"></i>{{ subheading }}
          </div>
          <h3 class="text-zinc-800 font-black text-[2.5rem] leading-none mt-5 min-[791px]:mt-5">
            {{ heading }}
          </h3>

          <!-- Navigation Arrows - positioned in header but control carousel via API -->
          <div class="absolute right-0 top-[3.5rem] min-[1340px]:top-1/2 min-[1340px]:-translate-y-1/2 min-[1340px]:right-[-5%] min-[1600px]:right-[-7%] text-indigo-900 z-10">
            <button
              @click="carouselApi?.scrollPrev()"
              class="absolute bg-white cursor-pointer w-12 h-12 border-2 border-zinc-300 rounded-full hover:bg-indigo-900 hover:border-indigo-900 min-[1340px]:right-0 min-[1340px]:mt-1 group flex items-center justify-center transition-all duration-300"
              style="right: 5rem;"
            >
              <svg
                class="w-5 h-5 text-indigo-900 group-hover:text-white transition-colors duration-300 pr-1.5"
                viewBox="0 0 291.49 492"
                fill="currentColor"
              >
                <path
                  d="M198.608 246.104L382.664 62.04c5.068-5.056 7.856-11.816 7.856-19.024 0-7.212-2.788-13.968-7.856-19.032l-16.128-16.12C361.476 2.792 354.712 0 347.504 0s-13.964 2.792-19.028 7.864L109.328 227.008c-5.084 5.08-7.868 11.868-7.848 19.084-.02 7.248 2.76 14.028 7.848 19.112l218.944 218.932c5.064 5.072 11.82 7.864 19.032 7.864 7.208 0 13.964-2.792 19.032-7.864l16.124-16.12c10.492-10.492 10.492-27.572 0-38.06L198.608 246.104z"
                />
              </svg>
            </button>
            <button
              @click="carouselApi?.scrollNext()"
              class="absolute bg-white cursor-pointer w-12 h-12 border-2 border-zinc-300 rounded-full hover:bg-indigo-900 hover:border-indigo-900 min-[1340px]:right-0 min-[1340px]:-mt-14 group flex items-center justify-center transition-all duration-300"
              style="right: 0.875rem;"
            >
              <svg
                class="w-5 h-5 text-indigo-900 group-hover:text-white transition-colors duration-300 pr-1"
                viewBox="0 0 291.49 492"
                fill="currentColor"
              >
                <path
                  d="M382.678 226.804L163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z"
                />
              </svg>
            </button>
          </div>
        </div>

        <!-- Blog Posts Carousel -->
        <div class="relative">
          <Carousel
            :opts="{
              align: 'start',
              loop: false,
              slidesToScroll: 1,
            }"
            @init-api="onCarouselInit"
            class="w-full relative"
          >

            <div class="cursor-grab  text-indigo-900 overflow-hidden">
              <CarouselContent class="-ml-3.5">
              <CarouselItem
                v-for="post in blogPosts"
                :key="post.id"
                class="pl-3.5 basis-full max-[640px]:basis-full max-[790px]:basis-1/2 min-[791px]:basis-1/3"
              >
                <Card class="group border-0 shadow-none p-0 bg-transparent overflow-hidden">
                  <a :href="post.link" class="block">
                    <CardContent class="p-0 relative">
                      <div class="relative inline-block mt-6 mb-3 overflow-hidden bg-gray-100 transition-transform duration-300 hover:-translate-y-1 w-80 max-w-full max-[790px]:max-w-[18rem] max-[790px]:mx-auto max-[640px]:max-w-[20rem]">
                        <figure class="cursor-pointer m-0 relative overflow-hidden">
                          <img
                            :src="post.image"
                            :alt="post.title"
                            class="w-80 max-w-full transition-transform duration-300 group-hover:scale-105 max-[790px]:w-full"
                          />
                          <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col items-end justify-end p-8 font-black bg-[linear-gradient(to_bottom,rgba(255,255,255,0)_0%,white_90%)] group-hover:bg-gradient-to-t group-hover:from-indigo-900/90 group-hover:to-transparent transition-all duration-300"
                          >
                            <div
                              class="w-full text-zinc-500 group-hover:text-white transition-colors duration-300"
                            >
                              {{ post.date }}
                            </div>
                            <h4
                              class="w-full text-zinc-800 group-hover:text-white text-[1.625rem] leading-8 mt-3 mb-2 transition-colors duration-300"
                            >
                              {{ post.title }}
                            </h4>
                          </div>
                        </figure>
                      </div>
                    </CardContent>
                  </a>
                </Card>
              </CarouselItem>
            </CarouselContent>
            </div>
          </Carousel>
        </div>

        <!-- More Articles Button -->
        <div class="text-center mt-9 min-[576px]:mt-12 text-indigo-900 font-black">
          <Button
            as-child
            variant="ghost"
            class="text-indigo-900 content-center items-center font-black justify-start inline-flex mt-5 min-[791px]:mt-5 min-[1025px]:mt-7 min-[1230px]:mt-10 p-0 hover:bg-transparent group"
          >
            <a :href="ctaHref">
              <span
                class="content-center items-center cursor-pointer justify-center pr-1 inline-flex w-12 h-12 min-w-[3.13rem] min-h-[3.13rem] mr-3.5 border-2 border-zinc-300 rounded-full group-hover:bg-indigo-900 transition-all duration-300"
              >
                <svg
                  class="w-5 h-5 text-indigo-900 group-hover:text-white transition-colors duration-300"
                  viewBox="0 0 291.49 492"
                  fill="currentColor"
                >
                  <path
                    d="M382.678 226.804L163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z"
                  />
                </svg>
              </span>
              <span class="cursor-pointer">{{ ctaText }}</span>
            </a>
          </Button>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
</style>
