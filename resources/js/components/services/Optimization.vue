<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Icon } from '@iconify/vue'

type ListItem = {
  id: number
  text: string
}

interface Props {
  sectionLabel?: string
  sectionTitle?: string
  description?: string
  listItems?: ListItem[]
  moreLink?: string
  imageUrl?: string
}

const props = withDefaults(defineProps<Props>(), {
  sectionLabel: 'Use Platform',
  sectionTitle: 'Efficiency and Optimization',
  description:
    'Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver. Garibaldi giant danio ziege Siamese fighting fish collared dogfish',
  listItems: () => [
    { id: 1, text: 'Amberjack emperor. Pelagic' },
    { id: 2, text: 'Cod morid cod Raccoon butterfly fish' },
    { id: 3, text: 'Gulper cuchia cow shark pollyfish' },
  ],
  moreLink: 'https://quadrone.ninetheme.com/about-us',
  imageUrl:
    'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/img_01.png',
})
</script>

<template>
<section class="text-white text-lg py-24 sm:pt-36 sm:pb-36 md:pt-20 md:pb-20 bg-indigo-900 min-[1600px]:mr-20 font-roboto">
  <!-- removed mx-auto and px-4 -->
  <div class="w-full">
    <div class="flex flex-col md:flex-row md:justify-start md:items-start lg:items-center md:gap-8 lg:gap-12 xl:gap-16 min-[1500px]:gap-24">
      <!-- Image Container -->
      <div class="hidden md:block md:w-[52%] lg:w-[42.2%]">
        <img
          :src="imageUrl"
          class="w-[35.63rem] lg:w-[45rem] xl:w-[37rem] min-[1500px]:w-[60rem] h-auto max-w-none"
          alt=""
        />
      </div>

      <!-- Content Container -->
      <div class="pr-6 ml-6 sm:pr-8 sm:ml-10 md:pr-0 md:ml-0 md:max-w-[35.88rem]">
        <div class="pb-6 font-bold">
          <div class="flex items-center">
            <i class="bg-white inline-block w-8 h-0.5 mr-6"></i>
            {{ sectionLabel }}
          </div>
          <h4 class="text-[2.50rem] leading-none mt-5">{{ sectionTitle }}</h4>
        </div>

        <p class="leading-relaxed">{{ description }}</p>

        <!-- List -->
        <ul class="list-none mt-7">
          <li
            v-for="item in listItems"
            :key="item.id"
            class="relative py-3 pl-11 list-item"
          >
            <div class="absolute top-4 left-0 w-[21px] h-[21px] border border-white rounded-full flex items-center justify-center">
              <Icon icon="heroicons:check" class="w-3 h-3 text-white" />
            </div>
            {{ item.text }}
          </li>
        </ul>

        <!-- MORE Button -->
        <Button
          as-child
          variant="ghost"
          class="text-white items-center font-bold justify-start inline-flex mt-9 sm:mt-12 p-0 hover:bg-transparent group"
        >
          <a :href="moreLink || '#'" class="flex items-center no-underline">
            <span
              class="flex items-center justify-center w-12 h-12 min-w-[3.13rem] min-h-[3.13rem] mr-3.5 border-2 border-zinc-300 rounded-full transition-all duration-200 group-hover:bg-white group-hover:border-white"
            >
              <Icon
                icon="heroicons:arrow-right"
                class="w-3 h-3 text-white group-hover:text-indigo-900 transition-colors duration-200"
              />
            </span>
            <span class="cursor-pointer">MORE</span>
          </a>
        </Button>
      </div>

    </div>
  </div>
</section>

</template>


