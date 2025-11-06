<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'

// Define interfaces
interface Category {
  name: string
  link: string
}

interface Author {
  name: string
  link: string
}

interface Comments {
  text: string
  link: string
}

interface Date {
  text: string
  link: string
}

interface BlogPost {
  id: number
  title: string
  excerpt: string
  image: string
  srcset: string
  link: string
  categories: Category[]
  author: Author
  comments: Comments
  date: Date
}

interface Props {
  blogPosts?: BlogPost[]
  readMoreText?: string
}

// Default props
const props = withDefaults(defineProps<Props>(), {
  readMoreText: 'Read More',
  blogPosts: () => [
    {
      id: 1,
      title: 'Artificial Intelligence applied to Precision Agriculture',
      excerpt: 'Bullhead shark, peacock flounder yellowtail pomfret monkfish electric knifefish. Madtom armored gurnard bighead carp brown trout…',
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03.jpg',
      srcset: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03.jpg 1600w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03-300x156.jpg 300w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03-1024x531.jpg 1024w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03-768x398.jpg 768w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03-1536x797.jpg 1536w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/main-slider-03-600x311.jpg 600w',
      link: 'https://quadrone.ninetheme.com/artificial-intelligence-applied-to-precision-agriculture/',
      categories: [
        { name: 'Drone', link: 'https://quadrone.ninetheme.com/category/drone/' },
        { name: 'Flying spots', link: 'https://quadrone.ninetheme.com/category/flying-spots/' },
        { name: 'Industrial', link: 'https://quadrone.ninetheme.com/category/industrial/' }
      ],
      author: {
        name: 'XNT_ADM',
        link: 'https://quadrone.ninetheme.com/author/xnt_adm/'
      },
      comments: {
        text: 'No Comments',
        link: 'https://quadrone.ninetheme.com/artificial-intelligence-applied-to-precision-agriculture/#respond'
      },
      date: {
        text: 'November 27, 2019',
        link: 'https://quadrone.ninetheme.com/2019/11/27/'
      }
    },
    {
      id: 2,
      title: 'Quadrone Announces Pricing And Availability of Multilink',
      excerpt: 'Bullhead shark, peacock flounder yellowtail pomfret monkfish electric knifefish. Madtom armored gurnard bighead carp brown trout…',
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/presentation-projects-02.jpg',
      srcset: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/presentation-projects-02.jpg 1429w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/presentation-projects-02-300x166.jpg 300w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/presentation-projects-02-1024x568.jpg 1024w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/presentation-projects-02-768x426.jpg 768w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/presentation-projects-02-600x333.jpg 600w',
      link: 'https://quadrone.ninetheme.com/quadrone-announces-pricing-and-availability-of-multilink/',
      categories: [
        { name: 'Drone', link: 'https://quadrone.ninetheme.com/category/drone/' },
        { name: 'Help', link: 'https://quadrone.ninetheme.com/category/help/' },
        { name: 'Products', link: 'https://quadrone.ninetheme.com/category/products/' }
      ],
      author: {
        name: 'XNT_ADM',
        link: 'https://quadrone.ninetheme.com/author/xnt_adm/'
      },
      comments: {
        text: 'No Comments',
        link: 'https://quadrone.ninetheme.com/quadrone-announces-pricing-and-availability-of-multilink/#respond'
      },
      date: {
        text: 'November 27, 2019',
        link: 'https://quadrone.ninetheme.com/2019/11/27/'
      }
    },
    {
      id: 3,
      title: 'We launch a new Precision Agriculture project',
      excerpt: 'Bullhead shark, peacock flounder yellowtail pomfret monkfish electric knifefish. Madtom armored gurnard bighead carp brown trout…',
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/slider-external-box02.jpg',
      srcset: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/slider-external-box02.jpg 1429w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/slider-external-box02-300x169.jpg 300w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/slider-external-box02-1024x576.jpg 1024w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/slider-external-box02-768x432.jpg 768w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/slider-external-box02-600x338.jpg 600w',
      link: 'https://quadrone.ninetheme.com/we-launch-a-new-precision-agriculture-project/',
      categories: [
        { name: 'Drone', link: 'https://quadrone.ninetheme.com/category/drone/' },
        { name: 'Help', link: 'https://quadrone.ninetheme.com/category/help/' },
        { name: 'Services', link: 'https://quadrone.ninetheme.com/category/services/' }
      ],
      author: {
        name: 'XNT_ADM',
        link: 'https://quadrone.ninetheme.com/author/xnt_adm/'
      },
      comments: {
        text: 'No Comments',
        link: 'https://quadrone.ninetheme.com/we-launch-a-new-precision-agriculture-project/#respond'
      },
      date: {
        text: 'November 27, 2019',
        link: 'https://quadrone.ninetheme.com/2019/11/27/'
      }
    },
    {
      id: 4,
      title: 'Quadron Forum Data Review in 2018',
      excerpt: 'Bullhead shark, peacock flounder yellowtail pomfret monkfish electric knifefish. Madtom armored gurnard bighead carp brown trout…',
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/presentation-projects-01.jpg',
      srcset: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/presentation-projects-01.jpg 1170w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/presentation-projects-01-300x166.jpg 300w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/presentation-projects-01-1024x568.jpg 1024w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/presentation-projects-01-768x426.jpg 768w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/presentation-projects-01-600x333.jpg 600w',
      link: 'https://quadrone.ninetheme.com/quadron-forum-data-review-in-2018/',
      categories: [
        { name: 'Drone', link: 'https://quadrone.ninetheme.com/category/drone/' },
        { name: 'Flying spots', link: 'https://quadrone.ninetheme.com/category/flying-spots/' },
        { name: 'Help', link: 'https://quadrone.ninetheme.com/category/help/' }
      ],
      author: {
        name: 'XNT_ADM',
        link: 'https://quadrone.ninetheme.com/author/xnt_adm/'
      },
      comments: {
        text: '1 Comment',
        link: 'https://quadrone.ninetheme.com/quadron-forum-data-review-in-2018/#comments'
      },
      date: {
        text: 'October 28, 2019',
        link: 'https://quadrone.ninetheme.com/2019/10/28/'
      }
    }
  ]
})
</script>


<template>
  <section class="text-zinc-500 text-lg py-24 min-[576px]:pt-36 min-[576px]:pb-36 min-[1025px]:pt-36 min-[1025px]:pb-36" style="background-image: url('/assets/sectionbg_wrapper-03.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      
      <div class="flex flex-wrap justify-center -m-3.5">
        <div class="w-full px-4">
          <div class="flex flex-wrap -m-3.5">
            
            <!-- Blog Post Cards -->
            <div 
              v-for="post in blogPosts" 
              :key="post.id"
              class="w-full px-4 mb-12 last:mb-0"
            >
              <Card class="w-full border-2 border-slate-200 overflow-hidden hover:shadow-lg transition-shadow duration-300 rounded-none py-0">
                
                <!-- Post Image -->
                <div class="overflow-hidden">
                  <a :href="post.link" class="block">
                    <img 
                      :src="post.image" 
                      :srcset="post.srcset"
                      :alt="post.title"
                      class="w-full h-auto max-w-full cursor-pointer hover:scale-105 transition-transform duration-300"
                    />
                  </a>
                </div>

                <!-- Post Content -->
                <CardContent class="border-t-2 border-slate-200 p-6 min-[576px]:p-12 max-[575px]:p-[30px]">
                  
                  <!-- Categories -->
                  <div class="text-zinc-400 text-xs font-black uppercase -mt-1 mb-3 max-[575px]:mb-[10px]">
                    <span 
                      v-for="(category, index) in post.categories" 
                      :key="category.name"
                    >
                      <a 
                        :href="category.link" 
                        class="text-indigo-900 hover:text-indigo-700"
                      >
                        {{ category.name }}
                      </a>
                      <span v-if="index < post.categories.length - 1">, </span>
                    </span>
                  </div>

                  <!-- Post Title -->
                  <h2 class="text-zinc-800 text-[2.50rem] leading-none font-semibold capitalize max-w-[40.63rem] mb-2 max-[575px]:mb-[10px] max-[575px]:pb-0">
                    <a 
                      :href="post.link" 
                      class="text-gray-900 hover:text-indigo-900 transition-colors duration-200"
                    >
                      {{ post.title }}
                    </a>
                  </h2>

                  <!-- Post Meta -->
                  <ul class="text-neutral-500 list-none text-sm capitalize flex flex-wrap gap-5 mb-4">
                    <li class="text-gray-900">
                      <a :href="post.author.link" class="hover:text-indigo-900">
                        {{ post.author.name }}
                      </a>
                    </li>
                    <li class="text-gray-900">
                      <a :href="post.comments.link" class="hover:text-indigo-900">
                        {{ post.comments.text }}
                      </a>
                    </li>
                    <li class="text-gray-900">
                      <a :href="post.date.link" class="hover:text-indigo-900">
                        {{ post.date.text }}
                      </a>
                    </li>
                  </ul>

                  <!-- Post Excerpt -->
                  <p class="text-zinc-600 leading-relaxed mb-6">
                    {{ post.excerpt }}
                  </p>

                  <!-- Read More Button -->
                  <div class="mt-5">
                    <Button 
                      as-child
                      class="bg-indigo-900 hover:bg-indigo-800 text-white font-bold h-16 px-9 rounded-3xl"
                    >
                      <a :href="post.link">
                        {{ readMoreText }}
                      </a>
                    </Button>
                  </div>
                </CardContent>
              </Card>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>