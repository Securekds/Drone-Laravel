<script setup lang="ts">
import { Icon } from '@iconify/vue'
import { defineProps } from 'vue'

const props = defineProps({
  achievementsHeading: {
    type: String,
    default: 'Achievements',
  },
  achievementsTitle: {
    type: String,
    default: 'Quadron Progress',
  },
  achievements: {
    type: Array,
    default: () => [
      {
        id: 1,
        label: 'Delivery Packages',
        value: '6,500',
        suffix: ' m',
        description:
          'Gianttail tailor prickleback stickleback Atlantic cod boxfish deepwater flathead dottyback kokanee mouthbrooder alewife',
      },
      {
        id: 2,
        label: 'Satisfied',
        value: '784',
        suffix: ' clients',
        description:
          'Jewel tetra nase; mahi-mahi barracuda wasp fish dhufish torpedo flagtail tilefish jackfish barbeled dragonfish megamouth',
      },
      {
        id: 3,
        label: 'Covered',
        value: '57',
        suffix: ' countries',
        description:
          'Round whitefish flat loach goldspotted killifish ronquil. Long-finned pike escolar northern squawfish eel, Australian',
      },
    ],
  }
})
</script>


<style scoped>
</style>


<template>
  <section class="text-zinc-500 text-lg overflow-x-hidden">
    <div class="relative w-full">
<div class="container mx-auto pr-4 sm:pr-6 lg:pr-8 pl-0 sm:pl-6 lg:pl-0 relative z-10 pt-24 min-[576px]:pt-36 min-[1025px]:pt-36">
        <!-- Vertical Lines Background -->
        <div
          class="absolute inset-0 bg-[url('https://quadrone.ninetheme.com/wp-content/plugins/quadron-elementor-addons/assets/front/img/sectionbg_vertical_line.png')] bg-repeat-y bg-left-top -z-10 pointer-events-none"
        ></div>
                 <!-- Mobile-only vertical Gray line -->
                  <div class="absolute top-0 bottom-0 left-4 sm:left-6 lg:left-8 w-[1px] bg-gray-300 sm:hidden"></div>
      <div
        class="absolute inset-0 bg-[url('https://quadrone.ninetheme.com/wp-content/plugins/quadron-elementor-addons/assets/front/img/sectionbg_vertical_line.png')] bg-repeat-y bg-left-top -z-10 pointer-events-none"
      ></div>
        <div class="w-full overflow-hidden" id="div-1">
      <div class="flex flex-col md:flex-row flex-wrap  md:-m-3.5">

        <!-- Text Content Section - FIRST on mobile, RIGHT on desktop -->
<div class="w-full md:basis-7/12 pl-0 md:px-4 md:max-w-[58.3333%] min-[1200px]:max-w-[58.3333%] min-[791px]:max-w-[58.3333%] min-[1230px]:max-w-[58.3333%] md:order-2">
          <div class="px-4 max-w-[43.56rem] min-[576px]:pl-8 min-[1025px]:pr-8 min-[1230px]:pr-16 flex flex-col justify-center min-h-[500px]">
            <div class="pb-6 font-bold min-[791px]:pb-6">
              <div class="text-indigo-900">
                <i class="bg-indigo-900 inline-block w-8 h-0.5 mr-6"></i>About
              </div>
            <h4 class="text-zinc-800 text-[1.7rem] min-[791px]:text-[2.50rem] leading-none mt-5">
  We are Quadron Company
</h4>

            </div>
            <p>Armored searobin midshipman forehead brooder Colorado squawfish betta tope. Electric stargazer angelfish Alaska blackfish Blacksmelt flagblenny knifejaw.</p>
            <p class="mt-3">Alligatorfish mud catfish peamouth. Desert pupfish Black scalyfin porbeagle shark boafish icefish New World rivuline. Cavefish milkfish threadfin nase barred danio: Black prickleback zebra shark, "thorny catfish ballan wrasse South American Lungfish.</p>
            <div class="mt-9 text-indigo-900 font-bold min-[576px]:mt-12">
              <a href="https://quadrone.ninetheme.com/contact" class="text-indigo-900 content-center items-center text-base font-bold justify-start inline-flex mt-5 min-[791px]:mt-5 min-[1025px]:mt-7 min-[1230px]:mt-10 group">
                <i class="content-center items-center cursor-pointer justify-center pr-1 flex w-12 h-12 min-w-[3.13rem] min-h-[3.13rem] mr-3.5 border-2 border-zinc-300 border-solid rounded-full group-hover:bg-indigo-900 transition-all duration-300">
                  <Icon icon="mdi:arrow-right" class="w-5 h-5 text-indigo-900 group-hover:text-white transition-colors duration-300" />
                </i>
                <span class="cursor-pointer">MORE ABOUT</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Image Section - SECOND on mobile, LEFT on desktop -->
        <div class="w-full md:basis-[41.6667%] px-4 relative text-indigo-900 md:max-w-[41.6667%] min-[1200px]:max-w-[41.6667%] min-[791px]:max-w-[41.6667%] min-[1230px]:max-w-[41.6667%] md:order-1 mt-8 md:mt-0">
          <a
            href="https://quadrone.ninetheme.com/#"
            class="relative min-[791px]:mr-6 group block"
          >
            <div class="cursor-pointer overflow-hidden relative">
              <img
                src="https://quadrone.ninetheme.com/wp-content/uploads/2019/11/promo_img_01.jpg"
                class="w-full h-auto max-w-full transition-transform duration-300 ease-in-out group-hover:scale-105"
                alt="Creative Quadron Training Team"
              />

              <!-- Centered content -->
              <div
                class="absolute inset-0 flex flex-col items-center justify-center text-center p-1.5 font-bold"
              >
                <div class="text-white text-[3.13rem] leading-none">
                  Creative Quadron <br />Training Team
                </div>

                <div
                  class="text-slate-500 inline-block mt-7 min-[576px]:mt-10 relative"
                >
                  <span class="relative z-10">MORE ABOUT TRAINING</span>
                  <span
                    class="block h-px bg-slate-500 transition-[width] duration-300 ease-in-out w-full group-hover:w-0"
                  ></span>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      
      <!-- Achievements Section -->
      <div class="w-full py-24 min-[576px]:py-36">
        <!-- Header -->
        <div class="w-full font-bold pl-8 pb-6 min-[791px]:pb-6">
          <div class="text-indigo-900">
            <i class="bg-indigo-900 inline-block w-8 h-0.5 mr-6"></i>{{ achievementsHeading }}
          </div>
<h4 class="text-zinc-800 text-[2rem] min-[791px]:text-[2.50rem] leading-none mt-5">{{ achievementsTitle }}</h4>
        </div>

        <!-- Stats -->
        <div class="flex flex-col md:flex-row md:flex-nowrap -mt-5">
          <div
            v-for="item in achievements"
            :key="item.id || item.label"
            class="w-full md:flex-1 mt-12 p-4 first:p-3.5"
          >
            <div class="text-indigo-900 font-bold">{{ item.label }}</div>
            <div class="text-zinc-800 text-[2.50rem] leading-none font-bold mt-1.5 -ml-1 min-[1025px]:mt-1.5">
           <span class="text-[4.5rem] min-[791px]:text-[5.63rem] leading-none">{{ item.value }}</span>
<span v-if="item.suffix" class="leading-none">{{ item.suffix }}</span>


            </div>
            <p class="max-w-[16.88rem] mt-3.5 min-[1025px]:mt-3">{{ item.description }}</p>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
  </section>
</template>