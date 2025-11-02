<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Icon } from '@iconify/vue'

interface BlogPost {
  id: number
  title: string
  date: string
  image: string
  alt: string
  url: string
  comments: string
}

interface SectionData {
  subtitle: string
  title: string
}

interface Props {
  sectionData?: SectionData
  featuredPost?: BlogPost
  sidePosts?: BlogPost[]
  viewAllText?: string
  viewAllUrl?: string
}

const props = withDefaults(defineProps<Props>(), {
  sectionData: () => ({
    subtitle: "Blog",
    title: "News & Insights"
  }),
  featuredPost: () => ({
    id: 1,
    title: "Artificial Intelligence applied to Precision Agriculture",
    date: "Nov 27, 2019",
    image: "/assets/22.jpeg",
    alt: "Featured blog post",
    url: "#",
    comments: "0"
  }),
  sidePosts: () => [
    {
      id: 2,
      title: "Quadron Forum Data Review in 2018",
      date: "Oct 28, 2019",
      image: "/assets/18.jpeg",
      alt: "Blog post image",
      url: "#",
      comments: "1"
    },
    {
      id: 3,
      title: "We launch a new Precision Agriculture project",
      date: "Nov 27, 2019",
      image: "/assets/27.jpeg",
      alt: "Blog post image",
      url: "#",
      comments: "0"
    },
    {
      id: 4,
      title: "Quadrone Announces Pricing And Availability of Multilink",
      date: "Nov 27, 2019",
      image: "/assets/21.jpeg",
      alt: "Blog post image",
      url: "#",
      comments: "0"
    }
  ],
  viewAllText: "ALL ARTICLES",
  viewAllUrl: "#"
})
</script>

<template>
  <section class="relative font-roboto w-full pt-[98px] pb-[100px] sm:pt-[148px] overflow-hidden">
    <div class="w-full mx-auto px-[19px] max-w-none lg:px-[25px] xl:px-[15px] xl:max-w-[1200px]">
      <!-- Header Section -->
      <div class="relative pb-[61px]">
        <div class="p-0 relative font-bold leading-[1.1] ![margin-top:0] text-[14px] tracking-[-0.03em] text-[oklch(37.754%0.15587_274.67)] lg:text-[16px]">
          <i class="h-[2px] relative w-[30px] mr-[25px] top-[-5px] inline-block bg-[oklch(37.754%0.15587_274.67)]"></i>
          {{ sectionData.subtitle }}
        </div>
        <h3 class="mb-0 pb-0 font-bold mt-[20px] -tracking-wide leading-[1.13] [word-spacing:0] text-[31px] text-[oklch(24.229%0.02848_284.07)] lg:text-[40px]">
          {{ sectionData.title }}
        </h3>
      </div>

      <!-- Blog Posts Grid -->
      <div class="flex mt-0 flex-wrap -ml-[15px] -mr-[15px] sm:flex-row-reverse">
        <!-- Featured Post -->
        <div class="w-full relative px-[15px] lg:max-w-[50%] lg:flex-[0_0_50%]">
          <Card class="border-0 shadow-none p-0 group">
            <a 
              :href="featuredPost.url" 
              target="_blank" 
              class="block relative shadow-none no-underline overflow-hidden text-[oklch(37.754%0.15587_274.67)] bg-transparent"
            >
              <div class="overflow-hidden">
                <picture>
                  <img 
                    decoding="async" 
                    :src="featuredPost.image" 
                    :alt="featuredPost.alt" 
                    class="h-auto w-full min-w-0 scale-100 max-w-full shadow-none align-middle rounded-none border-none backface-hidden transition-transform duration-[0.7s] ease-[ease] group-hover:scale-105"
                  />
                </picture>
              </div>
              <CardContent class="w-full pt-[35px] pb-[50px] px-[35px] bg-[oklch(24.229%0.02848_284.07)] sm:pt-[15px] sm:pb-[20px] sm:px-[43px]">
                <div class="font-bold leading-[1.2] text-[14px] text-white">
                  {{ featuredPost.date }}
                </div>
                <h4 class="p-0 mb-0 mx-0 mt-[6px] font-bold leading-[1.1] [word-spacing:0] text-[20px] tracking-[-0.03em] text-white sm:text-[26px]">
                  {{ featuredPost.title }}
                </h4>
                <div class="ml-[4px] mt-[20px] leading-[1.2] text-[15px] text-[oklch(87.61%0_none)]">
                  <Icon icon="mdi:comment-outline" class="inline-block mr-[9px] h-[16px] w-[16px] text-[oklch(87.61%0_none)]" />
                  {{ featuredPost.comments }}
                </div>
              </CardContent>
            </a>
          </Card>
        </div>

        <!-- Spacer -->
        <div class="w-full h-[30px] clear-both block xl:hidden"></div>

        <!-- Side Posts -->
        <div class="w-full relative px-[15px] lg:max-w-[50%] lg:flex-[0_0_50%]">
          <div>
            <!-- Blog Post Items -->
            <div 
              v-for="post in sidePosts" 
              :key="post.id"
              class="flex mt-[30px] items-start flex-col sm:flex-row first:mt-0"
            >
              <!-- Post Image -->
              <div class="w-full overflow-hidden sm:w-[184px] sm:min-w-[184px]">
                <a 
                  :href="post.url" 
                  class="shadow-none no-underline text-[oklch(37.754%0.15587_274.67)] bg-transparent group block"
                >
                  <picture>
                    <img 
                      decoding="async" 
                      :src="post.image" 
                      :alt="post.alt" 
                      class="h-auto w-full min-w-0 scale-100 max-w-full shadow-none align-middle rounded-none border-none backface-hidden transition-transform duration-[0.7s] ease-[ease] group-hover:scale-105"
                    />
                  </picture>
                </a>
              </div>

              <!-- Post Content -->
              <div class="pb-0 px-0 pt-[28px] sm:p-0 sm:ml-[40px]">
                <div class="font-bold leading-[1.2] text-[14px] text-[oklch(37.754%0.15587_274.67)]">
                  {{ post.date }}
                </div>
                <h4 class="mb-2 pb-[5px] font-bold mt-[10px] leading-[1.2] [word-spacing:0] text-[20px] tracking-[-0.02em] text-[oklch(24.229%0.02848_284.07)] sm:pb-[26px] sm:text-[26px]">
                  <a 
                    :href="post.url" 
                    class="delay-0 shadow-none ease-linear no-underline transition-all duration-[0.2s] text-[oklch(24.229%0.02848_284.07)] bg-transparent focus:text-[oklch(37.754%0.15587_274.67)] hover:text-[oklch(37.754%0.15587_274.67)]"
                  >
                    {{ post.title }}
                  </a>
                </h4>
                <div class="mt-[10px] leading-[1.2] text-[15px] text-[oklch(87.61%0_none)]">
                  <Icon icon="mdi:comment-outline" class="inline-block mr-[9px] h-[16px] w-[16px] text-[oklch(87.61%0_none)]" />
                  {{ post.comments }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- View All Articles Button -->
      <Button
        as-child
        variant="ghost"
        class="p-0 delay-0 relative font-bold mt-[36px] inline-flex ease-linear shadow-none items-center leading-none no-underline border-none cursor-pointer outline-none transition-all duration-[0.2s] text-[16px] text-[oklch(37.754%0.15587_274.67)] bg-transparent hover:bg-transparent sm:mt-[46px] group"
      >
        <a :href="viewAllUrl" class="flex items-center no-underline">
          <i class="flex delay-0 h-[50px] w-[50px] pr-[3px] mr-[15px] font-normal ease-linear items-center min-h-[50px] min-w-[50px] rounded-full transition-all duration-[0.2s] border border-[oklch(87.61%0_none)] group-hover:border-[oklch(37.754%0.15587_274.67)] group-hover:bg-[oklch(37.754%0.15587_274.67)] group-hover:text-white justify-center">
            <Icon icon="heroicons:arrow-right" class="h-[12px] w-[12px] text-[oklch(37.754%0.15587_274.67)] group-hover:text-white transition-colors duration-200" />
          </i>
          <span class="relative top-px delay-0 ease-linear duration-[0.2s] tracking-[0.14em] transition-[letter-spacing] group-hover:tracking-[0.18em]">
            {{ viewAllText }}
          </span>
        </a>
      </Button>
    </div>
  </section>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800&display=swap');

.font-roboto {
  font-family: 'Roboto', sans-serif;
}
</style>

