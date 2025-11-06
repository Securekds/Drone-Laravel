<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Icon } from '@iconify/vue'

interface SidebarItem {
  title: string
  items: Array<{
    text: string
    link: string
  }>
}

interface Props {
  sidebarSections?: SidebarItem[]
  content?: {
    headings: {
      h1: string
      h2: string
      h3: string
      h4: string
      h5: string
      h6: string
    }
    boldParagraph: string
    richParagraphHtml: string
    italicParagraph: string
    orderedList: string[]
    unorderedList: string[]
    dropcapsText: string
    blockquoteText: string
    textWithBackgroundTitle: string
    textWithBackgroundBody: string
    featuredPost: {
      image: string
      titleHtml: string
    }
  }
}

const props = withDefaults(defineProps<Props>(), {
  sidebarSections: () => [
    {
      title: 'Categories',
      items: [
        { text: 'Drone', link: 'https://quadrone.ninetheme.com/category/drone/' },
        { text: 'Flying spots', link: 'https://quadrone.ninetheme.com/category/flying-spots/' },
        { text: 'Help', link: 'https://quadrone.ninetheme.com/category/help/' },
        { text: 'Industrial', link: 'https://quadrone.ninetheme.com/category/industrial/' },
        { text: 'Products', link: 'https://quadrone.ninetheme.com/category/products/' },
        { text: 'Services', link: 'https://quadrone.ninetheme.com/category/services/' }
      ]
    },
    {
      title: 'Recent Posts',
      items: [
        { text: 'Artificial Intelligence applied to Precision Agriculture', link: 'https://quadrone.ninetheme.com/artificial-intelligence-applied-to-precision-agriculture/' },
        { text: 'Quadrone Announces Pricing And Availability of Multilink', link: 'https://quadrone.ninetheme.com/quadrone-announces-pricing-and-availability-of-multilink/' },
        { text: 'We launch a new Precision Agriculture project', link: 'https://quadrone.ninetheme.com/we-launch-a-new-precision-agriculture-project/' },
        { text: 'Quadron Forum Data Review in 2018', link: 'https://quadrone.ninetheme.com/quadron-forum-data-review-in-2018/' }
      ]
    },
    {
      title: 'Archives',
      items: [
        { text: 'November 2019', link: 'https://quadrone.ninetheme.com/2019/11/' },
        { text: 'October 2019', link: 'https://quadrone.ninetheme.com/2019/10/' }
      ]
    },
    {
      title: 'Meta',
      items: [
        { text: 'Log in', link: 'https://quadrone.ninetheme.com/wp-login.php' },
        { text: 'Entries feed', link: 'https://quadrone.ninetheme.com/feed/' },
        { text: 'Comments feed', link: 'https://quadrone.ninetheme.com/comments/feed/' },
        { text: 'WordPress.org', link: 'https://wordpress.org/' }
      ]
    }
  ],
  content: () => ({
    headings: {
      h1: 'Heading 01',
      h2: 'Heading 02',
      h3: 'Heading 03',
      h4: 'Heading 04',
      h5: 'Heading 05',
      h6: 'Heading 06',
    },
    boldParagraph:
      'Staghorn sculpin plownose chimaera sawfish temperate perch goatfish jackfish darter scaly dragonfish king of herring. Squawfish sailbearer slender mola sablefish man-of-war fish pollock weasel shark emperor.',
    richParagraphHtml:
      '<a href="https://quadrone.ninetheme.com/#" class="text-indigo-900 underline">Blue shark masu salmon spiny dwarf catfish crocodile</a> shark tubeblenny cowfish squarehead catfish Gila trout. Neon tetra wormfish lionfish sharksucker orangespine unicorn fish beaked salmon grayling armored searobin sauger elephant fish mackerel <span class="text-white bg-indigo-900 pb-1 px-1 inline-block">jack finback cat shark lined sole.</span> Flagtail: ray john dory, crappie gulper eel clown triggerfish.',
    italicParagraph:
      'Zebra lionfish airsac catfish french angelfish oceanic flyingfish Bengal danio, requiem shark panga snipefish walleye pollock barracudina crocodile icefish deep sea eel. Mora mojarra temperate ocean-bass velvet-belly shark;',
    orderedList: [
      'Staghorn sculpin',
      'Plownose chimaera',
      'Sawfish temperate',
      'Perch goatfish',
      'Jackfish',
    ],
    unorderedList: [
      'Staghorn sculpin',
      'Plownose chimaera',
      'Sawfish temperate',
      'Perch goatfish',
      'Jackfish',
    ],
    dropcapsText:
      "Antarctic icefish spotted dogfish; Red whalefish cherry salmon, jewfish conger eel turbot sailfin silverside. Sea chub longfin smelt dace sleeper shark bottlenose anglerfish torpedo, gray reef shark queen danio needlefish. Deep sea smelt bigscale neon tetra codling snake eel. danio needlefish. Deep sea smelt bigscale neon tetra codling snake eel. Humuhumunukunukuapua'a gulf menhaden Red salmon, Asiatic glassfish luderick Bombay duck flabby whalefish spiderfish bull shark boxfish–lungfish flathead, \"North American darter.\" ntarctic icefish spotted dogfish; Red whalefish cherry salmon, jewfish conger eel turbot sailfin silverside. Sea chub longfin smelt dace sleeper shark bottlenose anglerfish torpedo, gray reef shark queen danio needlefish. Deep sea smelt bigscale neon tetra codling",
    blockquoteText:
      'Ntarctic icefish spotted dogfish; Red whalefish cherry salmon, jewfish conger eel turbot sailfin silverside. Sea chub longfin smelt dace sleeper shark bottlenose anglerfish torpedo, gray reef shark queen danio needlefish. Deep sea smelt bigscale neon tetra codling snake eel. danio needlefish. Deep sea smelt bigscale neon tetra codling snake eel. Humuhumunukunukuapua\'a gulf menhaden Red salmon, Asiatic glassfish luderick Bombay duck flabby whalefish spiderfish bull shark boxfish–lungfish flathead, "North American darter."',
    textWithBackgroundTitle: 'Text with background',
    textWithBackgroundBody:
      'danio needlefish. Deep sea smelt bigscale neon tetra codling snake eel. Humuhumunukunukuapua\'a gulf menhaden Red salmon, Asiatic glassfish luderick Bombay duck flabby whalefish spiderfish bull shark boxfish–lungfish flathead, "North American darter." ntarctic icefish spotted dogfish; Red whalefish cherry salmon, jewfish conger eel turbot sailfin silverside. Sea chub longfin smelt dace sleeper shark bottlenose anglerfish torpedo, gray reef shark queen danio needlefish. Deep sea smelt bigscale neon tetra codling snake eel.',
    featuredPost: {
      image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/12/promo_aside.jpg',
      titleHtml: 'SimActive Releases<br>Version 8.1',
    },
  })
})
</script>

<template>
  <section class="text-zinc-500 text-lg pb-28 pt-24 min-[576px]:pt-36 min-[576px]:pb-40 min-[1025px]:pt-36 min-[1025px]:pb-40 font-roboto">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <div class="-mt-16 md:-mt-20">
        <div class="flex flex-wrap -m-3.5">
          <!-- Main Content Area -->
          <div class="w-full lg:w-2/3 px-4 mt-16 md:mt-20">
            <Card class="border-0 shadow-none bg-transparent">
              <CardContent class="p-0">
                <!-- Typography Showcase -->
                <div class="max-w-4xl mx-auto">
                  <!-- Headings -->
                  <h1 class="text-zinc-800 text-6xl font-bold pb-3 mb-2">
                    {{ content.headings.h1 }} <span class="font-light ml-4">60px</span>
                  </h1>
                  <h2 class="text-zinc-800 text-[2.50rem] leading-none font-bold pb-3 mb-2">
                    {{ content.headings.h2 }} <span class="font-light ml-4">40px</span>
                  </h2>
                  <h3 class="text-zinc-800 text-3xl font-bold pb-3 mb-2">
                    {{ content.headings.h3 }} <span class="font-light ml-4">30px</span>
                  </h3>
                  <h4 class="text-zinc-800 text-[1.63rem] leading-8 font-bold pb-3 mb-2">
                    {{ content.headings.h4 }} <span class="font-light ml-4">26px</span>
                  </h4>
                  <h5 class="text-zinc-800 text-xl font-bold pb-3 mb-2">
                    {{ content.headings.h5 }} <span class="font-light ml-4">20px</span>
                  </h5>
                  <h6 class="text-zinc-800 font-bold pb-3 mb-2">
                    {{ content.headings.h6 }} <span class="font-light ml-4">16px</span>
                  </h6>

                  <!-- Bold Text -->
                  <p class="max-w-4xl mt-7 text-zinc-800 font-bold">
                    <strong>{{ content.boldParagraph }}</strong>
                  </p>

                  <!-- Regular Text with Link -->
                  <p class="max-w-4xl mt-7" v-html="content.richParagraphHtml"></p>

                  <!-- Italic Text -->
                  <p class="max-w-4xl mt-7">
                    <em class="italic">{{ content.italicParagraph }}</em>
                  </p>

                  <!-- Lists Section -->
                  <h4 class="text-zinc-800 text-[1.63rem] leading-8 font-bold pb-3 mt-14 mb-2">List</h4>
                  <div class="flex flex-wrap -m-3.5">
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4">
                      <ol class="pl-5 -mt-1">
                        <li 
                          v-for="(item, idx) in content.orderedList"
                          :key="item"
                          class="list-item mt-1 ml-9 flex items-start gap-3"
                        >
                          <span class="font-bold" style="color:#2e3192; min-width:2.5rem;">{{ String(idx + 1).padStart(2, '0') }}.</span>
                          <span>{{ item }}</span>
                        </li>
                      </ol>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4">
                      <ul class="pl-5 list-disc">
                        <li 
                          v-for="item in content.unorderedList"
                          :key="item"
                          class="list-item mt-1"
                        >
                          {{ item }}
                        </li>
                      </ul>
                    </div>
                  </div>

                  <!-- Dropcaps -->
                  <h4 class="text-zinc-800 text-[1.63rem] leading-8 font-bold pb-3 mt-20 my-2">Dropcaps</h4>
                  <p class="max-w-4xl mt-7">
                    <span class="text-indigo-900 float-left text-6xl font-bold mt-2 mr-6">{{ content.dropcapsText.charAt(0) }}</span>
                    {{ content.dropcapsText.slice(1) }}
                  </p>

                  <!-- Blockquotes -->
                  <h4 class="text-zinc-800 text-[1.63rem] leading-8 font-bold pb-3 mt-14 mb-2">Blockquotes</h4>
                  <blockquote class="italic pb-5 px-7 pt-1 mt-6">
                    <p class="italic max-w-4xl mt-7">{{ content.blockquoteText }}</p>
                  </blockquote>

                  <!-- Text with Background -->
                  <div class="text-white bg-indigo-900 py-10 px-8 mt-20 overflow-hidden min-[791px]:py-12 min-[1025px]:py-14">
                    <h4 class="text-[1.63rem] leading-8 font-bold pb-3 mb-2">{{ content.textWithBackgroundTitle }}</h4>
                    <p class="max-w-4xl mt-7">{{ content.textWithBackgroundBody }}</p>
                  </div>
                </div>
              </CardContent>
            </Card>
          </div>

          <!-- Sidebar Area -->
          <div class="w-full lg:w-1/3 px-4 mt-16 md:mt-20 lg:pl-8">
            <Card class="border-0 shadow-none bg-transparent">
              <CardContent class="p-0">
                <!-- Search Form -->
                <div class="mb-16">
                  <form action="https://quadrone.ninetheme.com/" class="w-full">
                    <div class="flex">
                      <Input 
                        type="text" 
                        placeholder="Search for..." 
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

                <!-- Sidebar Sections -->
                <div 
                  v-for="(section, index) in sidebarSections"
                  :key="section.title"
                  class="mb-16"
                >
                  <h4 class="text-gray-900 text-[1.63rem] leading-8 font-bold capitalize mb-2">
                    {{ section.title }}
                  </h4>
                  <ul class="list-none text-indigo-900 font-bold">
                    <li 
                      v-for="item in section.items"
                      :key="item.text"
                      class="list-item mb-3.5 last:mb-0"
                    >
                      <a :href="item.link" class="hover:underline">
                        {{ item.text }}
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
                      :src="content.featuredPost.image" 
                      alt="Featured Post"
                      class="w-auto h-auto max-w-full"
                    />
                    <p class="text-white bottom-5 font-semibold left-6 absolute z-10" v-html="content.featuredPost.titleHtml"></p>
                  </div>
                </div>
              </CardContent>
            </Card>
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