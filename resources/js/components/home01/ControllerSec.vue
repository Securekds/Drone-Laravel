<script setup lang="ts">
import { Button } from '@/components/ui/button'

type Feature = {
  id: number
  icon: string
  label: string
  value: string
}

interface Props {
  subheading?: string
  heading?: string
  description?: string
  ctaText?: string
  ctaHref?: string
  features?: Feature[]
}

const props = withDefaults(defineProps<Props>(), {
  subheading: 'Alpin White',
  heading: 'Quadron Controller<br class="hidden min-[791px]:inline" /> Combo Copter',
  description:
    'Threadsail yellowfin surgeonfish river shark sawtooth eel golden trout sand tiger. Canary rockfish anchovy clingfish, Dragon goby plunderfish killifish flounder bluntnose minnow cuckoo wrasse? Triggerfish panga goatfish zander spearfish longfin smelt, false brotula Rattail cherry salmon.',
  ctaText: 'DISCOVER',
  ctaHref: 'https://quadrone.ninetheme.com/contact',
  features: () => [
    {
      id: 1,
      icon: '/images/features/flight-time.svg',
      label: 'Flight time',
      value: '16 min',
    },
    {
      id: 2,
      icon: '/images/features/transmission-distance.svg',
      label: 'Transmission Distance',
      value: '1.2 ml (2 km)',
    },
    {
      id: 3,
      icon: '/images/features/effective-pixels.svg',
      label: 'Effective Pixels',
      value: '12 mp',
    },
    {
      id: 4,
      icon: '/images/features/vps-range.svg',
      label: 'VPS range',
      value: '30 m',
    },
  ],
})
</script>

<template>
  <section
    class="bg-gray-100 text-zinc-500 font-black text-lg leading-7 overflow-x-hidden"
  >
    <!-- Section Wrapper -->
    <div class="relative w-full">
      <!-- Content Container -->
<div class="container mx-auto px-0 min-[791px]:pl-0 min-[791px]:pr-6 min-[1230px]:pl-0 min-[1230px]:pr-8 relative z-10 py-24 min-[576px]:py-36 min-[1025px]:py-36">
        <!-- Mobile-only vertical Gray line -->
      
        <div
          class="absolute inset-0 bg-[url('https://quadrone.ninetheme.com/wp-content/plugins/quadron-elementor-addons/assets/front/img/sectionbg_vertical_line.png')] bg-repeat-y bg-left-top -z-10 pointer-events-none"
        ></div>

        <!-- Content Wrapper -->
        <div class="w-full min-[992px]:max-w-[83.3333%] min-[992px]:ml-64 min-[1025px]:pl-3.5 min-[1025px]:pr-3.5 min-[1200px]:max-w-[66.6667%] min-[1200px]:ml-[33.3333%] min-[1230px]:max-w-[66.6667%] min-[1230px]:ml-[33.3333%]">
          <!-- Content Card -->
          <div
            class="bg-white relative pt-24 pb-24 min-[576px]:pb-32 px-6 min-[791px]:px-6 min-[1025px]:-ml-5 min-[1025px]:pr-3.5 min-[1025px]:pl-80 min-[1025px]:pt-24 min-[1025px]:pb-24"
          >
            <!-- Background Image -->
            <div
              class="hidden min-[1025px]:block absolute left-[-15rem] min-[1200px]:left-[-18rem] min-[1230px]:left-[-20rem] top-1/2 -translate-y-1/2 w-full max-w-[500px] min-[1200px]:max-w-[550px] min-[1230px]:max-w-[600px] z-[1]"
            >
              <img
                src="https://quadrone.ninetheme.com/wp-content/uploads/2019/11/index_img_01.png"
                alt="Quadron Controller Combo Copter"
                class="w-full h-auto block"
              />
            </div>

            <!-- Header Section -->
            <div class="pb-6 font-black relative z-[2]">
              <div class="text-indigo-900 font-black">
                <i class="bg-indigo-900 inline-block w-8 h-0.5 mr-6"></i>{{ subheading }}
              </div>
              <h4
                class="text-zinc-800 font-black text-[1.7rem] sm:text-[2.5rem]  leading-none mt-7 min-[791px]:mt-5"
                v-html="heading"
              ></h4>
            </div>

            <!-- Description -->
            <p class="text-zinc-500 font-black relative z-[2]">
              {{ description }}
            </p>

            <!-- Mobile Image - shown only on mobile -->
            <div class="block min-[1025px]:hidden my-8 relative z-[2]">
              <img
                src="https://quadrone.ninetheme.com/wp-content/uploads/2019/11/index_img_01.png"
                alt="Quadron Controller Combo Copter"
                class="w-full h-auto block"
              />
            </div>

            <!-- Features List -->
            <ul
              class="flex flex-wrap items-start justify-start list-none mt-3 -ml-10 min-[576px]:-ml-10 min-[791px]:-ml-8 min-[1025px]:-ml-10 relative z-[2]"
            >
              <li
                v-for="feature in features"
                :key="feature.id"
                class="flex items-start justify-start w-full min-[576px]:w-[calc(50%-40px)] min-[791px]:w-[calc(25%-40px)] min-[791px]:ml-8 min-[1025px]:w-[calc(50%-40px)] min-[1025px]:ml-10 mt-8 ml-10"
              >
                <img
                  :src="feature.icon"
                  :alt="feature.label"
                  class="w-12 h-12 mr-5 flex-shrink-0"
                />
                <div class="flex flex-col pt-1">
                  <span class="text-indigo-900 font-black text-base leading-6">{{
                    feature.label
                  }}</span>
                  <span
                    class="text-zinc-800 font-black text-xl leading-7 min-w-[6.69rem] mt-1.5"
                    >{{ feature.value }}</span
                  >
                </div>
              </li>
            </ul>

            <!-- Discover Link -->
            <div class="mt-9 min-[576px]:mt-12 text-indigo-900 font-black relative z-[2]">
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
                      viewBox="0 0 24 24"
                      fill="currentColor"
                    >
                      <path
                        d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"
                      />
                    </svg>
                  </span>
                  <span class="cursor-pointer">{{ ctaText }}</span>
                </a>
              </Button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
</style>

