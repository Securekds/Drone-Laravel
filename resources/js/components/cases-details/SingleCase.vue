
<script setup lang="ts">
import { Icon } from '@iconify/vue'
// Define props interface
interface ProjectDetail {
  label: string;
  value: string;
}

interface ProjectData {
  videoLink: string;
  imageSrc: string;
  imageAlt: string;
  details: ProjectDetail[];
  title: string;
  description: string[];
  subheading: string;
  orderedList: string[];
  unorderedList: string[];
  additionalContent: string;
}

interface Props {
  projectData: ProjectData;
}

// Define props with default values
const props = withDefaults(defineProps<Props>(), {
  projectData: () => ({
    videoLink: "https://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE",
    imageSrc: "/assets/img_02.jpg",
    imageAlt: "Project Image",
    details: [
      { label: "Category", value: "Experience sharing" },
      { label: "Client", value: "JBD" },
      { label: "Date", value: "03/19/2019" },
      { label: "Website", value: "www.JBD.com" }
    ],
    title: "Rainy day shooting with SMOD Pocket",
    description: [
      "Cutthroat eel beluga sturgeon European flounder grayling European flounder torpedo, sea catfish eagle ray. Catfish dogfish shark California smoothtongue píntano man-of-war fish yellowtail horse mackerel pike conger.",
      "Needlefish rock bass hussar garibaldi daggertooth pike conger, needlefish lanternfish snapper Modoc sucker alfonsino northern pearleye long-finned char skipping goby! Dorab largemouth bass South American Lungfish lizardfish moray eel Black mackerel southern hake smelt-whiting zebra danio oceanic flyingfish banded killifish, California flyingfish; snailfish? Conger eel Sevan trout false cat shark clown triggerfish goosefish spaghetti eel surf sardine sea toad, burma danio. Bichir fangtooth paperbone temperate bass slipmouth pearl danio kaluga duckbilled barracudina grunion"
    ],
    subheading: "Creative Things",
    orderedList: [
      "Staghorn sculpin",
      "Plownose chimaera",
      "Sawfish temperate",
      "Perch goatfish",
      "Jackfish"
    ],
    unorderedList: [
      "Staghorn sculpin",
      "Plownose chimaera",
      "Sawfish temperate",
      "Perch goatfish",
      "Jackfish"
    ],
    additionalContent: "Cutthroat eel beluga sturgeon European flounder grayling European flounder torpedo, sea catfish eagle ray. Catfish dogfish shark California smoothtongue píntano man-of-war fish yellowtail horse mackerel pike conger."
  })
});
</script>


<template>
  <section class="text-zinc-500 text-lg py-24 min-[576px]:pt-36 min-[576px]:pb-40 min-[1025px]:pt-36 min-[1025px]:pb-40">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <div class="flex flex-wrap -m-3.5">
        
        <!-- First Section: Image and Details Table -->
        <div class="w-full px-4">
          <div class="flex flex-wrap -m-3.5">
            <div class="w-full px-4">
              <div class="flex flex-col md:flex-row -m-3.5">
                
                <!-- Image Column -->
                <div class="w-full md:w-1/2 px-4">
                  <div class="p-3">
                    <a :href="projectData.videoLink" class="group block relative">
                      <img 
                        :src="projectData.imageSrc" 
                        :alt="projectData.imageAlt" 
                        class="w-full h-auto max-w-full cursor-pointer"
                      />
                      <!-- Center Play Button overlay -->
                      <div class="pointer-events-none absolute inset-0 flex items-center justify-center">
                        <div class="flex h-22 w-22 transform items-center justify-center rounded-full border-2 border-transparent bg-white transition-all duration-300 group-hover:scale-110 group-hover:border-white group-hover:bg-transparent">
                          <Icon icon="heroicons:play" class="ml-1 h-6 w-6 text-indigo-900 transition-colors duration-300 group-hover:text-white" />
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
                
                <!-- Details Table Column -->
                <div class="w-full md:w-1/2 px-4">
                  <div class="p-3">
                    <div class="bg-indigo-900 text-white p-5 mt-1 min-[1025px]:pt-14 min-[1025px]:pr-5 min-[1025px]:pb-16 min-[1025px]:pl-9">
                      <table class="w-full border-collapse">
                        <tbody>
                          <tr 
                            v-for="(detail, index) in projectData.details" 
                            :key="index"
                            class="border-b border-indigo-700 last:border-b-0"
                          >
                            <td class="font-bold py-3 px-3 align-middle min-[1025px]:p-3.5">
                              {{ detail.label }}:
                            </td>
                            <td class="py-3 px-3 align-middle min-[1025px]:p-3.5">
                              {{ detail.value }}
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>

        <!-- Second Section: Content and Lists -->
        <div class="w-full px-4 mt-16">
          <div class="flex flex-wrap -m-3.5">
            
            <!-- Title -->
            <div class="w-full px-4">
              <div class="p-4">
                <div class="pb-6">
                  <h2 class="text-[2.50rem] leading-none text-zinc-800 font-bold min-[791px]:mt-5">
                    {{ projectData.title }}
                  </h2>
                </div>
              </div>
            </div>
            
            <!-- Description Paragraphs -->
            <div class="w-full px-4">
              <div class="p-4">
                <p 
                  v-for="(paragraph, index) in projectData.description" 
                  :key="`desc-${index}`" 
                  class="mt-3 leading-relaxed"
                >
                  {{ paragraph }}
                </p>
              </div>
            </div>
            
            <!-- Subheading -->
            <div class="w-full px-4">
              <div class="p-4">
                <h6 class="text-zinc-800 font-bold text-lg">
                  {{ projectData.subheading }}
                </h6>
              </div>
            </div>
            
            <!-- Lists Section -->
            <div class="w-full px-4">
              <div class="flex flex-col md:flex-row -m-3.5">
                
                <!-- Ordered List Column -->
                <div class="w-full md:w-1/2 px-4">
                  <div class="p-3">
                    <ol class="list-decimal -mt-1">
                      <li 
                        v-for="(item, index) in projectData.orderedList" 
                        :key="`ol-${index}`" 
                        class="py-1 ml-8"
                      >
                        {{ item }}
                      </li>
                    </ol>
                  </div>
                </div>
                
                <!-- Unordered List Column -->
                <div class="w-full md:w-1/2 px-4">
                  <div class="p-3">
                    <ul class="list-disc -mt-1">
                      <li 
                        v-for="(item, index) in projectData.unorderedList" 
                        :key="`ul-${index}`" 
                        class="py-1 ml-8"
                      >
                        {{ item }}
                      </li>
                    </ul>
                  </div>
                </div>
                
              </div>
            </div>
            
            <!-- Additional Content -->
            <div class="w-full px-4">
              <div class="p-4">
                <p class="mt-3 leading-relaxed">
                  {{ projectData.additionalContent }}
                </p>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
    </div>
    <!-- Prev/Next thumbnails -->
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <div class="text-zinc-500 text-lg font-bold">
        <div class="mt-11 min-[576px]:mt-16 flex gap-7">
          <!-- PREV Link -->
          <a href="*" class="group relative text-center flex-1 h-24 overflow-hidden min-[576px]:h-32 pb-1.5 px-1.5 pt-10 flex items-center justify-center">
            <span class="bg-[url('/assets/videoblock_img_06-570x125.jpg')] cursor-pointer left-0 absolute top-0 z-[1] w-full h-full"></span>
            <div class="relative z-[2] flex items-center gap-0 md:gap-[15px]">
              <div class="hidden md:flex items-center justify-center w-[50px] h-[50px] min-w-[50px] min-h-[50px] rounded-full border border-white/70 group-hover:bg-[#2e3192] group-hover:border-[#2e3192] transition-all duration-200">
                <Icon icon="heroicons:chevron-left" class="w-[12px] h-[12px] text-white" />
              </div>
              <span class="text-[15px] font-bold tracking-[0.14em] relative top-[1px] text-white">PREV</span>
            </div>
          </a>
          <!-- NEXT Link -->
          <a href="*" class="group relative text-center flex-1 h-24 overflow-hidden min-[576px]:h-32 pb-1.5 px-1.5 pt-10 flex items-center justify-center">
            <span class="bg-[url('/assets/videoblock_img_04-570x125.jpg')] cursor-pointer left-0 absolute top-0 z-[1] w-full h-full"></span>
            <div class="relative z-[2] flex items-center gap-0 md:gap-[15px]">
              <span class="text-[15px] font-bold tracking-[0.14em] relative top-[1px] text-white">NEXT</span>
              <div class="hidden md:flex items-center justify-center w-[50px] h-[50px] min-w-[50px] min-h-[50px] rounded-full border border-white/70 group-hover:bg-[#2e3192] group-hover:border-[#2e3192] transition-all duration-200">
                <Icon icon="heroicons:chevron-right" class="w-[12px] h-[12px] text-white" />
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
</template>






