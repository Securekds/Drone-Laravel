<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Card, CardContent } from '@/components/ui/card'

type ServiceItem = {
  id: number
  number: string
  title: string
  href: string
  image: string
}

interface Props {
  heading?: string
  subheading?: string
  description?: string
  ctaText?: string
  ctaHref?: string
  services?: ServiceItem[]
}

const props = withDefaults(defineProps<Props>(), {
  heading: 'We Help you\nEmbrace the Future',
  subheading: 'Services',
  description:
    'Threadsail yellowfin surgeonfish river shark sawtooth eel golden trout sand tiger. Canary rockfish anchovy clingfish,Dragon goby plunderfish killifish flounder bluntnose minnow cuckoo wrasse? Triggerfish panga goatfish zander spearfish longfin smelt, false brotula Rattail cherry salmon.',
  ctaText: 'DISCOVER',
  ctaHref: 'https://quadrone.ninetheme.com/contact',
  services: () => [
    {
      id: 1,
      number: '01',
      title: 'Delivery',
      href: 'https://quadrone.ninetheme.com/contact',
      image: '/images/services/delivery.svg',
    },
    {
      id: 2,
      number: '02',
      title: 'News & Media',
      href: 'https://quadrone.ninetheme.com/contact',
      image: '/images/services/news-media.svg',
    },
    {
      id: 3,
      number: '03',
      title: 'Public Safety',
      href: 'https://quadrone.ninetheme.com/contact',
      image: '/images/services/public-safety.svg',
    },
    {
      id: 4,
      number: '04',
      title: 'Film Production',
      href: 'https://quadrone.ninetheme.com/contact',
      image: '/images/services/film.svg',
    },
    {
      id: 5,
      number: '05',
      title: 'Inspection',
      href: 'https://quadrone.ninetheme.com/contact',
      image: '/images/services/inspection.svg',
    },
    {
      id: 6,
      number: '06',
      title: 'Construction',
      href: 'https://quadrone.ninetheme.com/contact',
      image: '/images/services/construction.svg',
    },
  ],
})
</script>

<template>
  <section class="bg-gray-100 bg-[url('https://quadrone.ninetheme.com/wp-content/uploads/2019/11/sectionbg_wrapper-01.png')] bg-no-repeat overflow-x-hidden" style="background-position: 50% 0%;">
    <!-- Hero-like Section Wrapper to match Home1Slider -->
    <div class="relative w-full">
   
      <!-- Content Container -->
<div class="container mx-auto pr-4 sm:pr-6 lg:pr-8 pl-4 sm:pl-6 lg:pl-0 relative z-10 py-24 min-[576px]:pt-36 min-[576px]:pb-36 min-[1025px]:pt-56 min-[1025px]:pb-64">
          <!-- Mobile-only vertical Gray line -->
                  <div class="absolute top-0 bottom-0 left-4 sm:left-6 lg:left-8 w-[1px] bg-gray-300 sm:hidden"></div>
      <div
        class="absolute inset-0 bg-[url('https://quadrone.ninetheme.com/wp-content/plugins/quadron-elementor-addons/assets/front/img/sectionbg_vertical_line.png')] bg-repeat-y bg-left-top -z-10 pointer-events-none"
      ></div>
        <div class="content-start flex-wrap flex w-full">
          <div class="flex-col w-full" style="align-items: initial; justify-content: initial;">
            <div>
              <div class="w-full">
                <div class="px-0 w-full max-w-none">
                    <div class="flex flex-col lg:flex-row items-start gap-8 lg:gap-16">
                      <!-- Left: Heading -->
                      <div class="w-full lg:w-1/3 max-w-md pl-0">
                        <div class="pb-6 font-bold min-[791px]:pb-6">
                          <div class="text-indigo-900">
                            <i class="bg-indigo-900 inline-block w-8 h-0.5 mr-6"></i>{{ subheading }}
                          </div>
<h3
  class="text-zinc-800 text-[1.9rem] sm:text-[2.5rem] leading-none mt-5 min-[791px]:mt-5"
  v-html="heading.replace('\n','<br />')"
></h3>
                        </div>
                        <p class="text-gray-600 leading-relaxed mb-6 max-w-sm">
                          {{ description }}
                        </p>
                        <Button as-child variant="ghost" class="text-indigo-900 content-center items-center font-bold justify-start inline-flex mt-9 min-[576px]:mt-12 p-0 hover:bg-transparent group">
                          <a :href="ctaHref">
                            <span class="content-center items-center cursor-pointer justify-center pr-1 inline-flex w-12 h-12 min-w-[3.13rem] min-h-[3.13rem] mr-3.5 border-2 border-zinc-300 rounded-full group-hover:bg-indigo-900 transition-all duration-300">
                              <svg class="w-5 h-5 text-indigo-900 group-hover:text-white transition-colors duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                              </svg>
                            </span>
                            <span class="cursor-pointer">{{ ctaText }}</span>
                          </a>
                        </Button>
                      </div>

                      <!-- Right: Services Grid -->
                      <div class="w-full lg:w-2/3">
                        <ul class="content-center items-center flex flex-wrap justify-start list-none -mt-7">
                          <li
                            v-for="item in services"
                            :key="item.id"
                            class="list-item w-full mt-6 min-[576px]:w-1/2 min-[576px]:px-[2px]"
                          >
                            <Card class="group border-0 shadow-none p-0 bg-transparent inline-block w-auto align-top">
                              <a :href="item.href" class="content-center items-center justify-start flex group">
                                <CardContent class="p-0 flex items-center bg-transparent">
                                  <div
                                    class="bg-white content-center items-center cursor-pointer flex-wrap justify-center flex w-32 h-32 min-w-[8.31rem] min-[1025px]:w-48 min-[1025px]:min-w-[12.44rem] min-[1025px]:h-48 border-t-2 group-hover:border-t-[16px] transition-all duration-300 ease-in-out"
                                    style="border-top-color: rgb(46,49,146);"
                                  >
                                    <img :src="item.image" :alt="item.title" class="w-12 h-12 mt-1 min-[1025px]:w-16 min-[1025px]:h-16 object-contain" />
                                  </div>
                                  <div class="cursor-pointer mt-3 -ml-6 font-bold min-[1025px]:-ml-8">
                                    <span class="text-[rgb(46,49,146)] font-bold">{{ item.number }}</span>
                                    <h4 class="text-[1.63rem] leading-8 pb-7 mt-3 mb-2 text-zinc-800 font-bold group-hover:text-[rgb(46,49,146)] transition-colors duration-300" v-html="item.title.replace('\n','<br />')"></h4>
                                  </div>
                                </CardContent>
                              </a>
                            </Card>
                          </li>
                        </ul>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
</style>


