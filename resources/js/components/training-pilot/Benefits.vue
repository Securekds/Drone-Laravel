<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card'

interface BenefitItem {
  id: number
  icon: string
  title: string
  description?: string
}

interface Props {
  subtitle?: string
  title?: string
  benefits?: BenefitItem[]
}

const props = withDefaults(defineProps<Props>(), {
  subtitle: 'Benefits',
  title: 'Why We are the Right Choice',
  benefits: () => [
    {
      id: 1,
      icon: '/assets/laptop.png',
      title: 'Video tutorials',
      description: ''
    },
    {
      id: 2,
      icon: '/assets/bell.png',
      title: 'International certification',
      description: ''
    },
    {
      id: 3,
      icon: '/assets/mobile.png',
      title: 'Qualified tutors',
      description: ''
    },
    {
      id: 4,
      icon: '/assets/dronemp.png',
      title: 'Latest equipment',
      description: ''
    }
  ]
})
</script>

<template>
  <section class="text-zinc-500 text-lg pb-0 pt-24 min-[576px]:pt-36 min-[1025px]:pt-36 font-roboto">

    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <div class="-mt-16 md:-mt-20">
        <div class="flex flex-wrap -m-3.5">
          <!-- Header Section -->
          <div class="w-full px-4 mt-16 md:mt-20">
            <Card class="border-0 shadow-none bg-transparent">
              <CardContent class="p-0 ">
                <div class="pb-6 font-bold text-center">
                  <div class="text-indigo-900">
                    <i class="bg-indigo-900 inline-block w-8 h-0.5 mr-6"></i>{{ subtitle }}
                  </div>
                  <h4 class="text-zinc-800 text-[2rem] sm:text-[2.50rem] leading-none mt-5">
                    {{ title }}
                  </h4>
                </div>
              </CardContent>
            </Card>
          </div>

          <!-- Benefits Grid -->
          <div class="w-full px-4 mt-8 ">
            <div class="flex flex-wrap -m-3.5">
              <!-- Benefit Items -->
              <div 
                v-for="benefit in benefits"
                :key="benefit.id"
                class="w-full md:w-1/2 lg:w-1/4 px-4 mt-9 "
              >
                <Card class="group bg-white border-0 shadow-none">
                  <CardContent class="p-6 text-center">
                    <!-- Benefit Icon -->
                    <div class="text-7xl text-gray-500 mb-6">
                      <div class="inline-block">
                        <img 
                          :src="benefit.icon" 
                          :alt="benefit.title"
                          class="w-16 h-16 object-contain mx-auto"
                        />
                      </div>
                    </div>
                    
                    <!-- Benefit Title -->
                    <div class="text-[1.63rem] leading-8 text-zinc-800 font-bold mb-3">
                      <h4>{{ benefit.title }}</h4>
                    </div>

                    <!-- Benefit Description -->
                    <div v-if="benefit.description" class="text-zinc-500 text-sm leading-relaxed">
                      <p>{{ benefit.description }}</p>
                    </div>
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
