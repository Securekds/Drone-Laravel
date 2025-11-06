<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card'
import { Icon } from '@iconify/vue'

interface ProjectItem {
  id: number
  title: string
  image: string
  link: string
  category?: string
}

interface Props {
  projects?: ProjectItem[]
}

const props = withDefaults(defineProps<Props>(), {
  projects: () => [
    {
      id: 1,
      title: 'DJI Announces Pricing And Availability of Multilink',
      image: '/assets/presentation-projects-01-570x321.jpg',
      link: '*',
      category: 'Technology'
    },
    {
      id: 2,
      title: 'DJI Announces Pricing And Availability of Multilink',
      image: '/assets/videoblock_img_02-570x321.jpg',
      link: '*',
      category: 'Technology'
    },
    {
      id: 3,
      title: 'Checklist for Travel – What to take and how to take it',
      image: '/assets/videoblock_img_03-570x321.jpg',
      link: '*',
      category: 'Travel'
    },
    {
      id: 4,
      title: 'Skiing the Mendenhall Glacier',
      image: '/assets/videoblock_img_04-570x321.jpg',
      link: '*',
      category: 'Adventure'
    },
    {
      id: 5,
      title: '5 Cold Weather Drone Tips!',
      image: '/assets/videoblock_img_05-570x321.jpg',
      link: '*',
      category: 'Tips'
    },
    {
      id: 6,
      title: 'DJI OSMO Pocket Unbox, Setup and Overview',
      image: '/assets/videoblock_img_06-570x321.jpg',
      link: '*',
      category: 'Reviews'
    }
  ]
})
</script>

<template>
  <section class="text-zinc-500 text-lg pb-28 pt-24 min-[576px]:pt-36 min-[576px]:pb-40 min-[1025px]:pt-36 min-[1025px]:pb-40 font-roboto">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <div class="-mt-16 md:-mt-20">
        <div class="flex flex-wrap -m-3.5">
          <!-- Projects Grid -->
          <div class="w-full px-4 mt-16 md:mt-20">
            <div class="flex flex-wrap -m-3.5">
              <!-- Project Cards -->
              <div 
                v-for="project in projects"
                :key="project.id"
                class="w-full md:w-1/2 px-4 mt-10"
              >
                <Card class="border-0 shadow-none overflow-hidden group cursor-pointer bg-transparent hover:shadow-lg transition-all duration-300">
                  <CardContent class="p-0 relative">
                    <a :href="project.link" class="block">
                      <!-- Image Container -->
                      <div class="relative overflow-hidden min-h-[12rem] md:min-h-[16rem] lg:min-h-[20rem]">
                        <img 
                          :src="project.image" 
                          :alt="project.title"
                          class="w-full h-auto max-w-full transition-transform duration-300 group-hover:scale-105"
                        />

                        <!-- Center Play Button overlay -->
                        <div class="pointer-events-none absolute inset-0 flex items-center justify-center">
                          <div class="flex h-22 w-22 transform items-center justify-center rounded-full border-2 border-transparent bg-white transition-all duration-300 group-hover:scale-110 group-hover:border-white group-hover:bg-transparent">
                            <Icon icon="heroicons:play" class="ml-1 h-6 w-6 text-indigo-900 transition-colors duration-300 group-hover:text-white" />
                          </div>
                        </div>
                        
                        <!-- Overlay Content (white filter by default, blue on hover) -->
                        <div class="absolute top-0 left-0 flex h-full w-full flex-col items-end justify-end bg-[linear-gradient(to_bottom,rgba(255,255,255,0)_0%,white_90%)] p-6 lg:p-8 transition-all duration-300 group-hover:bg-gradient-to-t group-hover:from-indigo-900/90 group-hover:to-transparent">
                          <div class="w-full text-zinc-500 transition-colors duration-300 group-hover:text-white">
                            <span v-if="project.category" class="text-sm font-medium">{{ project.category }}</span>
                          </div>
                          <h3 class="mt-3 mb-2 w-full text-[1.63rem] leading-8 font-bold text-zinc-800 transition-colors duration-300 group-hover:text-white">
                            {{ project.title }}
                          </h3>
                        </div>

                        <!-- Default Title (Visible on mobile) -->
                        <div class="md:hidden mt-3.5">
                          <h3 class="text-[1.63rem] leading-8 text-zinc-800 font-bold">
                            {{ project.title }}
                          </h3>
                        </div>
                      </div>
                    </a>
                  </CardContent>
                </Card>
              </div>
            </div>
          </div>
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