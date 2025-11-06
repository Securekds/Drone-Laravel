<script setup lang="ts">
import { 
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselPrevious,
  CarouselNext
} from '@/components/ui/carousel'
import { Card, CardContent } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Button } from '@/components/ui/button'
import { Icon } from '@iconify/vue'

// Define interfaces
interface Category {
  name: string
  link: string
}

interface RelatedPost {
  id: number
  title: string
  image: string
  link: string
  date: string
}

interface SidebarCategory {
  name: string
  link: string
}

interface SidebarRecentPost {
  title: string
  link: string
}

interface SidebarArchive {
  name: string
  link: string
}

interface SidebarMeta {
  name: string
  link: string
}

interface SidebarData {
  categories: SidebarCategory[]
  featuredPost: {
    title: string
    image: string
  }
  recentPosts: SidebarRecentPost[]
  archives: SidebarArchive[]
  meta: SidebarMeta[]
}

interface PostData {
  title: string
  featuredImage: string
  srcset: string
  author: string
  date: string
  content: string[]
  categories: Category[]
  relatedPosts: RelatedPost[]
}

interface Props {
  postData: PostData
  sidebarData: SidebarData
  relatedPostsTitle?: string
  searchPlaceholder?: string
}

// Default props
const props = withDefaults(defineProps<Props>(), {
  relatedPostsTitle: 'You May Also Like',
  searchPlaceholder: 'Search for...',
  postData: () => ({
    title: 'Artificial Intelligence applied to Precision Agriculture',
    featuredImage: '/assets/main-slider-03-1024x531.jpg',
    srcset: '/assets/main-slider-03-1024x531.jpg 1024w, /assets/main-slider-03-300x156.jpg 300w, /assets/main-slider-03-768x398.jpg 768w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03-1536x797.jpg 1536w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03-600x311.jpg 600w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03.jpg 1600w',
    author: 'XNT_ADM',
    date: 'November 27, 2019',
    content: [
      'Sea dragon, spotted dogfish sole threadtail shiner monkeyface prickleback Pacific herring. Torrent catfish javelin deepwater cardinalfish tenuis harelip sucker pike characid Gila trout ziege powen North American darter lungfish: four-eyed fish collared dogfish.',
      'African lungfish weeverfish, ghost knifefish beluga sturgeon squeaker, squeaker Mexican blind cavefish. Shark false trevally french angelfish, yellowfin croaker. Arrowtooth eel, burrowing goby skipjack tuna trout-perch torrent catfish fathead sculpin mahseer soapfish. Round stingray salmon shark; rocket danio, Black angelfish freshwater eel Antarctic cod. Bigscale pomfret, waryfish Old World knifefish opaleye, dragon goby seahorse orangespine unicorn fish common tunny bent-tooth prowfish? Arrowtooth eel triggerfish brotula sleeper shark common tunny largemouth bass; shad dealfish parrotfish nase bullhead shark mahi-mahi speckled trout. Pompano filefish; morid cod'
    ],
    categories: [
      { name: 'Drone', link: '*' },
      { name: 'Flying spots', link: '*' },
      { name: 'Industrial', link: '*' }
    ],
    relatedPosts: [
      {
        id: 1,
        title: 'We launch a new Precision Agriculture project',
        image: '/assets/slider-external-box02.jpg',
        link: '*',
        date: 'November 27, 2019'
      },
      {
        id: 2,
        title: 'Quadron Forum Data Review in 2018',
        image: '/assets/presentation-projects-01.jpg',
        link: '*',
        date: 'October 28, 2019'
      },
      {
        id: 3,
        title: 'Quadrone Announces Pricing And Availability of Multilink',
        image: '/assets/presentation-projects-02.jpg',
        link: '*',
        date: 'November 27, 2019'
      }
    ]
  }),
  sidebarData: () => ({
    categories: [
      { name: 'Drone', link: '*' },
      { name: 'Flying spots', link : '*' },
      { name: 'Help', link: '*' },
      { name: 'Industrial', link: '*' },
      { name: 'Products', link: '*' },
      { name: 'Services', link: '*' }
    ],
    featuredPost: {
      title: 'SimActive Releases Version 8.1',
      image: '/assets/promo_aside.jpg'
    },
    recentPosts: [
      { title: 'Artificial Intelligence applied to Precision Agriculture', link: '*' },
      { title: 'Quadrone Announces Pricing And Availability of Multilink', link: '*' },
      { title: 'We launch a new Precision Agriculture project', link: '*' },
      { title: 'Quadron Forum Data Review in 2018', link: '*' }
    ],
    archives: [
      { name: 'November 2019', link: '*' },
      { name: 'October 2019', link: '*' }
    ],
    meta: [
      { name: 'Log in', link: '*' },
      { name: 'Entries feed', link: '*' },
      { name: 'Comments feed', link: '*' },
      { name: 'WordPress.org', link: '*' }
    ]
  })
})
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>



<template>
  <section class="text-zinc-500 text-lg py-24 min-[576px]:pt-36 min-[576px]:pb-36 min-[1025px]:pt-36 min-[1025px]:pb-36 bg-white">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      
      <div class="flex flex-wrap -m-3.5">
        
        <!-- Main Content -->
        <div class="w-full lg:w-2/3 px-4 mt-16 md:mt-20">
          
          <!-- Featured Image -->
          <div class="mt-1">
            <img 
              :src="postData.featuredImage" 
              :srcset="postData.srcset"
              :alt="postData.title"
              class="w-full h-auto max-w-full rounded-lg"
            />
          </div>

          <!-- Post Meta -->
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mt-9 text-base">
            <div>
              <strong class="text-zinc-800 font-bold inline-block mr-3.5">Author:</strong> 
              {{ postData.author }}
            </div>
            <div>
              <strong class="text-zinc-800 font-bold inline-block mr-3.5">Date:</strong> 
              {{ postData.date }}
            </div>
          </div>

          <!-- Post Title -->
          <h1 class="text-zinc-800 text-[1.9rem] sm:text-[2.50rem] leading-none font-bold pb-8 capitalize mt-10">
            {{ postData.title }}
          </h1>

          <!-- Post Content -->
          <div class="prose prose-lg max-w-none">
            <p v-for="(paragraph, index) in postData.content" :key="index" class="mb-4">
              {{ paragraph }}
            </p>
          </div>

          <!-- Categories -->
          <div class="flex flex-col sm:flex-row sm:items-start gap-3 mt-9">
            <strong class="text-zinc-800 font-bold inline-block sm:mr-3.5">Categories:</strong>
            <div class="flex flex-wrap gap-3">
              <a 
                v-for="category in postData.categories" 
                :key="category.name"
                :href="category.link"
                class="text-indigo-900 hover:text-indigo-700 underline text-base capitalize"
              >
                {{ category.name }}
              </a>
            </div>
          </div>

          <!-- Related Posts -->
          <div class="pt-24">
            <div class="relative">
              
              <!-- Section Header -->
              <div class="pb-6 text-[1.63rem] leading-8 text-zinc-800 font-bold">
                <h4>{{ relatedPostsTitle }}</h4>
              </div>

              <!-- Related Posts Carousel -->
              <Carousel class="-mx-3.5">
                <CarouselContent>
                  <CarouselItem 
                    v-for="relatedPost in postData.relatedPosts" 
                    :key="relatedPost.id"
                    class="md:basis-1/2"
                  >
                    <div class="p-3.5">
                      <Card class="group overflow-hidden border-0 bg-transparent p-0 shadow-none">
                        <CardContent class="p-0">
                          <a :href="relatedPost.link" class="block">
                            <div class="relative mt-6 mb-3 inline-block w-full overflow-hidden bg-gray-100 shadow-[0px_3px_14px_rgba(17,19,91,0.2)] transition-transform duration-300 before:absolute before:top-0 before:left-0 before:h-[14px] before:w-full before:bg-[#2e3192] before:content-[''] hover:-translate-y-1">
                              <figure class="relative m-0 cursor-pointer overflow-hidden">
                                <img
                                  :src="relatedPost.image"
                                  :alt="relatedPost.title"
                                  class="w-full max-w-full transition-transform duration-300 group-hover:scale-105"
                                />
                                <div class="absolute top-0 left-0 flex h-full w-full flex-col items-end justify-end bg-[linear-gradient(to_bottom,rgba(255,255,255,0)_0%,white_90%)] p-8 font-black transition-all duration-300 group-hover:bg-gradient-to-t group-hover:from-indigo-900/90 group-hover:to-transparent">
                                  <div class="w-full text-zinc-500 transition-colors duration-300 group-hover:text-white">
                                    {{ relatedPost.date }}
                                  </div>
                                  <h5 class="mt-3 mb-2 w-full text-xl font-semibold text-zinc-800 transition-colors duration-300 group-hover:text-white line-clamp-2">
                                    {{ relatedPost.title }}
                                  </h5>
                                </div>
                              </figure>
                            </div>
                          </a>
                        </CardContent>
                      </Card>
                    </div>
                  </CarouselItem>
                </CarouselContent>
                
                <!-- Navigation Buttons -->
                <CarouselPrevious class="left-0 bg-white text-indigo-900 border-2 border-indigo-900 hover:bg-indigo-50 w-12 h-12 hidden min-[1340px]:flex" />
                <CarouselNext class="right-0 bg-white text-indigo-900 border-2 border-indigo-900 hover:bg-indigo-50 w-12 h-12 hidden min-[1340px]:flex" />
              </Carousel>
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="w-full lg:w-1/3 px-4 mt-16 md:mt-20 lg:pl-8">
          <Card class="border-0 shadow-none bg-transparent">
            <CardContent class="p-0">
              <!-- Search Form -->
              <div class="mb-16">
                <form action="https://quadrone.ninetheme.com/" class="w-full">
                  <div class="flex">
                    <Input 
                      type="text" 
                      :placeholder="searchPlaceholder"
                      class="flex-1 h-16 rounded-l-lg rounded-r-none border-2 border-r-0 border-neutral-300 px-6"
                    />
                    <Button 
                      type="submit"
                      class="bg-indigo-900 text-white h-16 px-8 rounded-l-none rounded-r-lg border-2 border-indigo-900 hover:bg-indigo-800"
                    >
                      <span class="sr-only">Search</span>
                      <Icon icon="heroicons:magnifying-glass" class="w-5 h-5 text-white" />
                    </Button>
                  </div>
                </form>
              </div>

              <!-- Categories -->
              <div class="mb-16">
                <h4 class="text-gray-900 text-[1.63rem] leading-8 font-bold capitalize mb-2">
                  Categories
                </h4>
                <ul class="list-none text-indigo-900 font-bold">
                  <li 
                    v-for="category in sidebarData.categories" 
                    :key="category.name"
                    class="list-item mb-3.5 last:mb-0"
                  >
                    <a 
                      :href="category.link" 
                      class="hover:underline capitalize"
                    >
                      {{ category.name }}
                    </a>
                  </li>
                </ul>
              </div>

              <!-- Featured Post -->
              <div class="mb-16">
                <h4 class="text-gray-900 text-[1.63rem] leading-8 font-bold capitalize mb-2">
                  Featured post
                </h4>
                <div class="relative w-full max-w-full">
                  <img 
                    :src="sidebarData.featuredPost.image" 
                    :alt="sidebarData.featuredPost.title"
                    class="w-auto h-auto max-w-full"
                  />
                  <p class="text-white bottom-5 font-semibold left-6 absolute z-10">{{ sidebarData.featuredPost.title }}</p>
                </div>
              </div>

              <!-- Recent Posts -->
              <div class="mb-16">
                <h4 class="text-gray-900 text-[1.63rem] leading-8 font-bold capitalize mb-2">
                  Recent Posts
                </h4>
                <ul class="list-none text-indigo-900 font-bold">
                  <li 
                    v-for="recentPost in sidebarData.recentPosts" 
                    :key="recentPost.title"
                    class="list-item mb-3.5 last:mb-0"
                  >
                    <a 
                      :href="recentPost.link" 
                      class="hover:underline"
                    >
                      {{ recentPost.title }}
                    </a>
                  </li>
                </ul>
              </div>

              <!-- Archives -->
              <div class="mb-16">
                <h4 class="text-gray-900 text-[1.63rem] leading-8 font-bold capitalize mb-2">
                  Archives
                </h4>
                <ul class="list-none text-indigo-900 font-bold">
                  <li 
                    v-for="archive in sidebarData.archives" 
                    :key="archive.name"
                    class="list-item mb-3.5 last:mb-0"
                  >
                    <a 
                      :href="archive.link" 
                      class="hover:underline"
                    >
                      {{ archive.name }}
                    </a>
                  </li>
                </ul>
              </div>

              <!-- Meta -->
              <div class="mb-16">
                <h4 class="text-gray-900 text-[1.63rem] leading-8 font-bold capitalize mb-2">
                  Meta
                </h4>
                <ul class="list-none text-indigo-900 font-bold">
                  <li 
                    v-for="meta in sidebarData.meta" 
                    :key="meta.name"
                    class="list-item mb-3.5 last:mb-0"
                  >
                    <a 
                      :href="meta.link" 
                      class="hover:underline"
                    >
                      {{ meta.name }}
                    </a>
                  </li>
                </ul>
              </div>
            </CardContent>
          </Card>
        </div>
      </div>
    </div>
  </section>
</template>