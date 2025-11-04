<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Icon } from '@iconify/vue'
// Define props interface
interface WhoWeAreProps {
  sectionLabel?: string;
  sectionTitle?: string;
  description?: string;
  moreText?: string;
  moreLink?: string;
  imageSrc?: string;
  imageAlt?: string;
  videoLink?: string;
}

// Define props with defaults
const props = withDefaults(defineProps<WhoWeAreProps>(), {
  sectionLabel: 'About',
  sectionTitle: 'Who we are',
  description: 'Manefish Billfish bluntnose minnow yellowfin grouper yellowtail amberjack emperor. Pelagic cod morid cod Raccoon butterfly fish whiptail gulper cuchia cow shark pollyfish. X-ray tetra, saury queen danio Ragfish Red whalefish lamprey poolfish combtooth blenny; jackfish',
  moreText: 'MORE',
  moreLink: 'https://quadrone.ninetheme.com/',
  imageSrc: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/videolink_img01.jpg',
  imageAlt: 'About Quadrone',
  videoLink: 'https://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE'
});

// Handle play video event
const handlePlayVideo = () => {
  // You can implement video play logic here
  console.log('Play video clicked');
  window.open(props.videoLink, '_blank');
};
</script>

<template>
  <section class="py-20 sm:py-28 lg:py-32 text-lg text-zinc-500 relative">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row-reverse items-center justify-between gap-10">

        <!-- Text Section -->
        <div class="w-full sm:w-1/2 flex flex-col justify-center">
          <div class="pb-6 font-bold">
            <div class="text-indigo-900 flex items-center">
              <i class="w-8 h-0.5 bg-indigo-900 mr-4"></i>
              <span>{{ sectionLabel }}</span>
            </div>
            <h4 class="text-zinc-800 text-4xl lg:text-[2.5rem] leading-tight mt-5">
              {{ sectionTitle }}
            </h4>
          </div>

          <p class="leading-relaxed">
            {{ description }}
          </p>

          <div class="mt-9 text-indigo-900 font-bold">
            <Button
              as-child
              variant="ghost"
              :class="[
                'group inline-flex items-center text-indigo-900 p-0 hover:bg-transparent'
              ]"
            >
              <a :href="moreLink" class="flex items-center no-underline">
                <span class="flex items-center justify-center w-12 h-12 min-w-[3.13rem] min-h-[3.13rem] mr-3.5 border-2 border-zinc-300 rounded-full transition-all duration-200 group-hover:bg-[#2e3192] group-hover:border-[#2e3192]">
                  <Icon icon="heroicons:arrow-right" class="w-3 h-3 text-indigo-900 group-hover:text-white transition-colors duration-200" />
                </span>
                <span class="text-[15px] tracking-[0.14em] relative top-[1px] group-hover:text-indigo-900">{{ moreText }}</span>
              </a>
            </Button>
          </div>
        </div>

        <!-- Image Section -->
        <div class="w-full sm:w-1/2 flex justify-center items-center min-h-[20rem]">
          <div class="relative">
            <a :href="videoLink">
              <img
                :src="imageSrc"
                :alt="imageAlt"
                class="cursor-pointer w-full sm:w-80 md:w-[28rem] lg:w-[32rem] h-auto"
              />
            </a>

            <button
              class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
                     w-16 h-16 sm:w-20 sm:h-20 bg-white rounded-full flex items-center justify-center
                     text-blue-900 shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-200"
              aria-label="Play video"
              @click="handlePlayVideo"
            >
              <svg
                class="w-6 h-6 sm:w-8 sm:h-8"
                viewBox="0 0 24 24"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path d="M8 5v14l11-7z" />
              </svg>
            </button>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>

