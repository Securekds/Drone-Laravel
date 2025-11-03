<script setup lang="ts">
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselPrevious,
  CarouselNext,
  type CarouselApi,
} from '@/components/ui/carousel'
import { ref } from 'vue'

type PartnerGroup = {
  id: number
  topImage: string
  bottomImage: string
}

interface Props {
  partnerGroups?: PartnerGroup[]
}

const props = withDefaults(defineProps<Props>(), {
  partnerGroups: () => [
    {
      id: 1,
      topImage: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/partners_img_01.png',
      bottomImage: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/partners_img_02.png',
    },
    {
      id: 2,
      topImage: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/partners_img_03.png',
      bottomImage: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/partners_img_04.png',
    },
    {
      id: 3,
      topImage: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/partners_img_05.png',
      bottomImage: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/partners_img_06.png',
    },
    {
      id: 4,
      topImage: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/partners_img_06.png',
      bottomImage: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/partners_img_03.png',
    },
  ],
})

const carouselApi = ref<CarouselApi>()

const onCarouselInit = (api: CarouselApi) => {
  carouselApi.value = api
}
</script>

<template>
  <section class="text-zinc-500 pt-12 min-[576px]:pt-16 pb-12 min-[791px]:pb-24">
    <!-- Section Wrapper -->
    <div class="relative w-full">
      <!-- Content Container -->
      <div
        class="container mx-auto px-3.5 min-[791px]:px-0 min-[1025px]:px-0 min-[1025px]:mr-3.5 relative z-10"
      >
        <!-- Mobile-only vertical Gray line -->
     

        <!-- Partners Carousel -->
        <div class="relative">
          <div class="cursor-grab px-8 overflow-hidden">
            <Carousel
              :opts="{
                align: 'start',
                loop: false,
                slidesToScroll: 1,
              }"
              @init-api="onCarouselInit"
              class="w-full relative"
            >
              <CarouselContent class="-ml-8">
                <CarouselItem
                  v-for="partnerGroup in partnerGroups"
                  :key="partnerGroup.id"
                  class="pl-8 basis-full min-[480px]:basis-1/2 min-[791px]:basis-1/3"
                >
                  <div class="inline-block text-center px-2.5 min-[576px]:px-8">
                    <!-- Top Image -->
                    <a
                      href="https://quadrone.ninetheme.com/contact"
                      class="text-indigo-900 block"
                    >
                      <img
                        :src="partnerGroup.topImage"
                        :alt="`Partner ${partnerGroup.id} Top`"
                        class="cursor-pointer w-48 h-auto max-w-full mx-auto"
                      />
                    </a>

                    <!-- Spacer (visible on larger screens, hidden on mobile) -->
                    <div class="hidden min-[576px]:flex items-center justify-start h-40">
                      <i class="inline-block w-8 h-8"></i>
                    </div>

                    <!-- Bottom Image (visible on larger screens, hidden on mobile) -->
                    <a
                      href="https://quadrone.ninetheme.com/contact"
                      class="text-indigo-900 hidden min-[576px]:block"
                    >
                      <img
                        :src="partnerGroup.bottomImage"
                        :alt="`Partner ${partnerGroup.id} Bottom`"
                        class="cursor-pointer w-48 h-auto max-w-full mx-auto"
                      />
                    </a>
                  </div>
                </CarouselItem>
              </CarouselContent>
            </Carousel>
          </div>

          <!-- Centered Navigation Arrows -->
          <div class="flex justify-center items-center gap-4 mt-8 min-[1340px]:absolute min-[1340px]:left-1/2 min-[1340px]:-translate-x-1/2 min-[1340px]:bottom-[-4rem] min-[1400px]:bottom-[-5rem] min-[1600px]:bottom-[-6rem] text-indigo-900">
            <button
              @click="carouselApi?.scrollPrev()"
              class="bg-white cursor-pointer w-12 h-12 border-2 border-zinc-300 rounded-full hover:bg-indigo-900 hover:border-indigo-900 flex items-center justify-center transition-all duration-300 group pr-1.5"
            >
              <svg
                class="w-5 h-5 text-indigo-900 group-hover:text-white transition-colors duration-300"
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
              class="bg-white cursor-pointer w-12 h-12 border-2 border-zinc-300 rounded-full hover:bg-indigo-900 hover:border-indigo-900 flex items-center justify-center transition-all duration-300 group"
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
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
</style>

