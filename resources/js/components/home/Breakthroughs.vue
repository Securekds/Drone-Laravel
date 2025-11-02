<script setup lang="ts">
interface AppButton {
  id: number
  imageSrc: string
  alt: string
  url: string
}

interface SectionData {
  subtitle: string
  titleLine1: string
  titleLine2: string
  paragraphs: string[]
  imageSrc: string
  imageAlt: string
}

interface Props {
  sectionData?: SectionData
  appButtons?: AppButton[]
}

const props = withDefaults(defineProps<Props>(), {
  sectionData: () => ({
    subtitle: "Mobile App",
    titleLine1: "Innovations and",
    titleLine2: "Breakthroughs",
    paragraphs: [
      "Aerial surveying is not just about the aircraft. It's about total UAV solutions, complete with all the tools geospatial pros need to perform jobs accurately, efficiently, and safely.",
      "Our mdMapper packages integrate high-performance drones with advanced sensors and software. They're designed for quick learning and easy use, so you can get your UAV services off the ground immediately."
    ],
    imageSrc: "/assets/Asse3.png",
    imageAlt: "Innovations and Breakthroughs"
  }),
  appButtons: () => [
    {
      id: 1,
      imageSrc: "/assets/Goolge.png",
      alt: "Google Play Store",
      url: "#"
    },
    {
      id: 2,
      imageSrc: "/assets/AppStore.png",
      alt: "App Store",
      url: "#"
    }
  ]
})
</script>

<template>
  <section class="relative font-roboto w-full pt-[98px] pb-[100px] sm:pt-[148px] sm:pb-[130px] xl:pb-[129px] overflow-hidden">
    <div class="w-full mx-auto px-[19px] max-w-none lg:px-[25px] xl:px-[15px] xl:max-w-[1200px]">
      <div class="flex flex-col items-center sm:flex-row">
        <!-- Image Section -->
        <div class="w-full order-2 sm:order-1 sm:w-[511px]">
          <img 
            decoding="async" 
            :src="sectionData.imageSrc" 
            :alt="sectionData.imageAlt" 
            class="m-0 h-auto max-w-full shadow-none align-middle rounded-none border-none sm:mt-[-95px] sm:mb-[-95px] sm:ml-[-90px] sm:mr-[-150px] xl:mt-[-95px] xl:mb-[-95px] xl:mr-[-150px] xl:ml-[-104px]"
          />
        </div>
        
        <!-- Content Section -->
        <div class="w-full order-1 sm:order-2 sm:w-[55%]">
          <div class="sm:ml-[-85px] xl:ml-[-15px]">
            <div class="relative pb-[24px] lg:pb-[22px]">
              <!-- Subtitle -->
              <div class="p-0 relative font-bold leading-[1.1] ![margin-top:0] text-[14px] tracking-[-0.03em] text-[oklch(37.754%0.15587_274.67)] lg:text-[16px]">
                <i class="h-[2px] relative w-[30px] mr-[25px] top-[-5px] inline-block bg-[oklch(37.754%0.15587_274.67)]"></i>
                {{ sectionData.subtitle }}
              </div>
              
              <!-- Title -->
              <h4 class="mb-0 pb-0 font-bold mt-[20px] -tracking-wide leading-[1.13] [word-spacing:0] text-[31px] text-[oklch(24.229%0.02848_284.07)] lg:text-[40px]">
                {{ sectionData.titleLine1 }}<br class="hidden lg:block" />
                {{ sectionData.titleLine2 }}
              </h4>
            </div>
            
            <!-- Paragraphs -->
            <p 
              v-for="(paragraph, index) in sectionData.paragraphs" 
              :key="index"
              class="p-0 mx-0 mt-[10px] mb-[15px] empty:hidden"
            >
              {{ paragraph }}
            </p>
            
            <!-- App Store Buttons -->
            <ul class="p-0 flex mr-0 mb-0 mt-[30px] ml-[-20px] items-start flex-wrap">
              <li 
                v-for="button in appButtons" 
                :key="button.id"
                class="ml-[20px] mt-[20px] [list-style:none]"
              >
                <a 
                  :href="button.url" 
                  class="delay-0 shadow-none opacity-100 ease-linear no-underline duration-[0.4s] transition-opacity text-[oklch(37.754%0.15587_274.67)] bg-transparent hover:opacity-50"
                >
                  <img 
                    decoding="async" 
                    :src="button.imageSrc" 
                    :alt="button.alt" 
                    class="h-auto max-w-full shadow-none align-middle rounded-none border-none"
                  />
                </a>
              </li>
            </ul>
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

