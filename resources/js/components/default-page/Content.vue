<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card'

interface Props {
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
  }
}

const props = withDefaults(defineProps<Props>(), {
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
  })
})
</script>

<template>
  <section class="text-zinc-500 text-lg pb-28 pt-24 min-[576px]:pt-36 min-[576px]:pb-40 min-[1025px]:pt-36 min-[1025px]:pb-40 font-roboto">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <div class="-mt-16 md:-mt-20">
        <div class="flex flex-wrap -m-3.5">
          <!-- Full Width Content Area -->
          <div class="w-full px-4 mt-16 md:mt-20">
            <Card class="border-0 shadow-none bg-transparent">
              <CardContent class="p-0">
                <!-- Typography Showcase -->
                <div class="max-w-full mx-auto">
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
                  <p class="max-w-full mt-7 text-zinc-800 font-bold">
                    <strong>{{ content.boldParagraph }}</strong>
                  </p>

                  <!-- Regular Text with Link -->
                  <p class="max-w-full mt-7" v-html="content.richParagraphHtml"></p>

                  <!-- Italic Text -->
                  <p class="max-w-full mt-7">
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
                  <p class="max-w-full mt-7">
                    <span class="text-indigo-900 float-left text-6xl font-bold mt-2 mr-6">{{ content.dropcapsText.charAt(0) }}</span>
                    {{ content.dropcapsText.slice(1) }}
                  </p>

                  <!-- Blockquotes -->
                  <h4 class="text-zinc-800 text-[1.63rem] leading-8 font-bold pb-3 mt-14 mb-2">Blockquotes</h4>
                  <blockquote class="italic pb-5 px-7 pt-1 mt-6">
                    <p class="italic max-w-full mt-7">{{ content.blockquoteText }}</p>
                  </blockquote>

                  <!-- Text with Background -->
                  <div class="text-white bg-indigo-900 py-10 px-8 mt-20 overflow-hidden min-[791px]:py-12 min-[1025px]:py-14">
                    <h4 class="text-[1.63rem] leading-8 font-bold pb-3 mb-2">{{ content.textWithBackgroundTitle }}</h4>
                    <p class="max-w-full mt-7">{{ content.textWithBackgroundBody }}</p>
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