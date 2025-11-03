<script setup lang="ts">
import { Button } from '@/components/ui/button'

type ProcessStep = {
  id: number
  number: string
  description: string
}

interface Props {
  subheading?: string
  heading?: string
  ctaText?: string
  ctaHref?: string
  processSteps?: ProcessStep[]
}

const props = withDefaults(defineProps<Props>(), {
  subheading: 'How we work',
  heading: 'Creative Work<br class="hidden min-[791px]:inline" /> with Corporate Clients',
  ctaText: 'DISCOVER',
  ctaHref: 'https://quadrone.ninetheme.com/contact',
  processSteps: () => [
    { id: 1, number: '01', description: 'Identify a core business problem.' },
    { id: 2, number: '02', description: 'Arrive to a technical solution.' },
    { id: 3, number: '03', description: 'Consectetur adipisicing' },
    { id: 4, number: '04', description: 'Connection with Customer Services' },
    { id: 5, number: '05', description: 'Prepare Documentation' },
    { id: 6, number: '06', description: 'Close Project Process' },
  ],
})
</script>

<template>
  <section
    class="bg-gray-100 text-zinc-500 font-black text-lg leading-7 overflow-x-hidden pt-24 min-[576px]:pt-36 min-[1025px]:pt-36"
    style="background-position: 50% 0%"
  >
    <!-- Section Wrapper -->
    <div class="relative w-full">
      <!-- Content Container -->
      <div
class="container mx-auto px-5 min-[791px]:pl-0 min-[791px]:pr-6 min-[1230px]:pl-0 min-[1230px]:pr-8 relative z-10 pb-24 min-[576px]:pb-36 min-[1025px]:pb-36"
      >
        <!-- Mobile-only vertical Gray line -->
        <div
          class="absolute top-0 bottom-0 left-4 sm:left-6 lg:left-8 w-[1px] bg-gray-300 sm:hidden"
        ></div>
        <div
          class="absolute inset-0 bg-[url('https://quadrone.ninetheme.com/wp-content/plugins/quadron-elementor-addons/assets/front/img/sectionbg_vertical_line.png')] bg-repeat-y bg-left-top -z-10 pointer-events-none"
        ></div>

        <!-- Header Section -->
        <div class="pb-11 min-[791px]:pb-6">
          <div class="text-indigo-900 font-black">
            <i class="bg-indigo-900 inline-block w-8 h-0.5 mr-6"></i>{{ subheading }}
          </div>
          <h4
            class="text-zinc-800 font-black text-[1.9rem] sm:text-[2.5rem]  leading-none mt-5"
            v-html="heading"
          ></h4>
        </div>

        <!-- Process Grid -->
        <div class="flex flex-wrap -m-3.5">
          <div
            v-for="step in processSteps"
            :key="step.id"
            class="w-1/2 min-[768px]:w-1/3 min-[1200px]:w-1/6 px-4"
          >
            <div class="mt-11">
              <div class="text-indigo-900 font-black text-[1.625rem] leading-8">
                {{ step.number }}<span class="text-[1.125rem] leading-7">/06</span>
              </div>
              <div class="text-zinc-800 font-black mt-3.5">{{ step.description }}</div>
            </div>
          </div>
        </div>

        <!-- Discover Link -->
        <div class="mt-9 min-[576px]:mt-12 text-indigo-900 font-black">
          <Button
            as-child
            variant="ghost"
            class="text-indigo-900 content-center items-center font-black justify-start inline-flex p-0 hover:bg-transparent group"
          >
            <a :href="ctaHref">
              <span
                class="content-center items-center cursor-pointer justify-center pr-1 inline-flex w-12 h-12 min-w-[3.125rem] min-h-[3.125rem] mr-3.5 border-2 border-zinc-300 rounded-full group-hover:bg-indigo-900 transition-all duration-300"
              >
                <svg
                  class="w-3 h-3 text-indigo-900 group-hover:text-white transition-colors duration-300"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                >
                  <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z" />
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

