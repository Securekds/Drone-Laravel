<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Icon } from '@iconify/vue'

interface Props {
  backgroundImage?: string
  discountIcon?: string
  subtitle?: string
  title?: string
  discountTitle?: string
  discountItems?: string[]
  formAction?: string
}

const props = withDefaults(defineProps<Props>(), {
  backgroundImage: "url('/assets/sectionbg_wrapper-05.webp')",
  discountIcon: '/assets/info.webp',
  subtitle: 'Request',
  title: 'Get more information',
  discountTitle: '50% discount for:',
  discountItems: ['students', 'retired', 'unemployed'],
  formAction: 'https://quadrone.ninetheme.com/drone-pilot-training/#wpcf7-f638-p607-o1'
})
</script>

<template>
  <!-- Full background wrapper -->
  <div
    class="bg-no-repeat bg-cover bg-center"
    style="background-image: url('/assets/sectionbg_wrapper-04.jpg');"
  >
    <!-- Inner section with top-right background -->
    <section 
      class="relative text-zinc-500 text-lg pb-20 pt-24 min-[576px]:pt-36 min-[576px]:pb-20 min-[1025px]:pt-36 min-[1025px]:pb-28 font-roboto"
    >
      <!-- md+ background image overlay (hidden on mobile) -->
      <div
        class="pointer-events-none absolute inset-0 hidden md:block"
        :style="{
          backgroundImage: backgroundImage,
          backgroundRepeat: 'no-repeat',
          backgroundPosition: 'right top',
          backgroundSize: '36%'
        }"
      ></div>
      <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="-mt-16 md:-mt-20">
          <div class="flex flex-wrap -m-3.5">
            <!-- Main Content Row -->
            <div class="w-full px-4 mt-16 md:mt-20">
              <div class="flex flex-col lg:flex-row">
                
                <!-- Left Side - Discount Info -->
                <div class="lg:w-1/6 mb-8 lg:mb-0">
                  <div class="flex flex-col items-start lg:items-start text-white">
                    <!-- Discount Icon -->
                    <div class="mb-6">
                      <img 
                        :src="discountIcon" 
                        alt="Discount"
                        class="w-32 h-auto max-w-full"
                      />
                    </div>
                    
                    <!-- Discount Info -->
                    <div class="mt-7 ml-0 lg:ml-3">
                      <p class="font-bold text-lg">
                        <strong>{{ discountTitle }}</strong>
                      </p>
                      <ul class="list-none mt-4">
                        <li 
                          v-for="(item, index) in discountItems"
                          :key="index"
                          class="relative pl-6 mb-3"
                        >
                          <span class="absolute left-0 top-3 w-1 h-1 bg-white rounded-full"></span>
                          {{ item }}
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- Right Side - Contact Form -->
                <div class="lg:w-5/6 lg:pl-8">
                  <form :action="formAction" class="text-white">
                    <!-- Form Header -->
                    <div class="pb-11 font-bold">
                      <div class="text-white">
                        <i class="bg-white inline-block w-8 h-0.5 mr-6"></i>{{ subtitle }}
                      </div>
                      <h4 class="text-white text-[1.8rem] sm:text-[2.50rem] leading-none mt-5">
                        {{ title }}
                      </h4>
                    </div>

                    <!-- Form Fields -->
                    <div class="flex flex-wrap -m-3.5">
                      <!-- Left Column -->
                      <div class="w-full lg:w-1/2 px-4">
                        <div class="relative mb-4">
                          <label class="font-medium text-white mb-2 block">First name *</label>
                          <input 
                            type="text" 
                            class="w-full h-16 border-2 border-white rounded px-6 bg-transparent text-white placeholder-white focus:outline-none focus:border-indigo-300"
                            placeholder="First name *"
                            required
                          />
                        </div>
                        <div class="relative mt-5 mb-4">
                          <label class="font-medium text-white mb-2 block">Last name *</label>
                          <input 
                            type="text" 
                            class="w-full h-16 border-2 border-white rounded px-6 bg-transparent text-white placeholder-white focus:outline-none focus:border-indigo-300"
                            placeholder="Last name *"
                            required
                          />
                        </div>
                      </div>

                      <!-- Right Column -->
                      <div class="w-full lg:w-1/2 px-4">
                        <div class="relative mb-4">
                          <label class="font-medium text-white mb-2 block">Email</label>
                          <input 
                            type="email" 
                            class="w-full h-16 border-2 border-white rounded px-6 bg-transparent text-white placeholder-white focus:outline-none focus:border-indigo-300"
                            placeholder="Email"
                          />
                        </div>
                        <div class="relative mt-5 mb-4">
                          <label class="font-medium text-white mb-2 block">Phone number</label>
                          <input 
                            type="tel" 
                            class="w-full h-16 border-2 border-white rounded px-6 bg-transparent text-white placeholder-white focus:outline-none focus:border-indigo-300"
                            placeholder="Phone number"
                          />
                        </div>
                      </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8">
                      <Button
                        type="submit"
                        class="text-indigo-900 bg-white border-2 border-white hover:bg-indigo-900 hover:text-white hover:border-indigo-900 font-bold py-4 px-8 rounded-3xl transition-all duration-300"
                      >
                        SUBMIT
                      </Button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

