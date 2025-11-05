<script setup lang="ts">
interface Props {
  backgroundImage?: string
  subtitle?: string
  title?: string
}

const props = withDefaults(defineProps<Props>(), {
  backgroundImage:
    "url('/assets/PilotHero.jpg')",
  subtitle: 'Quadron',
  title: 'Drone Pilot Training',
})
</script>

<template>
  <!-- Services Details Hero Section Only -->
  <section class="w-full relative text-zinc-500 font-bold font-roboto">
    <div
      class="w-full relative flex items-end overflow-hidden bg-cover bg-center bg-no-repeat h-[300px] sm:h-[350px] md:h-[400px] lg:h-[500px]"
      :style="{ backgroundImage }"
    >
      <!-- Content -->
      <div
        class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl relative h-32 sm:h-40 md:h-48 lg:h-64 pt-4 sm:pt-6 md:pt-12"
      >
        <!-- Decorative box (absolute, fixed desktop position) -->
        <div
          class="absolute top-0 left-2 sm:left-4 md:left-8 lg:left-10 bg-[#2e3192] z-[1]
          w-[130px] h-[130px] sm:w-[180px] sm:h-[180px] md:w-[250px] md:h-[250px]
          lg:w-[271px] lg:h-[270px] xl:h-[318px]"
        ></div>

        <!-- Lines aligned with text -->
        <div
          class="absolute top-0 left-2 sm:left-4 md:left-8 lg:left-10 z-[2]
          w-[130px] h-[130px] sm:w-[180px] sm:h-[180px] md:w-[250px] md:h-[250px]
          lg:w-[271px] lg:h-[270px] xl:h-[318px]"
        >
          <div
            class="absolute bottom-[10%] sm:bottom-[70px]
            left-[calc(1rem+0px)] sm:left-[3.5rem] md:left-[4.5rem]
            w-[38px] h-[2px] bg-white"
          ></div>
          <div
            class="absolute bottom-[10%] sm:bottom-[70px]
            left-[calc(3.8rem+0px)] sm:left-[6.5rem] md:left-[7.5rem]
            w-[68px] h-[2px] bg-[#7A7A7A]"
          ></div>
        </div>

        <!-- Text -->
        <div class="relative z-[3] text-white pl-4 sm:pl-6 md:pl-12 lg:pl-20">
          <div class="text-xl">{{ subtitle }}</div>
          <h1
            class="text-[1.6rem] sm:text-[3rem] md:text-[3.75rem] leading-tight pb-3 sm:pb-6 mt-4 mb-2"
          >
            {{ title }}
          </h1>
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
