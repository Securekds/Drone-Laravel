<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card'
import { computed } from 'vue'

type BreakthroughItem = {
  id: number
  title: string
  description: string
  image: string
  link: string
}

interface Props {
  sectionLabel?: string
  sectionTitle?: string
  backgroundImage?: string
  items?: BreakthroughItem[]
}

const props = withDefaults(defineProps<Props>(), {
  sectionLabel: 'Mobile App',
  sectionTitle: 'Innovations and <br />Breakthroughs',
  backgroundImage:
    "url('https://quadrone.ninetheme.com/wp-content/uploads/2019/11/sectionbg_wrapper-03.jpg')",
  items: () => [
    {
      id: 1,
      title: 'Create cinematic\n\n dron footage',
      description:
        'X-ray tetra, saury queen danio Ragfish Red whalefish lamprey poolfish combtooth blenny; jackfish arowana.',
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/masonry-img01.jpg',
      link: '#',
    },
      {
      id: 2,
      title: 'Create cinematic\n\n dron footage',
      description:
        'Bar danio river stingray warbonnet; chub shrimpfish danio river stingray warbonnet.',
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/masonry-img02.jpg',
      link: '#',
    },
    {
      id: 3,
      title: 'How to Fly Safely Over Water',
      description: 'Plaice nurseryfish wels catfish tadpole fish bigmouth buffalo.',
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/masonry-img03.jpg',
      link: '#',
    },
       {
      id: 4,
      title: "9 MUST DO'S in Thailand",
      description:
        'Plaice nurseryfish wels catfish tadpole fish bigmouth buffalo bullhead shark fire bar danio river stingray warbonnet.',
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/masonry-img04.jpg',
      link: '#',
    },
  
       {
      id: 5,
      title: 'In-depth Customer Service Experience',
      description:
        'Bigmouth buffalo bullhead shark fire bar danio river stingray warbonnet; chub shrimpfish. Lampfish marlin',
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/masonry-img05.jpg',
      link: '#',
    },
 
    
    {
      id: 6,
      title: 'Sky using\n\n Mavic 2 Pro!',
      description:
        'X-ray tetra, saury queen danio Ragfish Red whalefish lamprey poolfish combtooth blenny; jackfish arowana.',
      image:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/masonry-img06.jpg',
      link: '#',
    },
 
  ],
})

// Build 3 columns in pairs: [1,2] | [3,4] | [5,6]
const gridColumns = computed<BreakthroughItem[][]>(() => {
  const cols: BreakthroughItem[][] = [[], [], []]
  let colIndex = 0
  for (let i = 0; i < props.items.length; i += 2) {
    const a = props.items[i]
    const b = props.items[i + 1]
    if (a) cols[colIndex].push(a)
    if (b) cols[colIndex].push(b)
    colIndex = (colIndex + 1) % 3
  }
  return cols
})
</script>

<template>
  <section
    class="text-zinc-500 text-lg py-24 sm:pt-36 sm:pb-32 bg-gray-100"
    :style="{ backgroundImage: backgroundImage, backgroundRepeat: 'repeat-x' }"
  >
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Header -->
      <div class="pb-11 sm:pb-6 font-bold">
        <div class="text-indigo-900 flex items-center">
          <i class="inline-block w-8 h-0.5 mr-6 bg-indigo-900"></i>
          {{ sectionLabel }}
        </div>
        <h2 class="text-zinc-800 text-[2.50rem] leading-none mt-5">
          <span v-html="sectionTitle"></span>
        </h2>
      </div>

      <!-- Cards Grid (Shadcn Card) -->
      <div class="sm:-mx-3.5">
        <div class="pb-5 -mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 items-end gap-x-7">
          <div
            v-for="(col, cIdx) in gridColumns"
            :key="`col-${cIdx}`"
            class="px-0 sm:px-3.5 h-full flex flex-col justify-end"
          >
            <template v-for="item in col" :key="item.id">
              <Card
                as="div"
                class="group mt-8 p-0 border-0 shadow-none bg-white cursor-pointer transition-transform duration-200 hover:-translate-y-1 h-full flex flex-col"
              >
                <div class="w-full h-1 bg-[#2e3192] transition-all duration-200 group-hover:h-4"></div>

                <CardContent :class="['px-6 pt-10 sm:px-10 sm:pt-10 lg:px-16 lg:pt-16 pb-0 flex-1', item.id === 4 ? 'lg:pt-24' : '']">
                  <i class="block w-7 h-0.5 bg-[#2e3192] mb-2"></i>
                  <h4
                    class="text-zinc-800 text-[1.63rem] leading-8 font-bold pb-3 pt-6 mb-2 transition-colors duration-200 group-hover:text-[#2e3192]"
                  >
                    <span v-html="item.title.replace(/\n\n/g, '<br />')"></span>
                  </h4>
                  <p class="text-zinc-500">
                    {{ item.description }}
                  </p>
                </CardContent>

                <a :href="item.link" class="block">
                  <img :src="item.image" alt="" class="w-full h-auto max-w-full mt-3.5" />
                </a>
              </Card>
            </template>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>





