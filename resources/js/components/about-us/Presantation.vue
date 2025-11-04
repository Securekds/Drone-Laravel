<script setup lang="ts">
interface StatItem {
  id: number
  label: string
  numbers: string
  unit?: string
  description: string
}

interface Props {
  sectionLabel?: string
  sectionTitle?: string
  highlight?: string
  paragraphs?: string[]
  brandText?: string
  imageUrl?: string
  stats?: StatItem[]
}

const props = withDefaults(defineProps<Props>(), {
  sectionLabel: 'About',
  sectionTitle: 'Who we are',
  highlight:
    'Port Jackson shark. Beluga sturgeon handfish needlefish titan triggerfish, powen dorado porbeagle shark Blind shark.',
  paragraphs: () => [
    'Wels catfish, boarfish titan triggerfish orangestriped triggerfish dwarf gourami sweeper yellow weaver. Mustache triggerfish. Menhaden temperate ocean-bass North American darter scythe butterfish. Luminous hake, Indian mul pike Siamese fighting fish, weeverfish gulper, flagtail. Sargassum fish lenok Blind shark arowana Pacific saury mudsucker.',
    'Blue gourami trout cod Black angelfish bass knifefish brook lamprey. Grunt sleeper Black mackerel harelip sucker snook.',
  ],
  brandText: 'Quadron.',
  imageUrl:
    'https://quadrone.ninetheme.com/wp-content/plugins/quadron-elementor-addons/assets/front/img/videolink_img01.jpg',
  stats: () => [
    {
      id: 1,
      label: 'Delivery Packages',
      numbers: '6,500',
      unit: ' m',
      description:
        'Duis aute irure dolor in reprehenderi voluptate velit esse cillum dolore eu fugiat nulla',
    },
    {
      id: 2,
      label: 'Satisfied',
      numbers: '700',
      unit: ' clients',
      description:
        'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.',
    },
    {
      id: 3,
      label: 'Covered',
      numbers: '57',
      unit: ' countries',
      description:
        'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.',
    },
  ],
})

const handlePlay = () => {
  // Hook for video play – customize as needed
  window.open('https://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE', '_blank')
}
</script>

<template>
  <section class="w-full bg-gray-100 text-zinc-500 font-roboto">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <!-- Two-column content -->
      <div class="w-full flex flex-wrap min-h-[28rem]">
      <!-- Left: Text -->
      <div class="w-full md:w-1/2 py-10 md:pt-[175px]">
        <div class="pb-6 font-bold">
          <div class="text-indigo-900 flex items-center">
            <i class="inline-block w-8 h-0.5 mr-6 bg-indigo-900"></i>
            {{ sectionLabel }}
          </div>
          <h4 class="text-zinc-800 text-[2.5rem] leading-none mt-5">{{ sectionTitle }}</h4>
        </div>

        <strong class="text-indigo-900 block">{{ highlight }}</strong>

        <p class="mt-3 leading-relaxed" v-for="(p, i) in paragraphs" :key="i">{{ p }}</p>

       <p class="mt-3 text-[3rem] sm:text-[5rem] md:text-[7rem] lg:text-[9.38rem] leading-none font-bold text-indigo-900">
  <span class="block">{{ brandText }}</span>
</p>

      </div>

 <!-- Right: Image with play -->
      <!-- Right: Image with play -->
<div class="w-full md:w-1/2 p-6 md:p-10 h-[300px] md:h-[600px]">


        <div
          class="w-full h-full bg-center bg-cover bg-no-repeat relative flex items-center justify-center rounded-none"
          :style="{ backgroundImage: `url('${imageUrl}')` }"
        >
          <button
            class="w-16 h-16 sm:w-20 sm:h-20 bg-white/90 rounded-full flex items-center justify-center text-indigo-900 shadow-lg hover:shadow-xl hover:bg-white transition-all duration-200"
            aria-label="Play video"
            @click="handlePlay"
          >
            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 5v14l11-7z" />
            </svg>
          </button>
        </div>
      </div>
      </div>

      <!-- Stats -->
      <div class="w-full py-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 items-start">
      <div
        v-for="item in stats"
        :key="item.id"
        class="text-lg"
      >
        <div class="text-indigo-900 font-bold text-[1.125rem]">{{ item.label }}</div>
       <div class="text-zinc-800 font-bold leading-none mt-1.5 -ml-1 text-[1.8rem] sm:text-[2.5rem]">
  <span class="text-[3.5rem] sm:text-[5.63rem] leading-none align-baseline">{{ item.numbers }}</span>
  <span class="align-baseline">{{ item.unit }}</span>
</div>

        <p class="mt-3 text-zinc-500 max-w-[16.88rem] leading-relaxed">{{ item.description }}</p>
      </div>
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


